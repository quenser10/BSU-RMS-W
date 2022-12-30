<x-main>

    @foreach ($applicant as $data)
        <div class="home-content">
            <div class="text">Applicant Profile</div>
            <p><a href="/admin/masterlist" class="text-decoration-none ">Masterlist</a> / Applicant Profile</p>
    
        </div>
        <div class="card shadow-lg mt-2">
            <x-flash-message/>
            <div class="card-body">
                <div class=" rounded bg-white" >
                    <div class="row">
                        <div class="col-md-7 border-right">
                            <div class="p-3 py-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile</h4>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4 mt-2">
                                        <label class="labels">Name</label>
                                        <input type="text" class="form-control" class="user_dialog" id="firstName" value="{{ $data['first_name'] }}" disabled> 
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <label class="labels">Surname</label>
                                        <input type="text" class="form-control" value="{{ $data['last_name'] }}" id="lastName" disabled>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <label class="labels">Middle Name</label>
                                        <input type="text" class="form-control" value="{{ $data->middle_name }}" id="middleName" disabled>
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <label class="labels">Extension</label>
                                        <input type="text" class="form-control" value="{{ $data->extension }}" id="extName" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="labels">Birthday</label>
                                        <input type="text" class="form-control" value="{{ $data['birthday'] }}" disabled>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label class="labels">Mobile Number</label>
                                        <input type="text" class="form-control" value="{{ $data['mobile_number'] }}" disabled>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label class="labels">Marital Status</label>
                                        <input type="text" class="form-control" value="{{ $data->marital_status }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="labels">Email</label>
                                        <input type="text" class="form-control" value="{{ $data->email }}" disabled>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label class="labels">Sex</label>
                                        <input type="text" class="form-control" value="{{ $data->sex }}" disabled>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label class="labels">Disability</label>
                                        <input type="text" class="form-control" value="{{ $data->disability }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 mt-2">
                                        <label class="labels">Address</label>
                                        <input type="text" class="form-control" value="{{ $data['address'] }}" id="address" disabled>
                                    </div>
                                    <div class="col-md-5 mt-2">
                                        <label class="labels">Country</label>
                                        <input type="text" class="form-control" value="{{ $data->country }}" id="address" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mt-2">
                                        <label class="labels">Applying for</label>
                                        <input type="text" class="form-control" value="{{ $data['applying_for'] }}"  disabled>
                                    </div>
                                    <div class="col-md-7 mt-2">
                                        <label class="labels">Highest Educational Attainment</label>
                                        <input type="text" class="form-control" placeholder="enter highest educational attainment" id="education" value="{{ $data['educational_attainment'] }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mt-2">
                                        <label class="labels">College Course</label>
                                        <input type="text" class="form-control" value="{{ $data->college_course }}" disabled>
                                    </div>
                                    <div class="col-md-5 mt-2">
                                        <label class="labels">School Graduated</label>
                                        <input type="text" class="form-control" value="{{ $data->school_graduated }}" disabled>
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <label class="labels">Year</label>
                                        <input type="text" class="form-control" value="{{ $data->year_last_attended }}" disabled>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-2">
                                            <label class="labels">Job Discovery</label>
                                            <input type="text" class="form-control" placeholder="Enter Job Discovery" value="{{ $data['job_discovery'] }}" id="jobdiscovery" disabled>
                                        </div> 
                                        <div class="col-md-6 mt-2">
                                            <label class="labels">Previously Applied</label>
                                            <input type="text" class="form-control" placeholder="Enter Job Discovery" value="{{ $data->previously_applied }}" id="jobdiscovery" disabled>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">Status</label>
                                        <input type="text" class="form-control" value="{{$data->status}}" disabled>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-5" style="padding-top: 50px;">
                                <h4 class="text-right">Requested Documents</h4>
                                <div class="container">
                                        <div class="row" style="padding-top: 20px">
                                        <div class="col-sm">
                                            <label class="labels">Application Letter</label>
                                        </div>
                                        <div class="col-sm viewb mb-2">
                                                @if (empty($data['application_letter']))
                                                <a class="btn btn-outline-primary">View
                                                    <span class="text-danger m-0"> (Empty)</span>
                                                </a>
                                                @else
                                                    <a href="/assets/{{ $data['application_letter'] }}"
                                                        class="btn btn-outline-primary"
                                                        target="_blank">View
                                                    </a>
                                                @endif                               
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-sm">
                                            <label class="labels">PDS</label>
                                        </div>
                                        <div class="col-sm viewb mb-2">
                                                @if (empty($data->pds))
                                                <a class="btn btn-outline-primary">View
                                                    <span class="text-danger m-0"> (Empty)</span>
                                                </a>
                                                @else
                                                    <a href="/assets/{{ $data->pds }}"
                                                        class="btn btn-outline-primary"
                                                        target="_blank">View
                                                    </a>
                                                @endif                               
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-sm">
                                            <label class="labels">Work Experience</label>
                                        </div>
                                        <div class="col-sm viewb mb-2">
                                                @if (empty($data['work_experience']))
                                                <a class="btn btn-outline-primary">View
                                                    <span class="text-danger m-0"> (Empty)</span>
                                                </a>
                                                @else
                                                    <a href="/assets/{{ $data['work_experience'] }}"
                                                        class="btn btn-outline-primary"
                                                        target="_blank">View
                                                    </a>
                                                @endif
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-sm">
                                            <label class="labels">Official Transcript of Records</label>
                                        </div>
                                        <div class="col-sm viewb">
                                                @if (empty($data['otr']))
                                                <a class="btn btn-outline-primary">View
                                                    <span class="text-danger m-0"> (Empty)</span>
                                                </a>
                                                @else
                                                    <a href="/assets/{{ $data['otr'] }}"
                                                        class="btn btn-outline-primary mb-2"
                                                        target="_blank">View
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-sm">
                                                <label class="labels">Employment Certificates</label>
                                            </div>
                                            <div class="col-sm viewb mt-2">
                                                    @if (empty($data->employment_certificates))
                                                    <a class="btn btn-outline-primary">View
                                                        <span class="text-danger m-0"> (Empty)</span>
                                                    </a>
                                                    @else
                                                        <a href="/assets/{{ $data->employment_certificates }}"
                                                            class="btn btn-outline-primary"
                                                            target="_blank">View
                                                        </a>
                                                    @endif
                                                </div>
                                            
                                            <div class="w-100"></div>
                                        <div class="col-sm">
                                            <label class="labels">Training Certificates</label>
                                        </div>
                                        <div class="col-sm viewb mt-2">
                                                @if (empty($data['training_certificates']))
                                                <a class="btn btn-outline-primary">View
                                                    <span class="text-danger m-0"> (Empty)</span>
                                                </a>
                                                @else
                                                    <a href="/assets/{{ $data['training_certificates'] }}"
                                                        class="btn btn-outline-primary"
                                                        target="_blank">View
                                                    </a>
                                                @endif
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-sm">
                                            <label class="labels">Eligibility</label>
                                        </div>
                                        <div class="col-sm viewb mt-2">
                                                @if (empty($data['eligibility']))
                                                <a class="btn btn-outline-primary">View
                                                    <span class="text-danger m-0"> (Empty)</span>
                                                </a>
                                                @else
                                                    <a href="/assets/{{ $data['eligibility'] }}"
                                                        class="btn btn-outline-primary"
                                                        target="_blank">View
                                                    </a>
                                                @endif
                                        </div>
                                        
                                        <div class="w-100"></div>
                                        <div class="col-sm">
                                            <label class="labels">Performance Evaluation</label>
                                        </div>
                                        <div class="col-sm viewb mt-2">
                                                @if (empty($data['performance_evaluation']))
                                                <a class="btn btn-outline-primary">View
                                                    <span class="text-danger m-0"> (Empty)</span>
                                                </a>
                                                @else
                                                    <a href="/assets/{{ $data['performance_evaluation'] }}"
                                                        class="btn btn-outline-primary"
                                                        target="_blank">View
                                                    </a>
                                                @endif
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-sm">
                                            <label class="labels">Commendation</label>
                                        </div>
                                        <div class="col-sm viewb mt-2">
                                                @if (empty($data['commendation']))
                                                <a class="btn btn-outline-primary">View
                                                    <span class="text-danger m-0"> (Empty)</span>
                                                </a>
                                                @else
                                                    <a href="/assets/{{ $data['commendation'] }}"
                                                        class="btn btn-outline-primary"
                                                        target="_blank">View
                                                    </a>
                                                @endif
                                        </div>
                                    </div> 
                                </div>
                                {{-- <div class="col-md-12"><label class="labels">Eligibility</label><input type="text" class="form-control" placeholder="enter eligibility" value=""></div> --}}
                                {{-- <div class="col-md-12"><label class="labels">Performance Evaluation</label><input type="text" class="form-control" placeholder="enter evaluation" value=""></div> --}}
                                {{-- <label for="remarks">Remarks</label> --}}
                                {{-- <textarea class="form-control" id="remarks" rows="5" value="{{$data->applicantPrequalification}}"></textarea> --}}
                            </div>
                            
                        </div>
                        <div class="mt-4">
                            <form action="/admin/masterlist/applicant-profile/delete/{{$data->id}}" method="post">
                                @csrf
                                <a href="/admin/masterlist/applicant-profile/edit/{{$data->id}}" class="btn btn-info" style="width: 80px">Edit</a>
                                <button class="btn btn-danger" id="deleteApplicantBtn" style="width: 80px">Delete</button>
                            </form>
                        </div>
                    </div>


        </div>
        </div>     
    @endforeach


    
    </x-main>

    <script>
        $("#deleteApplicantBtn").on("click", function(e) {
      e.preventDefault(); 
      Swal.fire({
          title: "Delete Applicant",
          text:"Are you sure you want to delete applicant? Related data will be GONE forever.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, Delete!'
      }).then(function(isConfirm) {
        if(isConfirm.value){
          $(e.target).closest('form').submit();
        }
        
          })
      });
      </script>
    