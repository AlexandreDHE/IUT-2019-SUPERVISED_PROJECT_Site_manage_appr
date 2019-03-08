<?php $nb=count($data_historique); ?>

<div class="center-bas">

  <button class="center-bas-gauche" formaction="{{route('showData_dernières_observations')}}">
    <div class="cbg-gauche">
      <img class="cbg-image" src="{{asset('css/images/OBS.png')}}">
    </div>

    <div class="cbg-droite">
      Observations
      <div class="cbg-droite-text">
        {{"Materiel(2)"}}
        <br>
        {{"ACCIDENT (2)"}}
      </div>
    </div>
  </button>


  <button class="center-bas-droite" formaction="{{route('historique_observations')}}">
    <div class="cbd-gauche">
      <img class="cbg-image" src="{{asset('css/images/HO.png')}}">
    </div>

    <div class="cbd-droite">
      Historique des Observations
      <div class="cbd-droite-text">
        {{"($nb)"}}
      </div>
    </div>
  </button>

</div>
</div>

<div class="bottom">
    <button class="bottom-b1"><i class="material-icons">notifications_active</i></button>
    <button class="bottom-b1" formaction="{{route('paramètres')}}"><i class="material-icons">group</i></button>

    <img class="bottom-img1" src="http://www.tarbes-expos.com/Fichiers/agenda/122846logo_transalp.jpg" alt="Logo">

    <button class="bottom-b1"><i class="material-icons">local_phone</i></button>
    <button class="bottom-b1"><i class="material-icons">info</i></button>

    <p class="bottom-b1-texte"> Notifications </p>
    <p class="bottom-b1-texte"> Comptes </p>
    <p>   </p>
    <p class="bottom-b1-texte"> Contact </p>
    <p class="bottom-b1-texte"> Informations </p>
</div>
