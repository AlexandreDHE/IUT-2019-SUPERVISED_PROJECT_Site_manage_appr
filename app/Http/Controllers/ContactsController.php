<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Repositories\BD_transactions;


class ContactsController extends Controller
{
    public function index(BD_transactions $bd_transactions) {
      $id = Auth::id();
      $profil = $bd_transactions->user_info($id);
      $users = array();
      $users = User::all()->where('id', '!=', $id);

      return view('Comptes/Directions_Conducteurs_Home/contacts')->with('profil',$profil)
                                                                 ->with('users', $users);
    }
}
