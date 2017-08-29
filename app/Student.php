<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'studentid';
    public $timestamps = true;
    protected $fillable = ['hiredinternsid','studentnumber','firstname','middlename','lastname','phonenumber','dateofbirth','gender','address','civilStatus','citizenship','religion','fathersName','mothersName','schoolid','departid','courseid','yearLevel'];


     public function users()
    {
        return $this->hasOne('App\User','id','userid');
    }

    public function hiredintern()
    {
    	return $this->hasOne('App\HiredIntern','student_userid','userid');
    }

    public function school()
    {
        return $this->hasOne('App\School','schoolid','schoolid');
    }

    public function department()
    {
        return $this->hasOne('App\Department','depID','departid');
    }
}
