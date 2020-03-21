<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $table='citizens';
    protected $primaryKey = 'code'; // or null
    public $incrementing = false;
//    protected  $dates = 'dob';
    protected $dateFormat = 'd-m-Y';
//    protected $fillable = ['title', 'address','action_day', 'investment','current', 'lat', 'lng','isActive', 'count'];
}
