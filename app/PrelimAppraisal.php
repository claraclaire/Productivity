<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrelimAppraisal extends Model
{
    protected $table = 'prelimappraisal';
    protected $primaryKey = 'prelimappraisalid';
    public $timestamps = true;
    protected $fillable = ['student_userid','company_userid','term','qualityofwork','quantityofwork','dependability','cooperation','personality','attendance','resourcefulness','managerialpotentials','comment','date','status'];
}
