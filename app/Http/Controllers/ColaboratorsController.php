<?php

namespace App\Http\Controllers;

use App\Colaborator;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Redirect;
use Validator;
use Storage;

class ColaboratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $colaboradores = Colaborator::all();
            return Datatables::of($colaboradores)
            ->addColumn('url',function($row){
                $url = $row->url;
                $urlColaborador = '<a style="color: #4a4a4a;" href="'.$url.'">'.$url.'</a>';
                return $urlColaborador;
            })
            ->addColumn('logo',function($row){
                $logoUrl = $row->logo;
                $img = '<img class="img-fluid" style="width: 100px;" src="'.asset('storage/colaborators').'/'.$logoUrl.'"></img>';
                return $img;
            })        
            ->addColumn('edit', function ($row) {
                $url = route('admin.colaboradores.edit', ['colaborador' => $row]);
                $btn = '<a href="' . $url . '" class="edit btn btn-primary btn.sm">Editar</a>';
                return $btn;
            })
            ->addColumn('view', function ($row) {
                $url = route('admin.colaboradores.show', ['colaborador' => $row]);
                $btn = '<a href="' . $url . '" class="view btn btn-primary btn.sm">Ver</a>';
                return $btn;
            })
        ->rawColumns(['url','logo','edit','view'])->make(true);
        }
        return view('admin.colaboradores.index');
    }

    public function create()
    {
        return view('admin.colaboradores.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'name' =>'required',
            'url'=>'required',
            'logo'=>'required|image|mimes:jpeg,png,jpg,gif'
			]);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)
				->withInput();
		}
        $name = $request->input('name');
        $url = $request->input('url');
        $file = $request->file('logo');

        $thumbnail = "";
        $filePath = "";

        if ($file != null) {
            $colaborator = new Colaborator();
            $colaborator->name = $name;
            $colaborator->url = $url;
            $colaborator->logo = "";
            $colaborator->save();

            $colaboratorID = $colaborator->id;
            $path = 'colaborators/';
            $thumbnail = $colaboratorID."_".$file->getClientOriginalName();
            $filePath = $path . $thumbnail;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $colaborator->logo = $thumbnail;
            $colaborator->save();
            return redirect()->route('admin.colaboradores.show', $colaborator);
        }		
    }

    public function show(Colaborator $colaborador)
    {
        return view('admin.colaboradores.show')->with('colaborador',$colaborador);
    }

    public function edit(Colaborator $colaborador)
    {
        return view('admin.colaboradores.edit')->with('colaborador',$colaborador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colaborator $colaborador)
    {
        $validator = Validator::make($request->all(), [
			'name' =>'required',
            'url'=>'required',
            'logo'=>'image|mimes:jpeg,png,jpg,gif'
			]);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)
				->withInput();
		}
        $id = $request->id;        
        $name = $request->input('name');
        $url = $request->input('url');
        $file = $request->file('logo');
        $oldThumbnail = $request->input('old_thumbnail');

        $thumbnail = "";
        $filePath = "";

        if ($file != null) {
            $thumbnail = "";
            $filePath = "";
            $path = 'clientes/';
            $thumbnail = $id."_".$file->getClientOriginalName();
            $filePath = $path . $file->getClientOriginalName();

            $deletePath = $path.$oldThumbnail;
            Storage::disk('public')->delete($deletePath);
            Storage::disk('public')->put($filePath, file_get_contents($file));                        
            
            $colaborador->name = $name;
            $colaborador->url = $url;
            $colaborador->logo = $thumbnail;
            $colaborador->save();
        } else {            
            $colaborador->name = $name;
            $colaborador->url = $url;
            $colaborador->save();
        }
        
        return redirect()->route('admin.colaboradores.show', $colaborador);
    }

    public function delete($id)
    {
        $cliente = Cliente::findOrFail($id);
        $path = 'clientes/';
        $thumbnail = $cliente->logo;
        $filePath = $path . $thumbnail;
        
        Storage::disk('public')->delete($filePath);        
        $cliente->delete();
        
    }
}
