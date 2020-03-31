<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DID extends Model
{
    protected $table='dids';
    protected $primaryKey = 'their_did'; // or null
    public $incrementing = false;
//    protected  $dates = 'dob';
    protected $dateFormat = 'd-m-Y';
    protected $fillable = ['code','their_did','isIssued', 'isRevoked','created_at','updated_at','cred_ex_id'];
}
