@extends('/Layouts/template_compte')

@section('css_unique')
    <link href="{{asset('css/Comptes/Responsables/home.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

      <!-- Bannière de présentation du chantier -->
      @include('Layouts/Partials/Comptes/Responsables_Home/_reférence_chantier')

      <form method="POST" action="{{route('StoreData_prepa_deg')}}">

          <div class="center">

            @include('Layouts/Partials/Comptes/Responsables_Home/Tableaux/_interceptions')
            @include('Layouts/Partials/Comptes/Responsables_Home/Tableaux/_taux')

            @include('Layouts/Partials/Comptes/Responsables_Home/_rapports_incidents')


            <input class="submit" type="submit" value="Envoyer !">

          </div>

    <form>

@endsection
