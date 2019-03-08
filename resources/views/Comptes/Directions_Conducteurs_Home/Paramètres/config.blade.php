@extends('/Layouts/template_compte')

@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/navbar.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/affichage_rows.js') }}"></script>
@endsection

@section('css_unique')
    <link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Paramètres/modifier_compte.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Paramètres/menu_gauche.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Paramètres/formulaire_enregistrement.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="bloc_menu">
        <div class="navbar">
          @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Paramètres/_menu_gauche')
        </div>


        <div id="slot0" class="tabcontent active">
          @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Paramètres/_formulaire_enregistrement')
        </div>

        <div id="slot1" class="tabcontent">
          @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Paramètres/_config_conducteurs')
        </div>

        <div id="slot2" class="tabcontent">
          @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Paramètres/_config_responsables')
        </div>

        <div id="slot3" class="tabcontent">

        </div>
    </div>
@endsection
