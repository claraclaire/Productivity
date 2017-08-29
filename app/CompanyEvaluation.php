<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyEvaluation extends Model
{
    protected $table = 'companyevaluation';
    protected $primaryKey = 'compevalid';
    public $timestamps = true;
    protected $fillable = ['company_userid','student_userid','immediate_superior','iscomment','co_worker','cwcomment','workplace','wpcomment','opportunities','ocomment','tasks_assigned','tacomment','overall_experience','oecomment','greatest_benefits','biggest_problems','suggest_improvement','recommend_company','date','status'];

    public function company()
    {
    	return $this->hasOne('App\Company','userid','company_userid');
    }
}
