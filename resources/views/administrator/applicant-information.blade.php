<x-main>
@foreach ($applicant as $row)
    {{-- <form action="/initial-assessment/evaluation/{{$row->id}}" method="post" enctype="multipart/form-data"> --}}
    {{-- @csrf --}}
    <div class="home-content">
        <div class="text">Initial Assessment</div>
        <p><a href="/initial-assessment" class="text-decoration-none text-reset">Initial Assessment</a> / Applicant Information</p>

    </div>
        <div class="card shadow-lg m-3">
            <div class="card-body">
                <div class="text-center">
                    <h2>Applicant Information</h2>
                </div>
                    
                <div class="row mt-5 mx-4">
                    <div class="col-md-5">
                        <div class="row">
                            <b class="col-sm-3">Name: </b> 
                            <p class="col-sm-9">{{$row->first_name . ' ' . $row->last_name}}</p>
                        </div>
                        <div class="row">
                            <b class="col-sm-3 ">Applying for: </b> 
                            <p class="col-sm-9">{{$row->applying_for}}</p>
                        </div>
                        <div class="row">
                            <b class="col-sm-3">Email: </b> 
                            <p class="col-sm-9">{{$row->email}}</p>
                        </div>
                        <div class="row">
                            <b class="col-sm-3">Sex: </b> 
                            <p class="col-sm-9">{{$row->sex}} </p>
                        </div>
                        <div class="row">
                            <b class="col-sm-3">Birthday</b> 
                            <p class="col-sm-9">{{$row->birthday}}</p>
                        </div>
                        <div class="row">
                            <b class="col-sm-3">Address:</b> 
                            <p class="col-sm-9">{{$row->address}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <b class="col-sm-6">Phone Number:</b> 
                            <p class="col-sm-6">{{$row->mobile_number}}</p>
                        </div>
                        <div class="row">
                            <b class="col-sm-6">Educational Attainment:</b> 
                            <p class="col-sm-6">{{$row->educational_attainment}}</p>
                        </div>
                        <div class="row">
                            <b class="col-sm-6">College Course:</b> 
                            <p class="col-sm-6">{{$row->college_course}}</p>
                        </div>
                        <div class="row">
                            <b class="col-sm-6">School Graduated:</b> 
                            <p class="col-sm-6">{{$row->school_graduated}}</p>
                        </div>
                        <div class="row">
                            <b class="col-sm-6">Previously Applied:</b> 
                            <p class="col-sm-6">{{$row->previously_applied}}</p>
                        </div>
                        <div class="row">
                            <b class="col-sm-6">Job Discovery:</b> 
                            <p class="col-sm-6">{{$row->job_discovery}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <h4>Documents</h4>
                </div>
                <div class="row m-5">
                    <div class="col-md-6 ">
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <div class="row">
                                    <a href="/assets/{{$row->application_letter}}" target="_blank" class="btn btn-info text-white">Application Letter </a>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex d-flex-row">
                                {{-- <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57" 
                                class="form-control" id="applicationLetterScore" name="applicationLetterScore" pattern="[0-9.]+" value="{{old('applicationLetterScore')}}">
                                <input type="text" class="form-control" value="/10" style="width: 50px; border:0;"> --}}
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault" style="scale: 1.4">
                                </div>
                            </div>  
                            @error('applicationLetterScore')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <div class="row">
                                    <a href="/assets/{{$row->pds}}" class="btn btn-info text-white">Personal Data Sheet</a>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex d-flex-row">
                                {{-- <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                                class="form-control" id="dataSheetScore" name="dataSheetScore" value="{{old('dataSheetScore')}}">
                                <input type="text" class="form-control" value="/10" style="width: 50px; border:0;"> --}}
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault" style="scale: 1.4">
                                </div>
                            </div>
                            @error('dataSheetScore')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <div class="row">
                                    @if ($row->work_experience == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Work Experience
                                            <p class="text-danger m-0"> (Empty)</p>
                                    </a>
                                    @else
                                    <a href="/assets/{{$row->work_experience}}" class="btn btn-info text-white text-center d-flex justify-content-center">Work Experience</a>
                                    @endif  
                                </div>
                            </div>
                            <div class="col-md-3 d-flex d-flex-row">
                                {{-- <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                                class="form-control" id="workExperienceScore" name="workExperienceScore" value="{{old('workExperienceScore')}}">
                                <input type="text" class="form-control" value="/10" style="width: 50px; border:0;"> --}}
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault" style="scale: 1.4">
                                </div>
                            </div>
                            @error('workExperienceScore')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <div class="row">
                                    @if ($row->training_certificates == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Training Certificates
                                            <p class="text-danger m-0">(Empty)</p>
                                    </a>
                                    @else
                                    <a href="/assets/{{$row->training_certificates}}" class="btn btn-info text-white text-center d-flex justify-content-center">Training Certificates</a>
                                    @endif 
                                </div>
                            </div>
                            <div class="col-md-3 d-flex d-flex-row">
                                {{-- <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                                class="form-control" id="trainingCertScore" name="trainingCertScore" value="{{old('trainingCertScore')}}">
                                <input type="text" class="form-control" value="/10" style="width: 50px; border:0;"> --}}
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault" style="scale: 1.4">
                                </div>
                            </div>
                            @error('trainingCertScore')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <div class="row">
                                    @if ($row->commendation == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Awards and Commendation
                                            <p class="text-danger m-0">(Empty)</p>
                                    </a>
                                    @else
                                    <a href="/assets/{{$row->commendation}}" class="btn btn-info text-white text-center d-flex justify-content-center">Awards and Commendation</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 d-flex d-flex-row">
                                {{-- <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                                class="form-control" id="commendationScore" name="commendationScore" value="{{old('commendationScore')}}">
                                <input type="text" class="form-control" value="/10" style="width: 50px; border:0;"> --}}
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault" style="scale: 1.4">
                                </div>
                            </div>
                            @error('commendationScore')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <div class="row">
                                    @if ($row->otr == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">OTR
                                        <p class="text-danger m-0"> (Empty)</p>
                                    </a>
                                    @else
                                        <a href="/assets/{{$row->otr}}" class="btn btn-info text-white text-center d-flex justify-content-center">OTR</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 d-flex d-flex-row">
                                {{-- <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                                class="form-control" id="otrScore" name="otrScore" value="{{old('otrScore')}}">
                                <input type="text" class="form-control" value="/10" style="width: 50px; border:0;"> --}}
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault" style="scale: 1.4">
                                </div>
                            </div> 
                            @error('otrScore')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror   
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <div class="row">
                                    @if ($row->employment_certificates == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Employment Certificates
                                            <p class="text-danger m-0">(Empty)</p>
                                    </a>
                                    @else
                                    <a href="/assets/{{$row->employment_certificates}}" class="btn btn-info text-white text-center d-flex justify-content-center">Employment Certificates</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 d-flex d-flex-row">
                                {{-- <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                                class="form-control" id="employmentCertScore" name="employmentCertScore" value="{{old('employmentCertScore')}}">
                                <input type="text" class="form-control" value="/10" style="width: 50px; border:0;"> --}}
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault" style="scale: 1.4">
                                </div>
                            </div>
                            @error('employmentCertScore')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                                
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <div class="row">
                                    @if ($row->eligibility == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Eligibility
                                        <p class="text-danger m-0">(Empty)</p>
                                    </a>
                                    @else
                                        <a href="/assets/{{$row->eligibility}}" class="btn btn-info text-white text-center d-flex justify-content-center">Eligibility</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 d-flex d-flex-row">
                                {{-- <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                                class="form-control" id="eligibilityScore" name="eligibilityScore" value="{{old('eligibilityScore')}}">
                                <input type="text" class="form-control" value="/10" style="width: 50px; border:0;"> --}}
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault" style="scale: 1.4">
                                </div>
                            </div>   
                            @error('eligibilityScore')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <div class="row">
                                    @if ($row->performance_evaluation == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Performance Evaluation
                                        <p class="text-danger m-0">(Empty)</p>
                                    </a>
                                    @else
                                    <a href="/assets/{{$row->performance_evaluation}}" class="btn btn-info text-white text-center d-flex justify-content-center">Performance Evaluation</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 d-flex d-flex-row">
                                {{-- <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                                class="form-control" id="performanceEvalScore" name="performanceEvalScore" value="{{old('performanceEvalScore')}}">
                                <input type="text" class="form-control" value="/10" style="width: 50px; border:0;"> --}}
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault" style="scale: 1.4">
                                </div>
                            </div>
                            @error('performanceEvalScore')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror  
                        </div>
                    </div>
                </div>
                <hr>
                 <div class="text-center">
                    <h4>Input Initial Score</h4>
                </div>
                <div class="row mx-5 mb-5">
                    <div class="col-md-6 ">
                        <label for="educationScore">Education (20)</label>
                        <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                        class="form-control" id="educationScore" name="educationScore" value="{{old('educationScore')}}">

                        <label for="experienceScore" class="mt-2">Experience (20)</label>
                        <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                        class="form-control" id="experienceScore" name="experienceScore" value="{{old('experienceScore')}}">

                        <label for="performanceEvalScore" class="mt-2">Performance Evaluation (10)</label>
                        <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                        class="form-control" id="performanceEvalScore" name="performanceEvalScore" value="{{old('performanceEvalScore')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="trainingScore">Training (10)</label>
                        <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                        class="form-control" id="trainingScore" name="trainingScore" value="{{old('trainingScore')}}">

                        <label for="accomplishmentScore" class="mt-2">Outstanding Accomplishment (5)</label>
                        <input type="text" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57"
                        class="form-control" id="accomplishmentScore" name="accomplishmentScore" value="{{old('accomplishmentScore')}}">

                        <label for="eligibilityScore" class="mt-2">Eligibility </label>
                        <input type="text" class="form-control" id="eligibilityScore" name="eligibilityScore" placeholder="Enter Eligibility Here" value="{{old('eligibilityScore')}}">
                    </div>
                    
                    
                </div>
                <div class="row text-center mt-5">
                    <div class="col-md-12">
 
                        <a href="" class="btn btn-success" id="qualifiedBtn" data-bs-toggle="modal" data-bs-target="#applicantQualified">Qualified</a>

                        <a href="" class="btn btn-danger" id="disqualifiedBtn" data-bs-toggle="modal" data-bs-target="#applicantDisqualified">Disqualified</a>
                    </div>
                </div>
                </div>
            
            </div>
        

 
    <div class="modal fade" id="applicantQualified" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="/initial-assessment/evaluation-qualify/{{$row->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header border-bottom-0 d-flex justify-content-center">
                <h3 >Qualify Applicant</h3>

                
                
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h4>Initial Scores</h4>
                    </div>
                    <div class="row mx-2">
                        <div class="col-md-6"> 
                            <label for="qEducationScore">Education</label>
                            <input type="text" class="form-control" id="qEducationScore" name="qEducationScore" readonly>
                            <label for="qExperienceScore" class="mt-4">Experience</label>
                            <input type="text" class="form-control" id="qExperienceScore" name="qExperienceScore" readonly>
                            <label for="qPerformanceEvalScore" class="mt-2">Performance Evaluation</label>
                            <input type="text" class="form-control" id="qPerformanceEvalScore" name="qPerformanceEvalScore" readonly>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="qTrainingScore">Training</label>
                            <input type="text" class="form-control" id="qTrainingScore" name="qTrainingScore" readonly>
                            
                            <label for="qAccomplishmentScore" class="mt-2">Outstanding Accomplishment</label>
                            <input type="text" class="form-control" id="qAccomplishmentScore" name="qAccomplishmentScore" readonly>
                            <label for="qEligibilityScore" class="mt-2">Eligibility</label>
                            <input type="text" class="form-control" id="qEligibilityScore" name="qEligibilityScore" readonly>
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="totalScore" class="">Total Score</label>
                            <input type="text" class="form-control mx-1" id="qTotalScore" name="qTotalScore" readonly>
                            </div>
                            
                        </div>
                        

                        <div class="row mx-auto mt-2">
                            <textarea name="remarks" id="remarks" placeholder="Remarks here..."></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer d-flex justify-content-center m-0">
                
                    <div class="row">
                            <div class="col-sm-9">
                                <div class="checkbox-group">
                                    <p for="certify"><input type="checkbox"  id="confirmDisqualification" value="confirmDisqualification" name="confirmDisqualification" required> 
                                    Confirm Qualification
                                    </p>      
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div>
                                    <button type="submit" name="action" value="qualify" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="applicantDisqualified" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="/initial-assessment/evaluation-disqualify/{{$row->id}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-header border-bottom-0 d-flex justify-content-center">
                <h3 >Reason for Disqualification</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h4>Initial Scores</h4>
                    </div>
                    <div class="row mx-2">
                        <div class="col-md-6"> 
                            <label for="dEducationScore">Education</label>
                            <input type="text" class="form-control" id="dEducationScore" name="dEducationScore" readonly>
                            <label for="dExperienceScore" class="mt-4">Experience</label>
                            <input type="text" class="form-control" id="dExperienceScore" name="dExperienceScore" readonly>
                            <label for="dPerformanceEvalScore" class="mt-2">Performance Evaluation</label>
                            <input type="text" class="form-control" id="dPerformanceEvalScore" name="dPerformanceEvalScore" readonly>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="dTrainingScore">Training</label>
                            <input type="text" class="form-control" id="dTrainingScore" name="dTrainingScore" readonly>
                            
                            <label for="dAccomplishmentScore" class="mt-2">Outstanding Accomplishment</label>
                            <input type="text" class="form-control" id="dAccomplishmentScore" name="dAccomplishmentScore" readonly>
                            <label for="dEligibilityScore" class="mt-2">Eligibility</label>
                            <input type="text" class="form-control" id="dEligibilityScore" name="dEligibilityScore" readonly>
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="totalScore" class="">Total Score</label>
                            <input type="text" class="form-control mx-1" id="dTotalScore" name="dTotalScore" readonly>
                            </div>
                            
                        </div>
                        

                        <div class="row mx-auto mt-2">
                            <textarea name="remarks" id="remarks" placeholder="Remarks here..."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <p class="text-center">Did not meet minimum qualification for:</p>
                    </div>
                    <div class="row mx-5 options">
                        <div class="col-sm-8 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="disqualificationDetails[]" value="education" required/>
                                <label class="form-check-label" for="flexCheckDefault">
                                Education
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="disqualificationDetails[]" value="experience" required/>
                                <label class="form-check-label" for="flexCheckChecked">
                                Experience
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4" >
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="disqualificationDetails[]" value="training" required/>
                                <label class="form-check-label" for="flexCheckChecked">
                                Training
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="disqualificationDetails[]" value="eligibility" required/>
                                <label class="form-check-label" for="flexCheckChecked">
                                Eligibility
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mx-5 ">
                        <div class="form-group">
                            <label for="additional_details">Additional Details (Optional)</label>
                            <input type="text" class="form-control" id="additional_details" placeholder="Enter Additional Details">
                        </div>
                    </div>
                    <div class="row mx-5">
                        <div class="form-group">
                            <label for="pertinent_conditions">Other Pertinent Conditions (Optional)</label>
                            <input type="text" class="form-control" id="pertinent_conditions" placeholder="Enter Pertinent Conditions">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer d-flex justify-content-center m-0">
                
                    <div class="row">
                            <div class="col-sm-9">
                                <div class="checkbox-group">
                                    <p for="certify"><input type="checkbox"  id="confirmDisqualification" value="confirmDisqualification" name="confirmDisqualification" required> 
                                    Confirm Disqualification
                                    </p>      
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div>
                                    <button type="submit" name="action" value="disqualify" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
@endforeach
</x-main>

<script>

document.getElementById("disqualifiedBtn").addEventListener('click', function(){

var educationScore = document.getElementById("educationScore");
var dEducationScore = document.getElementById("dEducationScore");

var experienceScore = document.getElementById("experienceScore");
var dExperienceScore = document.getElementById("dExperienceScore");

var performanceEvalScore = document.getElementById("performanceEvalScore");
var dPerformanceEvalScore = document.getElementById("dPerformanceEvalScore");

var commendationScore = document.getElementById("trainingScore");
var dCommendationScore = document.getElementById("dTrainingScore");

var eligibilityScore = document.getElementById("eligibilityScore");
var dEligibilityScore = document.getElementById("dEligibilityScore");

var accomplishmentScore = document.getElementById("accomplishmentScore");
var dAccomplishmentScore = document.getElementById("dAccomplishmentScore");
console.log(educationScore.value);
dEducationScore.value = educationScore.value;
dExperienceScore.value = experienceScore.value;
dPerformanceEvalScore.value = performanceEvalScore.value;

dTrainingScore.value = trainingScore.value;
dEligibilityScore.value = eligibilityScore.value;
dAccomplishmentScore.value = accomplishmentScore.value;



sumScore();



function sumScore(){
    var a = parseFloat(document.getElementById("dEducationScore").value);
    var b = parseFloat(document.getElementById("dExperienceScore").value);
    var c = parseFloat(document.getElementById("dPerformanceEvalScore").value);
    var d = parseFloat(document.getElementById("dTrainingScore").value);
    var e = parseFloat(document.getElementById("dAccomplishmentScore").value);

    var res = a + b + c + d + e; 

    

    dTotalScore.value = res.toString();
}
});
// QUALIFIED
document.getElementById("qualifiedBtn").addEventListener('click', function(){

    var educationScore = document.getElementById("educationScore");
    var qEducationScore = document.getElementById("qEducationScore");

    var experienceScore = document.getElementById("experienceScore");
    var qExperienceScore = document.getElementById("qExperienceScore");

    var performanceEvalScore = document.getElementById("performanceEvalScore");
    var qPerformanceEvalScore = document.getElementById("qPerformanceEvalScore");

    var trainingScore = document.getElementById("trainingScore");
    var qTrainingScore = document.getElementById("qTrainingScore");

    var eligibilityScore = document.getElementById("eligibilityScore");
    var qEligibilityScore = document.getElementById("qEligibilityScore");

    var accomplishmentScore = document.getElementById("accomplishmentScore");
    var qAccomplishmentScore = document.getElementById("qAccomplishmentScore");
    
    qEducationScore.value = educationScore.value;
    qExperienceScore.value = experienceScore.value;
    qPerformanceEvalScore.value = performanceEvalScore.value;

    qTrainingScore.value = trainingScore.value;
    qEligibilityScore.value = eligibilityScore.value;
    qAccomplishmentScore.value = accomplishmentScore.value;

    

    sumScore();

    
    
    function sumScore(){
        var a = parseFloat(document.getElementById("qEducationScore").value);
        var b = parseFloat(document.getElementById("qExperienceScore").value);
        var c = parseFloat(document.getElementById("qPerformanceEvalScore").value);
        var d = parseFloat(document.getElementById("qTrainingScore").value);
        var e = parseFloat(document.getElementById("qAccomplishmentScore").value);

        var res = a + b + c + d + e; 

        

        qTotalScore.value = res.toString();
    }
});




// document.getElementById(["applicationLetterScore","workExperienceScore", "trainingCertScore","commendationScore","otrScore","employmentCertScore","eligibilityScore","performanceEvalScore"]).addEventListener("input", function(event) {
//     if (this.value > 10) {
//       this.value = 10;
//     }
//   });
  document.getElementById("educationScore").addEventListener("input", function(event) {
    if (this.value > 20) {
      this.value = 20;
    }
  });
  document.getElementById("experienceScore").addEventListener("input", function(event) {
    if (this.value > 20) {
      this.value = 20;
    }
  });
  document.getElementById("performanceEvalScore").addEventListener("input", function(event) {
    if (this.value > 10) {
      this.value = 10;
    }
  });
  document.getElementById("trainingScore").addEventListener("input", function(event) {
    if (this.value > 10) {
      this.value = 10;
    }
  });
  document.getElementById("eligibilityScore").addEventListener("input", function(event) {
    if (this.value > 15) {
      this.value = 15;
    }
  });
  document.getElementById("accomplishmentScore").addEventListener("input", function(event) {
    if (this.value > 5) {
      this.value = 5;
    }
  });

 
</script>
