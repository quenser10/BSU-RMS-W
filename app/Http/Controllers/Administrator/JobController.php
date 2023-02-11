<?php

namespace App\Http\Controllers\administrator;

use App\Models\OpenedJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function openJob(Request $request, OpenedJob $openedJob){ 
    
        $formFields = $request->validate([
            //'job_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=500,min_height=500',
            'job_title' => 'required',
            'item_number' => 'required',
            'status' => 'required',
            'salary' => 'required',
            'place_of_assignment' => 'required',
            'education' => 'required',
            'training' => 'required',
            'experience' => 'required',
            'eligibility' => 'required',
            'competency' => 'required',
            'duties' => 'required',
            'opening_date' => 'required',
            'closing_date' => 'required',
        ]);

        // if($request->hasFile('job_image')){
        //     $formFields['job_image'] = $request->file('job_image')->store('job_images', 'home/a2as5axe56qw/public_html');
        // }

        // $path = '/home/a2as5axe56qw/public_html/storage/job_images';
        // $request->file('cover_image')->move($path, $request->file('job_image'));


        if($request->file('job_image') != null){
            $formFields['job_image'] = $request->file('job_image')->store('job_images', 'public');
        }else{
            $formFields['job_image'] = "";
        }
    
        OpenedJob::create($formFields);

        return redirect('/admin/job-management/open-a-job')->with('message', 'Job Opened and Created Successfully');

    }

    public function republishJob(Request $request, $job_id){
        OpenedJob::where('job_id', $job_id)->update([
            'to_close' => "0",
            'opening_date' => $request->opening_date,
            'closing_date' => $request->closing_date,
        ]);

        return redirect('/admin/job-management/opened-jobs')->with('message', 'Job Succesfully Republished!');
    }

    public function republishPage($job_id){
        $job = OpenedJob::where('job_id', $job_id)->get();


        return view('administrator.republish-job',compact('job'));
    }

    public function getEditJob($job_id){

        $job = OpenedJob::where('job_id', $job_id)->get();
        
        return view('administrator.edit-job',compact('job'));
    }

    public function updateJob(Request $request, OpenedJob $openedJob, $job_id){


        $updateJob = OpenedJob::find($job_id);

        $updateJob->job_title = $request->job_title;
        $updateJob->item_number = $request->item_number;
        $updateJob->status = $request->status;
        $updateJob->salary = $request->salary;
        $updateJob->place_of_assignment = $request->place_of_assignment;
        $updateJob->education = $request->education;
        $updateJob->training = $request->training;
        $updateJob->experience = $request->experience;
        $updateJob->eligibility = $request->eligibility;
        $updateJob->competency = $request->competency;
        $updateJob->duties = $request->duties;
        $updateJob->opening_date = $request->opening_date;
        $updateJob->closing_date = $request->closing_date;
        

        if($request->hasFile('job_image')){
            $updateJob->job_image = $request->file('job_image')->store('job_images', 'public');
        }
       
        $updateJob->update();

        return redirect()->back()->with('message', 'Successfully updated job.');
    }

    public function closeJob($job_id){
        OpenedJob::where('job_id', $job_id)->update(['to_close' => "1"]);

        return redirect('/admin/job-management/closed-jobs')->with('message', 'Job Succesfully Closed!');
    }

    
}
