@extends('/Layouts/template_compte')

<!-- css spécifique aux comptes responsables -->
@section('css_unique')
    <link href="{{asset('css/Comptes/Responsables/home.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Compte_rendu/rapport.css')}}" rel="stylesheet" type="text/css">
@endsection


@section('content')

        <!-- Menu sur le coté gauche de l'écran-->
        @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_menu_gauche')


    <?php $cpt=-1; ?>


    <div class = "compte_rendu-center">

          @for ($i=0; $i<=8; $i++)

            @if ($tab_avancement_data[9][$i] === 0 )
                <?php $cpt++; ?>
            @elseif ($tab_avancement_data[9][$i] === 1 )

                  @if( $i === 0 )

                      {!!"<div class='compte_rendu_part'>"!!}
                      {!!"<div class='compte_rendu-center-titre'>"!!}
                      {!!"<h1 id='1' class='compte_rendu-center-titre-h1'> Consolidation TBA</h1>"!!}
                      {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</h1>"!!}
                      {!!"</div>"!!}

                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Materiel')

                      {!!"</div>"!!}

                  @elseif($i === 1 )

                      {!!"<div class='compte_rendu_part'>"!!}

                      {!!"<div class='compte_rendu-center-titre'>"!!}
                      {!!"<h1 id='2' class='compte_rendu-center-titre-h1'>Prépa Coupe</h1>"!!}
                      {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</h1>"!!}
                      {!!"</div>"!!}

                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Materiel')

                      {!!"</div>"!!}

                  @elseif($i === 2 )

                      {!!"<div class='compte_rendu_part'>"!!}

                      {!!"<div class='compte_rendu-center-titre'>"!!}
                      {!!"<h1 id='3' class='compte_rendu-center-titre-h1'>Prépa Deg</h1>"!!}
                      {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</h1>"!!}
                      {!!"</div>"!!}

                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Materiel')

                      {!!"</div>"!!}

                  @elseif($i === 3 )

                      {!!"<div class='compte_rendu_part'>"!!}

                      {!!"<div class='compte_rendu-center-titre'>"!!}
                      {!!"<h1 id='4' class='compte_rendu-center-titre-h1'>Substitution</h1>"!!}
                      {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</h1>"!!}
                      {!!"</div>"!!}

                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Wagons')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Materiel')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Traction')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Calage')

                      {!!"</div>"!!}

                  @elseif($i === 4 )

                      {!!"<div class='compte_rendu_part'>"!!}

                      {!!"<div class='compte_rendu-center-titre'>"!!}
                      {!!"<h1 id='5' class='compte_rendu-center-titre-h1'> Dégarnissage</h1>"!!}
                      {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</h1>"!!}
                      {!!"</div>"!!}

                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Horaires')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Wagons')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Materiel')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Traction')

                      {!!"</div>"!!}

                  @elseif($i === 5 )

                      {!!"<div class='compte_rendu_part'>"!!}

                      {!!"<div class='compte_rendu-center-titre'>"!!}
                      {!!"<h1 id='6' class='compte_rendu-center-titre-h1'>Relevage</h1>"!!}
                      {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</h1>"!!}
                      {!!"</div>"!!}

                      {!!"</div>"!!}

                    @elseif($i === 6 )

                      {!!"<div class='compte_rendu_part'>"!!}

                      {!!"<div class='compte_rendu-center-titre'>"!!}
                      {!!"<h1 id='7' class='compte_rendu-center-titre-h1'>Libération</h1>"!!}
                      {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</h1>"!!}
                      {!!"</div>"!!}

                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Materiel')

                      {!!"</div>"!!}

                  @elseif($i === 7 )

                      {!!"<div class='compte_rendu_part'>"!!}

                      {!!"<div class='compte_rendu-center-titre'>"!!}
                      {!!"<h1 id='8' class='compte_rendu-center-titre-h1'>Finitions</h1>"!!}
                      {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</h1>"!!}
                      {!!"</div>"!!}

                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Wagons')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Materiel')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Traction')

                      {!!"</div>"!!}

                  @elseif($i === 8 )

                      {!!"<div class='compte_rendu_part'>"!!}

                      {!!"<div class='compte_rendu-center-titre'>"!!}
                      {!!"<h1 id='9' class='compte_rendu-center-titre-h1'>Nivellement Complémentaires</h1>"!!}
                      {!!"<h1 class='compte_rendu-center-titre-p'>"!!}<?php echo date("d/m/Y à H:i:s", strtotime($tab_avancement_data[$i][0][3])) ?>{!!"</h1>"!!}
                      {!!"</div>"!!}

                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Avancement')
                      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Materiel')

                      {!!"</div>"!!}

                  @endif
            @endif
        @endfor

        @if($cpt === 8)
          <div class='image-wait'>
              <img class='image-wait-img' src='{{asset('css/images/minuteur.png')}}'>
              <p class='image-wait-txt'> Aucun formulaire n'a encore été rempli </p>
          </div>
        @endif

    </div>

@endsection
