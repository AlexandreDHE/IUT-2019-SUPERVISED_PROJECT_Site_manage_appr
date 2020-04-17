<?php

namespace App\Repositories;
/**
 *
 */
interface BD_transactionsInterface
{

    public function init();
    public function user_info($id);

    /* save */

    public function save_data_tab_avancements($id, $request, $type);
    public function save_data_tab_materiels($id , $request, $type);
    public function save_data_tab_wagons($id , $request, $type);
    public function save_data_tab_horaires_sds($id , $request, $type);
    public function save_data_tab_incidents($id , $request, $type);
    public function save_data_tab_interception($id , $request, $type);

    /* store */

    public function show_data_tab_avancements($date);
    public function show_data_tab_wagons($date);
    public function show_data_materiels($date);
    public function show_data_mat_calages($date);
    public function show_data_mat_tractions($date);
    public function show_data_tab_horaires_sds($date);
    public function show_data_tab_incidents($date);

    public function get_historique_rapports();

    /**AJOUT DES FONCTIONS **/

    public function get_users($id,$num);
    public function destroy($id);
    public function getById($id);
    public function getPaginate($n);

    public function update($id, Array $inputs);
}
