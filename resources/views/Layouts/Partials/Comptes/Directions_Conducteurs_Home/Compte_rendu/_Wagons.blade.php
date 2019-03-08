<?php $nbLigne = count($tab_wagon_data[$i])  ?>

{!! " <h3 class='text-titre-tab'> Wagons </h3> " !!}

{!!"<table class='Materiel'>"!!}

    {!! "<tr>" !!}
    {!! " <th class='tab_text'>Wagon</th>" !!}
    {!! " <th class='tab_text'>Demandés</th>" !!}
    {!! " <th class='tab_text'>Fournis</th>" !!}
    {!! " <th class='tab_text'>Chargés/Déchargés</th>" !!}
    {!! " </tr> " !!}

    @for($j=0; $j< $nbLigne; $j++)
            {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_wagon_data[$i][$j][0]}} {!!"</th>" !!}
            {!! "<th class='compte_rendu_tab_value_renfort'>"!!} {{$tab_wagon_data[$i][$j][1]}} {!!"</th>" !!}
            {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_wagon_data[$i][$j][2]}} {!!"</th>" !!}
            {!! "<th class='compte_rendu_tab_value_renfort'>"!!} {{$tab_wagon_data[$i][$j][3]}} {!!"</th>" !!}
            <tr>
    @endfor

{!!"</table>"!!}
