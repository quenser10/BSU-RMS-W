<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Benguet State University | HR</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/owl.carousel.min.css') }}" rel="stylesheet">

    <script src="//unpkg.com/alpinejs" defer></script>

     <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('/css/job-listing-style.css') }}" rel="stylesheet">

    <style>
        .col-fixed { 
            position:relative; 
            min-height:1px; 
            padding-right:15px; 
            padding-left:15px; 
            float:left; 
            width:100%;  }
        .col-fluid { 
            position:relative; 
            min-height:1px; 
            padding-right:15px; 
            padding-left:15px; 
            float:left; 
            width:100%;  }
        @media (min-width: 768px) and (max-width: 991px) {    
            .col-fixed { width:350px; }
            .col-fluid { width:calc(100% - 350px);}        
            }                                          
 
        @media (min-width: 992px) and (max-width: 1199px) {
            .col-fixed { width:350px; }
            .col-fluid { width:calc(100% - 350px);}
        }
        
        @media (min-width: 1200px) {
            .col-fixed { width:350px; }
            .col-fluid { width:calc(100% - 350px);}
        }
    </style>
    
</head>

<body>          
    <x-flash-message/>
    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    {{-- @include('partials.top-nav') --}}


    <!-- Navbar Start -->
    @include('partials._navbar')
    <!-- Navbar End -->

    @include('components.login')

    @include('components.cv-application')

    @include('components.register')
    
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-2 mb-2">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Help</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="">Help</a></li>
                    

                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="sidebar col-fixed">
				<h5>Getting Started Contents</h5>
				<a href="#login"><h6>Logging In</h6></a>
				<a href="#register"><h6>Registering an Account</h6></a>
				<a href="#forpassword"><h6>Did you forgot your password?</h6></a>
				<a href="#apply"><h6>Applying for a Job</h6></a>
				<a href="#appform"><h6>Filling the Application Form</h6></a>
				<a href="#appstatus"><h6>Checking your Applicant Status</h6></a>
            </div>
            <div class="main-content col-fluid">
                        <h4>1 Getting Started</h4>
                        <img src="{{asset('/images/home/img1.png')}}" alt="start">
                        <p class="contents"><strong>Welcome!</strong> This is the site homepage where it displays relevant updates about the BSU-HRMO’s activities.</p>
                        <p class="contents">The upper part of the webpage that is bordered in red line on the image is the <strong>Navigation Bar</strong>, you can use to gain access, register or sign-up an account, contact the HR office and view the job postings</p>

                        <br>
                        <br>

                        <h4 id="login">1.1 Logging-In</h4>
                        <img src="{{asset('images/home/img2.png')}}">
                        <p class="contents">To access the apply button in the <strong>Job Offers</strong> page, click on the <strong>Log In</strong> tab in the navigation bar of the homepage</p>

                        <br>
                        <br>

                        <h4 id="register">1.2 Register an Account</h4>
                        <img src="{{asset('images/home/img3.png')}}">
                        <p class="contents">To register an account, click on the <strong>Sign-up</strong> tab in the navigation bar of the homepage.Then fill-up the form with <strong>Correct and True</strong> details.</p>

                        <br>
                        <br>

                        <h4 id="forpassword">1.4 Did You Forgot Your Password?</h4>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-auto"><img style="width:350px;height:400px;" src="{{asset('images/home/img4.png')}}"></div>
                                <div class="col-md-auto"><img style="width:350px;height:400px;margin-left:20px;" src="{{asset('images/home/img5.png')}}"></div>
                            </div>
                        </div>
                        <br>
                        <p class="contents">If you had forgotten your account's password, just click on the <strong>Forgot Password</strong> statement below the input fields in the Log In form. It will then direct you to a new page, that will require you to input your email. After typing down your email, click on the <strong>Send Password</strong> Link button, then check your email inbox for the provided reset link (Sample below).</p>
                        <br>
                        <img src="{{asset('images/home/img6.png')}}">

                        <br>
                        <br>
                        <br>

                        <h4 id="apply">2.0 Applying for a Job</h4>
                        <img style="width:800px; height: 450px;" src="{{asset('images/home/img7.png')}}">
                        <br>
                        <br>
                        <p class="contents">To view the jobs posted by the BSU-HRMO, drag the cursor into the <strong>Job Offers</strong> tab and click on it. It will display you the available job vacancies in the university as shown in the figure below.</p>
                        <br>
                        <img src="{{asset('images/home/img8.png')}}">
                        <br>
                        <p class="contents">However, if you try to apply a job opening without an account, you will receive a notice prompting
                        (such as the figure below) you to register or log-in.</p>
                        <br>
                        <img src="{{asset('images/home/img9.png')}}">

                        <br>
                        <br>
                        <br>

                        <h4 id="appform">2.1 Filling the Application Form</h4>
                        <p class="contents">If you have already a <strong>verified account</strong>, you can now apply for a job vacancy and fill-up the application form. In entering your personal information, it is important to follow the format specified for each field.</p>

                        <p class="contents">Section 1 (figure below), requires your basic information which is your last name, first name,
                        middle name, extension name, date of birth, sex, marital status, disability status and the country of origin.</p>
                        <br>
                        <img src="{{asset('images/home/img10.png')}}">
                        <br>
                        <br>
                        <p class="contents">Section II (figure below), requires your contact information which is your email address, mobile
                        number and your present address.</p>
                        <p class="contents">Section III, requires your education information, such as your highest educational attainment,
                        course acquired, the school you had graduated and the year of last attendance.</p>
                        <br>
                        <img src="{{asset('images/home/img11.png')}}">
                        <br>
                        <p class="contents">The following part is where you will be uploading your documents in a <strong>strictly PDF format for the purpose of uniformity and ease of information</strong></p>
                        <p class="contents">Section IV are the required documents which are your application letter and the personal data
                        sheet (PDS) which can be acquired by clicking the <strong>“Click Here”</strong> link and then which you can fill-up and upload it.</p>
                        <p class="contents">Section V are your supporting documents which provides proof of your eligibility and authenticity
                        of the information you had previously inputted. The documents required here are the work experience, sheet, official transcript of records (OTR), employment certificate, license,performance evaluation rating, and commendation or awards certificates.</p>
                        <br>
                        <img src="{{asset('images/home/img12.png')}}">
                        <br>
                        <p class="contents"><strong>Note:</strong>Your training certificate(s) should be compiled into a single file and should be within 5 years then upload it.</p>
                        <p class="contents"><strong>Note:</strong>Before submitting, check all the information you had inputted, once submitted it will be no longer editable. If you are satisfied, you can click the “Submit Application” button</p>
                        <br>
                        <img src="{{asset('images/home/img13.png')}}">

                        <br>
                        <br>
                        <br>
                        <br>

                        <h4 id="appstatus">3.0 Checking Your Application Status</h4>
                        <p class="contents">Go back to the homepage and through the navigation bar click on the <strong>My Application tab</strong>. <strong>Note:</strong>Do not log out your account when checking your status, as the “My Application” tab will not appear.</p>
                        <br>
                        <img src="{{asset('images/home/img14.png')}}">
                        <p class="contents">After clicking the “My Application” tab, it will show you the status of your application (Sample
                        below).</p>
                        <p class="contents">You will be also contacted through your email¸ to know if you had been qualified or disqualified.</p>
                        <br>
                        <img src="{{asset('images/home/img15.png')}}">
            </div>
        </div>
	</div>

 

{{-- FOOTER --}}
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
    
    <!-- Template Javascript -->

    <script src="{{ asset('js/main.js') }}"></script> <!-- working -->
</body>

</html>