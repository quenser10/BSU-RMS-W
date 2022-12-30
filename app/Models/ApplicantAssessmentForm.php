<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantAssessmentForm extends Model
{
    use HasFactory;

    public function applicant(){
        return $this->belongsTo(Applicant::class);
    }
    protected $fillable = [
        'education',
        'experience',
        'performance_evaluation',
        'training',
        'eligibility',
        'outstanding_accomplishment',
    ];
}
