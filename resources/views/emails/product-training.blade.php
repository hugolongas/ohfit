<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="training-param-title">
            Objectivos
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @isset($form_info['training_objective'])
            @if(count($form_info['training_objective'])>0)
            <ul>
                @foreach($form_info['training_objective'] as $obj)
                <li>{{$obj}}</li>
                @endforeach
                @if($form_info['training_objective_other_value']!=null)
                <li>{{$form_info['training_objective_other_value']}}</li>
                @endif
            </ul>
            @endif
            @else
            @if($form_info['training_objective_other_value']!=null)
            {{$form_info['training_objective_other_value']}}
            @endif
            @endisset
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="training-param-title">
            Descripción del objetivo
        </td>
    </tr>
    <tr>
        <td class="param-value">
            {{$form_info['training_objective_info']}}
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="training-param-title">
            ¿Hay alguna parte de tu cuerpo en la que quieras priorizar?
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @isset($form_info['training_body'])
            @if(count($form_info['training_body'])>0)
            <ul>
                @foreach($form_info['training_body'] as $obj)
                <li>{{$obj}}</li>
                @endforeach
                @if($form_info['training_body_other_value']!=null)
                <li>{{$form_info['training_body_other_value']}}</li>
                @endif
            </ul>
            @endif
            @else
            @if($form_info['training_body_other_value']!=null)
            {{$form_info['training_body_other_value']}}
            @endif
            @endisset
        </td>
    </tr>
</table>

<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="training-param-title">
            Disponibilidad para entrenar
        </td>
        <td class="training-param-title">
            Tiempo de entreno (minutos)
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @if($form_info['training_frequency']==1)
            {{$form_info['training_frequency']}} día
            @else
            {{$form_info['training_frequency']}} días
            @endif
        </td>
        <td class="param-value">
            {{$form_info['training_time']}} min
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td colspan="2" class="training-param-title">
            ¿Actualmente practicas algún deporte?
        </td>
    </tr>
    <tr>
        <td colspan="2" class="param-value">
            {{$form_info['training_sports']}}
        </td>
    </tr>
    <tr>
        <td class="training-param-title">
            ¿Cual es tu experiencia en fitness?
        </td>
        <td class="training-param-title">
            Valora tu estado actual de forma física del 1 al 5
        </td>
    </tr>
    <tr>
        <td class="param-value">
            {{$form_info['training_experience']}}
        </td>
        <td class="param-value">
            {{$form_info['training_physical']}}
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="training-param-title">
            ¿Has sufrido alguna lesión en los últimos 3 meses?
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @if($form_info['training_health']=='si')
            {{$form_info['training_health_text']}}
            @else
            No
            @endif
        </td>
    </tr>
    <tr>
        <td class="training-param-title">
            ¿Sufres alguna patologia/enfermedad que pueda afectar negativamente a la práctica de tu actividad física?
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @if($form_info['training_disease']=='si')
            {{$form_info['training_disease_text']}}
            @else
            No
            @endif
        </td>
    </tr>
    <tr>
        <td class="training-param-title">
            ¿Sufres de algún tipo de molestia muscular o articular?
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @if($form_info['training_annoyance']=='si')
            {{$form_info['training_annoyance_text']}}
            @else
            No
            @endif
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="training-param-title">
            Lugar de entrenamiento y Material
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @isset($form_info['training_place'])
            @if(count($form_info['training_place'])>0)
            <ul>
                @foreach($form_info['training_place'] as $obj)
                <li>{{$obj}}</li>
                @endforeach               
            </ul>
            @endif
            @endisset
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @isset($form_info['training_material'])
            @if(count($form_info['training_material'])>0)
            <ul>
                @foreach($form_info['training_material'] as $obj)
                <li>{{$obj}}</li>
                @endforeach
                @if($form_info['training_material_other_value']!=null)
                <li>{{$form_info['training_material_other_value']}}</li>
                @endif
            </ul>
            @endif
            @else
            @if($form_info['training_material_other_value']!=null)
            {{$form_info['training_material_other_value']}}            
            @endif
            @endisset
        </td>
    </tr>
</table>