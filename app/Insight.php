<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{
    protected $table = 'insights';
    protected $primaryKey = 'insightid';
    public $timestamps = true;
    protected $fillable = ['student_userid','content','dateSubmitted','status'];
}
