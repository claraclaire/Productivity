<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalAppraisal extends Model
{
    protected $table = 'finalappraisal';
    protected $primaryKey = 'finalappraisalid';
    public $timestamps = true;
    protected $fillable = ['student_userid','company_userid','term','qualityofwork','quantityofwork','dependability','cooperation','personality','attendance','resourcefulness','managerialpotentials','comment','date','status'];
}
