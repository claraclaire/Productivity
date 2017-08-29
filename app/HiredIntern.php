<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HiredIntern extends Model
{
    protected $table = 'hiredinterns';
    protected $primaryKey = 'hiredinternsid';
    public $timestamps = true;
    protected $fillable = ['company_userid','student_userid','start','end','hoursRendered','workstatus'];

    public function student()
    {
    	return $this->hasOne('App\Student','userid','student_userid');
    }
    

    public function company()
    {
    	return $this->hasOne('App\Company','userid','company_userid');
    }
}
