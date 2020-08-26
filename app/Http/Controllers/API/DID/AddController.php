<?php

namespace App\Http\Controllers\API\DID;

use App\Events\DID\ConnectedEvent;
use App\Events\DID\IssuedEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function connected(string $connection_id){
        event(new ConnectedEvent($connection_id));
    }

    public function issued(string $connection_id){
        event(new IssuedEvent($connection_id));
    }
}
