<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class Init_Controller extends Controller
{
    public function index()
    {
        $user = new User;
        $user->create_by=0;
        $user->nom='Demonstration';
        $user->prénom='Une';
        $user->fonction='Direction';
        $user->email='demonstration@gmail.com';
        $user->num_tel='0600000000';
        $user->password='$10$lwJDftlb9/AQIYjd.ctlVOcGxNBxjkct0Ry3C35M5hopgyGjAesga';
        $user->save();

        return view('/auth/login');
    }
}
