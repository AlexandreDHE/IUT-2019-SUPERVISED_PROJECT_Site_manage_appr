<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BD_transactions;
use App\Http\Requests\C_resp_tbaRequest;

class c_resp_finitionsController extends Controller
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
      * Méthode directement appellée après la validation du formulaire.
      * Route::post('/Resp_Finitions', 'c_resp_finitionsController@sendData')->name('StoreData_finitions');
      *
      * Elle permet de recuperer les informations de l'utilisateur, et d'enregistrer les données du formulaire dans
      * la base de données.
      *
      * Ce controller utilise une class spécifique appellée BD_transactions qui permet d'interagir avec la base de données.
      *
      * @param C_resp_tbaRequest
      *         Permet de controler la saisie.
      * @param BD_transactions
      *         Class en charge des interactions avec la base de donnéelse.
      *
      * @return view
      *
      */
    public function sendData(C_resp_tbaRequest $request, BD_transactions $bd_transactions)
    {
        $id = Auth::id(); // Récupération de l'id de l'utilisateur dont la séssion est en cours.
        $profil = array(); // Tableau contenant les informations de l'utilisateur.

        $profil = $bd_transactions->user_info($id); // Instanciation des informations de l'utilisateur dans le tableau.

        $type = array(); // Tableau contenant les caractéristiques des formulaires.
        $type[0]=0; // Formulaire d'Avancement "BASIQUE" donc 0.
        $type[1]=2; // Le formulaire d'Avancement dispose de 2 lignes.

        $bd_transactions->save_data_tab_avancements($id, $request, $type); // Enregistrement dans la BD des informations du formulaire Avancement.
        $bd_transactions->save_data_tab_wagons($id, $request,$type); // Enregistrement dans la BD des informations du formulaire Wagons.
        $bd_transactions->save_data_tab_materiels($id, $request,$type); // Enregistrement dans la BD des informations du formulaire Materiels.
        $bd_transactions->save_data_tab_incidents($id , $request, $type); // Enregistrement dans la BD des informations du formulaire Incidents.

        return view('Comptes/Responsables/après_validation')->with('profil', $profil);
    }
}
