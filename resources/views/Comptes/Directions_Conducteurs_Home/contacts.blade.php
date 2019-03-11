@extends('/Layouts/template_compte')

@section('css_unique')
<link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Paramètres/modifier_compte.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Paramètres/menu_gauche.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Paramètres/formulaire_enregistrement.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/_fiche_contact')
@endsection
