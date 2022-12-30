<?php

namespace App\Http\Controllers\Administrator;

use Carbon\Carbon;
use App\Models\Applicant;
use App\Models\OpenedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Prequalification;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Conditional;

class ExcelController extends Controller
{
    
    public function prequalificationReport(Request $request){

        $applicants = Applicant::all();

        $applying_for = $request->flexRadio;
        $place_of_assignment = OpenedJob::where('job_title', $applying_for)->pluck('place_of_assignment');
        $education = OpenedJob::where('job_title', $applying_for)->pluck('education');
        $experience = OpenedJob::where('job_title', $applying_for)->pluck('experience');
        $training = OpenedJob::where('job_title', $applying_for)->pluck('training');
        $eligibility = OpenedJob::where('job_title', $applying_for)->pluck('eligibility');
        $competency = OpenedJob::where('job_title', $applying_for)->pluck('competency');
        $dateToday = Carbon::now()->toDateString();

        $newCompetency = str_replace( array("[", '"', "]"), '', $competency);
        $newEducation = str_replace( array("[", '"', "]"), '', $education);
        $newTraining = str_replace( array("[", '"', "]"), '', $training);
        $newEligibility = str_replace( array("[", '"', "]"), '', $eligibility);
        $newExperience = str_replace( array("[", '"', "]"), '', $experience);
        $newPlace_of_assignment = str_replace( array("[", '"', "]"), '', $place_of_assignment);

        $disqualifiedApplicants = Applicant::where(['status' => 'disqualified','applying_for' => $applying_for])->count();
        $qualifiedApplicants = Applicant::where(['status' => 'qualified','applying_for' => $applying_for])->count();
        $applicantsSum = $disqualifiedApplicants + $qualifiedApplicants;
        $inputFileType = 'Xlsx';

        $inputFileName = storage_path('Pre-qualification-report.xlsx');
        
        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);

        $spreadsheet->getActiveSheet()->setCellValue('C14', $applicantsSum);
        $spreadsheet->getActiveSheet()->setCellValue('C5', $dateToday);
        $spreadsheet->getActiveSheet()->setCellValue('C6', $applying_for);
        $spreadsheet->getActiveSheet()->setCellValue('M6', $newPlace_of_assignment);
        $spreadsheet->getActiveSheet()->setCellValue('C9', $newEducation);
        $spreadsheet->getActiveSheet()->setCellValue('G9', $newExperience);
        $spreadsheet->getActiveSheet()->setCellValue('L9', $newTraining);
        $spreadsheet->getActiveSheet()->setCellValue('P9', $newEligibility);
        $spreadsheet->getActiveSheet()->setCellValue('J14', $qualifiedApplicants);
        $spreadsheet->getActiveSheet()->setCellValue('P14', $disqualifiedApplicants);
        $spreadsheet->getActiveSheet()->setCellValue('C11', $newCompetency);
        $firstBaseNum = '18';
        $secondBaseNum = '18';

       foreach($applicants as $applicant){
            if($secondBaseNum < 28 && $applicant->status =='qualified' && $applicant->applying_for == $applying_for){
                $spreadsheet->getActiveSheet()->setCellValue('B'.$firstBaseNum , $applicant->first_name . ' ' . $applicant->last_name);
                $firstBaseNum++;
                
            }else if($firstBaseNum < 28 && $applicant->status =='qualified' && $applicant->applying_for == $applying_for){
                $spreadsheet->getActiveSheet()->setCellValue('J'.$secondBaseNum , $applicant->first_name . ' ' . $applicant->last_name);
                $secondBaseNum++;
            }
       }
       $thirdBaseNum = 29;
       $fourthBaseNum = 30;
       $counting = 2;
       $matchThese = ['status' => 'disqualified', 'applying_for' => $applying_for];
      
       foreach($applicants as $applicant ){

        if($applicant->applying_for == $applying_for && $applicant->status == 'disqualified'){
            $spreadsheet->getActiveSheet()->insertNewRowBefore($thirdBaseNum+1,1);
            $spreadsheet->getActiveSheet()->mergeCells('B'.$thirdBaseNum . ':' . 'H' . $thirdBaseNum);
            $spreadsheet->getActiveSheet()->mergeCells('J'.$thirdBaseNum . ':' . 'Q' . $thirdBaseNum);
            $spreadsheet->getActiveSheet()->setCellValue('A'.$fourthBaseNum, $counting);
            $spreadsheet->getActiveSheet()->setCellValue('B'.$thirdBaseNum, $applicant->first_name . ' ' . $applicant->last_name);
            $spreadsheet->getActiveSheet()->setCellValue('J'.$thirdBaseNum, $applicant->applicantPrequalification->reason_for_disqualification);
            $thirdBaseNum++;
            $fourthBaseNum++;
            $counting++;
        }
                 
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode('Prequalification').'"'); //$filename
        $writer->save('php://output');


    }
}
