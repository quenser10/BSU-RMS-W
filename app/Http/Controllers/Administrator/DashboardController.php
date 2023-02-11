<?php

namespace App\Http\Controllers\administrator;


use Config;
use App\Models\User;
use App\Models\Audits;
use App\Models\AdminLog;
use App\Models\Applicant;
use App\Models\OpenedJob;
use Ramsey\Uuid\Guid\Guid;
use App\Mail\MailApplicant;
use App\Models\AdminAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Validation\Rule;
use PhpOffice\PhpWord\Settings;
use App\Models\Prequalification;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Models\ApplicantAssessmentForm;
use App\Models\InitialAssessmentScore;
use Illuminate\Support\Facades\Artisan;
use OwenIt\Auditing\Contracts\Auditable;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Validator;
use Database\Seeders\ApplicantAccountSeeder;
use PhpOffice\PhpWord\Metadata\Compatibility;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;
use \Mpdf\Mpdf;

class DashboardController extends Controller
{
    public function dashboard(){
        $applicants = Applicant::where('status','new')->latest()->limit(7)->get();

        $countApplicants = Applicant::where('status','new')->count();
        $countJobs = OpenedJob::where('to_close', 0)->count();
        $countClosedJobs = OpenedJob::where('to_close', '1')->count();
        $jobs = OpenedJob::where('to_close','0')->latest()->limit(7)->get();

        $qualifiedApplicants = Applicant::where('status','=','qualified')->get()->count();
        $disqualifiedApplicants = Applicant::where('status','=','disqualified')->get()->count();

        $data=Applicant::select('id','created_at')->orderBy(Applicant::raw('MONTH(created_at)'))->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        // dd($data);
        $years = Applicant::pluck('created_at')->map(function ($date) {
            return Carbon::parse($date)->year;
        });

        $uniqueYears = $years->unique();

        $months = [];
        $monthCount = []; 
    
        foreach($data as $month => $values){
            $months[] = $month;
            $monthCount[]=count($values);
        }

        $fMonthCount = null;
        $fMonths = null;

        return view('administrator.dashboard', compact('applicants','jobs','countApplicants','countJobs','countClosedJobs','months','monthCount','uniqueYears', 'fMonthCount', 'fMonths', 'qualifiedApplicants','disqualifiedApplicants'));
    }

    public function yearFilter(Request $request){

        $year = $request->input('yearSelect');

        if($year == "allYear"){
            $data=Applicant::select('id','created_at')->orderBy(Applicant::raw('MONTH(created_at)'))->get()->groupBy(function($data){
                return Carbon::parse($data->created_at)->format('M');
            });

            $months = [];
            $monthCount = []; 
        
            foreach($data as $month => $values){
                $months[] = $month;
                $monthCount[]=count($values);
            }
            return response()->json(['months' => $months, 'monthCount' => $monthCount]);
        }
        else if($year != null && $request->itemNumberSearch != null){

            $itemNum = $request->input('itemNumberSearch');

            $jobT = OpenedJob::where('item_number', '=', $itemNum);
            $da= $jobT->pluck('job_title');
            // $applicants = Applicant::where('applying_for', '=', $jobTitle)->get();

            $data=DB::table('applicants') //FIX QUERY IT IS NOT GETTING WHAT IT SHOULD GET
                //
                ->where('applying_for', '=', 'sint sint doloremq') 
                 ->whereYear('created_at', '=', $year)
                ->orderBy(Applicant::raw('MONTH(created_at)'))
                ->get()
                ->groupBy(function($data){
                    return Carbon::parse($data->created_at)->format('M');
            });

                $months = [];
                $monthCount = []; 
            
                foreach($data as $month => $values){
                    $months[] = $month;
                    $monthCount[]=count($values);
                }
    
            return response()->json(['months' => $months, 'monthCount' => $monthCount]);
        }
        
        else if($year != null){
            $data=Applicant::whereYear('created_at', '=', $year)->orderBy(Applicant::raw('MONTH(created_at)'))->get()->groupBy(function($data){
                return Carbon::parse($data->created_at)->format('M');
            });
    
            $months = [];
            $monthCount = []; 
        
            foreach($data as $month => $values){
                $months[] = $month;
                $monthCount[]=count($values);
            }
    
            return response()->json(['months' => $months, 'monthCount' => $monthCount]);
        }
    }

    public function qualificationFilter(Request $request){
        $searchFilter = $request->input('qualificationSearch');
        $yearFilter = $request->input('qualificationYearSelect');

        if($yearFilter == 'allYear' && $searchFilter == null){
            $qualifiedApplicants = Applicant::where('status','=','qualified')->count();
            $disqualifiedApplicants = Applicant::where('status','=','disqualified')->count();

            return response()->json(['qualifiedApplicants' => $qualifiedApplicants, 'disqualifiedApplicants' => $disqualifiedApplicants]);
        }
        else if($yearFilter == 'allYear' && $searchFilter != null ){
            
            $qualifiedApplicants = DB::table('applicants')->where([['status','qualified'],['applying_for',$searchFilter]])->count();
            $disqualifiedApplicants = DB::table('applicants')->where([['status','disqualified'],['applying_for',$searchFilter]])->count();
            
            return response()->json(['qualifiedApplicants' => $qualifiedApplicants, 'disqualifiedApplicants' => $disqualifiedApplicants]);
        }
        else if($yearFilter != null && $searchFilter == null){

            $qualifiedApplicants = Applicant::where('status','=','qualified')->whereYear('created_at','=',$yearFilter)->count();
            $disqualifiedApplicants = Applicant::where('status','=','disqualified')->whereYear('created_at','=',$yearFilter)->count();

            return response()->json(['qualifiedApplicants' => $qualifiedApplicants, 'disqualifiedApplicants' => $disqualifiedApplicants]);
        }
        
        else if($yearFilter && $searchFilter ){

            $qualifiedApplicants = Applicant::where([['status','=','qualified'], ['applying_for', '=', $searchFilter]])->whereYear('created_at','=',$yearFilter)->get()->count();
            $disqualifiedApplicants = Applicant::where([['status','=','disqualified'], ['applying_for', '=', $searchFilter]])->whereYear('created_at','=',$yearFilter)->get()->count();

            return response()->json(['qualifiedApplicants' => $qualifiedApplicants, 'disqualifiedApplicants' => $disqualifiedApplicants]);
        }   
    }

    public function editWebPage(){
        $model = DB::table('opened_jobs')->first();
        $toClose = DB::table('opened_jobs')->pluck('to_close'); 
        $closingDate = DB::table('opened_jobs')->pluck('closing_date');
        $dateToday = Carbon::now();
        
        $a=0; 
        foreach($closingDate as $date){ 
            if($dateToday->toDateString()== $date){
                //Get job_id column
                // $jobId = OpenedJob::where('closing_date', $date)->pluck('job_id');
                $jobId = DB::table('opened_jobs')->pluck('job_id');
                //Update to_close column to 1
                DB::table('opened_jobs')
                    ->where('job_id', $jobId[$a]) //i am gettng the job_id of index $variable
                    ->update([
                    'to_close'=> 1
                ]);         
            }
            $a+=1; 
        }
        $a=0;

        $count = OpenedJob::where('to_close','=','1')->count();
                
        $serve = OpenedJob::all();
        
        return view('administrator.job-management', compact('serve'), compact('count'));
       
    }

    // public function showJobManagement(){

    //     $model = DB::table('opened_jobs')->first();
    //     $toClose = DB::table('opened_jobs')->pluck('to_close'); 
    //     $closingDate = DB::table('opened_jobs')->pluck('closing_date');
    //     $dateToday = Carbon::now();
        
    //     $a=0; 
    //     foreach($closingDate as $date){ 
    //         if($dateToday->toDateString()== $date){
    //             //Get job_id column
    //             // $jobId = OpenedJob::where('closing_date', $date)->pluck('job_id');
    //             $jobId = DB::table('opened_jobs')->pluck('job_id');
    //             //Update to_close column to 1
    //             DB::table('opened_jobs')
    //                 ->where('job_id', $jobId[$a]) //i am gettng the job_id of index $variable
    //                 ->update([
    //                 'to_close'=> 1
    //             ]);         
    //         }
    //         $a+=1; 
    //     }
    //     $a=0;

    //     $count = OpenedJob::where('to_close','=','1')->count();
                
    //     $serve = OpenedJob::all();
        
    //     return view('administrator.job-management', compact('serve'), compact('count'));
    // }

    public function getOpenedJobs(){

        $jobs = OpenedJob::all();

        return view('administrator.opened-jobs',compact('jobs'));
    }

    public function getOpenJob(){

        return view('administrator.open-a-job');
    }
    public function getClosedJobs(){

        $jobs = OpenedJob::all();

        return view('administrator.closed-jobs',compact('jobs'));
    }

    public function showMasterlist(Request $request){     

        $users = Applicant::all();
        $openedJobs = OpenedJob::all();
        $yearData = OpenedJob::whereYear('created_at', '=', 2022)->get();

        

        if($request->from_date != null){
            $users = Applicant::whereBetween('created_at', [$request->get('from_date'), $request->get('to_date')])->get();
            
            return view('administrator.masterlist', compact('users','openedJobs','yearData'));
        }

        
        return view('administrator.masterlist', compact('users','openedJobs','yearData'));

        
    }

    public function showApplicantTracking(){
        //$openedJobs = OpenedJob::all();
        $applicants = Applicant::all();

        $applicantColumn = DB::table('applicants')->pluck('applying_for');
        $uniqueJobs = $applicantColumn->unique();

        //d($uniqueJobs);

        $qualifiedApplicants = Applicant::where('status','qualified')->get();
        $disqualifiedApplicants = Applicant::where('status','disqualified')->get();
        return view('administrator.applicant-tracking', compact('qualifiedApplicants','disqualifiedApplicants','uniqueJobs'));
    }

    public function showBackupDatabase(){
        $statuses = BackupDestinationStatusFactory::createForMonitorConfig(config('backup.monitor_backups'));
        
        $info = [];
        foreach ($statuses as $status) {
            $destination = $status->backupDestination();
            $backups = $destination->backups();
            $destInfo = [
                'name' => $destination->backupName(),
                'disk' => $destination->diskName(),
                'storageType' => $destination->filesystemType(),
                'reachable' => $destination->isReachable(),
                'healthy' => $status->isHealthy(),
                'count' => $backups->count(),
                'storageSpace' => $destination->usedStorage(),
                'backups' => [],
            ];
            foreach ($backups as $backup) {
                $destInfo['backups'][] = [
                    'path' => $backup->path(),
                    'date' => $backup->date(),
                    'size' => $backup->sizeInBytes(),
                ];
            }

            $info[] = $destInfo;

            // dd($info);
        }
        return view('administrator.backup-database', ['info' => $info]);
    }
    public function showRestoreDatabase(){
        return view('administrator.restore-database');
    }

    public function showInitialAssessment(){
        $applicants = Applicant::latest()->get();
        return view('administrator.initial-assessment', compact('applicants'));
    }

    public function showComparativeForm($applicant_id){
        $applicants = Applicant::where('id',$applicant_id)->get();
        
        return view('administrator.comparative-form', compact('applicants'));
    }

    public function adminManagementPage(){

        $admins = AdminAccount::all();
        session()->regenerate();
        return view('administrator.admin-management', compact('admins'));
    }
    public function editAdmin(Request $request, $id){

        $admin = AdminAccount::where('id', $id)->get();

        return view('administrator.edit-admin', compact('admin'));
    }
    public function updateAdmin(Request $request, $id){

        $data  = AdminAccount::where('id', $id)->first();

        $validated = $request->validate([
            'lastName' => 'required',
            'firstName' => 'required',
            'middleName' => 'nullable',
            'extensionName' => 'nullable',
            'sex' => 'required',
            'employeeId' => 'required',
            'email' => 'required',
            'officeDesignation' => 'required',
            'password' => 'nullable|min:8'
        ]);
        if($validated){
            $data->last_name = $request->lastName;
            $data->first_name = $request->firstName;
            $data->middle_name = $request->middleName;
            $data->extension_name = $request->extensionName;
            $data->sex = $request->sex;
            $data->employee_id = $request->employeeId;
            $data->email = $request->email;
            $data->office_designation = $request->officeDesignation;
            $data->approved = $request->approved;
            $data->password = bcrypt($request->password);
            $data->save();
        }

        return redirect('/admin/admin-management')->with('message', 'Success! Admin edited.');
    }
    

    public function applicantQualify(Request $request, $applicant_id){

        $applicants = Applicant::all();

            Applicant::where('id', $applicant_id)->update(['status' => "qualified"]);

                $applicant = Applicant::where('id',$applicant_id)->first();

                $fullname = $applicant->first_name. " " .$applicant->last_name;

                $jobDescription = OpenedJob::where('job_title', $applicant->applying_for)->first();

                $prequalification = new Prequalification;
                $prequalification->applicant_id = $applicant->id;
                $prequalification->first_name = $applicant->first_name;
                $prequalification->last_name = $applicant->last_name;
                $prequalification->applying_for = $applicant->applying_for;
                $prequalification->evaluation = 'qualified';
                $prequalification->reason_for_disqualification = '';
                $prequalification->remarks = $request->remarks ?? '';
                $prequalification->additional_details = $applicant->additional_details ?? '';
                $prequalification->pertinent_conditions = $applicant->pertinent_conditions ?? '';
                $prequalification->save();
                
                $initialAssessmentScore = new InitialAssessmentScore;
                $initialAssessmentScore->applicant_id = $applicant->id;
                $initialAssessmentScore->education = $request->qEducationScore;
                $initialAssessmentScore->experience = $request->qExperienceScore;
                $initialAssessmentScore->performance_evaluation = $request->qPerformanceEvalScore;
                $initialAssessmentScore->training = $request->qTrainingScore;
                $initialAssessmentScore->eligibility = $request->qEligibilityScore;
                $initialAssessmentScore->outstanding_accomplishment = $request->qAccomplishmentScore;
                $initialAssessmentScore->total_score = $request->qTotalScore;
                $initialAssessmentScore->save();

                //Send Email *****
                $files = [
                    
                ];
                $details = [
                    'title' => 'Job Applicant Feedback Form',
                    "first" =>"Dear Mr./Ms. " . ucwords($fullname) .",",
                    "second" =>"Thank you for your application for the " . ucwords($jobDescription->job_title) . ".",
                    "third" => " We are glad to inform you that you have passed the PRE-QUALIFICATION stage of our process, be advised that this is only for PRE-QUALIFICATION we will notify you again soon for further processes.",
                    "fourth" => "We wish you every personal and professional success in your future endeavors."
                    
                    ,
                    'files' => $files
                ];

                Mail::to($applicant->email)->send(new MailApplicant($details));
                

        return redirect('/applicant-tracking')
            ->with('message', 'Success! Applicant qualified')
            ->with('applicants', $applicants);

    }

    public function pdf($applicant_id){
        $applicants = Applicant::where('applicant_id', $applicant_id)->get();
        return view('administrator.assessment-pdf',compact('applicants'));
    }

    public function applicantDisqualify(Request $request, $applicant_id){
        $applicants = Applicant::all();
        
                Applicant::where('id', $applicant_id)
                    ->update([
                        'status' => "disqualified"
                    ]);
                    
                $applicant = Applicant::where('id',$applicant_id)->first();

                $prequalification = new Prequalification;
                $prequalification->applicant_id = $applicant->id;
                $prequalification->first_name = $applicant->first_name;
                $prequalification->last_name = $applicant->last_name;
                $prequalification->applying_for = $applicant->applying_for;
                $prequalification->evaluation = 'disqualified';
                $prequalification->reason_for_disqualification = implode(',', $request->disqualificationDetails);
                $prequalification->remarks = '';
                $prequalification->additional_details = $applicant->additional_details ?? '';
                $prequalification->pertinent_conditions = $applicant->pertinent_conditions ?? '';
                $prequalification->save();

                $initialAssessmentScore = new InitialAssessmentScore;
                $initialAssessmentScore->applicant_id = $applicant->id;
                $initialAssessmentScore->education = $request->dEducationScore;
                $initialAssessmentScore->experience = $request->dExperienceScore;
                $initialAssessmentScore->performance_evaluation = $request->dPerformanceEvalScore;
                $initialAssessmentScore->training = $request->dTrainingScore;
                $initialAssessmentScore->eligibility = $request->dEligibilityScore;
                $initialAssessmentScore->outstanding_accomplishment = $request->dAccomplishmentScore;
                $initialAssessmentScore->total_score = $request->dTotalScore;
                $initialAssessmentScore->save();

                //**Create word and convert */
                $templateProcessor = new TemplateProcessor(storage_path('applicant-feedback-form.docx'));
                $fullname = $applicant->first_name. " " .$applicant->last_name;
                $dateToday = Carbon::today()->toDateString();
                $jobDescription = OpenedJob::where('job_title', $applicant->applying_for)->first();

                $applying_for = $applicant->applying_for;
                $status = $jobDescription->status;
                $opening_date = $jobDescription->opening_date;
                $reason = $applicant->applicantPrequalification->reason_for_disqualification;
                $additionalDetails = $applicant->applicantPrequalification->additional_details;
                $pertinentConditions = $applicant->applicantPrequalification->pertinent_conditions;
                
                $templateProcessor->setValues([
                    'full_name'=> $fullname,
                    'date_today'=>$dateToday,
                    'applying_for' => $applying_for,
                    'status' => $status,
                    'opening_date' => $opening_date,
                    'reason' => $reason,
                    'additional_details' => $additionalDetails ?? '',
                    'pertinent_conditions' => $pertinentConditions ?? ''
                ]);

                $pathToSave = $fullname . '-' .'Feedback Form.docx';
                $templateProcessor->saveAs($pathToSave);

                // $wordFile = public_path($fullname . '-' .'Feedback Form.docx');
                // $pdfFile = public_path('feedback-form/'.$fullname . '-' .'Feedback Form.pdf');
                // //MPDF CONVERT DOCX TO PDF
                // $mpdf = new Mpdf();
                // $mpdf->WriteHTML(file_get_contents($wordFile));
                // $mpdf->Output($pdfFile, 'F');



                //************PHP WORD CONVERT DOCX TO PDF */
                // $phpWord = new PhpWord();

                // // Set the PDF Engine Renderer Path //
                // $domPdfPath = base_path('vendor/dompdf/dompdf');
                // Settings::setPdfRendererPath($domPdfPath);
                // Settings::setPdfRendererName('DomPDF');

                // // Load a Word document
                // // $document = $phpWord->loadTemplate(public_path($fullname . '-' .'feedback-form.docx'));
                // $document = IOFactory::load(public_path($fullname . '-' .'Feedback Form.docx'));

                // $pdfWriter = IOFactory::createWriter($document , 'PDF');
                // $pdfWriter->save(public_path('feedback-form/'.$fullname . '-' .'Feedback Form.pdf'));

                //******************** */

                // Save the document as PDF
                // $document->saveAs(public_path('feedback-form/'.$fullname . '-' .'feedback-form.pdf'));


                /* Set the PDF Engine Renderer Path */
                // $domPdfPath = base_path('vendor/dompdf/dompdf');
                // Settings::setPdfRendererPath($domPdfPath);
                // Settings::setPdfRendererName('DomPDF');
                
                 //Load word file
                // $Content = IOFactory::load(public_path($fullname . '-' .'Feedback Form.docx')); 
        
                // //Save it into PDF
                // $PDFWriter = IOFactory::createWriter($Content,'PDF');
                // $PDFWriter->save(public_path('feedback-form/'.$fullname . '-' .'feedback-form.pdf')); 

                //Send Email *****
                $files = [
                    public_path($fullname . '-' .'Feedback Form.docx'),
                ];
                $details = [
                    "first" =>"Dear Mr./Ms. " . ucwords($fullname) .",",
                    "second" =>"Thank you for your application for the " . ucwords($jobDescription->job_title) . ". Your time and effort are much appreciated.",
                    "third" => " We have received a large number of applications in response to this position. After a thorough review of all applicants, we regret to inform you that we will not be moving forward with your application. While we were impressed with your skills and accomplishments, we felt that other applicants were better suited for the position.",
                    "fourth" => "We wish you every personal and professional success in your future endeavors.",
                    'files' => $files
                ];
                // Mail::to('kenzertunguia@gmail.com')->send(new MailApplicant($details));
                Mail::to($applicant->email)->send(new MailApplicant($details));

                return redirect('/applicant-tracking')
                    ->with('message', 'Success! Applicant notified and disqualified')
                    ->with('applicants', $applicants);
        
    }

        public function restoreDatabase(Request $request){

        $file = $request->fileRestore;


        $dbHost = \config('envVariable.dbHost');
        $dbUsername = \config('envVariable.dbUsername');
        $dbPassword = \config('envVariable.dbPassword');
        $dbDatabase = \config('envVariable.dbDatabase');

        $command = "mysql -h $dbHost -u $dbUsername $dbDatabase < D:/".$file." ";
       
        exec($command, $output ,$return);
        
        
        if($return !== 0){
            return redirect('/restore-database')->with('message', 'Failed! Something went wrong.');

        }else{
            return redirect('/restore-database')->with('message', 'Success! Database restoration complete.');

        }        
    }

    public function adminRegister(){
        return view('administrator.admin-register');
    }

    public function adminRegisterAccount(Request $request){
        $validated = $request->validate([
            'lastName' => 'required',
            'firstName' => 'required',
            'middleName' => 'nullable',
            'extensionName' => 'nullable',
            'sex' => 'required',
            'employeeId' => 'required',
            'email' => 'required|email',
            'officeDesignation' => 'required',
            'password' => ['required','confirmed','min:8']
        ]);

        if($validated){
            $user = AdminAccount::create([
                'last_name' => $request['lastName'],
                'first_name'=>$request['firstName'],
                'middle_name' => $request['middleName'],
                'extension_name' => $request['extensionName'],
                'sex' => $request['sex'],
                'employee_id' => $request['employeeId'],
                'email' => $request['email'],
                'office_designation' => $request['officeDesignation'],
                'password' => Hash::make($request['password']),
            ]);

            auth()->guard('admin')->login($user);

            return redirect('/dashboard');
        } 
    }

    public function deleteAdmin($id){

        $deleteAdmin = AdminAccount::where('id', $id)->firstOrFail();
        
        $deleteAdmin->delete();

        return redirect('/admin/admin-management')->with('message', 'Success! Admin account deleted.');
    }

    public function createAdmin(Request $request){

        $newAdmin = new AdminAccount;

        $validated = $request->validate([
            'lastName' => 'required',
            'firstName' => 'required',
            'middleName' => 'nullable',
            'extensionName' => 'nullable',
            'sex' => 'required',
            'employeeId' => ['required', Rule::unique('admin_accounts', 'employee_id')],
            'email' => ['required', Rule::unique('admin_accounts', 'email')],
            'officeDesignation' => 'required',
            'password' => 'nullable|confirmed|min:8'
        ]);
        if($validated){
            $newAdmin->last_name = $request->lastName;
            $newAdmin->first_name = $request->firstName;
            $newAdmin->middle_name = $request->middleName;
            $newAdmin->extension_name = $request->extensionName;
            $newAdmin->sex = $request->sex;
            $newAdmin->employee_id = $request->employeeId;
            $newAdmin->email = $request->email;
            $newAdmin->office_designation = $request->officeDesignation;
            $newAdmin->approved = '1';
            $newAdmin->password = Hash::make($request->password);

            $newAdmin->save();

            return redirect('/admin/admin-management')->with('message', 'Success! Admin user added.');

        }   
        
    }
    public function addAdmin(){
        return view('administrator.admin-add');
    }

    public function auditTrail(){

        $allAuds = Audits::all();
        

        $adminLogs = AdminLog::all();
        $allAccounts = AdminAccount::all()->first();
        //dd($allAccounts->adminAudits);
        $account = AdminAccount::where('id', '34')->first();

        
        return view('administrator.audit-trail',compact('adminLogs','allAuds'));
    }

    public function applicantAccounts(){

        $applicants = User::all();  

        return view('administrator.applicant-accounts', (compact('applicants')));
    }

    public function viewOnSiteApplication(){

        $applicants = User::all();  
        
        $openedJobs = OpenedJob::where('to_close','0')->select('job_title')->distinct()->get();
        
        return view('administrator.on-site-application', (compact('applicants','openedJobs')));
    }

    public function submitApplication(Request $request){

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

            return redirect()->back()->with('message', 'Application Submitted Successfully');
        }   
        
    }

    public function applicantProfile($applicant_id){

        $applicant = Applicant::where('id', $applicant_id)->get();

        return view('administrator.applicant-profile',compact('applicant'));
    }

    public function getApplicantProfileEdit($applicant_id){

        $applicant = Applicant::where('id', $applicant_id)->get();

        return view('administrator.applicant-edit',compact('applicant'));
    }

    public function postApplicantProfileEdit(Request $request, $applicant_id){

        $applicant = Applicant::where('id', $applicant_id)->first();
        $applicant->first_name = $request->firstName;
        $applicant->last_name = $request->lastName;
        $applicant->middle_name = $request->middleName;
        $applicant->extension = $request->extName;
        $applicant->birthday = $request->birthdate;
        $applicant->mobile_number = $request->mobileNumber;
        $applicant->marital_status = $request->maritalStatus;
        $applicant->email = $request->email;
        $applicant->sex = $request->sex;
        $applicant->disability = $request->disability;
        $applicant->address = $request->address;
        $applicant->country = $request->country;
        $applicant->applying_for = $request->applyingFor;
        $applicant->educational_attainment = $request->education;
        $applicant->college_course = $request->collegeCourse;
        $applicant->school_graduated = $request->schoolGraduated;
        $applicant->year_last_attended = $request->year;
        $applicant->job_discovery = $request->jobDiscovery;
        $applicant->previously_applied = $request->previouslyApplied;

        if($request->application_letter != null){
            $applicationLetter = $request->applicationLetter;
            $applicationLetterFileName = time().'.'.$applicationLetter->getClientOriginalExtension();
            $request->application_letter->move('assets', $applicationLetterFileName);

            $applicant->applicant_letter = $applicationLetterFileName;
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

        $applicant->save();

        return redirect('/my-application')->with('message', 'Successfully Updated Your Application!');
    }

    public function deleteApplicant($applicant_id){

        $applicant = Applicant::find($applicant_id);
        
        $applicant->delete();

        return redirect('/admin/masterlist')->with('message', 'Successfully Deleted Applicant!');
    }



    

    



}
