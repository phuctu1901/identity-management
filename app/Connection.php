<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $table = 'connections';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id',
                            'invitation_key',
                            'invitation_mode',
                            'initiator',
                            'their_label',
                            'my_did',
                            'their_did',
                            'routing_state',
                            'state',
                            'accept',
                            'created_at',
                            'updated_at'
                        ];
}
