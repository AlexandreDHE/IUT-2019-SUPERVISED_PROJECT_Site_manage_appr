<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use App\Repositories\BD_transactions;

class Init_Controller extends Controller
{
    public function index(BD_transactions $bd_transactions)
    {
        $bd_transactions->init();
    }
}
