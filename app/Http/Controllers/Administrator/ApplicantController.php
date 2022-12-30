<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function showApplicantAssessment($applicant_id){
        
        $applicant = Applicant::where('id',$applicant_id)->get();
        return view('administrator.applicant-information',['applicant'=>$applicant]);
        
    }
}
