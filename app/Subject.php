<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'subjectid';
    public $timestamps = true;
    protected $fillable = ['offercode','coursenumber','subjectdescription','days','time','room','dep_ID','status'];

    // public function department()
    // {
    // 	return $this->hasOne('App\Department','depID','dep_ID');
    // }

}
