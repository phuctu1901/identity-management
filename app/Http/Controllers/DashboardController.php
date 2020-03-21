<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
//        $data = Bot::paginate(10);
        return view('dashboard');
    }
}
