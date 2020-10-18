<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <style>
        body {
            padding: 0px;
            margin: 0px;
            font-family: 'verdana', sans-serif;
        }

        .header {
            width: 100%;
            height: 60px;
            background-color: #000000;
        }

        .main {
            text-align: center;
            width: 60%;
            margin: 10px auto;
        }

        .param-title {
            background-color: #B0B0B0;
            border: 1px solid black;
            text-align: left;
            font-size: 18px;
        }

        .training-param-title {
            background-color: #f08940;
            border: 1px solid black;
            text-align: left;
            font-size: 18px;
        }

        .diet-param-title {
            background-color: #82ab82;
            border: 1px solid black;
            text-align: left;
            font-size: 18px;
        }

        .param-value {
            text-align: left;
            font-size: 13px;
        }

        .footer {
            margin-top: 20px;
            width: 100%;
            height: 70px;
            background-color: #000000;
        }
    </style>
    <div class="header">
        <a style="display: block;width: 220px;margin: 0 auto;" href="{{url('/')}}" target="_blank">
            <img style="width: 150px;margin: 0 auto;" src="{{ asset('img/logo.png') }}">
        </a>
    </div>
    <div class="main">
        <table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
            bgcolor="#ffffff">
            <tbody>
                <tr>
                    <td class="param-title">
                        Nombre
                    </td>
                    <td class="param-title">
                        Dni
                    </td>
                </tr>
                <tr>
                    <td class="param-value">
                        {{$name}}
                    </td>
                    <td class="param-value">
                        {{$dni}}
                    </td>
                </tr>
                <tr>
                    <td class="param-title">
                        Fecha de Nacimiento
                    </td>
                    <td class="param-title">
                        Telefono
                    </td>
                </tr>
                <tr>
                    <td class="param-value">
                        {{$birth_date}}
                    </td>
                    <td class="param-value">
                        {{$phone}}
                    </td>
                </tr>
                <tr>
                    <td class="param-title">
                        Profesion
                    </td>
                    <td class="param-title">
                        Direccion
                    </td>
                </tr>
                <tr>
                    <td class="param-value">
                        {{$profession}}
                    </td>
                    <td class="param-value">
                        {{$address}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        @include('emails.product-'.$form_info['type'], $form_info)
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0"
                            cellpadding="0" border="0" bgcolor="#ffffff">
                            <tr>
                                <td class="param-title">
                                    ¿Como nos has conocido?
                                </td>
                            </tr>
                            <tr>
                                <td class="param-value">
                                    @isset($form_info['how'])
                                    @if(count($form_info['how'])>0)
                                    <ul>
                                        @foreach($form_info['how'] as $obj)
                                        <li>{{$obj}}</li>
                                        @endforeach
                                        @if($form_info['how_other_value']!=null)
                                        <li>{{$form_info['how_other_value']}}</li>
                                        @endif
                                    </ul>
                                    @endif
                                    @else
                                    @if($form_info['how_other_value']!=null)
                                    {{$form_info['how_other_value']}}
                                    @endif
                                    @endisset
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0"
                            cellpadding="0" border="0" bgcolor="#ffffff">
                            <tr>
                                <td class="param-title">
                                    Tarifa seleccionada
                                </td>
                            </tr>
                            <tr>
                                <td class="param-value">
                                    {{$form_info['price']}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
    </div>
</body>

</html>