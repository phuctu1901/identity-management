<?php

namespace App\Http\Controllers\API\DID;

use App\Connection;
use App\Events\DID\ConnectionCreatedEvent;
use App\Events\DID\ConnectionResponsedEvent;
use App\Events\DID\IssuedCredentialEvent;
use App\Events\DID\OfferSentEvent;
use App\Events\DID\RequestReceivedEvent;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public $connectionController;
    public function __construct(ConnectionController $connectionController)
    {
        $this->connectionController = $connectionController;
    }

    public function createdConnection(string $connection_id){
        $data= $this->connectionController->getConnection($connection_id);
        event(new ConnectionCreatedEvent($connection_id));
    }


    public function responsedConnection(string $connection_id){
        $data= $this->connectionController->getConnection($connection_id);
        event(new ConnectionResponsedEvent($connection_id));

    }

    public function issuedCredential(string $connection_id){
        event(new IssuedCredentialEvent($connection_id));
    }

    public function receivedRequest(string $connection_id){
        event(new RequestReceivedEvent($connection_id));
    }

    public  function sentOffer(string $connection_id){
        event(new OfferSentEvent($connection_id));
    }
}
