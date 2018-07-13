<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    //  USELESS
    //table name
    protected $table = 'clients';
    //primary ley
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
