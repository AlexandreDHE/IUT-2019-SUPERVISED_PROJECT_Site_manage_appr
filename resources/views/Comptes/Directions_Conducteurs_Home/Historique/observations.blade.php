@extends('/Layouts/template_compte')

@section('css_unique')
    <link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Historique/rapports.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <form method="POST" action="">

        @csrf
        
        @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/Compte_rendu/_Observations')

    </form>

@endsection
