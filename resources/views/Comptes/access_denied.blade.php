@extends('/Layouts/template_compte')

<!-- css spécifique aux comptes responsables -->
@section('css_unique')
    <link href="{{asset('css/Comptes/Responsables/home.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/Comptes/_403.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <!-- Menu sur le coté gauche de l'écran -->
    @include('Layouts/Partials/Comptes/Responsables_Home/_menu_gauche')

    <div class="image-wait">
        <img class="image-403" src="{{asset('css/images/403.png')}}">
    </div>

@endsection
