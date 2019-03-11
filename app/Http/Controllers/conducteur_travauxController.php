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

      return view('Comptes/Directions_Conducteurs_Home/formulaire_conducteur')->with('profil', $profil);
  }
}
