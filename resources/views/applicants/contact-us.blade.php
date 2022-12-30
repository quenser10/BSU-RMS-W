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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="">Contact Us</a></li>
                    

                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="">
                            <h1 class="display-5 mb-4">Contact Us</h1>
                        </div>
                        <p class="mb-4">Hi! Are you planning to contact us? Don't worry, The contact details of the Benguet State University, Human Resources Management Office will be provided in this page or on the footer of the page.</p>
                        <p> Feel free to email us, call us, notify our Facebook page or visit us on site!</p>
            
                            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Benguet State University, La Trinidad, Benguet, 2601 Philippines</a></p>
                            <p class="mb-2"><i class="fa fa-phone me-3"></i>(074) 422-2176</p>
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i><a style="color: #4cb82a;" href="mailto: hrmo.rsp@bsu.edu.ph? subject=subject text" >hrmo.rsp@bsu.edu.ph</a></p>
                            <p class="mb-2" ><i class="fab fa-facebook-square me-3" ></i><a style="color: #4cb82a;" href="https://www.facebook.com/hrmobsu">www.facebook.com/hrmobsu</a></p> <br>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3826.468390873921!2d120.5894109!3d16.4518039!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a3bb8e7b741f%3A0x96fbbb02849bcd31!2sBenguet%20State%20University%20Administration%20Office!5e0!3m2!1sen!2sph!4v1665405766656!5m2!1sen!2sph"
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

 -->

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