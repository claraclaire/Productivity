<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'journal';
    protected $primaryKey = 'journalid';
    public $timestamps = true;
    protected $fillable = ['student_userid','entry','date','start','end','softwaredevelopment','softwaretesting','research','technicalsupport','clericaltasks','errands','totalHours','dateSubmitted','validation','isholiday','status'];

    //  public function nature()
    // {
    // 	return $this->hasMany('App\NatureSummary','journalid','hiredinternsid');
    // }

}
