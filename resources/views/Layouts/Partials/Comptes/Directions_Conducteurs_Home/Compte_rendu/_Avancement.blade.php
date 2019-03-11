<?php $nbLigne = count($tab_avancement_data[$i])  ?>

{!! " <p class='text-titre-tab'> Avancement </p> " !!}

{!!"<table class='Avancement'>"!!}


@for($j=0; $j< $nbLigne; $j++)


    {!! "  <tr class='div-centre-tableau-tr2'>"!!}
    {!! "  <th class='compte_rendu_tab_text'>Voie</th>" !!}
    {!! "  <th class='compte_rendu_tab_value'>"!!} {{$tab_avancement_data[$i][$j][0]}} {!!"</th>" !!}
    {!! "  <th class='compte_rendu_tab_text'>Du Pk</th>" !!}
    {!! "  <th class='compte_rendu_tab_value'>"!!} {{$tab_avancement_data[$i][$j][1]}} {!!"</th>" !!}
    {!! "  <th class='compte_rendu_tab_text'>Au Pk</th>" !!}
    {!! "  <th class='compte_rendu_tab_value'>"!!} {{$tab_avancement_data[$i][$j][2]}} {!!"</th>" !!}
    {!! "  <th class='compte_rendu_tab_text_somme'>Soit</th>" !!}
    {!! "  <th class='compte_rendu_somme_value'>"!!} {{ ($tab_avancement_data[$i][$j][2]-$tab_avancement_data[$i][$j][1])}} {!!"ml"!!} {!!"</th>" !!}
    {!! "  </tr>" !!}

@endfor

{!!"</table>"!!}
