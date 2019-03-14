@extends('/Layouts/template_compte')

<!-- css spécifique aux comptes responsables -->
@section('css_unique')
    <link href="{{asset('css/Comptes/Responsables/home.css')}}" rel="stylesheet" type="text/css">
@endsection


@section('content')

    <!-- Menu sur le coté gauche de l'écran -->
    @include('Layouts/Partials/Comptes/Responsables_Home/_menu_gauche')
    <!-- Bannière de présentation du chantier -->
    @include('Layouts/Partials/Comptes/Responsables_Home/_reférence_chantier')

    <form method="POST" action="{{route('StoreData_finitions')}}">
        <!-- Sécurité contre les injections sqls -->
        @csrf

        <div class = "center">
            @include('Layouts/Partials/Comptes/Responsables_Home/Tableaux/_avancement')
            @include('Layouts/Partials/Comptes/Responsables_Home/Tableaux/_wagons')
            @include('Layouts/Partials/Comptes/Responsables_Home/Tableaux/_materiel')
            @include('Layouts/Partials/Comptes/Responsables_Home/_rapports_incidents')
        </div>

        <input class="submit" type="submit" value="Envoyer !">

    </form>

@endsection
