@extends('/Layouts/template_compte')

@section('css_unique')
<link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Paramètres/panelconfig.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="div1-2">
  <div class="panel-head">
    <h3 class="titre">Fiche d'utilisateur</h3>
  </div>
  <div>
    <div class="panel-body">
      <p class="div1-2-text">Nom: {{ $user->nom }}</p>
      <p class="div1-2-text"> Prénom: {{$user->prénom}}</p>
      <p class="div1-2-text" >Email: {{ $user->email }}</p>
      <p class="div1-2-text">Tel: {{$user->num_tel}}</p>
      <p class="div1-2-text">Fonction: {{ $user->fonction}}</p>
    </div>
  </div>
  <a href="javascript:history.back()" class="btn btn-primary">
    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
  </a>
</div>
@endsection
