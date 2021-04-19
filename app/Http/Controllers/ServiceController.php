<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Redirect;
use Validator;
use Storage;

class ServiceController extends Controller
{
    public function Index()
    {
        $services = Service::all();
        return view('servicios')->with("services",$services);
    }

    public function indexAdmin(Request $request)
    {
        if ($request->ajax()) {
            $service = Service::all();
            return Datatables::of($service)
            ->editColumn('detail', function ($s) {
                $opDesc =  $s->detail;
                return $opDesc;
            })
            ->addColumn('edit', function ($row) {
                $url = route('admin.servicios.edit', ['service' => $row]);
                $btn = '<a href="' . $url . '" class="edit btn btn-primary btn.sm">Editar</a>';
                return $btn;
            })
            ->addColumn('view', function ($row) {
                $url = route('admin.servicios.show', ['service' => $row]);
                $btn = '<a href="' . $url . '" class="view btn btn-primary btn.sm">Ver</a>';
                return $btn;
            })
        ->rawColumns(['detail','edit','view'])->make(true);
        }
        return view('admin.servicios.index');
    }

    public function create()
    {
        return view('admin.servicios.create');
    }

    public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required'
			]);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)
				->withInput();
		}
		$title = $request->input('name');
        $detail = $request->input('detail');        
		$serviceImg = $request->input('imgName');
        if($detail==null)
        $detail = "";
		$service = new Service();
		$service->title = $title;
		$service->detail = $detail;
		if ($serviceImg != '') {
			$service->img_url = $serviceImg;
			//Movemos la imagen de la carpeta uploads a socis
			Storage::disk('public')->move('uploads/' . $serviceImg, 'services/' . $serviceImg);
		} else {
			$service->img_url = 'default.png';
		}

		$service->save();
		
        return redirect()->route('admin.servicios.show', $service);
    }

    public function edit(Service $service)
    {
        return view('admin.servicios.edit')->with('service',$service);
    }
    
    public function update(Request $request, Service $service)
	{

		$validator = Validator::make($request->all(), [
			'name' => 'required'
		]);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)
				->withInput();
		}

		$title = $request->input('name');		
		$detail = $request->input('detail');
        if($detail==null)
        $detail = "";
			
		$imgService = $request->input('imgName');		
		$imgChanged = $request->input('imgChanged');
        $prevImgName = $request->input('prevImgName');
        
		$service->title = $title;
        $service->detail = $detail;
        		
		$img_changed = filter_var($imgChanged, FILTER_VALIDATE_BOOLEAN);
		if ($img_changed) {
			if ($imgService != $prevImgName) {
				$service->img_url = $imgService;
				//Movemos la imagen de la carpeta uploads a services
				Storage::disk('public')->move('uploads/' . $imgService, 'services/' . $imgService);
			} else {
				if ($prevImgName != 'default.png') {
					Storage::disk('public')->delete('services/' . $prevImgName);
					Storage::disk('public')->move('uploads/' . $imgService, 'services/' . $imgService);
				}
			}
		}		
		
		$service->save();
		return redirect()->route('admin.servicios.show', $service);
	}
	
	public function show(Service $service)
    {
        return view('admin.servicios.show')->with('service',$service);
    }
    
    public function delete($id)
    {
        $service = Service::findOrFail($id);
        $path = 'servicios/';
        $thumbnail = $service->img_url;
        $filePath = $path . $thumbnail;
        
        Storage::disk('public')->delete($filePath);        
        $service->delete();
        
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
