<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRooster extends Model
{
    protected $table = 'classrooster';
    protected $primaryKey = 'classroosterid';
    public $timestamps = true;
    protected $fillable = [];
}
