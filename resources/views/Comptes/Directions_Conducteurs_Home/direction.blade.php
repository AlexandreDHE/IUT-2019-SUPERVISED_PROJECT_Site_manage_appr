@extends('/Layouts/template_compte')

@section('css_unique')
    <link href="{{asset('css/Comptes/Directions_Conducteurs_Home/home.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

  <form method="GET" action="">

      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/_center_haut')
      <div class="center-center">
        <i class="material-icons" id="center-center-icon">settings_applications</i>
      </div>
      @include('Layouts/Partials/Comptes/Directions_Conducteurs_Home/_center_bas')

  </form>

@endsection
