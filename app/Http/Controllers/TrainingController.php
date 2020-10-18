<?php

namespace App\Http\Controllers;

use App\Console\Commands\CheckPayment;
use App\Console\Commands\MakePayment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Training;
use App\Product;
use Validator;
use Redirect;

use Illuminate\Support\Facades\Mail;

use App\Mail\ProductMail;

class TrainingController extends Controller
{
    public function Index()
    {
        $trainings = Training::all();
        return view('training')->with("trainings",$trainings);
    }

    public function TrainingForm(Training $training)
    {
        $prices = array();
        $prices[] = $training->price_one;
        if($training->price_three>0){
            $prices[] = $training->price_three;
        }
        if($training->price_six>0){
            $prices[] = $training->price_six;
        }
        return view('forms.'.$training->url)->with('training',$training)->with('prices',$prices)->with('type',$training->url);
    }

    public function TrainingPay(Request $request)
    {
        $validator = null;
        $type = $request->type;
        switch($type){
            case "training":
                $validator = Validator::make($request->all(), [
                    'name'=>'required',
                    'dni'=>'required',
                    'birthdate'=>'required',
                    'email'=>'required',
                    'phone'=>'required',
                    'address'=>'required',
                    'training_objective'=>'required',
                    'training_body'=>'required',
                    'training_frequency'=>'required',
                    'training_time'=>'required',
                    'training_experience'=>'required',
                    'training_physical'=>'required',
                    'training_health'=>'required',
                    'training_health_text'=>'required_if:training_health,==,si',
                    'training_disease'=>'required',
                    'training_disease_text'=>'required_if:training_disease,==,si',
                    'training_annoyance'=>'required',
                    'training_annoyance_text'=>'required_if:training_annoyance,==,si',
                    'training_place'=>'required',
                    'price'=>'required'
                ]);    
            break;
            case "diet":
                $validator = Validator::make($request->all(), [
                    'name'=>'required',
                    'dni'=>'required',
                    'birthdate'=>'required',
                    'email'=>'required',
                    'phone'=>'required',
                    'address'=>'required',                    
                    'diet_objective'=>'required',
                    'diet_life_style'=>'required',
                    'diet_training_frequency'=>'required',
                    'diet_disease'=>'required',
                    'diet_disease_text'=>'required_if:diet_disease,==,si',
                    'price'=>'required'
                ]);
            break;
            case "all":
                $validator = Validator::make($request->all(), [
                    'name'=>'required',
                    'dni'=>'required',
                    'birthdate'=>'required',
                    'email'=>'required',
                    'phone'=>'required',
                    'address'=>'required',
                    'training_objective'=>'required',
                    'training_body'=>'required',
                    'training_frequency'=>'required',
                    'training_time'=>'required',
                    'training_experience'=>'required',
                    'training_physical'=>'required',
                    'training_health'=>'required',
                    'training_health_text'=>'required_if:training_health,==,si',
                    'training_disease'=>'required',
                    'training_disease_text'=>'required_if:training_disease,==,si',
                    'training_annoyance'=>'required',
                    'training_annoyance_text'=>'required_if:training_annoyance,==,si',
                    'training_place'=>'required',
                    'diet_objective'=>'required',
                    'diet_life_style'=>'required',
                    'diet_training_frequency'=>'required',
                    'diet_disease'=>'required',
                    'diet_disease_text'=>'required_if:diet_disease,==,si',
                    'price'=>'required'
                ]);
            break;
        }        
        
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)
				->withInput();
        }
        
        $name = $request->name;
        $dni = $request->dni;
        $birthDate = $request->birthdate;
        $email = $request->email;
        $phone= $request->phone;
        $profession= $request->profession;
        $address= $request->address;
        $price = $request->price;
        $training = Training::findOrFail($request->idType);
        if($profession==null){
            $profession= "";
        }
        $product = new Product();
        $product->training_id = $training->id;
        $product->name = $name;
        $product->dni = $dni;
        $product->birth_date = $birthDate;
        $product->email = $email;
        $product->phone = $phone;
        $product->profession = $profession;
        $product->address = $address;
        $product->form_info = json_encode($request->except(['name','dni','birthdate','email','phone','profession','address','_token','idType','submit']));
        $product->price = $price;
        $product->paid = false;
        $product->save();

        $redirectUrl = $this->dispatch(new MakePayment($product));
        return $redirectUrl;
    }

    public function DietForm()
    {
        return view('forms.diet');
    }

    public function AllForm()
    {
        return view('forms.all');
    }

    public function Complete($idForm)
    {
        $cobrado = $this->dispatch(new CheckPayment());
        
        if($cobrado)
        {
            $mailConfig = \Config::get('mail.training');
            $product = Product::findOrFail($idForm);
            $subject = $product->training->description;            
            $emailTo =  $mailConfig['address'];
        Mail::to($emailTo)->send(new ProductMail($product, $subject));        
        return redirect()->route("home-complete");
        }
        return redirect()->route("training");
    }
}
