<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BD_transactions;
use App\Http\Requests\C_resp_tbaRequest;

class HistoriqueController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function historique_rapports(C_resp_tbaRequest $request, BD_transactions $bd_transactions)
  {
      $id = Auth::id();
      $profil = array();
      $profil = $bd_transactions->user_info($id);

      $data_historique = $bd_transactions->get_historique_rapports();

      return view('Comptes/Directions_Conducteurs_Home/Historique/rapports')->with('profil', $profil)
                                                                            ->with('data_historique', $data_historique);
  }

  public function historique_observations(C_resp_tbaRequest $request, BD_transactions $bd_transactions)
  {
      $id = Auth::id();
      $profil = array();
      $profil = $bd_transactions->user_info($id);

      $data_historique = $bd_transactions->get_historique_rapports();

      return view('Comptes/Directions_Conducteurs_Home/Historique/observations')->with('profil', $profil)
                                                                                ->with('data_historique', $data_historique);
  }

}
