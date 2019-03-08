<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BD_transactions;

use App\Http\Requests\UserUpdateRequest;

class ParamètresController extends Controller
{

  protected $param;
  protected $nbrPerPage;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(BD_transactions $param)
  {
      $this->middleware('auth');
      $this->bd_transactions = $param;
  }



  public function index(BD_transactions $bd_transactions)
  {
    $id = Auth::id();
    $profil = array();
    $profil = $bd_transactions->user_info($id);
    $users = array();
    //$users = $bd_transactions->get_users($id);
    $userscond = $bd_transactions->get_users($id,0);
    $usersresp = $bd_transactions->get_users($id,1);
    $users = $this->bd_transactions->getPaginate($this->nbrPerPage);
    $links = $users->render();

      return view('Comptes/Directions_Conducteurs_Home/Paramètres/config')
      ->with('profil', $profil)
      -> with('userscond', $userscond)
      ->with('usersresp', $usersresp);

  }

  public function show($id)
{
  $user = $this->bd_transactions->getById($id);
  $profil = $this->bd_transactions->user_info($id);

  return view('Comptes/Directions_Conducteurs_Home/Paramètres/config_user_info',  compact('user'))
  ->with('profil', $profil);
}

public function edit($id)
{

  $user = $this->bd_transactions->getById($id);
  $profil = $this->bd_transactions->user_info($id);
  return view('Comptes/Directions_Conducteurs_Home/Paramètres/config_user_maj',  compact('user'))
  ->with('profil', $profil);
}

public function update(UserUpdateRequest $request, $id)
{
  $this->bd_transactions->update($id, $request->all());
  return redirect('home/paramètres')->withOk("L'utilisateur " . $request->input('nom') . " a été modifié.");
}


    public function destroy($id)
  {
      $this->bd_transactions->destroy($id);

  	  return redirect()->back();
  }
}
