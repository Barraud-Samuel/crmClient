<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientUser extends Model
{
    //  USELESS
    //table name
    protected $table = 'client_user';
    //primary ley
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
