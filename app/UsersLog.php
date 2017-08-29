<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersLog extends Model
{
    protected $table = 'userslog';
    protected $primaryKey = 'logid';
    public $timestamps = true;
    protected $fillable = ['users_userid','logindate','logintime','logouttime','isholiday']; 





}
