@extends('/Layouts/template_compte')

<!-- css spécifique aux comptes responsables -->
@section('css_unique')
    <link href="{{asset('css/Comptes/Responsables/home.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <!-- Menu sur le coté gauche de l'écran -->
    @include('Layouts/Partials/Comptes/Responsables_Home/_menu_gauche')

    <div class="image-wait">
        <img class="image-wait-img" src="{{asset('css/images/minuteur.png')}}">
        <p class="image-wait-txt"> Ce n'est pas encore le moment ! Merci de vous reconnecter à 20h00. </p>
    </div>

@endsection
