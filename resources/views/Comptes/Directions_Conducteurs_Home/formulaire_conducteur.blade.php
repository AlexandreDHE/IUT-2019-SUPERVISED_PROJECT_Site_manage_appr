@extends('/Layouts/template_compte')

@section('css_unique')
    <link href="{{asset('css/Comptes/Directions_Conducteurs_Home/home.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/Comptes/Directions_Conducteurs_Home/formulaire_conducteur.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')


      <!-- Bannière de présentation du chantier -->
      @include('Layouts/Partials/Comptes/Responsables_Home/_reférence_chantier')

      <!-- METEO -->

      <h3 class="text-titre-tab">Temps</h3>

      <div class="cont_meteo">

        <div class="cont_meteo_1">
            <label class="container">
            <img src="{{asset('css/images/soleil2.png')}}" class="meteo"/>
            <input type="radio" checked="checked" name="radio">
            <span class="checkmark"></span>
            </label>
        </div>

      <div class="cont_meteo_2">
      <label class="container">
        <img src="{{asset('css/images/nuage2.png')}}" class="meteo"/>
        <input type="radio" name="radio">
        <span class="checkmark"></span>
      </label>
      </div>

      <div class="cont_meteo_3">
      <label class="container">
        <img src="{{asset('css/images/brouillard2.png')}}" class="meteo"/>
        <input type="radio" name="radio">
        <span class="checkmark"></span>
      </label>
      </div>

      <div class="cont_meteo_4">
      <label class="container">
        <img src="{{asset('css/images/pluie2.png')}}" class="meteo"/>
        <input type="radio" name="radio">
        <span class="checkmark"></span>
      </label>
      </div>

      <div class="cont_meteo_5">
      <label class="container">
        <img src="{{asset('css/images/neige2.png')}}" class="meteo"/>
        <input type="radio" name="radio">
        <span class="checkmark"></span>
      </label>
      </div>

      </div>

      <h3 class="text-titre-tab"> Interceptions<br>
      <u><h6>Saint-Gaudens</h6></u> </h3>

      <!-- VOIE 1 -->
      <table class="Interception">
        <tr name="tab_avancement[0]"  >

          <th rowspan="4" class="tab_text">Voie 1</th>
          <th class="tab_text_2">Interception théorique</th>

          <th class="tab_text" rowspan="4">De</th>
          <th> <input type="time" name="tab_avancement[0][]"  required></th>
          <th class="tab_text" rowspan="4">A</th>
          <th> <input type="time" name="tab_avancement[0][]"  required></th>
        </tr>
        <tr name="tab_avancement[1]">
          <th class="tab_text_2">Interception réelle</th>
          <th> <input type="time" name="tab_avancement[1][]"  required></th>
          <th> <input type="time" name="tab_avancement[1][]"  required></th>
        </tr>
        <tr name="tab_avancement[2]">
          <th class="tab_text_2">Caténaire théorique</th>
          <th> <input type="time" name="tab_avancement[2][]"  required></th>
          <th> <input type="time" name="tab_avancement[2][]"  required></th>
        </tr>

        <tr name="tab_avancement[3]">
          <th class="tab_text_2">Caténaire réel</th>
          <th> <input type="time" name="tab_avancement[1][]"  required></th>
          <th> <input type="time" name="tab_avancement[1][]"  required></th>
        </tr>
      </table>


      <!-- VOIE 2 -->
      <table class="Interception">
        <tr name="tab_avancement[0]"  >

          <th rowspan="4" class="tab_text">Voie 2</th>
          <th class="tab_text_2">Interception théorique</th>

          <th class="tab_text" rowspan="4">De</th>
          <th> <input type="time" name="tab_avancement[0][]"  required></th>
          <th class="tab_text" rowspan="4">A</th>
          <th> <input type="time" name="tab_avancement[0][]"  required></th>
        </tr>
        <tr name="tab_avancement[1]">
          <th class="tab_text_2">Interception réelle</th>
          <th> <input type="time" name="tab_avancement[1][]"  required></th>
          <th> <input type="time" name="tab_avancement[1][]"  required></th>
        </tr>
        <tr name="tab_avancement[2]">
          <th class="tab_text_2">Caténaire théorique</th>
          <th> <input type="time" name="tab_avancement[2][]"  required></th>
          <th> <input type="time" name="tab_avancement[2][]"  required></th>
        </tr>

        <tr name="tab_avancement[3]">
          <th class="tab_text_2">Caténaire réel</th>
          <th> <input type="time" name="tab_avancement[1][]"  required></th>
          <th> <input type="time" name="tab_avancement[1][]"  required></th>
        </tr>
      </table>



      <!-- TAUX  -->

      <h3 class="text-titre-tab">Taux</h3>
      <table class="Taux">
        <tr name="tab_avancement[0]"  >

          <th rowspan="2" class="tab_text_1">Voie 1</th>
          <th rowspan="4" class="tab_text_3">Taux</th>
          <th> <input type="text" name="tab_avancement[1][]"  required></th>

          <th class="tab_text_3" rowspan="4">Du Pk</th>
          <th> <input type="text" name="tab_avancement[0][]"  required></th>
          <th class="tab_text_3" rowspan="4">Au Pk</th>
          <th> <input type="text" name="tab_avancement[0][]"  required></th>
        </tr>
        <tr name="tab_avancement[1]">
          <th> <input type="text" name="tab_avancement[1][]"  required></th>
          <th> <input type="text" name="tab_avancement[1][]"  required></th>
          <th> <input type="text" name="tab_avancement[1][]"  required></th>
        </tr>
        <tr name="tab_avancement[2]">
          <th rowspan="2" class="tab_text_1">Voie 2</th>
          <th> <input type="text" name="tab_avancement[1][]"  required></th>
          <th> <input type="text" name="tab_avancement[2][]"  required></th>
          <th> <input type="text" name="tab_avancement[2][]"  required></th>
        </tr>

        <tr name="tab_avancement[3]">
          <th> <input type="text" name="tab_avancement[1][]"  required></th>
          <th> <input type="text" name="tab_avancement[1][]"  required></th>
          <th> <input type="text" name="tab_avancement[1][]"  required></th>
        </tr>
      </table>


      <h3 class="text-titre-tab">Observations générales</h3>

      <div class="obs">
        <input type="text" class="obs_input" placeholder="Remarques">
      </div>

@endsection
