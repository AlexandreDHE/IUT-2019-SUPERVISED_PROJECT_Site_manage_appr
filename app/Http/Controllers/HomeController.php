<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BD_transactions;


class HomeController extends Controller
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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(BD_transactions $bd_transactions)
    {

      date_default_timezone_set('Europe/Paris');
      $time = date("Y-m-d H:i:s");
      //$time = date("Y-m-d 23:00:s");
      $AJD20 = date("Y-m-d 20:00:00");
      $AJD8 = date("Y-m-d 08:00:00");
      $AJD00 = date("Y-m-d 00:00:00");
      $DEM00 = date("Y-m-d 00:00:00", strtotime("+1 day "));
      $HIER20 = date("Y-m-d 20:00:00", strtotime("1 day ago"));

      $id = Auth::id();
      $profil = array();
      $profil = $bd_transactions->user_info($id);

      $data_historique = $bd_transactions->get_historique_rapports();

      if($profil[3] == 'Direction'){
        return view('Comptes/Directions_Conducteurs_Home/direction')->with('profil', $profil)
                                                                    ->with('data_historique', $data_historique);
      }elseif($profil[3] == 'Conducteur_T'){
        return view('Comptes/Directions_Conducteurs_Home/conducteur_de_travaux')->with('profil', $profil)
                                                                                ->with('data_historique', $data_historique);
      }elseif ($time>$AJD8 && $time<=$AJD20) {
          return view('Comptes/Responsables/pas_le_moment')->with('profil', $profil);
      }else{
        if($profil[3] == 'Resp_consolidation_TBA'){
          return view('Comptes/Responsables/consolidation_tba')->with('profil', $profil);
        }elseif($profil[3] == 'Resp_degarnissage'){
          return view('Comptes/Responsables/degarnissage')->with('profil', $profil);
        }elseif($profil[3] == 'Resp_finitions'){
          return view('Comptes/Responsables/finitions')->with('profil', $profil);
        }elseif($profil[3] == 'Resp_libération'){
          return view('Comptes/Responsables/libération')->with('profil', $profil);
        }elseif($profil[3] == 'Resp_nivel_complémentaire'){
          return view('Comptes/Responsables/nivel_comple')->with('profil', $profil);
        }elseif($profil[3] == 'Resp_prépa_coupe'){
          return view('Comptes/Responsables/prépa_coupe')->with('profil', $profil);
        }elseif($profil[3] == 'Resp_prépa_deg'){
          return view('Comptes/Responsables/prépa_deg')->with('profil', $profil);
        }elseif($profil[3] == 'Resp_relevage'){
          return view('Comptes/Responsables/relevage')->with('profil', $profil);
        }elseif($profil[3] == 'Resp_substitution'){
          return view('Comptes/Responsables/substitution')->with('profil', $profil);
        }else{
          return view('/login');
        }
      }

    }

}
