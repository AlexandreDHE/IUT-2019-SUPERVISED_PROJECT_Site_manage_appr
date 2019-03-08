<?php $nbLigne = count($tab_materiel_data[$i]) ?>

{!! " <h3 class='text-titre-tab'> Materiel </h3> " !!}

{!!"<table class='Materiel'>"!!}

    {!! "<tr>" !!}
    {!! " <th class='tab_text'></th>" !!}
    {!! " <th class='tab_text'> Reférence </th>" !!}
    {!! " <th class='tab_text'> Type </th>" !!}
    {!! " </tr> " !!}

    {!! "<tr name='Tab_materiel[][]'>" !!}
    {!! "<th rowspan='$nbLigne' class='tab_text'>Matériel</th>" !!}

    @for($j=0; $j< $nbLigne; $j++)
        @if( $tab_materiel_data[$i][$j][1] === 'F' )
            {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_materiel_data[$i][$j][0]}} {!!"</th>" !!}
            {!! "<th class='compte_rendu_tab_value_fixe'>"!!} FIXE {!!"</th>" !!}
        @elseif($tab_materiel_data[$i][$j][1] === 'R')
            {!! "<th class='compte_rendu_tab_value_renfort'>"!!} {{$tab_materiel_data[$i][$j][0]}} {!!"</th>" !!}
            {!! "<th class='compte_rendu_tab_value_renfort'>"!!} RENFORT {!!"</th>" !!}
        @endif


        <tr>
    @endfor

{!!"</table>"!!}
