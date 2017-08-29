<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorizeSite extends Model
{
    protected $table = 'categorizesites';
    protected $primaryKey = 'catsitesid';
    public $timestamps = true;
    protected $fillable = ['sitename','category','status'];
}
