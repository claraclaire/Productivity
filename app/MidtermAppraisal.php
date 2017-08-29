<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MidtermAppraisal extends Model
{
    protected $table = 'midtermappraisal';
    protected $primaryKey = 'midtermappraisalid';
    public $timestamps = true;
    protected $fillable = ['student_userid','company_userid','term','qualityofwork','quantityofwork','dependability','cooperation','personality','attendance','resourcefulness','managerialpotentials','comment','date','status'];
}
