<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSite extends Model
{
    protected $table = 'appsites';
    protected $primaryKey = 'appsiteid';
    public $timestamps = true;
    protected $fillable = ['student_userid','appid','appsitename','date','startingtime','endtime'];

}
