<?php

namespace App\Http\Controllers;

use App\Solicitud;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;

use App\Mail\ContactMail;
use App\Mail\InfoResponseMail;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Storage;

class SolicitudController extends Controller
{
    public function Index(Request $request)
    {
        if ($request->ajax()) {
            $solicitudes = Solicitud::all();
            return Datatables::of($solicitudes)
                ->addColumn('reply', function ($row) {
                    $replied = $row->replied;
                    if(!$replied){
                    $url = route('admin.solicitudes.reply', ['solicitud' => $row]);
                    $btn = '<a href="' . $url . '" class="edit btn btn-primary btn.sm">Responder</a>';
                    }
                    else{
                        $btn = '<button class="edit btn btn-secondary  btn.sm" disabled>Respondido</button>';
                    }
                    return $btn;
                })
                ->addColumn('view', function ($row) {
                    $url = route('admin.solicitudes.show', ['solicitud' => $row]);
                    $btn = '<a href="' . $url . '" class="view btn btn-primary btn.sm">Ver</a>';
                    return $btn;
                })
                ->rawColumns(['reply', 'view'])->make(true);
        }
        return view('admin.solicitudes.index');
    }

    public function WebIndex()
    {
        return view('solicitarInformacion');
    }

    public function SendInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'second_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'center'=>'required',
            'service'=>'required',
            'fromwho'=>'required',
            'objective' => 'required',
            'politicaPrivacidad'=>'required'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)
                ->withInput();
        }
        $name = $request->input('name');
        $secondName = $request->input('second_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $center = $request->input('center');
        $service = $request->input('service');
        $fromwho = $request->input('fromwho');
        $objective = $request->input('objective');
        $objectiveDescription = $request->input('objective_info');
        $politicaPrivacidad = true;

        if ($objectiveDescription == null)
            $objectiveDescription = "";
        //Guardamos la solicitud en la base de datos
        $solicitud = new Solicitud();
        $solicitud->name = $name;
        $solicitud->second_name = $secondName;
        $solicitud->email = $email;
        $solicitud->phone = $phone;
        $solicitud->objective = $objective;
        $solicitud->center = $center;
        $solicitud->service = $service;
        $solicitud->fromwho = $fromwho;
        $solicitud->description = $objectiveDescription;
        $solicitud->accepted = $politicaPrivacidad;
        $solicitud->save();
        $mailConfig = \Config::get('mail.training');
        $emailTo =  $mailConfig['address'];

        $subject = "Solicitud de información";
        $message = "objectivo: " . $objective . "<br/> Centro: " . $center. "<br/> Servicio: " . $service;
        if ($objectiveDescription != "") {
            $message = $message . "<br/> Descripción: " . $objectiveDescription;
        }
        Mail::to($emailTo)->send(new ContactMail($name, $email, $subject, $message));

        return redirect()->route('info')->with('status', 'Gracias por suscribirte, Nos pondremos en contacto lo más pronto posible');
    }

    public function Show(Solicitud $solicitud)
    {
        return view('admin.solicitudes.show')->with('solicitud', $solicitud);
    }

    public function Reply(Solicitud $solicitud)
    {
        return view('admin.solicitudes.reply')->with('solicitud', $solicitud);
    }

    public function SendReply(Request $request, Solicitud $solicitud)
    {
        $validator = Validator::make($request->all(), [
            'respuesta' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)
                ->withInput();
        }
        $response = $request->input('respuesta');
        $solicitud->response = $response;
        $solicitud->replied = true;
        $solicitud->save();

        //Enviamos la respuesta al cliente
        $subject = "Respuesta a la solicitud de información sobre ".$solicitud->objective." para ".$solicitud->name." ".$solicitud->second_name;
        $message = $response;
        $mailTo = $solicitud->email;
        $mailConfig = \Config::get('mail.contact');
        $name= "Oh Fit Barcelona";
        $email =  $mailConfig['address'];

        Mail::to($mailTo)->send(new InfoResponseMail($name, $email, $subject, $message));


        return redirect()->route('admin.solicitudes');
    }
}
