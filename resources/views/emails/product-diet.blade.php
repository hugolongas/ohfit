<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="diet-param-title">
            Objectivos
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @if(count($form_info['diet_objective'])>0)
            <ul>
                @foreach($form_info['diet_objective'] as $obj)
                <li>{{$obj}}</li>
                @endforeach
                @if($form_info['diet_objective_other_value']!=null)
                <li>{{$form_info['diet_objective_other_value']}}</li>
                @endif
            </ul>
            @endif
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="diet-param-title">
            Estilo de vida
        </td>
        <td class="diet-param-title">
            Tipo de actividad física que realizas
        </td>
        <td class="diet-param-title">
            Cuantas horas de actividad física realizas a la semana
        </td>
    </tr>
    <tr>
        <td class="param-value">
            {{$form_info['diet_life_style']}}
        </td>
        <td class="param-value">
            @isset($form_info['diet_fisic_activity'])
            @if(count($form_info['diet_fisic_activity'])>0 || $form_info['diet_fisic_activity_other_value']!=null)
            <ul>
                @foreach($form_info['diet_fisic_activity'] as $obj)
                <li>{{$obj}}</li>
                @endforeach
                @if($form_info['diet_fisic_activity_other_value']!=null)
                <li>{{$form_info['diet_fisic_activity_other_value']}}</li>
                @endif
            </ul>
            @endif
            @else
            @if($form_info['diet_fisic_activity_other_value']!=null)
                {{$form_info['diet_fisic_activity_other_value']}}
                @endif
            @endisset            
        </td>
        <td class="param-value">
            {{$form_info['diet_training_frequency']}}
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="diet-param-title">
            Antecedentes no patológicos
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @isset($form_info['diet_history'])
            @if(count($form_info['diet_history'])>0)
            <ul>
                @foreach($form_info['diet_history'] as $obj)
                <li>{{$obj}}</li>
                @endforeach
                @if($form_info['diet_history_other_value']!=null)
                <li>{{$form_info['diet_history_other_value']}}</li>
                @endif
            </ul>
            @endif
            @else
            @if($form_info['diet_history_other_value']!=null)
            {{$form_info['diet_history_other_value']}}
            @endif
            @endisset    
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="diet-param-title">
            Alérgias e intolerancias
        </td>
    </tr>
    <tr>
        <td class="param-value">
            {{$form_info['diet_alergic_text']}}
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="diet-param-title">
            ¿Sufres alguna patologia/enfermedad?
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @if($form_info['diet_disease']=='si')
            {{$form_info['diet_disease_text']}}
            @else
            No
            @endif
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="diet-param-title">
            Alimentos y comidas que sueles comer habitualmente
        </td>
    </tr>
    <tr>
        <td class="param-value">
            {{$form_info['diet_meals']}}
        </td>
    </tr>
</table>

<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="diet-param-title">
            Tipos de cociones y preparación de los alimentos
        </td>
    </tr>
    <tr>
        <td class="param-value">
            @isset($form_info['diet_cooking'])
            @if(count($form_info['diet_cooking'])>0)
            <ul>
                @foreach($form_info['diet_cooking'] as $obj)
                <li>{{$obj}}</li>
                @endforeach
                @if($form_info['diet_cooking_other_value']!=null)
                <li>{{$form_info['diet_cooking_other_value']}}</li>
                @endif
            </ul>
            @endif
            @else
            @if($form_info['diet_cooking_other_value']!=null)
            {{$form_info['diet_cooking_other_value']}}
            @endif
            @endisset   
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="diet-param-title">
            Alimentos preferidos
        </td>
        <td class="diet-param-title">
            Alimentos que nunca comerias
        </td>
        <td class="diet-param-title">
            ¿Que sueles desayunar?
        </td>
    </tr>
    <tr>
        <td class="param-value">
            {{$form_info['diet_favorite_foods']}}
        </td>
        <td class="param-value">
            {{$form_info['diet_non_foods']}}
        </td>
        <td class="param-value">
            {{$form_info['diet_breakfast']}}
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;" width="100%" height="auto" cellspacing="0" cellpadding="0" border="0"
    bgcolor="#ffffff">
    <tr>
        <td class="diet-param-title">
            Número de ingestas diarias
        </td>
        <td class="diet-param-title">
            Comes...
        </td>
    </tr>
    <tr>
        <td class="param-value">
            {{$form_info['diet_intakes']}}
        </td>
        <td class="param-value">
            @isset($form_info['diet_eat'])
            {{$form_info['diet_eat']}}
            @endisset
        </td>
    </tr>
</table>