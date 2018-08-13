<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    //  config
    //nom de la base
    protected $connection = 'mysql';
    //table name
    protected $table = 'operations';
    //primary ley
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
