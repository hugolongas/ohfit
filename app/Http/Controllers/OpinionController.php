<?php

namespace App\Http\Controllers;

use App\Opinion;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Redirect;
use Validator;
use Storage;

class OpinionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $opinion = Opinion::all();
            return Datatables::of($opinion)
            ->editColumn('opinion', function ($op) {
                $opDesc =  $op->opinion;
                return $opDesc;
            })
            ->addColumn('edit', function ($row) {
                $url = route('admin.opiniones.edit', ['opinion' => $row]);
                $btn = '<a href="' . $url . '" class="edit btn btn-primary btn.sm">Editar</a>';
                return $btn;
            })
            ->addColumn('view', function ($row) {
                $url = route('admin.opiniones.show', ['opinion' => $row]);
                $btn = '<a href="' . $url . '" class="view btn btn-primary btn.sm">Ver</a>';
                return $btn;
            })
        ->rawColumns(['opinion','edit','view'])->make(true);
        }
        return view('admin.opiniones.index');
    }

    public function create()
    {
        return view('admin.opiniones.create');
    }

    public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'opinion' => 'required',
			]);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)
				->withInput();
		}
		$name = $request->input('name');
        $opDesc = $request->input('opinion');        
		$sociImg = $request->input('imgName');
        
		$opinion = new Opinion();
		$opinion->name = $name;
		$opinion->opinion = $opDesc;
		if ($sociImg != '') {
			$opinion->img = $sociImg;
			//Movemos la imagen de la carpeta uploads a socis
			Storage::disk('public')->move('uploads/' . $sociImg, 'opinions/' . $sociImg);
		} else {
			$opinion->img = 'default.png';
		}

		$opinion->save();
		
        return redirect()->route('admin.opiniones.show', $opinion);
    }

    public function edit(Opinion $opinion)
    {
        return view('admin.opiniones.edit')->with('opinion',$opinion);
    }
    
    public function update(Request $request, Opinion $opinion)
	{

		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'opinion' => 'required'
		]);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)
				->withInput();
		}

		$name = $request->input('name');		
		$opDesc = $request->input('opinion');

			
		$imgOpinion = $request->input('imgName');		
		$imgChanged = $request->input('imgChanged');
        $prevImgName = $request->input('prevImgName');
        
		$opinion->name = $name;
        $opinion->opinion = $opDesc;
        		
		$img_changed = filter_var($imgChanged, FILTER_VALIDATE_BOOLEAN);
		if ($img_changed) {
			if ($imgOpinion != $prevImgName) {
				$opinion->img = $imgOpinion;
				//Movemos la imagen de la carpeta uploads a opinions
				Storage::disk('public')->move('uploads/' . $imgOpinion, 'opinions/' . $imgOpinion);
			} else {
				if ($prevImgName != 'default.png') {
					Storage::disk('public')->delete('opinions/' . $prevImgName);
					Storage::disk('public')->move('uploads/' . $imgOpinion, 'opinions/' . $imgOpinion);
				}
			}
		}		
		
		$opinion->save();
		return redirect()->route('admin.opiniones.show', $opinion);
	}
	
	public function show(Opinion $opinion)
    {
        return view('admin.opiniones.show')->with('opinion',$opinion);
    }
    
    public function delete($id)
    {
        $opinion = Opinion::findOrFail($id);
        $path = 'opinions/';
        $thumbnail = $opinion->img;
        $filePath = $path . $thumbnail;
        
        Storage::disk('public')->delete($filePath);        
        $opinion->delete();
        
    }

    public function uploadImage(Request $request)
	{
		$image = $request->image;
		$imgName = $request->imgName;
		$path = 'uploads/';
		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		if ($imgName == 'default.png')
			$imgName = Str::random(8) . date('Ymdhm');
		$defaultExt = strpos($imgName, '.jpg');

		if ($defaultExt >= 0)
			$image_name = $imgName;
		if (!$defaultExt)
			$image_name = $imgName . '.jpg';
		$filePath = $path . $image_name;
		Storage::disk('public')->put($filePath, $image);
		return response()->json(['status' => true, 'imgName' => $image_name]);
	}
}
