<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';
    protected $primaryKey = 'schoolid';
    public $timestamps = true;
    protected $fillable = [];
}
