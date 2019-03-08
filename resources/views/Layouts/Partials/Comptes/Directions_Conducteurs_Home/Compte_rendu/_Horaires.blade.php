<?php $nbLigne = count($tab_horaires_sd_data[$i]) ?>
{!! " <h3 class='text-titre-tab'> Horaires </h3> " !!}

{!!"<table class='Horaires'>"!!}

    @for($j=0; $j< $nbLigne; $j++)
        <tr>
          <th class="tab_text_horaires"> Autorisation de travail </th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][0]}} {!!"</th>" !!}
        <tr>

        <tr>
          <th class="tab_text_horaires">Consignation caténaire AMHT</th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][1]}} {!!"</th>" !!}
        </tr>

        <tr>
          <th class="tab_text_horaires">Dépose installation SE </th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][2]}} {!!"</th>" !!}
        </tr>

        <tr>
          <th class="tab_text_horaires">Arrivée TTX sur le chantier </th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][3]}} {!!"</th>" !!}
        </tr>

        <tr>
          <th class="tab_text_horaires">Engin sur son lieu de travail </th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][4]}} {!!"</th>" !!}
        </tr>

        <tr>
          <th class="tab_text_horaires">Début du travail </th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][5]}} {!!"</th>" !!}
        </tr>

        @if( $tab_horaires_sd_data[$i][$j][6] !== "-11:11:11" )
            <tr>
              <th class="tab_text_horaires">Arret véhicule "C" </th>
              {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][6]}} {!!"</th>" !!}
            </tr>
        @endif

        <tr>
          <th class="tab_text_horaires">Fin du travail / Coupe de Rail</th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][7]}} {!!"</th>" !!}
        </tr>


        @if( $tab_horaires_sd_data[$i][$j][6] !== "-11:11:11")
            <tr>
              <th class="tab_text_horaires">Dernièere TBA</th>
              {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][8]}} {!!"</th>" !!}
            </tr>
        @endif



        <tr>
          <th class="tab_text_horaires">Dégagement rampe</th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][9]}} {!!"</th>" !!}
        </tr>

        <tr>
          <th class="tab_text_horaires">Fin bourrage</th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][10]}} {!!"</th>" !!}
        </tr>

        <tr>
          <th class="tab_text_horaires">Départ TTX chantier</th>
          {!! "<th class='compte_rendu_tab_value_fixe'>"!!} {{$tab_horaires_sd_data[$i][$j][11]}} {!!"</th>" !!}
        </tr>

    @endfor

{!!"</table>"!!}
