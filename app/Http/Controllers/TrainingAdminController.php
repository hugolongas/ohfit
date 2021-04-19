<?php

namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Redirect;
use Validator;

class TrainingAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $training = Training::all();
            return Datatables::of($training)
            ->editColumn('description', function ($user) {
                $desc =  $user->description;
                return $desc;
            })
            ->addColumn('edit', function ($row) {
                $url = route('admin.entrenamientos.edit', ['training' => $row]);
                $btn = '<a href="' . $url . '" class="edit btn btn-primary btn.sm">Editar</a>';
                return $btn;
            })
            ->addColumn('view', function ($row) {
                $url = route('admin.entrenamientos.show', ['training' => $row]);
                $btn = '<a href="' . $url . '" class="view btn btn-primary btn.sm">Ver</a>';
                return $btn;
            })
        ->rawColumns(['description','edit','view'])->make(true);
        }
        return view('admin.entrenamientos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.entrenamientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'name' => 'required',
			'price_one' => 'required',
            'url'=>'required'
			]);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)
				->withInput();
        }
        $name = $request->input('name');
        $priceOne = $request->input('price_one');
        $priceThree = $request->input('price_three');
        if($priceThree==null)
        $priceThree = 0;
        $priceSix = $request->input('price_six');
        if($priceSix==null)
        $priceSix = 0;
        $description = $request->input('description');
        if($description==null)
        $description = "";
        $summary = $request->input('summary');
        if($summary==null)
        $summary = "";
        $url = $request->input('url');

        $training = new Training;
        $training->name = $name;
        $training->price_one = $priceOne;
        $training->price_three = $priceThree;
        $training->price_six = $priceSix;
        $training->description = $description;
        $training->summary = $summary;
        $training->url = $url;
        $training->save();
        return redirect()->route('admin.entrenamientos.show', $training);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('admin.entrenamientos.show')->with('training',$training);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        return view('admin.entrenamientos.edit')->with('training',$training);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $validator = Validator::make($request->all(), [
			'name' => 'required',
			'price_one' => 'required',
            'url'=>'required'
			]);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)
				->withInput();
        }
        $name = $request->input('name');
        $priceOne = $request->input('price_one');
        $priceThree = $request->input('price_three');
        if($priceThree==null)
        $priceThree = 0;
        $priceSix = $request->input('price_six');
        if($priceSix==null)
        $priceSix = 0;
        $description = $request->input('description');
        if($description==null)
        $description = "";
        $summary = $request->input('summary');
        if($summary==null)
        $summary = "";
        $url = $request->input('url');
        
        $training->name = $name;
        $training->price_one = $priceOne;
        $training->price_three = $priceThree;
        $training->price_six = $priceSix;
        $training->description = $description;
        $training->summary = $summary;
        $training->url = $url;
        $training->save();
        return redirect()->route('admin.entrenamientos.show', $training);
    }

    public function delete($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }
}
