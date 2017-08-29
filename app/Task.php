<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected $table = 'tasks';
    protected $primaryKey = 'taskid';
    public $timestamps = true;
    protected $fillable = [];

    public function natureofwork()
    {
    	return $this->hasOne('App\NatureofWorks','natureid','natureid');
    }
}
