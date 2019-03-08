<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BD_transactions;
use App\Http\Requests\C_resp_tbaRequest;

class compte_rendu_rapportController extends Controller
{
    public function showData_dernier_rapport(C_resp_tbaRequest $request, BD_transactions $bd_transactions){

      $id = Auth::id(); // Récupération de l'id de l'utilisateur dont la séssion est en cours.
      $profil = array(); // Tableau contenant les informations de l'utilisateur.

      $profil = $bd_transactions->user_info($id); // Instanciation des informations de l'utilisateur

      if($request->Date === null ){
        $date = -1;
      }else {
        $date = $request->Date;
      }

      $data_tab_avancement = $bd_transactions->show_data_tab_avancements($date);
      $data_tab_materiel = $bd_transactions->show_data_materiels($date);
      $data_tab_mat_calage = $bd_transactions->show_data_mat_calages($date);
      $data_tab_mat_traction = $bd_transactions->show_data_mat_tractions($date);
      $data_tab_wagon = $bd_transactions->show_data_tab_wagons($date);
      $data_tab_horaires_sds = $bd_transactions->show_data_tab_horaires_sds($date);
      $data_tab_incidents = $bd_transactions->show_data_tab_incidents($date);

      return view('Comptes/Directions_Conducteurs_Home/Compte_rendu/rapport')->with('profil', $profil)
                                            ->with('tab_avancement_data', $data_tab_avancement)
                                            ->with('tab_materiel_data', $data_tab_materiel)
                                            ->with('tab_mat_calage_data', $data_tab_mat_calage)
                                            ->with('tab_mat_traction_data', $data_tab_mat_traction)
                                            ->with('tab_wagon_data', $data_tab_wagon)
                                            ->with('tab_horaires_sd_data', $data_tab_horaires_sds);
    }

    public function showData_dernières_observations(C_resp_tbaRequest $request, BD_transactions $bd_transactions){

      $id = Auth::id(); // Récupération de l'id de l'utilisateur dont la séssion est en cours.
      $profil = array(); // Tableau contenant les informations de l'utilisateur.

      $profil = $bd_transactions->user_info($id); // Instanciation des informations de l'utilisateur

      if($request->Date === null ){
        $date = -1;
      }else {
        $date = $request->Date;
      }

      $data_tab_incidents = $bd_transactions->show_data_tab_incidents($date);

      return view('Comptes/Directions_Conducteurs_Home/Compte_rendu/observation')->with('profil', $profil)
                                                      ->with('tab_incident_data', $data_tab_incidents);

    }
}
