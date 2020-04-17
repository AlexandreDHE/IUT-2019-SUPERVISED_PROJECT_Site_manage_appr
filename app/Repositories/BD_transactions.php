<?php

    namespace App\Repositories;

    use App\Models\User;
    use App\Models\Tab_avancement;
    use App\Models\Tab_materiel;
    use App\Models\Tab_mat_traction;
    use App\Models\Tab_mat_calage;
    use App\Models\Tab_wagon;
    use App\Models\Tab_horaires_sd;
    use App\Models\Tab_incident;
    use App\Models\Tab_conducteur;

     /**
       *
       */
     class BD_transactions implements BD_transactionsInterface
     {

        protected $user;

        public function __construct(User $user)
        {
            $this->user = $user;
        }

        public function init(){
            $user = new User;
            $user->create_by=0;
            $user->id=0;
            $user->nom='User';
            $user->prénom='Conducteur_T';
            $user->fonction='Conducteur_T';
            $user->email='user@gmail.com';
            $user->num_tel='0000000000';
            $user->password='$2y$10$ERuzucoasvus8cMhUvelFO2wb1Mj.QIRx5De3/l9USGyPqSQ12dGO';
            $user->save();
        }

        /**
          * Cette méthode permet de connaitre les informations de l'utilisateur, à savoir
          * son nom, son prénom et enfin ca fonction.
          *
          * @param id
          *         L'id est son identifiant unique enregistré dans la base de données
          *
          * @return resultat[]
          *         resultat[id, nom, prénom, fonction]
          */
        public function user_info($id)
        {

            $resulat = array();
            $resulat[0] = $id;

            $nom = User::select('nom', 'prénom', 'fonction')->where('id', $id )->get();
            foreach ($nom as $user) {
                $resulat[1]= $user->nom;
                $resulat[2]= $user->prénom;
                $resulat[3]= $user->fonction;
            }
            return $resulat;
        }


        /**
          * Cette méthode permet d'enregistrer les informations concernant le TABLEAU
          * D'AVANCEMENT dans la base de données.
          *
          * @param id
          *        Le numéro d'identification de l'utilisateur
          * @param Request
          *        La requete contentant toutes les informations remplies dans le formulaire
          * @param NumLigne
          *        Le nombre de lignes que l'on a dans le tableau avancement
          * @param Type[]
          *        Le type de comptes avec les information complémentaires
          */
        public function save_data_tab_avancements($id, $request, $type)
        {
            if($type[0] === 0){

                for ($j = 0; $j<$type[1]; $j++){
                    $tab_avancement = new Tab_avancement;
                    $tab_avancement->Id = $id;
                    $tab_avancement->Voie = $request->input('tab_avancement.'.$j.'.0');
                    $tab_avancement->PkD = $request->input('tab_avancement.'.$j.'.1');
                    $tab_avancement->PkF = $request->input('tab_avancement.'.$j.'.2');
                    $tab_avancement->NumLigne = $j+1;
                    $tab_avancement->save();
                }

            }elseif ($type[0] === 4 ) {

                for($i=0; $i<2; $i++){
                    for ($j = 0; $j<$type[$i+1]; $j++){
                        $tab_avancement = new Tab_avancement;
                        $tab_avancement->Id = $id;
                        $tab_avancement->Voie = $request->input('tab_avancement.'.$i.'.'.$j.'.0');
                        $tab_avancement->PkD = $request->input('tab_avancement.'.$i.'.'.$j.'.1');
                        $tab_avancement->PkF = $request->input('tab_avancement.'.$i.'.'.$j.'.2');
                        if($i === 0 ){
                            $tab_avancement->PhaseNivel = "Bourage";
                        }elseif($i === 1 ){
                            $tab_avancement->PhaseNivel = "Régalage";
                        }
                        $tab_avancement->NumLigne = $j+1;
                        $tab_avancement->save();
                    }
                }

            }elseif ($type[0] === 1 ) {

                for($i=0; $i<3; $i++){
                    for ($j = 0; $j<2; $j++){
                        $tab_avancement = new Tab_avancement;
                        $tab_avancement->Id = $id;
                        $tab_avancement->Voie = $request->input('tab_avancement.'.$i.'.'.$j.'.0');
                        $tab_avancement->PkD = $request->input('tab_avancement.'.$i.'.'.$j.'.1');
                        $tab_avancement->PkF = $request->input('tab_avancement.'.$i.'.'.$j.'.2');
                        if($i === 0 ){
                            $tab_avancement->PhaseRelevage = "1ère Passe";
                        }elseif($i === 1 ){
                            $tab_avancement->PhaseRelevage = "2ème Passe";
                        }elseif($i === 2 ){
                            $tab_avancement->PhaseRelevage = "3ème Passe";
                        }
                        $tab_avancement->NumLigne = $j+1;
                        $tab_avancement->save();
                    }
                }
            }elseif ($type[0] === 3 ) {

              for ($j = 0; $j<$type[1]; $j++){
                if($j === 0 || $j === 1 ){
                  $tab_avancement = new Tab_avancement;
                  $tab_avancement->Id = $id;
                  $tab_avancement->Voie = 1 ;
                  $tab_avancement->TauxConduc = $request->input('tab_avancement.'.$j.'.0');
                  $tab_avancement->PkD = $request->input('tab_avancement.'.$j.'.1');
                  $tab_avancement->PkF = $request->input('tab_avancement.'.$j.'.2');
                  $tab_avancement->NumLigne = $j+1;
                  $tab_avancement->save();
                }elseif ($j === 2|| $j === 3 ){
                  $tab_avancement = new Tab_avancement;
                  $tab_avancement->Id = $id;
                  $tab_avancement->Voie = 2 ;
                  $tab_avancement->TauxConduc = $request->input('tab_avancement.'.$j.'.0');
                  $tab_avancement->PkD = $request->input('tab_avancement.'.$j.'.1');
                  $tab_avancement->PkF = $request->input('tab_avancement.'.$j.'.2');
                  $tab_avancement->NumLigne = $j+1;
                  $tab_avancement->save();
              }
            }
          }
        }

        public function save_data_tab_materiels($id , $request, $type)
        {

            for($j=0; $j<2; $j++){
                for($i=0; $i<3; $i++){
                    if($request->input('Tab_materiel.'.$j.'.'.$i.'') === null){
                        //
                    }else{
                        $tab_materiel = new Tab_materiel;
                        $tab_materiel->Id = $id;
                        $tab_materiel->Reférence = $request->input('Tab_materiel.'.$j.'.'.$i.'');
                        if($j === 0){
                            $tab_materiel->Fixe_or_renfort = 'F';
                        }elseif($j === 1){
                            $tab_materiel->Fixe_or_renfort = 'R';
                        }
                        $tab_materiel->NumLigne = $i+1;
                        $tab_materiel->save();
                    }
                }
           }

           for($j=0; $j<2; $j++){
              for($i=0; $i<2; $i++){
                  if($request->input('Tab_mat_traction.'.$j.'.'.$i.'') === null){
                    //
                  }else{
                      $tab_mat_traction = new Tab_mat_traction;
                      $tab_mat_traction->Id = $id;
                      $tab_mat_traction->Reférence = $request->input('Tab_mat_traction.'.$j.'.'.$i.'');
                      if($j === 0){
                          $tab_mat_traction->Fixe_or_renfort = 'F';
                      }elseif($j === 1){
                          $tab_mat_traction->Fixe_or_renfort = 'R';
                      }
                      $tab_mat_traction->NumLigne = $i+1;
                      $tab_mat_traction->save();
                 }
              }
           }

           for($j=0; $j<2; $j++){
              for($i=0; $i<2; $i++){
                  if($request->input('Tab_mat_calage.'.$j.'.'.$i.'') === null){
                    //
                  }else{
                      $tab_mat_traction = new Tab_mat_calage;
                      $tab_mat_traction->Id = $id;
                      $tab_mat_traction->Reférence = $request->input('Tab_mat_calage.'.$j.'.'.$i.'');
                      if($j === 0){
                          $tab_mat_traction->Fixe_or_renfort = 'F';
                      }elseif($j === 1){
                          $tab_mat_traction->Fixe_or_renfort = 'R';
                      }
                      $tab_mat_traction->NumLigne = $i+1;
                      $tab_mat_traction->save();
                  }
              }
           }
        }


        public function save_data_tab_wagons($id , $request, $type)
        {

            for($j=0; $j<2; $j++){
                $tab_wagon = new Tab_wagon;
                $tab_wagon->Id = $id;
                $tab_wagon->Nom = $request->input('tab_wagon.'.$j.'.0');
                $tab_wagon->NbDemande = $request->input('tab_wagon.'.$j.'.1');
                $tab_wagon->NbFournis = $request->input('tab_wagon.'.$j.'.2');
                $tab_wagon->NbCharDechar = $request->input('tab_wagon.'.$j.'.3');
                $tab_wagon->NumLigne = $j+1;
                $tab_wagon->save();
            }
        }


        public function save_data_tab_horaires_sds($id , $request, $type)
        {
            $tab_horaire = new Tab_horaires_sd;

            $tab_horaire->AutoTrav  = $request->input('AutoTrav');
            $tab_horaire->ConsCatAMHT  = $request->input('ConsCatAMHT');
            $tab_horaire->DepInstSE  = $request->input('DepInstSE');
            $tab_horaire->ATTX  = $request->input('ATTX');
            $tab_horaire->EnginLieuTrav  = $request->input('EnginLieuTrav');
            $tab_horaire->DebTrav  = $request->input('DebTrav');

            if($type[0] === 0)
            {
                $tab_horaire->AVC  = $request->input('AVC');
                $tab_horaire->DerniereTBA = $request->input('DerniereTBA');
            }


            $tab_horaire->FinTravCoupeRail = $request->input('FinTravCoupeRail');
            $tab_horaire->DegRampe = $request->input('DegRampe');
            $tab_horaire->FinBourr = $request->input('FinBourr');
            $tab_horaire->DepTTXChan   = $request->input('DepTTXChan');
            $tab_horaire->Id = $id;

            $tab_horaire->save();
        }


        public function save_data_tab_incidents($id , $request, $type){
            $tab_incident = new Tab_incident;
            $tab_incident->Id = $id;

            if($request->input('Accidents') === null){
                $tab_incident->Accidents = "RAS";
            }else{
                $tab_incident->Accidents = $request->input('Accidents');
            }

            if($request->input('Pannes') === null){
                $tab_incident->Pannes = "RAS";
            }else{
                $tab_incident->Pannes = $request->input('Pannes');
            }

            if ($request->input('Autres') === null) {
                $tab_incident->Autres = "RAS";
            }else {
                $tab_incident->Autres = $request->input('Autres');
            }
            $tab_incident->save();
        }



        public function save_data_tab_interception ($id , $request, $type)
        {
              for ($j= 0; $j<$type[1]; $j++){

                if($j===0){

                  $tab_conducteur = new Tab_conducteur;
                  $tab_conducteur->Id = $id;
                  $tab_conducteur->InterCat  = "Interception";
                  $tab_conducteur->Voie  = 1;
                  $tab_conducteur->HDepT = $request->input('tab_interception.'.$j.'.0');
                  $tab_conducteur->HFinT = $request->input('tab_interception.'.$j.'.1');
                  $tab_conducteur->HDepR  = $request->input('tab_interception.'.$j.'.2');
                  $tab_conducteur->HFinR = $request->input('tab_interception.'.$j.'.3');
                  $tab_conducteur->NumLigne = $j+1;
                  $tab_conducteur->save();

                }elseif ($j===1) {

                  $tab_conducteur = new Tab_conducteur;
                  $tab_conducteur->Id = $id;
                  $tab_conducteur->InterCat  = "Caténaire";
                  $tab_conducteur->Voie  = 1;
                  $tab_conducteur->HDepT = $request->input('tab_interception.'.$j.'.0');
                  $tab_conducteur->HFinT = $request->input('tab_interception.'.$j.'.1');
                  $tab_conducteur->HDepR  = $request->input('tab_interception.'.$j.'.2');
                  $tab_conducteur->HFinR = $request->input('tab_interception.'.$j.'.3');
                  $tab_conducteur->NumLigne = $j+1;
                  $tab_conducteur->save();

                }elseif ($j===2) {

                  $tab_conducteur = new Tab_conducteur;
                  $tab_conducteur->Id = $id;
                  $tab_conducteur->InterCat  = "Interception";
                  $tab_conducteur->Voie  = 2 ;
                  $tab_conducteur->HDepT = $request->input('tab_interception.'.$j.'.0');
                  $tab_conducteur->HFinT = $request->input('tab_interception.'.$j.'.1');
                  $tab_conducteur->HDepR  = $request->input('tab_interception.'.$j.'.2');
                  $tab_conducteur->HFinR = $request->input('tab_interception.'.$j.'.3');
                  $tab_conducteur->NumLigne = $j+1;
                  $tab_conducteur->save();

                }elseif ($j===3){

                  $tab_conducteur = new Tab_conducteur;
                  $tab_conducteur->Id = $id;
                  $tab_conducteur->InterCat  = "Caténaire";
                  $tab_conducteur->Voie  = 2;
                  $tab_conducteur->HDepT = $request->input('tab_interception.'.$j.'.0');
                  $tab_conducteur->HFinT = $request->input('tab_interception.'.$j.'.1');
                  $tab_conducteur->HDepR  = $request->input('tab_interception.'.$j.'.2');
                  $tab_conducteur->HFinR = $request->input('tab_interception.'.$j.'.3');
                  $tab_conducteur->NumLigne = $j+1;
                  $tab_conducteur->save();

               }
            }
        }

    /****************************************************************************************/
    /*                            RECUPÉRATIONS DE DONNÉES                                  */
    /****************************************************************************************/

        private $AJD20;
        private $AJD8;
        private $AJD00;
        private $DEM00;
        private $HIER20;
        private $timeStreamAgo;
        private $timeStream;

        private $date_Select;

        private function time_streaming()
        {
            date_default_timezone_set('Europe/Paris');
            $this->AJD20 = date("Y-m-d 20:00:00");
            $this->AJD8 = date("Y-m-d 08:00:00");
            $this->AJD00 = date("Y-m-d 00:00:00");
            $this->DEM00 = date("Y-m-d 00:00:00", strtotime("+1 day "));
            $this->HIER20 = date("Y-m-d 20:00:00", strtotime("1 day ago"));

            $this->timeStreamAgo = date("Y-m-d H:i:s", strtotime("1 day ago"));
            $this->timeStream = date("Y-m-d H:i:s");
        }

        private function time_select($date_Select)
        {
            date_default_timezone_set('Europe/Paris');
            $date_Select;
            $this->timeStream = date('Y-m-d 12:00:00', strtotime($date_Select));
            $this->timeStreamAgo = date('Y-m-d H:i:s', strtotime($this->timeStream)-86400);
            $this->HIER20= date('Y-m-d H:i:s', strtotime($this->timeStream)-57600);
            $this->AJD8 = date('Y-m-d H:i:s', strtotime($this->timeStream)-14400);
            $this->AJD20 =  date('Y-m-d H:i:s', strtotime($this->timeStream)+28800);
            $this->AJD00 = date('Y-m-d H:i:s', strtotime($this->timeStream)-43200);
            $this->DEM00 = date('Y-m-d 00:00:00', strtotime("+1 day "));
        }


        public function show_data_tab_avancements($date)
        {

            if($date === -1 ){
                $this->time_streaming();
            }else{
                $this->time_select($date);
            }

            $resulat = array(array());
            $etatCompte = array();

            for($i=0; $i<9; $i++){
                $etatCompte[$i] = 0;
            }

            if ( ($this->timeStream >= $this->AJD00) && ($this->timeStream < $this->AJD20) ){
                $data_tab_avance = Tab_avancement::select('Voie', 'PkD', 'PkF', 'Date', 'Id')->where('Date', '>=', $this->HIER20)
                                                                                             ->where('Date', '<', $this->AJD8)
                                                                                             ->get();
                $cpt=0;
                $valId = -1;
                $typeUser = -1;

                foreach ($data_tab_avance as $tab) {

                    if( ($tab->Id) === $valId ){

                        $resulat[$typeUser][$cpt][4]= $tab->Id;

                    }else {

                        $valId = $tab->Id;
                        $cpt = 0;

                        $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                        foreach ($fonction as $value) {
                            $fonction = $value->fonction;
                        }

                        if ( $fonction === 'Resp_consolidation_TBA'){
                            $typeUser = 0;
                        }elseif ($fonction === 'Resp_degarnissage') {
                            $typeUser = 4;
                        }elseif ($fonction === 'Resp_finitions') {
                            $typeUser = 7;
                        }elseif ($fonction === 'Resp_libération') {
                            $typeUser = 6;
                        }elseif ($fonction === 'Resp_nivel_complémentaire') {
                            $typeUser = 8;
                        }elseif ($fonction === 'Resp_prépa_coupe') {
                            $typeUser = 1;
                        }elseif ($fonction === 'Resp_prépa_deg') {
                            $typeUser = 2;
                        }elseif ($fonction === 'Resp_relevage') {
                            $typeUser = 5;
                        }elseif ($fonction === 'Resp_substitution') {
                            $typeUser = 3;
                        }

                        $resulat[$typeUser][$cpt][4]= $tab->Id;
                        $etatCompte[$typeUser] = 1 ;
                    }

                    $resulat[$typeUser][$cpt][0]= $tab->Voie;
                    $resulat[$typeUser][$cpt][1]= $tab->PkD;
                    $resulat[$typeUser][$cpt][2]= $tab->PkF;
                    $resulat[$typeUser][$cpt][3]= $tab->Date;
                    $cpt++;
                }

            } elseif (($this->timeStream >= $this->AJD20) && ($this->timeStream < $this->DEM00) ){

                $data_tab_avance = Tab_avancement::select('Voie', 'PkD', 'PkF', 'Date', 'Id')->where('Date', '>=', $this->AJD20)
                                                                                             ->where('Date', '<', $this->DEM00)
                                                                                             ->get();
                $cpt=0;
                $valId = -1;
                $typeUser = -1;

                foreach ($data_tab_avance as $tab) {

                    if( ($tab->Id) === $valId ){

                        $resulat[$typeUser][$cpt][4]= $tab->Id;

                    }else {

                        $valId = $tab->Id;
                        $cpt = 0;

                        $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                        foreach ($fonction as $value) {
                            $fonction = $value->fonction;
                        }

                        if ( $fonction === 'Resp_consolidation_TBA'){
                            $typeUser = 0;
                        }elseif ($fonction === 'Resp_degarnissage') {
                            $typeUser = 4;
                        }elseif ($fonction === 'Resp_finitions') {
                            $typeUser = 7;
                        }elseif ($fonction === 'Resp_libération') {
                            $typeUser = 6;
                        }elseif ($fonction === 'Resp_nivel_complémentaire') {
                            $typeUser = 8;
                        }elseif ($fonction === 'Resp_prépa_coupe') {
                            $typeUser = 1;
                        }elseif ($fonction === 'Resp_prépa_deg') {
                            $typeUser = 2;
                        }elseif ($fonction === 'Resp_relevage') {
                            $typeUser = 5;
                        }elseif ($fonction === 'Resp_substitution') {
                            $typeUser = 3;
                        }

                        $resulat[$typeUser][$cpt][4]= $tab->Id;
                        $etatCompte[$typeUser] = 1 ;
                    }

                    $resulat[$typeUser][$cpt][0]= $tab->Voie;
                    $resulat[$typeUser][$cpt][1]= $tab->PkD;
                    $resulat[$typeUser][$cpt][2]= $tab->PkF;
                    $resulat[$typeUser][$cpt][3]= $tab->Date;
                    $cpt++;
                }
            }

            $resulat[9] = $etatCompte;
            return $resulat;
        }


        public function show_data_materiels($date)
        {

              if($date === -1 ){
                  $this->time_streaming();
              }else{
                  $this->time_select($date);
              }

             $resulat = array(array(array()));
             $Mfixe = array();
             $Mrenfort = array();
             $etatCompte = array();

             for($i=0; $i<9; $i++){
                 $etatCompte[$i] = 0;
             }

             if ( ($this->timeStream >= $this->AJD00) && ($this->timeStream < $this->AJD20) ){
                $data_tab_materiel = Tab_materiel::select('Reférence', 'Fixe_or_renfort', 'Date', 'Id' )->where('Date', '>=', $this->HIER20)
                                                                       ->where('Date', '<', $this->AJD8)
                                                                       ->get();
                $cpt=0;
                $valId = -1;
                $typeUser = -1;

                foreach ($data_tab_materiel as $tab) {

                    if( ($tab->Id) === $valId ){

                        $resulat[$typeUser][$cpt][2]= $tab->Id;

                    }else {

                        $valId = $tab->Id;
                        $cpt = 0;

                        $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                        foreach ($fonction as $value) {
                            $fonction = $value->fonction;
                        }

                        if ( $fonction === 'Resp_consolidation_TBA'){
                            $typeUser = 0;
                        }elseif ($fonction === 'Resp_degarnissage') {
                            $typeUser = 4;
                        }elseif ($fonction === 'Resp_finitions') {
                            $typeUser = 7;
                        }elseif ($fonction === 'Resp_libération') {
                             $typeUser = 6;
                        }elseif ($fonction === 'Resp_nivel_complémentaire') {
                           $typeUser = 8;
                        }elseif ($fonction === 'Resp_prépa_coupe') {
                             $typeUser = 1;
                        }elseif ($fonction === 'Resp_prépa_deg') {
                           $typeUser = 2;
                        }elseif ($fonction === 'Resp_relevage') {
                           $typeUser = 5;
                        }elseif ($fonction === 'Resp_substitution') {
                           $typeUser = 3;
                        }

                        $resulat[$typeUser][$cpt][2]= $tab->Id;
                        $etatCompte[$typeUser] = 1 ;
                    }

                    if( $tab->Fixe_or_renfort === 'F'){
                        $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                        $resulat[$typeUser][$cpt][1]= 'F';
                    }elseif ($tab->Fixe_or_renfort === 'R') {
                        $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                        $resulat[$typeUser][$cpt][1]= 'R';
                    }
                    $cpt++;
                }


             }elseif (($this->timeStream >= $this->AJD20) && ($this->timeStream < $this->DEM00) ){

               $data_tab_materiel = Tab_materiel::select('Reférence', 'Fixe_or_renfort', 'Date', 'Id' )->where('Date', '>=', $this->AJD20)
                                                                                                        ->where('Date', '<', $this->DEM00)
                                                                                                        ->get();
                $cpt=0;
                $valId = -1;
                $typeUser = -1;

                foreach ($data_tab_materiel as $tab) {

                    if( ($tab->Id) === $valId ){

                        $resulat[$typeUser][$cpt][2]= $tab->Id;

                    }else {

                        $valId = $tab->Id;
                        $cpt = 0;

                        $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                        foreach ($fonction as $value) {
                            $fonction = $value->fonction;
                        }

                        if ( $fonction === 'Resp_consolidation_TBA'){
                            $typeUser = 0;
                        }elseif ($fonction === 'Resp_degarnissage') {
                            $typeUser = 4;
                        }elseif ($fonction === 'Resp_finitions') {
                            $typeUser = 7;
                        }elseif ($fonction === 'Resp_libération') {
                             $typeUser = 6;
                        }elseif ($fonction === 'Resp_nivel_complémentaire') {
                           $typeUser = 8;
                        }elseif ($fonction === 'Resp_prépa_coupe') {
                             $typeUser = 1;
                        }elseif ($fonction === 'Resp_prépa_deg') {
                           $typeUser = 2;
                        }elseif ($fonction === 'Resp_relevage') {
                           $typeUser = 5;
                        }elseif ($fonction === 'Resp_substitution') {
                           $typeUser = 3;
                        }

                        $resulat[$typeUser][$cpt][2]= $tab->Id;
                        $etatCompte[$typeUser] = 1 ;
                    }

                    if( $tab->Fixe_or_renfort === 'F'){
                        $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                        $resulat[$typeUser][$cpt][1]= 'F';
                    }elseif ($tab->Fixe_or_renfort === 'R') {
                        $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                        $resulat[$typeUser][$cpt][1]= 'R';
                    }
                    $cpt++;
                }
             }

             $resulat[9] = $etatCompte;
             return $resulat;
         }


        public function show_data_mat_calages($date)
        {

            if($date === -1 ){
                $this->time_streaming();
            }else{
                $this->time_select($date);
            }

            $resulat = array(array(array()));
            $Mfixe = array();
            $Mrenfort = array();
            $etatCompte = array();

            for($i=0; $i<9; $i++){
                $etatCompte[$i] = 0;
            }

            if ( ($this->timeStream >= $this->AJD00) && ($this->timeStream < $this->AJD20) ){
                $data_tab_calage= Tab_mat_calage::select('Reférence', 'Fixe_or_renfort', 'Date', 'Id' )->where('Date', '>=', $this->HIER20)
                                                                      ->where('Date', '<', $this->AJD8)
                                                                      ->get();
                $cpt=0;
                $valId = -1;
                $typeUser = -1;

                foreach ($data_tab_calage as $tab) {

                    if( ($tab->Id) === $valId ){

                        $resulat[$typeUser][$cpt][2]= $tab->Id;

                    }else {

                        $valId = $tab->Id;
                        $cpt = 0;

                        $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                        foreach ($fonction as $value) {
                            $fonction = $value->fonction;
                        }

                        if ( $fonction === 'Resp_consolidation_TBA'){
                            $typeUser = 0;
                        }elseif ($fonction === 'Resp_degarnissage') {
                            $typeUser = 4;
                        }elseif ($fonction === 'Resp_finitions') {
                            $typeUser = 7;
                        }elseif ($fonction === 'Resp_libération') {
                            $typeUser = 6;
                        }elseif ($fonction === 'Resp_nivel_complémentaire') {
                            $typeUser = 8;
                        }elseif ($fonction === 'Resp_prépa_coupe') {
                            $typeUser = 1;
                        }elseif ($fonction === 'Resp_prépa_deg') {
                            $typeUser = 2;
                        }elseif ($fonction === 'Resp_relevage') {
                            $typeUser = 5;
                        }elseif ($fonction === 'Resp_substitution') {
                            $typeUser = 3;
                        }

                        $resulat[$typeUser][$cpt][2]= $tab->Id;
                        $etatCompte[$typeUser] = 1 ;
                    }

                    if( $tab->Fixe_or_renfort === 'F'){
                       $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                       $resulat[$typeUser][$cpt][1]= 'F';
                    }elseif ($tab->Fixe_or_renfort === 'R') {
                       $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                       $resulat[$typeUser][$cpt][1]= 'R';
                    }

                    $cpt++;
                }


            } elseif (($this->timeStream >= $this->AJD20) && ($this->timeStream < $this->DEM00) ){

              $data_tab_calage= Tab_mat_calage::select('Reférence', 'Fixe_or_renfort', 'Date', 'Id' )->where('Date', '>=', $this->AJD20)
                                                                                                     ->where('Date', '<', $this->DEM00)
                                                                                                     ->get();
                 $cpt=0;
                 $valId = -1;
                 $typeUser = -1;

                 foreach ($data_tab_calage as $tab) {

                     if( ($tab->Id) === $valId ){

                         $resulat[$typeUser][$cpt][2]= $tab->Id;

                     }else {

                         $valId = $tab->Id;
                         $cpt = 0;

                         $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                         foreach ($fonction as $value) {
                             $fonction = $value->fonction;
                         }

                         if ( $fonction === 'Resp_consolidation_TBA'){
                             $typeUser = 0;
                         }elseif ($fonction === 'Resp_degarnissage') {
                             $typeUser = 4;
                         }elseif ($fonction === 'Resp_finitions') {
                             $typeUser = 7;
                         }elseif ($fonction === 'Resp_libération') {
                             $typeUser = 6;
                         }elseif ($fonction === 'Resp_nivel_complémentaire') {
                             $typeUser = 8;
                         }elseif ($fonction === 'Resp_prépa_coupe') {
                             $typeUser = 1;
                         }elseif ($fonction === 'Resp_prépa_deg') {
                             $typeUser = 2;
                         }elseif ($fonction === 'Resp_relevage') {
                             $typeUser = 5;
                         }elseif ($fonction === 'Resp_substitution') {
                             $typeUser = 3;
                         }

                         $resulat[$typeUser][$cpt][2]= $tab->Id;
                         $etatCompte[$typeUser] = 1 ;
                     }

                     if( $tab->Fixe_or_renfort === 'F'){
                        $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                        $resulat[$typeUser][$cpt][1]= 'F';
                     }elseif ($tab->Fixe_or_renfort === 'R') {
                        $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                        $resulat[$typeUser][$cpt][1]= 'R';
                     }

                     $cpt++;
                 }
            }

            $resulat[9] = $etatCompte;

            return $resulat;
        }


        public function show_data_mat_tractions($date)
        {

            if($date === -1 ){
                $this->time_streaming();
            }else{
                $this->time_select($date);
            }

            $resulat = array(array(array()));
            $Mfixe = array();
            $Mrenfort = array();
            $etatCompte = array();

            for($i=0; $i<9; $i++){
                $etatCompte[$i] = 0;
            }

            if ( ($this->timeStream >= $this->AJD00) && ($this->timeStream < $this->AJD20) ){
                $data_tab_traction = Tab_mat_traction::select('Reférence', 'Fixe_or_renfort', 'Date', 'Id' )->where('Date', '>=', $this->HIER20)
                                                                      ->where('Date', '<', $this->AJD8)
                                                                      ->get();
                $cpt=0;
                $valId = -1;
                $typeUser = -1;

                foreach ($data_tab_traction as $tab) {

                    if( ($tab->Id) === $valId ){

                        $resulat[$typeUser][$cpt][2]= $tab->Id;

                    }else {

                        $valId = $tab->Id;
                        $cpt = 0;

                        $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                        foreach ($fonction as $value) {
                            $fonction = $value->fonction;
                        }

                        if ( $fonction === 'Resp_consolidation_TBA'){
                            $typeUser = 0;
                        }elseif ($fonction === 'Resp_degarnissage') {
                            $typeUser = 4;
                        }elseif ($fonction === 'Resp_finitions') {
                            $typeUser = 7;
                        }elseif ($fonction === 'Resp_libération') {
                            $typeUser = 6;
                        }elseif ($fonction === 'Resp_nivel_complémentaire') {
                            $typeUser = 8;
                        }elseif ($fonction === 'Resp_prépa_coupe') {
                            $typeUser = 1;
                        }elseif ($fonction === 'Resp_prépa_deg') {
                            $typeUser = 2;
                        }elseif ($fonction === 'Resp_relevage') {
                            $typeUser = 5;
                        }elseif ($fonction === 'Resp_substitution') {
                            $typeUser = 3;
                        }

                        $resulat[$typeUser][$cpt][2]= $tab->Id;
                        $etatCompte[$typeUser] = 1 ;
                    }

                    if( $tab->Fixe_or_renfort === 'F'){
                       $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                       $resulat[$typeUser][$cpt][1]= 'F';
                    }elseif ($tab->Fixe_or_renfort === 'R') {
                       $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                       $resulat[$typeUser][$cpt][1]= 'R';
                    }

                    $cpt++;
                }


            } elseif (($this->timeStream >= $this->AJD20) && ($this->timeStream < $this->DEM00) ){

                $data_tab_traction = Tab_mat_traction::select('Reférence', 'Fixe_or_renfort', 'Date', 'Id' )->where('Date', '>=', $this->AJD20)
                                                                                                            ->where('Date', '<', $this->DEM00)
                                                                                                            ->get();
                 $cpt=0;
                 $valId = -1;
                 $typeUser = -1;

                 foreach ($data_tab_traction as $tab) {

                     if( ($tab->Id) === $valId ){

                         $resulat[$typeUser][$cpt][2]= $tab->Id;

                     }else {

                         $valId = $tab->Id;
                         $cpt = 0;

                         $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                         foreach ($fonction as $value) {
                             $fonction = $value->fonction;
                         }

                         if ( $fonction === 'Resp_consolidation_TBA'){
                             $typeUser = 0;
                         }elseif ($fonction === 'Resp_degarnissage') {
                             $typeUser = 4;
                         }elseif ($fonction === 'Resp_finitions') {
                             $typeUser = 7;
                         }elseif ($fonction === 'Resp_libération') {
                             $typeUser = 6;
                         }elseif ($fonction === 'Resp_nivel_complémentaire') {
                             $typeUser = 8;
                         }elseif ($fonction === 'Resp_prépa_coupe') {
                             $typeUser = 1;
                         }elseif ($fonction === 'Resp_prépa_deg') {
                             $typeUser = 2;
                         }elseif ($fonction === 'Resp_relevage') {
                             $typeUser = 5;
                         }elseif ($fonction === 'Resp_substitution') {
                             $typeUser = 3;
                         }

                         $resulat[$typeUser][$cpt][2]= $tab->Id;
                         $etatCompte[$typeUser] = 1 ;
                     }

                     if( $tab->Fixe_or_renfort === 'F'){
                        $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                        $resulat[$typeUser][$cpt][1]= 'F';
                     }elseif ($tab->Fixe_or_renfort === 'R') {
                        $resulat[$typeUser][$cpt][0]= $tab->Reférence;
                        $resulat[$typeUser][$cpt][1]= 'R';
                     }

                     $cpt++;
                 }
            }

            $resulat[9] = $etatCompte;

            return $resulat;
        }


        public function show_data_tab_wagons($date)
        {

            if($date === -1 ){
                $this->time_streaming();
            }else{
                $this->time_select($date);
            }

            $resulat = array(array());
            $etatCompte = array();

            for($i=0; $i<9; $i++){
                $etatCompte[$i] = 0;
            }

            if ( ($this->timeStream >= $this->AJD00) && ($this->timeStream < $this->AJD20) ){
                $data_tab_wagon = Tab_wagon::select('Nom', 'NbDemande', 'NbFournis', 'NbCharDechar', 'Date' ,'Id')
                                                                                             ->where('Date', '>=', $this->HIER20)
                                                                                             ->where('Date', '<', $this->AJD8)
                                                                                             ->get();
                $cpt=0;
                $valId = -1;
                $typeUser = -1;

                foreach ($data_tab_wagon as $tab) {

                    if( ($tab->Id) === $valId ){

                        $resulat[$typeUser][$cpt][4]= $tab->Id;

                    }else {

                        $valId = $tab->Id;
                        $cpt = 0;

                        $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                        foreach ($fonction as $value) {
                            $fonction = $value->fonction;
                        }

                        if ( $fonction === 'Resp_consolidation_TBA'){
                            $typeUser = 0;
                        }elseif ($fonction === 'Resp_degarnissage') {
                            $typeUser = 4;
                        }elseif ($fonction === 'Resp_finitions') {
                            $typeUser = 7;
                        }elseif ($fonction === 'Resp_libération') {
                            $typeUser = 6;
                        }elseif ($fonction === 'Resp_nivel_complémentaire') {
                            $typeUser = 8;
                        }elseif ($fonction === 'Resp_prépa_coupe') {
                            $typeUser = 1;
                        }elseif ($fonction === 'Resp_prépa_deg') {
                            $typeUser = 2;
                        }elseif ($fonction === 'Resp_relevage') {
                            $typeUser = 5;
                        }elseif ($fonction === 'Resp_substitution') {
                            $typeUser = 3;
                        }

                        $resulat[$typeUser][$cpt][4]= $tab->Id;
                        $etatCompte[$typeUser] = 1 ;
                    }

                    $resulat[$typeUser][$cpt][0]= $tab->Nom;
                    $resulat[$typeUser][$cpt][1]= $tab->NbDemande;
                    $resulat[$typeUser][$cpt][2]= $tab->NbFournis;
                    $resulat[$typeUser][$cpt][3]= $tab->NbCharDechar;
                    $cpt++;
                }

            } elseif (($this->timeStream >= $this->AJD20) && ($this->timeStream < $this->DEM00) ){

                $data_tab_wagon = Tab_wagon::select('Nom', 'NbDemande', 'NbFournis', 'NbCharDechar', 'Date' ,'Id')->where('Date', '>=', $this->AJD20)
                                                                                                                  ->where('Date', '<', $this->DEM00)
                                                                                                                  ->get();
                 $cpt=0;
                 $valId = -1;
                 $typeUser = -1;

                 foreach ($data_tab_wagon as $tab) {

                     if( ($tab->Id) === $valId ){

                         $resulat[$typeUser][$cpt][4]= $tab->Id;

                     }else {

                         $valId = $tab->Id;
                         $cpt = 0;

                         $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                         foreach ($fonction as $value) {
                             $fonction = $value->fonction;
                         }

                         if ( $fonction === 'Resp_consolidation_TBA'){
                             $typeUser = 0;
                         }elseif ($fonction === 'Resp_degarnissage') {
                             $typeUser = 4;
                         }elseif ($fonction === 'Resp_finitions') {
                             $typeUser = 7;
                         }elseif ($fonction === 'Resp_libération') {
                             $typeUser = 6;
                         }elseif ($fonction === 'Resp_nivel_complémentaire') {
                             $typeUser = 8;
                         }elseif ($fonction === 'Resp_prépa_coupe') {
                             $typeUser = 1;
                         }elseif ($fonction === 'Resp_prépa_deg') {
                             $typeUser = 2;
                         }elseif ($fonction === 'Resp_relevage') {
                             $typeUser = 5;
                         }elseif ($fonction === 'Resp_substitution') {
                             $typeUser = 3;
                         }

                         $resulat[$typeUser][$cpt][4]= $tab->Id;
                         $etatCompte[$typeUser] = 1 ;
                     }

                     $resulat[$typeUser][$cpt][0]= $tab->Nom;
                     $resulat[$typeUser][$cpt][1]= $tab->NbDemande;
                     $resulat[$typeUser][$cpt][2]= $tab->NbFournis;
                     $resulat[$typeUser][$cpt][3]= $tab->NbCharDechar;
                     $cpt++;
                 }
            }

            $resulat[9] = $etatCompte;
            return $resulat;
        }

        public function show_data_tab_horaires_sds($date)
        {

            if($date === -1 ){
                $this->time_streaming();
            }else{
                $this->time_select($date);
            }

            $resulat = array(array(array()));
            $Mfixe = array();
            $Mrenfort = array();
            $etatCompte = array();

            for($i=0; $i<9; $i++){
                $etatCompte[$i] = 0;
            }

            if ( ($this->timeStream >= $this->AJD00) && ($this->timeStream < $this->AJD20) ){
               $data_tab_horaires_sds = Tab_horaires_sd::select('AutoTrav', 'ConsCatAMHT', 'DepInstSE', 'ATTX', 'EnginLieuTrav', 'DebTrav', 'AVC', 'FinTravCoupeRail',
                                                            'DerniereTBA', 'DegRampe', 'FinBourr', 'DepTTXChan', 'Id' )->where('Date', '>=', $this->HIER20)
                                                                                                                       ->where('Date', '<', $this->AJD8)
                                                                                                                       ->get();
               $cpt=0;
               $valId = -1;
               $typeUser = -1;

               foreach ($data_tab_horaires_sds as $tab) {

                   if( ($tab->Id) === $valId ){

                       $resulat[$typeUser][$cpt][2]= $tab->Id;

                   }else {

                       $valId = $tab->Id;
                       $cpt = 0;

                       $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                       foreach ($fonction as $value) {
                           $fonction = $value->fonction;
                       }

                       if ( $fonction === 'Resp_consolidation_TBA'){
                           $typeUser = 0;
                       }elseif ($fonction === 'Resp_degarnissage') {
                           $typeUser = 4;
                       }elseif ($fonction === 'Resp_finitions') {
                           $typeUser = 7;
                       }elseif ($fonction === 'Resp_libération') {
                            $typeUser = 6;
                       }elseif ($fonction === 'Resp_nivel_complémentaire') {
                          $typeUser = 8;
                       }elseif ($fonction === 'Resp_prépa_coupe') {
                            $typeUser = 1;
                       }elseif ($fonction === 'Resp_prépa_deg') {
                          $typeUser = 2;
                       }elseif ($fonction === 'Resp_relevage') {
                          $typeUser = 5;
                       }elseif ($fonction === 'Resp_substitution') {
                          $typeUser = 3;
                       }

                       $resulat[$typeUser][$cpt][2]= $tab->Id;
                       $etatCompte[$typeUser] = 1 ;
                   }


                   $resulat[$typeUser][$cpt][0]= $tab->AutoTrav;
                   $resulat[$typeUser][$cpt][1]= $tab->ConsCatAMHT;
                   $resulat[$typeUser][$cpt][2]= $tab->DepInstSE;
                   $resulat[$typeUser][$cpt][3]= $tab->ATTX;
                   $resulat[$typeUser][$cpt][4]= $tab->EnginLieuTrav;
                   $resulat[$typeUser][$cpt][5]= $tab->DebTrav;
                   $resulat[$typeUser][$cpt][6]= $tab->AVC;
                   $resulat[$typeUser][$cpt][7]= $tab->FinTravCoupeRail;
                   $resulat[$typeUser][$cpt][8]= $tab->DerniereTBA;
                   $resulat[$typeUser][$cpt][9]= $tab->DegRampe;
                   $resulat[$typeUser][$cpt][10]= $tab->FinBourr;
                   $resulat[$typeUser][$cpt][11]= $tab->DepTTXChan;
                   $resulat[$typeUser][$cpt][12]= $tab->Id;

                }
                $cpt++;

            }elseif (($this->timeStream >= $this->AJD20) && ($this->timeStream < $this->DEM00) ){

              if ( ($this->timeStream >= $this->AJD00) && ($this->timeStream < $this->AJD20) ){
                $data_tab_horaires_sds = Tab_horaires_sd::select('AutoTrav', 'ConsCatAMHT', 'DepInstSE', 'ATTX', 'EnginLieuTrav', 'DebTrav', 'AVC', 'FinTravCoupeRail',
                                                             'DerniereTBA', 'DegRampe', 'FinBourr', 'DepTTXChan', 'Id' )->where('Date', '>=', $this->AJD20)
                                                                                                                        ->where('Date', '<', $this->DEM00)
                                                                                                                        ->get();
                 $cpt=0;
                 $valId = -1;
                 $typeUser = -1;

                 foreach ($data_tab_horaires_sds as $tab) {

                     if( ($tab->Id) === $valId ){

                         $resulat[$typeUser][$cpt][2]= $tab->Id;

                     }else {

                         $valId = $tab->Id;
                         $cpt = 0;

                         $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                         foreach ($fonction as $value) {
                             $fonction = $value->fonction;
                         }

                         if ( $fonction === 'Resp_consolidation_TBA'){
                             $typeUser = 0;
                         }elseif ($fonction === 'Resp_degarnissage') {
                             $typeUser = 4;
                         }elseif ($fonction === 'Resp_finitions') {
                             $typeUser = 7;
                         }elseif ($fonction === 'Resp_libération') {
                              $typeUser = 6;
                         }elseif ($fonction === 'Resp_nivel_complémentaire') {
                            $typeUser = 8;
                         }elseif ($fonction === 'Resp_prépa_coupe') {
                              $typeUser = 1;
                         }elseif ($fonction === 'Resp_prépa_deg') {
                            $typeUser = 2;
                         }elseif ($fonction === 'Resp_relevage') {
                            $typeUser = 5;
                         }elseif ($fonction === 'Resp_substitution') {
                            $typeUser = 3;
                         }

                         $resulat[$typeUser][$cpt][2]= $tab->Id;
                         $etatCompte[$typeUser] = 1 ;
                     }


                     $resulat[$typeUser][$cpt][0]= $tab->AutoTrav;
                     $resulat[$typeUser][$cpt][1]= $tab->ConsCatAMHT;
                     $resulat[$typeUser][$cpt][2]= $tab->DepInstSE;
                     $resulat[$typeUser][$cpt][3]= $tab->ATTX;
                     $resulat[$typeUser][$cpt][4]= $tab->EnginLieuTrav;
                     $resulat[$typeUser][$cpt][5]= $tab->DebTrav;
                     $resulat[$typeUser][$cpt][6]= $tab->AVC;
                     $resulat[$typeUser][$cpt][7]= $tab->FinTravCoupeRail;
                     $resulat[$typeUser][$cpt][8]= $tab->DerniereTBA;
                     $resulat[$typeUser][$cpt][9]= $tab->DegRampe;
                     $resulat[$typeUser][$cpt][10]= $tab->FinBourr;
                     $resulat[$typeUser][$cpt][11]= $tab->DepTTXChan;
                     $resulat[$typeUser][$cpt][12]= $tab->Id;

                     }
                     $cpt++;
                 }
            }

            $resulat[9] = $etatCompte;
            return $resulat;
        }

        public function show_data_tab_incidents($date){

          if($date === -1 ){
              $this->time_streaming();
          }else{
              $this->time_select($date);
          }

          $resulat = array(array(array()));
          $etatCompte = array();

          for($i=0; $i<9; $i++){
              $etatCompte[$i] = 0;
          }

          if ( ($this->timeStream >= $this->AJD00) && ($this->timeStream < $this->AJD20) ){
              $data_tab_wagon = Tab_incident::select('Accidents', 'Pannes', 'Autres', 'Date' ,'Id')->where('Date', '>=', $this->HIER20)
                                                                                                   ->where('Date', '<', $this->AJD8)
                                                                                                   ->get();
              $cpt=0;
              $valId = -1;
              $typeUser = -1;

              foreach ($data_tab_wagon as $tab) {

                  if( ($tab->Id) === $valId ){

                      $resulat[$typeUser][$cpt][4]= $tab->Id;

                  }else {

                      $valId = $tab->Id;
                      $cpt = 0;

                      $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                      foreach ($fonction as $value) {
                          $fonction = $value->fonction;
                      }

                      if ( $fonction === 'Resp_consolidation_TBA'){
                          $typeUser = 0;
                      }elseif ($fonction === 'Resp_degarnissage') {
                          $typeUser = 4;
                      }elseif ($fonction === 'Resp_finitions') {
                          $typeUser = 7;
                      }elseif ($fonction === 'Resp_libération') {
                          $typeUser = 6;
                      }elseif ($fonction === 'Resp_nivel_complémentaire') {
                          $typeUser = 8;
                      }elseif ($fonction === 'Resp_prépa_coupe') {
                          $typeUser = 1;
                      }elseif ($fonction === 'Resp_prépa_deg') {
                          $typeUser = 2;
                      }elseif ($fonction === 'Resp_relevage') {
                          $typeUser = 5;
                      }elseif ($fonction === 'Resp_substitution') {
                          $typeUser = 3;
                      }

                      $resulat[$typeUser][$cpt][4]= $tab->Id;
                      $etatCompte[$typeUser] = 1 ;
                  }

                  $resulat[$typeUser][$cpt][0]= $tab->Accidents;
                  $resulat[$typeUser][$cpt][1]= $tab->Pannes;
                  $resulat[$typeUser][$cpt][2]= $tab->Autres;
                  $resulat[$typeUser][$cpt][3]= $tab->Date;
                  $cpt++;
              }

          } elseif (($this->timeStream >= $this->AJD20) && ($this->timeStream < $this->DEM00) ){

              $data_tab_wagon = Tab_incident::select('Accidents', 'Pannes', 'Autres', 'Date' ,'Id')->where('Date', '>=', $this->AJD20)
                                                                                                   ->where('Date', '<', $this->DEM00)
                                                                                                   ->get();
               $cpt=0;
               $valId = -1;
               $typeUser = -1;

               foreach ($data_tab_wagon as $tab) {

                   if( ($tab->Id) === $valId ){

                       $resulat[$typeUser][$cpt][4]= $tab->Id;

                   }else {

                       $valId = $tab->Id;
                       $cpt = 0;

                       $fonction = User::select('fonction')->where('id', $tab->Id)->get();

                       foreach ($fonction as $value) {
                           $fonction = $value->fonction;
                       }

                       if ( $fonction === 'Resp_consolidation_TBA'){
                           $typeUser = 0;
                       }elseif ($fonction === 'Resp_degarnissage') {
                           $typeUser = 4;
                       }elseif ($fonction === 'Resp_finitions') {
                           $typeUser = 7;
                       }elseif ($fonction === 'Resp_libération') {
                           $typeUser = 6;
                       }elseif ($fonction === 'Resp_nivel_complémentaire') {
                           $typeUser = 8;
                       }elseif ($fonction === 'Resp_prépa_coupe') {
                           $typeUser = 1;
                       }elseif ($fonction === 'Resp_prépa_deg') {
                           $typeUser = 2;
                       }elseif ($fonction === 'Resp_relevage') {
                           $typeUser = 5;
                       }elseif ($fonction === 'Resp_substitution') {
                           $typeUser = 3;
                       }

                       $resulat[$typeUser][$cpt][4]= $tab->Id;
                       $etatCompte[$typeUser] = 1 ;
                   }

                   $resulat[$typeUser][$cpt][0]= $tab->Accidents;
                   $resulat[$typeUser][$cpt][1]= $tab->Pannes;
                   $resulat[$typeUser][$cpt][2]= $tab->Autres;
                   $resulat[$typeUser][$cpt][3]= $tab->Date;
                   $cpt++;
               }
          }

          $resulat[5] = $etatCompte;
          return $resulat;

        }


        public function get_historique_rapports()
        {
              $resulat = array(array());
              $listeDates = array();

              $dates = Tab_avancement::distinct()->get(['Date', 'Id']);

              $cpt = 0;
              foreach ($dates as $tab) {
                  $resulat[$cpt][0] = date($tab->Date);
                  $cpt++;
              }

              for($i = 0; $i<$cpt; $i++){
                  $i;
                  $save_date = $resulat[$i][0];

                  $resulat[$i][0] = date("H:i:s", strtotime($resulat[$i][0]));

                  if( $resulat[$i][0] >= date("20:00:00") && $resulat[$i][0] < date("23:59:59") ){
                        $listeDates[$i] = date("Y-m-d", strtotime($save_date)+43200);
                  } elseif( $resulat[$i][0] >= date("00:00:00") ){
                        $listeDates[$i] = date("Y-m-d", strtotime($save_date));
                  }
              }
              //$listeDates = array_unique($listeDates);
              return $listeDates;
        }

        /** AJOUT FONCTIONS **/

        public function get_users($id, $num) {

          $tabres = array();

          if($num == 0) {
            $requete = User::select('id','nom','prénom', 'fonction', 'email')->where('id', '!=', $id)
            ->where('Fonction', 'Conducteur_T')
            ->orderBy('nom')->get();
          } else {
            $requete = User::select('id','nom','prénom', 'fonction', 'email')->where('id', '!=', $id)
            ->where('fonction', 'Resp_substitution' )
            ->orWhere('fonction', 'Resp_finitions')
            ->orWhere('fonction', 'Resp_consolidation_TBA')
            ->orWhere('fonction', 'Resp_degarnissage')
            ->orWhere('fonction','Resp_prépa_coupe')
            ->orWhere('fonction', 'Resp_prépa_deg')
            ->orWhere('fonction', 'Resp_relevage')
            ->orWhere('fonction', 'Resp_nivel_complémentaire')
            ->orderBy('nom')->get();
          }

          return $requete;

        }


        public function destroy($id)
        {
          $this->getById($id)->delete();
        }

        /*** FONCTION QUE J'AI RAJOUTE ***/

        private function save(User $user, Array $inputs)
        {
          $user->nom = $inputs['nom'];
          $user->prénom = $inputs['prénom'];
          $user->email = $inputs['email'];
          $user->num_tel = $inputs['num_tel'];

          $user->save();
        }

        public function getById($id)
        {
          return $this->user->findOrFail($id);
        }

        public function update($id, Array $inputs)
        {
          $this->save($this->getById($id), $inputs);
        }

        public function getPaginate($n)
        {
          return $this->user->paginate($n);
        }
}
