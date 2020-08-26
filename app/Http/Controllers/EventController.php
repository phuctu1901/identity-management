<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    function index()
    {
//        $data = Bot::paginate(10);
        return view('home.events');
    }
}
