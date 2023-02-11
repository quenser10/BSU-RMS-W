<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BSU | My Application</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partials.applicant-link')
</head>

<body>          
    {{-- <x-flash-message/> --}}
    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    @include('partials._navbar')


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">

            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <img class="img-fluid" src="{{url('/images/BSU-Banner.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    
    <!-- Navbar End -->
    @include('components.login')
    @include('components.cv-application')
    @include('components.register')

    <div class="container-fluid page-header py-2 mb-2">
        <div class="container py-5">
            <h3 class="display-3 text-white mb-3 animated slideInDown">My Application</h3>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">My Application</li>
                </ol>
            </nav>
        </div>
    </div>

    @if ($message = Session::get('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">

        <strong>{{ $message }}</strong> 
        <br>
        <br>
        <strong>{{ '"Stay positive, better days are on their way."' }}</strong>
      
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
      </div>
    @endif

    <div class="p-5">
        <form action="/my-application/update/{{$userData->id}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card myApplicationCard">
                    <div class="card-body">
                        @if (is_null($userData->userApplicant))
                            <p>No Application to Show...</p>
                        @else
                            <div class="row ">
                                <h2 class="card-title text-center">{{$userData->userApplicant->applying_for}}</h2>
                                <p class="card-text text-center">{{$job->place_of_assignment}}</p>
                                {{-- @if ($userData->userApplicant->status == 'new' || $userData->userApplicant->status == 'qualified')
                                    <div class="row ">
                                        <p class="text-success">Processing Application...</p>
                                    </div>
                                @else
                                    <div class="row ">
                                        <p class="text-danger">Application Disqualified</p>
                                    </div>
                                @endif --}}
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <h4 class="mb-3">I. Personal Information</h4>
                                {{-- <div class="col-md-6"> --}}
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <label class="labels fw-bold">First Name</label>
                                            <input type="text" class="form-control" value="{{ $userData->userApplicant->first_name }}" id="firstName" name="firstName"  > 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels fw-bold">Last Name</label>
                                            <input type="text" class="form-control" value="{{ $userData->userApplicant->last_name }}" id="lastName" name="lastName"  > 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels fw-bold">Middle Name</label>
                                            <input type="text" class="form-control" value="{{ $userData->userApplicant->middle_name }}" id="middleName" name="middleName"  > 
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <label class="labels fw-bold">Ext. Name</label>
                                            <input type="text" class="form-control" value="{{ $userData->userApplicant->extension }}" id="extName" name="extName"  > 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels fw-bold">Sex</label>
                                            <input type="text" class="form-control" value="{{ $userData->userApplicant->sex }}" id="sex" name="sex"  > 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels fw-bold">Marital Status</label>
                                            <input type="text" class="form-control" value="{{ $userData->userApplicant->marital_status }}" id="maritalStatus" name="maritalStatus"  > 
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label class="labels fw-bold">Birthdate</label>
                                            <input type="text" class="form-control" value="{{ $userData->userApplicant->birthday }}" id="birthday" name="birthday"  > 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels fw-bold">Disability</label>
                                            <input type="text" class="form-control" value="{{ $userData->userApplicant->disability }}" id="disability" name="disability"  > 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels fw-bold">Country of Origin</label>
                                            <input type="text" class="form-control" value="{{ $userData->userApplicant->country }}" id="country" name="country"  > 
                                        </div>
                                    </div>
                                <hr>
                                <h4 class="mb-3">II. Contact Information</h4> 
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label class="labels fw-bold">Email</label>
                                        <input type="text" class="form-control" value="{{ $userData->userApplicant->email }}" id="email" name="email"  > 
                                    </div>
                                    <div class="col-md-4">
                                        <label class="labels fw-bold">Mobile Number</label>
                                        <input type="text" class="form-control" value="{{ $userData->userApplicant->mobile_number }}" id="mobileNumber" name="mobileNumber"  > 
                                    </div>
                                    <div class="col-md-4">
                                        <label class="labels fw-bold">Address</label>
                                        <input type="text" class="form-control" value="{{ $userData->userApplicant->address }}" id="address" name="address"  > 
                                    </div>
                                </div> 
                                <hr>
                                <h4 class="mb-3">III. Education Information</h4> 
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="labels fw-bold">Educational Attainment</label>
                                        <input type="text" class="form-control" value="{{ $userData->userApplicant->educational_attainment }}" id="education" name="education"  > 
                                    </div>
                                    <div class="col-md-4">
                                        <label class="labels fw-bold">Course</label>
                                        <input type="text" class="form-control" value="{{ $userData->userApplicant->college_course }}" id="course" name="course"  > 
                                    </div>
                                    <div class="col-md-4">
                                        <label class="labels fw-bold">School Graduated</label>
                                        <input type="text" class="form-control" value="{{ $userData->userApplicant->school_graduated }}" id="schoolGraduated" name="schoolGraduated"  > 
                                    </div>
                                </div> 
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label class="labels fw-bold">Year last attended</label>
                                        <input type="text" class="form-control" value="{{ $userData->userApplicant->year_last_attended }}" id="year" name="year"  > 
                                    </div>
                                    <div class="col-md-4">
                                        <label class="labels fw-bold">Previously Applied at BSU</label>
                                        <input type="text" class="form-control" value="{{ $userData->userApplicant->previously_applied }}" id="previouslyApplied" name="previouslyApplied"  > 
                                    </div>
                                    <div class="col-md-4">
                                        <label class="labels fw-bold">Discovery of Job Opening</label>
                                        <input type="text" class="form-control" value="{{ $userData->userApplicant->job_discovery }}" id="jobDiscovery" name="jobDiscovery"  > 
                                    </div>
                                </div>
                                <hr>
                                <h4 class="mb-3">IV. Documents</h4> 
                                <div class="row mb-4">
                                    <div class="col-md-4 text-center">
                                        <label class="labels fw-bold ">Application Letter</label>
                                        <div class="row offset-1">
                                            <a href="/assets/{{$userData->userApplicant->application_letter}}" target="_blank" class="btn btn-info text-white">View </a> 
                                            <input type="file" id="applicationLetter" name="applicationLetter" class="form-control" accept="application/pdf" value="{{old('applicationLetter')}}" />
                                            
                                        </div>
                                        <button type="button" class="btn-sm btn btn-warning" style="float:right;" onclick="document.getElementById('applicationLetter').value = ''">Remove file</button>
                                        
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <label class="labels fw-bold ">Personal Data Sheet</label>
                                        <div class="row offset-1">
                                        <a href="/assets/{{$userData->userApplicant->pds}}" target="_blank" class="btn btn-info text-white">View </a> 
                                            <input type="file" id="pds" name="pds" class="form-control" accept="application/pdf" value="{{old('pds')}}" />
                                            
                                        </div>
                                        <button type="button" class="btn-sm btn btn-warning" style="float:right;" onclick="document.getElementById('pds').value = ''">Remove file</button>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <label class="labels fw-bold ">Work Experience</label>
                                        <div class="row offset-1">
                                        @if ($userData->userApplicant->work_experience == null)
                                            <a class="btn btn-info text-white text-center d-flex justify-content-center">
                                                    <p class="text-danger m-0"> (Empty)</p>
                                            </a>
                                        @else
                                            <a href="/assets/{{$userData->userApplicant->work_experience}}" target="_blank" class="btn btn-info text-white text-center d-flex justify-content-center">View</a>
                                        @endif 
                                        <input type="file" id="workExperience" name="workExperience" class="form-control" accept="application/pdf" >
                                            
                                        </div>
                                        <button type="button" class="btn-sm btn btn-warning" style="float:right;" onclick="document.getElementById('workExperience').value = ''">Remove file</button>
                                    </div>
                                </div> 
                                <div class="row mb-4">
                                    <div class="col-md-4 text-center">
                                        <label class="labels fw-bold">Official Transcript of Records</label>
                                        <div class="row offset-1">
                                        @if ($userData->userApplicant->otr == null)
                                            <a class="btn btn-info text-white text-center d-flex justify-content-center">
                                                    <p class="text-danger m-0"> (Empty)</p>
                                            </a>
                                        @else
                                            <a href="/assets/{{$userData->userApplicant->otr}}" target="_blank" class="btn btn-info text-white text-center d-flex justify-content-center">View</a>
                                        @endif
                                        <input type="file" id="otr" name="otr" class="form-control" accept="application/pdf" >
                                        </div>
                                        <button type="button" class="btn-sm btn btn-warning" style="float:right;" onclick="document.getElementById('otr').value = ''">Remove file</button>

                                    </div>
                                    <div class="col-md-4 text-center">
                                        <label class="labels fw-bold">Employment Certificates</label>
                                        <div class="row offset-1">
                                        @if ($userData->userApplicant->employment_certificates == null)
                                            <a class="btn btn-info text-white text-center d-flex justify-content-center">
                                                    <p class="text-danger m-0"> (Empty)</p>
                                            </a>
                                        @else
                                            <a href="/assets/{{$userData->userApplicant->employment_certificates}}" target="_blank" class="btn btn-info text-white text-center d-flex justify-content-center">View</a>
                                        @endif
                                        <input type="file" id="employmentCertificates" name="employmentCertificates" class="form-control" accept="application/pdf">
                                    </div>
                                    <button type="button" class="btn-sm btn btn-warning" style="float:right;" onclick="document.getElementById('employmentCertificates').value = ''">Remove file</button>

                                    </div>
                                    <div class="col-md-4 text-center">
                                        <label class="labels fw-bold">Eligibility/Professional License</label>
                                        <div class="row offset-1">
                                        @if ($userData->userApplicant->eligibility == null)
                                            <a class="btn btn-info text-white text-center d-flex justify-content-center">
                                                    <p class="text-danger m-0"> (Empty)</p>
                                            </a>
                                        @else
                                            <a href="/assets/{{$userData->userApplicant->eligibility}}" target="_blank" class="btn btn-info text-white text-center d-flex justify-content-center">View</a>
                                        @endif
                                        <input type="file" id="eligibility" name="eligibility" class="form-control" accept="application/pdf">
                                        </div>
                                        <button type="button" class="btn-sm btn btn-warning" style="float:right;" onclick="document.getElementById('eligibility').value = ''">Remove file</button> 

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4 text-center">
                                        <label class="labels fw-bold">Performance Evaluation</label>
                                        <div class="row offset-1">
                                            @if ($userData->userApplicant->performance_evaluation == null)
                                            <a class="btn btn-info text-white text-center d-flex justify-content-center">
                                                    <p class="text-danger m-0"> (Empty)</p>
                                            </a>
                                        @else
                                            <a href="/assets/{{$userData->userApplicant->performance_evaluation}}" target="_blank" class="btn btn-info text-white text-center d-flex justify-content-center">View</a>
                                        @endif
                                        <input type="file" id="performanceEvaluation" name="performanceEvaluation" class="form-control" accept="application/pdf">
                                        </div>
                                        <button type="button" class="btn-sm btn btn-warning" style="float:right;" onclick="document.getElementById('performanceEvaluation').value = ''">Remove file</button>

                                    </div>
                                    <div class="col-md-4 text-center">
                                        <label class="labels fw-bold">Commendation/Awards Certificates</label>
                                        <div class="row offset-1">
                                        @if ($userData->userApplicant->commendation == null)
                                            <a class="btn btn-info text-white text-center d-flex justify-content-center">
                                                    <p class="text-danger m-0"> (Empty)</p>
                                            </a>
                                        @else
                                            <a href="/assets/{{$userData->userApplicant->commendation}}" target="_blank" class="btn btn-info text-white text-center d-flex justify-content-center">View</a>
                                        @endif
                                        <input type="file" id="commendation" name="commendation" class="form-control" accept="application/pdf">
                                    </div>
                                    <button type="button" class="btn-sm btn btn-warning" style="float:right;" onclick="document.getElementById('commendation').value = ''">Remove file</button>

                                    </div>
                                    <div class="col-md-4 text-center">
                                        <label class="labels fw-bold">Training Certificates</label>
                                        <div class="row offset-1">
                                        @if ($userData->userApplicant->training_certificates == null)
                                            <a class="btn btn-info text-white text-center d-flex justify-content-center">
                                                    <p class="text-danger m-0"> (Empty)</p>
                                            </a>
                                        @else
                                            <a href="/assets/{{$userData->userApplicant->training_certificates}}" target="_blank" class="btn btn-info text-white text-center d-flex justify-content-center">View</a>
                                        @endif 
                                        <input type="file" id="trainingCertificates" name="trainingCertificates" class="form-control" accept="application/pdf">
                                    </div>
                                    <button type="button" class="btn-sm btn btn-warning" style="float:right;" onclick="document.getElementById('trainingCertificates').value = ''">Remove file</button>

                                    </div>
                                </div>
                                
                                <hr>
                                    {{-- <p class="card-text"> <b>Status:</b> {{$job->status}}</p>
                                    <p class="card-text"> <b>Date Applied:</b> {{$userData->userApplicant->created_at->format('d/m/Y')}}</p> --}}
                                {{-- </div> --}}
                                {{-- <div class="col-md-6">
                                    <p class="card-text"> <b>Monthly Salary:</b> {{$job->salary}}</p>
                                </div> --}}
                            </div>
                            
                            <div class="row ">
                            @if( $job->to_close == 1 )
                            <p class="text-primary" style="text-align: center;">Job has been closed. Your application is now being processed.</p>
                            
                            @else
                            <button type="submit" class="btn btn-primary mx-auto text-white" style="width:50%">Update My Application</button>
                            @endif
                        </div>
                        @endif
                        

                    </div>
                    
                  </div>
                  
            </div>
            
        </div>
    </form>
        
    </div>

    



    @include('partials._footer')

    <!--                        Back to Top Arrow                         -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/easing.min.js') }}"></script> 
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counterup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script> 
    <script type="javascript" src="{{ asset('js/lightbox.min.js') }}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

    <!-- Template Javascript -->

    <script src="{{ asset('js/main.js') }}"></script> <!-- working -->
    <script
			  src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
			  integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0="
			  crossorigin="anonymous">
            </script>



    <script>
        $(function() {
            
           $( "#birthday" ).datepicker({
            dateFormat: "yy-mm-dd",
           changeMonth: true,
           changeYear: true,
           yearRange: "1940:2022",
           maxDate: "-18y",

            });
        
        });
     </script>
</body>

</html>