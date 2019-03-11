  @for ($i=0; $i<=8; $i++)

    @if ($tab_avancement_data[9][$i] === 0 )

    @elseif ($tab_avancement_data[9][$i] === 1 )

          @if( $i === 0 )

              {!!"<p id='1' class='compte_rendu-center-titre-h1'> Consolidation TBA</p>"!!}
              {!!"<p class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</p>"!!}

              @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')

          @elseif($i === 1 )


              {!!"<p id='2' class='compte_rendu-center-titre-h1'>Prépa Coupe</p>"!!}
              {!!"<p class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</p>"!!}

              @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')


          @elseif($i === 2 )

              {!!"<p id='3' class='compte_rendu-center-titre-h1'>Prépa Deg</p>"!!}
              {!!"<p class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</p>"!!}

              @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')

          @elseif($i === 3 )

              {!!"<p id='4' class='compte_rendu-center-titre-h1'>Substitution</p>"!!}
              {!!"<p class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</p>"!!}

              @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')

          @elseif($i === 4 )

              {!!"<p id='5' class='compte_rendu-center-titre-h1'> Dégarnissage</p>"!!}
              {!!"<p class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</p>"!!}

              @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')

          @elseif($i === 5 )

              {!!"<p id='6' class='compte_rendu-center-titre-h1'>Relevage</p>"!!}
              {!!"<p class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</p>"!!}

            @elseif($i === 6 )

              {!!"<p id='7' class='compte_rendu-center-titre-h1'>Libération</p>"!!}
              {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</p>"!!}

              @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')

          @elseif($i === 7 )

              {!!"<p id='8' class='compte_rendu-center-titre-h1'>Finitions</p>"!!}
              {!!"<p class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</p>"!!}

              @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')

          @elseif($i === 8 )

              {!!"<p id='9' class='compte_rendu-center-titre-h1'>Nivellement Complémentaires</p>"!!}
              {!!"<p class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</p>"!!}

              @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')

          @endif
    @endif
 @endfor
