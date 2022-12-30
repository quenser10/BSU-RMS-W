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
                    <div class="col-md-4 ">
                        <div class="col-md-12">
                            <div class="row offset-2 mb-2">
                                <a href="/assets/{{$row->application_letter}}" class="btn btn-info text-white">Application Letter </a>
                            </div>
                            <div class="row offset-2 mb-2">
                                <a href="/assets/{{$row->pds}}" class="btn btn-info text-white">Personal Data Sheet</a>
                            </div>
                            <div class="row offset-2 ">
                                @if ($row->work_experience == null)
                                <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Work Experience
                                        <p class="text-danger m-0"> (Empty)</p>
                                </a>
                                @else
                                <a href="/assets/{{$row->work_experience}}" class="btn btn-info text-white text-center d-flex justify-content-center">Work Experience</a>
                                @endif  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="row offset-2 mb-2">
                                @if ($row->otr == null)
                                <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">OTR
                                    <p class="text-danger m-0">(Empty)</p>
                                </a>
                                @else
                                    <a href="/assets/{{$row->otr}}" class="btn btn-info text-white text-center d-flex justify-content-center">OTR</a>
                                @endif
                                
                            </div>
                            <div class="row offset-2 mb-2">
                                @if ($row->employment_certificates == null)
                                <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Employment Certificates
                                        <p class="text-danger m-0">(Empty)</p>
                                </a>
                                @else
                                <a href="/assets/{{$row->employment_certificates}}" class="btn btn-info text-white text-center d-flex justify-content-center">Employment Certificates</a>
                                @endif
                                
                            </div>
                            <div class="row offset-2">
                                @if ($row->eligibility == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Eligibility
                                        <p class="text-danger m-0">(Empty)</p>
                                    </a>
                                @else
                                    <a href="/assets/{{$row->eligibility}}" class="btn btn-info text-white text-center d-flex justify-content-center">Eligibility</a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="row offset-2 mb-2">
                                @if ($row->training_certificates == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Training Certificates
                                            <p class="text-danger m-0">(Empty)</p>
                                    </a>
                                @else
                                <a href="/assets/{{$row->training_certificates}}" class="btn btn-info text-white text-center d-flex justify-content-center">Training Certificates</a>
                                @endif
                                
                            </div>
                            <div class="row offset-2 mb-2">
                                @if ($row->performance_evaluation == null)
                                    <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Performance Evaluation
                                        <p class="text-danger m-0">(Empty)</p>
                                    </a>
                                @else
                                <a href="/assets/{{$row->performance_evaluation}}" class="btn btn-info text-white text-center d-flex justify-content-center">Performance Evaluation</a>
                                @endif
                                
                            </div>
                            <div class="row offset-2">
                                @if ($row->commendation == null)
                                <a href="" class="btn btn-info text-white text-center d-flex justify-content-center">Awards and Commendation
                                        <p class="text-danger m-0">(Empty)</p>
                                </a>
                                @else
                                <a href="/assets/{{$row->commendation}}" class="btn btn-info text-white text-center d-flex justify-content-center">Awards and Commendation</a>
                                @endif
                                
                            </div>
                        </div>                   
                    </div>
                </div>
                <hr>
                {{-- <div class="text-center">
                    <h4>Remarks</h4>
                </div>
                <div class="row mx-5 mb-5">
                    <textarea name="remarks" id="remarks" cols="5" rows="5"></textarea>
                </div> --}}
                <div class="row text-center mt-5">
                    <div class="col-md-12">
 
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#applicantQualified">Qualified</a>

                        <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#applicantDisqualified">Disqualified</a>
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
                    
                    
                    <div class="row mx-5">
                        
                        <div class="row mx-auto">
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
