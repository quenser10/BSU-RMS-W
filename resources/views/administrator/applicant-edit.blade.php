<x-main>
    @foreach ($applicant as $data)
        <div class="home-content">
            <div class="text">Applicant Profile</div>
            <p><a href="/admin/masterlist" class="text-decoration-none ">Masterlist</a> / <a href="/admin/masterlist/applicant-profile/{{$data->id}}" class="text-decoration-none ">Applicant Profile</a> / Edit</p>
    
        </div>
        <div class="card shadow-lg m-2">
            <div class="card-body">
                <form action="/admin/masterlist/applicant-profile/edit-profile/{{$data->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mx-3 rounded bg-white" >
                    <div class="row">
                        <div class="p-3 py-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile</h4>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label class="labels">Name</label>
                                    <input type="text" class="form-control" value="{{ $data['first_name'] }}" id="firstName" name="firstName"  > 
                                </div>
                                <div class="col-md-3">
                                    <label class="labels">Surname</label>
                                    <input type="text" class="form-control" value="{{ $data['last_name'] }}" name="lastName" id="lastName" >
                                </div>
                                <div class="col-md-3">
                                    <label class="labels">Middle Name</label>
                                    <input type="text" class="form-control" value="{{ $data->middle_name }}" name="middleName" id="middleName" >
                                </div> 
                                <div class="col-md-2">
                                    <label class="labels">Ext. Name</label>
                                    <input type="text" class="form-control" value="{{ $data->extension }}" name="extName" id="extName" >
                                </div>     
                            </div>
                           <div class="row mt-2">
                                        <div class="col-md-4">
                                            <label class="labels">Birthday</label>
                                            <input type="text" class="form-control" value="{{ $data['birthday'] }}" name="birthdate" id="birthdate" >
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">Mobile Number</label>
                                            <input type="text" class="form-control" value="{{ $data['mobile_number'] }}" name="mobileNumber" id="mobileNumber" >
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">Marital Status</label>
                                            <input type="text" class="form-control" value="{{ $data->marital_status }}" name="maritalStatus" id="maritalStatus" >
                                        </div> 
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4 mt-2">
                                            <label class="labels">Email</label>
                                            <input type="text" class="form-control" value="{{ $data->email }}" name="email" id="email" >
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="labels">Sex</label>
                                            <input type="text" class="form-control" value="{{ $data->sex }}" name="sex" id="sex" >
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="labels">Disability</label>
                                            <input type="text" class="form-control" value="{{ $data->disability }}" name="disability" id="disability" >
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6 mt-2">
                                            <label class="labels">Address</label>
                                            <input type="text" class="form-control" value="{{ $data['address'] }}" name="address" id="address" >
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label class="labels">Country</label>
                                            <input type="text" class="form-control" value="{{ $data->country }}" name="country" id="country" >
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6 mt-2">
                                            <label class="labels">Applying For</label>
                                            <input type="text" class="form-control" value="{{ $data['applying_for'] }}" name="applyingFor" id="applyingFor" >
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label class="labels">Highest Educational Attainment</label>
                                            <input type="text" class="form-control" name="education" id="education" value="{{ $data['educational_attainment'] }}" >
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4 mt-2">
                                            <label class="labels">College Course</label>
                                            <input type="text" class="form-control" name="collegeCourse" id="collegeCourse" value="{{ $data->college_course }}" >
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="labels">School Graduated</label>
                                            <input type="text" class="form-control" name="schoolGraduated" id="schoolGraduated" value="{{ $data->school_graduated }}" >
                                        </div> 
                                        <div class="col-md-4 mt-2">
                                            <label class="labels">Year last attended</label>
                                            <input type="text" class="form-control" name="year" id="year" value="{{ $data->year_last_attended }}" >
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6 mt-2">
                                            <label class="labels">Job Discovery</label>
                                            <input type="text" class="form-control" name="jobDiscovery" id="jobDiscovery" value="{{ $data->job_discovery }}" >
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label class="labels">Previously Applied</label>
                                            <input type="text" class="form-control" name="previouslyApplied" id="previouslyApplied" value="{{ $data->previously_applied }}" >
                                        </div>
                                    </div>

                                    <br>
                            </div>
                        </div>
                        <div class="row">
                        <h4 class="text-right">Requested Documents</h4>
                            <div class="container mt-4">
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="labels">Application Letter</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="file" id="applicationLetter" name="applicationLetter" class="form-control" value="" accept="application/pdf">                                
                                    </div>
                                    <div class="col-md-4">
                                        @if (empty($data['application_letter']))
                                        <a class="btn btn-outline-primary">View
                                            <span class="text-danger m-0"> (Empty)</span>
                                        </a>
                                        @else
                                            <a href="/assets/{{ $data['application_letter'] }}"class="btn btn-outline-primary" target="_blank">View</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="labels">PDS</label>
                                    </div>
                                    <div class="col-md-5 ">
                                        <input type="file" id="pds" name="pds" class="form-control" value="" accept="application/pdf">  
                                                                     
                                    </div>
                                    <div class="col-md-4">
                                        @if (empty($data->pds))
                                            <a class="btn btn-outline-primary">View <span class="text-danger m-0"> (Empty)</span> </a>
                                        @else
                                            <a href="/assets/{{ $data->pds }}" class="btn btn-outline-primary" target="_blank">View
                                            </a>
                                        @endif                               
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="labels">Work Experience</label>
                                    </div>
                                    <div class="col-md-5 ">
                                        <input type="file" id="workExperience" name="workExperience" class="form-control" value="" accept="application/pdf">  
                                                                     
                                    </div>
                                    <div class="col-md-4 ">
                                            @if (empty($data['work_experience']))
                                            <a class="btn btn-outline-primary">View <span class="text-danger m-0"> (Empty)</span> </a>
                                            @else
                                                <a href="/assets/{{ $data['work_experience'] }}" class="btn btn-outline-primary" target="_blank">View
                                                </a>
                                            @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="labels">Official Transcript of Records</label>
                                    </div>
                                    <div class="col-md-5 ">
                                        <input type="file" id="otr" name="otr" class="form-control" value="" accept="application/pdf">               
                                    </div>
                                    <div class="col-md-4 viewb">
                                        @if (empty($data['otr']))
                                            <a class="btn btn-outline-primary">View <span class="text-danger m-0"> (Empty)</span> </a>
                                        @else
                                            <a href="/assets/{{ $data['otr'] }}" class="btn btn-outline-primary mb-2" target="_blank">View </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="labels">Employment Certificates</label>
                                    </div>
                                    <div class="col-md-5 ">
                                        <input type="file" id="employmentCertificates" name="employmentCertificates" class="form-control" value="" accept="application/pdf">                                                             
                                    </div>
                                    <div class="col-md-4 ">
                                            @if (empty($data->employment_certificates))
                                                <a class="btn btn-outline-primary">View <span class="text-danger m-0"> (Empty)</span> </a>
                                            @else
                                                <a href="/assets/{{ $data->employment_certificates }}" class="btn btn-outline-primary" target="_blank">View
                                                </a>
                                            @endif
                                    </div>   
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="labels">Training Certificates</label>
                                    </div>
                                    <div class="col-md-5 ">
                                        <input type="file" id="trainingCertificates" name="trainingCertificates" class="form-control" value="" accept="application/pdf">                                                             
                                    </div>
                                    <div class="col-md-4 ">
                                        @if (empty($data['training_certificates']))
                                            <a class="btn btn-outline-primary">View <span class="text-danger m-0"> (Empty)</span> </a>
                                            @else
                                                <a href="/assets/{{ $data['training_certificates'] }}" class="btn btn-outline-primary" target="_blank">View </a>
                                            @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="labels">Eligibility</label>
                                    </div>
                                    <div class="col-md-5 ">
                                        <input type="file" id="eligibility" name="eligibility" class="form-control" value="" accept="application/pdf">                                                             
                                    </div>
                                    <div class="col-md-4 ">
                                            @if (empty($data['eligibility']))
                                            <a class="btn btn-outline-primary">View <span class="text-danger m-0"> (Empty)</span> </a>
                                            @else
                                                <a href="/assets/{{ $data['eligibility'] }}" class="btn btn-outline-primary" target="_blank">View </a>
                                            @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="labels">Performance Evaluation</label>
                                    </div>
                                    <div class="col-md-5 ">
                                        <input type="file" id="performanceEvaluation" name="performanceEvaluation" class="form-control" value="" accept="application/pdf">                                                             
                                    </div>
                                    <div class="col-md-4 ">
                                        @if (empty($data['performance_evaluation']))
                                            <a class="btn btn-outline-primary">View <span class="text-danger m-0"> (Empty)</span> </a>
                                        @else
                                            <a href="/assets/{{ $data['performance_evaluation'] }}" class="btn btn-outline-primary" target="_blank">View </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="labels">Awards and Commendation</label>
                                    </div>
                                    <div class="col-md-5 ">
                                        <input type="file" id="commendation" name="commendation" class="form-control" value="" accept="application/pdf">                                                             
                                    </div>
                                    <div class="col-md-4 ">
                                        @if (empty($data['commendation']))
                                            <a class="btn btn-outline-primary">View <span class="text-danger m-0"> (Empty)</span> </a>
                                        @else
                                            <a href="/assets/{{ $data['commendation'] }}" class="btn btn-outline-primary" target="_blank">View </a>
                                        @endif
                                    </div>
                                </div>
                        </div>
                        </div> 
                        <div class="mt-3">
                            <button type="submit" class="btn btn-info">Save Profile</button>
                        </div>
                 </div>{{--container --}}
                </form>
            </div>
        </div>
  
        
        
    @endforeach
    </x-main>
    