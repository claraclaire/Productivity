<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'notifid';
    public $timestamps = true;
    protected $fillable = ['notif_from','sent_to','message','is_read','was_sent_at'];


 
    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
