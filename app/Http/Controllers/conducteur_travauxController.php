<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BD_transactions;
use App\Http\Requests\C_resp_tbaRequest;

class conducteur_travauxController extends Controller
{

  public function getView(C_resp_tbaRequest $request, BD_transactions $bd_transactions)
  {
      $id = Auth::id(); // Récupération de l'id de l'utilisateur dont la séssion est en cours.
      $profil = array(); // Tableau contenant les informations de l'utilisateur.

      $profil = $bd_transactions->user_info($id); // Instanciation des informations de l'utilisateur dans le tableau.

      $type = array(); // Tableau contenant les caractéristiques des formulaires.
      $type[0]=0; // Formulaire d'Avancement "BASIQUE" donc 0.
      $type[1]=4; // Le formulaire d'Avancement dispose de 3 lignes.

      return view('Comptes/Directions_Conducteurs_Home/formulaire_conducteur')->with('profil', $profil);
  }

  public function sendData (C_resp_tbaRequest $request, BD_transactions $bd_transactions)
  {
      $id = Auth::id(); // Récupération de l'id de l'utilisateur dont la séssion est en cours.
      $profil = array(); // Tableau contenant les informations de l'utilisateur.

      $profil = $bd_transactions->user_info($id); // Instanciation des informations de l'utilisateur dans le tableau.

      $type = array(); // Tableau contenant les caractéristiques des formulaires.
      $type[0]=3; // Formulaire d'Avancement "CONDUCTEUR"
      $type[1]=4; // Le formulaire d'Avancement dispose de 4 lignes.

      $bd_transactions->save_data_tab_avancements($id, $request, $type);

      $type[1]=4; // Le formulaire dispose de 2 lignes.
      $bd_transactions->save_data_tab_interception($id, $request, $type);

      $data_historique = $bd_transactions->get_historique_rapports();

      return view('Comptes/Responsables/après_validation')->with('profil', $profil);
  }
}
