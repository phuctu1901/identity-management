<?php

namespace App\Http\Controllers\API\DID;

use App\Events\DID\ConnectedEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function connected(string $connection_id){
        event(new ConnectedEvent($connection_id));
    }
}
