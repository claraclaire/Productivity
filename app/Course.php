<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'courseid';
    public $timestamps = true;
    protected $fillable = [];
}