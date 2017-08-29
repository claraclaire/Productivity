<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'companyid';
    public $timestamps = true;
    protected $fillable = ['companyname','address','contact','description','repfirstname','repmiddlename','replastname','position'];

    // public function supervisor()
    // {
    // 	return $this->hasMany('App\Supervisor','company_userid','userid');
    // }

}
