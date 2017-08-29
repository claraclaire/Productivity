<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
	protected $table = "coordinator";
    protected $primaryKey = 'coordinatorid';
    public $timestamps = true;
    protected $fillable = ['coordinatornumber','firstname','middlename','lastname','contact','about','schoolid','departid'];

    public function users()
    {
        return $this->hasOne('App\User','id','userid');
    }

    public function school()
    {
        return $this->hasOne('App\School','schoolid','schoolid');
    }

    public function department()
    {
        return $this->hasOne('App\Department','depID','departid');
    }

    // public function department()
    // {
    // 	return $this->hasOne('App\Department','departid','depID');
    // }

}
