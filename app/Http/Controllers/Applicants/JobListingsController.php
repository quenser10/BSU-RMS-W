<?php

namespace App\Http\Controllers\applicants;

use App\Models\User;
use App\Models\Applicant;
use App\Models\OpenedJob;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Prequalification;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class JobListingsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }
    
    public function showJobOffers(){

        $userId = auth()->id();
        $userData = User::where('id', $userId)->first();
       
        return view('applicants.job-offers' , [
            'openedJob' =>  OpenedJob::where('to_close',0)->latest()->filter(request(['search']))->paginate(9), //gets sorted by the latest first
             
        ],compact('userData'));
    }

    public function showContactUs(){
       
        return view('applicants.contact-us' , [
            
        ]);
    }

    public function showJobApplication(OpenedJob $openedJob){

        //$users = User::all();
        $userId = auth()->id();
        $applicant = Applicant::where('user_id', $userId)->get();
    
        if(auth()->check()){
            //return view('applicants.job-application', ['openedJob' => $openedJob]);
            return view('applicants.job-application', [
                'openedJob' => $openedJob,
                'userId' => $userId,
                'applicant' => $applicant

            ]);
        }else{
            return view('components.applicant-side.modals.login');
        }
        
    }

    public function jobDescription($job_id){
       //dd($job_id);
        return (OpenedJob::findOrFail($job_id));
    }

    public function viewApplicant($id){
        //dd($job_id);
         return (Applicant::findOrFail($id));
     }

    public function showAccessDenied(){
       
        return view('access-denied');
    
    }

    public function storeApplication(Request $request, $userId){

        //$id = IdGenerator::generate(['table' => 'applicants', 'length' => 20, 'prefix' =>date('y')]);
        
        $formFields = $request->validate([
            
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'extension' => 'nullable',
            'sex' => 'required',
            'email' => ['required', 'email', Rule::unique('applicants', 'email')],
            'address' => 'required',
            'mobile_number' => 'required',
            'birthday' => 'required',
            'marital_status' => 'required',
            'disability' => 'required',
            'country' => 'required',

            'applying_for' => 'required',
            'college_course' => 'nullable',
            'educational_attainment' => 'required',
            'school_graduated' => 'required',
            'year_last_attended' => 'required',
            'previously_applied' => 'required',
            'job_discovery' => 'required',

            'application_letter' => 'required',
            'pds' => 'required',
            'work_experience' => 'nullable',
            'otr' => 'nullable',
            'employment_certificates' => 'nullable',
            'eligibility' => 'nullable',
            'training_certificates' => 'nullable',
            'performance_evaluation' => 'nullable',
            'commendation' => 'nullable',
            'certify' =>'required'
            
        ]);
        //dd($formFields);
        if($formFields){

            $applicant = new Applicant();

            $applicationLetter = $request->application_letter;
            $applicationLetterFileName = time().'.'.$applicationLetter->getClientOriginalExtension();
            $request->application_letter->move('assets', $applicationLetterFileName);

            
            $pds = $request->pds;
            $pdsFileName = time().'.'.$pds->getClientOriginalExtension();
            $request->pds->move('assets', $pdsFileName);

            
            $workExperience = $request->work_experience ?? '';
            if($workExperience != ''){
                $workExperienceFileName = time().'.'.$workExperience->getClientOriginalExtension();
                $request->work_experience->move('assets', $workExperienceFileName);
                $applicant->work_experience = $workExperienceFileName;
            }

            
            $otr = $request->otr ?? '';
            if($request->otr != ''){
                $otrFileName = time().'.'.$otr->getClientOriginalExtension();
                $request->otr->move('assets', $otrFileName);
                $applicant->otr = $otrFileName;
            }
            
            $employmentCertificate = $request->employment_certificates ?? '';
            if($request->employment_certificates != ''){
                $employmentCertificateFileName = time().'.'.$employmentCertificate->getClientOriginalExtension();
                $request->employment_certificates->move('assets', $employmentCertificateFileName);

                $applicant->employment_certificates = $employmentCertificateFileName;
            }
            
            $eligibility = $request->eligibility ?? '';
            if($request->eligibility != ''){
                $eligibilityFileName = time().'.'.$eligibility->getClientOriginalExtension();
                $request->eligibility->move('assets', $eligibilityFileName);

                $applicant->eligibility = $eligibilityFileName;
            }
            
            $trainingCertificates = $request->training_certificates ?? '';
            if($request->training_certificates != ''){
                $trainingCertificatesFileName = time().'.'.$trainingCertificates->getClientOriginalExtension();
                $request->training_certificates->move('assets', $trainingCertificatesFileName);

                $applicant->training_certificates = $trainingCertificatesFileName;
            }
            
            $performanceEvaluation = $request->performance_evaluation ?? '';
            if($request->performance_evaluation != ''){
                $performanceEvaluationFileName = time().'.'.$performanceEvaluation->getClientOriginalExtension();
                $request->performance_evaluation->move('assets', $performanceEvaluationFileName);

                $applicant->performance_evaluation = $performanceEvaluationFileName;
            }
            
            $commendation = $request->commendation ?? '';
            if($request->commendation != ''){
                $commendationFileName = time().'.'.$commendation->getClientOriginalExtension();
                $request->commendation->move('assets', $commendationFileName);

                $applicant->commendation = $commendationFileName;
            }
            $applicant->user_id = $userId;
            $applicant->first_name = $request->first_name;
            $applicant->middle_name = $request->middle_name;
            $applicant->last_name = $request->last_name;
            $applicant->extension = $request->extension;
            $applicant->sex = $request->sex;
            $applicant->marital_status = $request->marital_status;
            $applicant->disability = $request->disability;
            $applicant->country = $request->country;
            $applicant->email = $request->email;
            $applicant->address = $request->address;
            $applicant->mobile_number = $request->mobile_number;
            $applicant->birthday = $request->birthday;

            $applicant->applying_for = $request->applying_for;
            $applicant->college_course = $request->college_course;
            $applicant->educational_attainment = $request->educational_attainment;
            $applicant->school_graduated = $request->school_graduated;
            $applicant->year_last_attended = $request->year_last_attended;
            $applicant->previously_applied = $request->previously_applied;
            $applicant->job_discovery = $request->job_discovery;

            $applicant->application_letter = $applicationLetterFileName;
            $applicant->pds = $pdsFileName;

            $applicant->status = 'new';

            $applicant->save();

            return redirect('/my-application')->with('message', 'Congratulations! Application Submitted Successfully.');
        }
        
    }

    public function contactUs(){
        return view('applicants.contact-us');
    }

    public function transparencySeal(){
        return view('applicants.transparency-seal');
    }

    public function myApplication(){

        $userId = auth()->id();
        
        $userData = User::where('id', $userId)->first();
        
        $data = $userData->userApplicant->applying_for ?? '';

        $job = OpenedJob::where('job_title', $data)->first();   

        return view('applicants.my-application',compact('userData','job'));
    }

    //Applicant confirm before submitting to avoid misclicks

    public function passwordReset(){

        return view('auth.forgot-password');
        
    }

    public function postApplicantProfileEdit(Request $request, $applicant_id){

        $applicant = Applicant::where('id', $applicant_id)->first();
        $applicant->first_name = $request->firstName;
        $applicant->last_name = $request->lastName;
        $applicant->middle_name = $request->middleName; 
        $applicant->extension = $request->extName;
        $applicant->birthday = $request->birthday;
        $applicant->mobile_number = $request->mobileNumber;
        $applicant->marital_status = $request->maritalStatus;
        $applicant->email = $request->email;
        $applicant->sex = $request->sex;
        $applicant->disability = $request->disability;
        $applicant->address = $request->address;
        $applicant->country = $request->country;
        // $applicant->applying_for = $request->applyingFor;
        $applicant->educational_attainment = $request->education;
        $applicant->college_course = $request->course;
        $applicant->school_graduated = $request->schoolGraduated;
        $applicant->year_last_attended = $request->year;
        $applicant->job_discovery = $request->jobDiscovery;
        $applicant->previously_applied = $request->previouslyApplied;
        
        if($request->applicationLetter != null){
            
            $applicationLetter = $request->applicationLetter;
            
            $applicationLetterFileName = time().'.'.$applicationLetter->getClientOriginalExtension();
            
            $request->applicationLetter->move('assets', $applicationLetterFileName);
            
            $applicant->application_letter = $applicationLetterFileName;
        }
        
        if($request->pds != null){
            $pds = $request->pds;
            $pdsFileName = time().'.'.$pds->getClientOriginalExtension();
            $request->pds->move('assets', $pdsFileName);

            $applicant->pds = $request->$pdsFileName;
        }

        if($request->workExperience != null){
            $workExperience = $request->workExperience;
            $workExperienceFileName = time().'.'.$workExperience->getClientOriginalExtension();
            $request->workExperience->move('assets', $workExperienceFileName);

            $applicant->work_experience = $workExperienceFileName;
        }

        if($request->otr != null){
            $otr = $request->otr;
            $otrFileName = time().'.'.$otr->getClientOriginalExtension();
            $request->otr->move('assets', $otrFileName);

            $applicant->otr = $otrFileName;
        }

        if($request->employmentCertificates != null){
            $employmentCertificates = $request->employmentCertificates;
            $employmentCertificatesFileName = time().'.'.$employmentCertificates->getClientOriginalExtension();
            $request->employmentCertificates->move('assets', $employmentCertificatesFileName);

            $applicant->employment_certificates = $employmentCertificatesFileName;
        }

        if($request->trainingCertificates != null){
            $trainingCertificates = $request->trainingCertificates;
            $trainingCertificatesFileName = time().'.'.$trainingCertificates->getClientOriginalExtension();
            $request->trainingCertificates->move('assets', $trainingCertificatesFileName);

            $applicant->training_certificates = $trainingCertificatesFileName;
        }

        if($request->eligibility != null){
            $eligibility = $request->eligibility;
            $eligibilityFileName = time().'.'.$eligibility->getClientOriginalExtension();
            $request->eligibility->move('assets', $eligibilityFileName);

            $applicant->eligibility = $eligibilityFileName;
        }

        if($request->performanceEvaluation != null){
            $performanceEvaluation = $request->performanceEvaluation;
            $performanceEvaluationFileName = time().'.'.$performanceEvaluation->getClientOriginalExtension();
            $request->performanceEvaluation->move('assets', $performanceEvaluationFileName);

            $applicant->performance_evaluation = $performanceEvaluationFileName;
        }

        if($request->commendation != null){
            $commendation = $request->commendation;
            $commendationFileName = time().'.'.$commendation->getClientOriginalExtension();
            $request->commendation->move('assets', $commendationFileName);

            $applicant->commendation = $commendationFileName;
        }

        $applicant->update();

        return redirect('/my-application')->with('message', 'Successfully Updated Your Application!');
    }
    
}
