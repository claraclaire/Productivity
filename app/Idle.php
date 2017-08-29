<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idle extends Model
{
    protected $table = 'idle';
    protected $primaryKey = 'idleid';
    public $timestamps = true;
    protected $fillable = [];
}
