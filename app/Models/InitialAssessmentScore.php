<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialAssessmentScore extends Model
{
    use HasFactory;

    public function applicant(){
        return $this->belongsTo(Applicant::class);
    }
    protected $fillable = [
        'qApplicationLetterScore',
        'qDataSheetScore',
        'qWorkExperienceScore',
        'qTrainingCertScore',
        'qCommendationScore',
        'qOtrScore',
        'qEmploymentCertScore',
        'qEligibilityScore',
        'qPerformanceEvalScore'
    ];
}
