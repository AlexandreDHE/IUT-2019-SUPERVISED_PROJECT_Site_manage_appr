<?php $nb=count($data_historique); ?>

<div class="center">

  <div class="center-haut">

    <button class="center-haut-gauche" formaction="{{route('showData_dernier_rapport')}}">
      <div class="chg-gauche">
        <img class="cbg-image" src="{{asset('css/images/DR.png')}}">
      </div>

      <div class="chg-droite">
        Dernier Rapport
        <div class="chg-droite-text">
          {{"26/04/2019"}}
          <br>
          {{"à 8h16"}}
        </div>
      </div>
    </button>


    <button class="center-haut-droite" formaction="{{route('historique_rapports')}}">
      <div class="chd-gauche">
        <img class="cbg-image" src="{{asset('css/images/HR.png')}}">
      </div>

      <div class="chd-droite">
        Historique des rapports
        <div class="chd-droite-text">
          {{"($nb)"}}
        </div>
      </div>
    </button>

  </div>
