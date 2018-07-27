<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    //  config
    //nom de la base
    protected $connection = 'mysql';
    //table name
    protected $table = 'clients';
    //primary ley
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
