<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Benguet State University | HR</title>
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
    {{-- @include('partials.top-nav') --}}

    @include('partials._navbar')

    @if ($message = Session::get('unauthenticated'))
    <div class="alert alert-info alert-dismissible fade show text-center" role="alert">

        <strong>{{ $message }}</strong> 

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
      </div>
    @endif

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">

            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <img class="img-fluid " src="{{url('/images/BSU-Banner.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

   

    @include('components.login')

    @include('components.cv-application')

    @include('components.register')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 ">
        <div class="owl-carousel header-carousel position-relative" >

            <!-- 1st Carousel -->
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid " src="{{url('/images/Home/testimg.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Benguet State University</h5>
                                <h2 class="display-3 text-white animated slideInDown mb-4">WE ARE HIRING!!</h2>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">We are now an International Smart University! We offer various job opportunities that are available for you!</p>
                                <a href="/job-offers" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">View Job Offers</a>
                                <a href="/contact-us" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2nd Carousel -->
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{url('/images/Home/testimg.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Benguet State University</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Work from Home or Site</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Depending on the nature of work, you can work in your home or work inside the university. Find out your desired opportunities here!</p>
                                <a href="/job-offers" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">View Job Offers</a>
                                <a href="/contact-us" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3rd Carousel -->
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{url('/images/Home/testimg.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Benguet State University</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">University of Excellence!</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">We challenge innovations and utilize advanced technologies and facilities for Higher Education. Find out here for available job opportunities!</p>
                                <a href="/job-offers" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">View Job Offers</a>
                                <a href="/contact-us" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <div class="container-xxl py-5">
        <div class="row">
            <table>
                <td class="col-md-1 col-lg-1 wow fadeInUp mt-2" data-wow-delay="0.1s"> {{-- col-md-12 col-lg-4  --}}
                    <div > 
                    <div class="service-item">
                        <div class="overflow-hidden border border-5 border-light  border-bottom-0">
                            <a href="http://www.bsu.edu.ph/bsu-transparency-seal">
                                <img class="img-fluid" src="{{url('/images/Home/transparency-seal.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                    </div>
                </td>
                <td class="col-md-10 col-lg-1 wow fadeInUp mt-2" data-wow-delay="0.1s">
                    <div > 
                        <div class="service-item">
                            <div class="overflow-hidden border border-5 border-light  border-bottom-0">
                                <a href="http://www.bsu.edu.ph/dpa">
                                    <img class="img-fluid" src="{{url('/images/Home/dpa_panel.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </td >
                <td class="col-md-10 col-lg-1 wow fadeInUp mt-2" data-wow-delay="0.1s">
                    <div > 
                        <div class="service-item">
                            <div class="overflow-hidden border border-5 border-light  border-bottom-0">
                                <a href="http://www.bsu.edu.ph/citizens-charter">
                                    <img class="img-fluid" src="{{url('/images/Home/citizens-charter.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="col-md-10 col-lg-1 wow fadeInUp mt-2" data-wow-delay="0.1s">
                    <div > 
                        <div class="service-item">
                            <div class="overflow-hidden border border-5 border-light  border-bottom-0">
                                <a href="https://www.foi.gov.ph/requests?agency=BSU">
                                    <img class="img-fluid" src="{{url('/images/Home/foi_panel.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
            </table>
        </div>
    </div>
    <br>
@include('partials._footer')

{{-- MODAL DIALOG --}}
{{-- <div class="modal welcomeDialog" id="welcomeModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        
        <div class="modal-body">
            <div class="" >
                
                <span><img src='{{asset('images/usher.png')}}' style="width: 30%;"/><h2 class="" style='display:inline;'>Welcome!</h2></span>

            </div>
            
          <p>Modal body text goes here.</p>

        </div>
        
      </div>
    </div>
  </div> --}}

  <div class="modal fade welcomeDialog" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md  modal-dialog-centered" role="document">
      <div class="modal-content rounded-0">
        <div class="modal-body py-0">

          
          <div class="d-block main-content">
            <img src="{{asset('images/bg-02.jpg')}}" alt="Image" class="img-fluid mt-2" style="background-color: #b2fcff;" >
            <div class="content-text p-2">
              
              <h3 class="mb-2 text-center">Be a Part of Benguet State University Family</h3>
              <p class="mb-2">You may apply on the listed jobs posted on this website</p>
              <p>Having trouble navigating? You may click on the "Help" button below or the link on our navigation bar to read info on the application procedures. </p>
              <p>Want to explore? Click on the "Close" button below, you can start by Signing up or clicking the "Job Offers" on the very top of the page.</p>
              <div class="d-flex">
                <div class="ms-auto">
                  <a href="#" class="btn btn-md btn-success">Help</a>
                  <a href="#" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Close</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  

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
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>

    
    <!-- Template Javascript -->

    <script src="{{ asset('js/main.js') }}"></script> <!-- working -->

    @if (!$errors->loginErrors->isEmpty() ) 
    <script type="text/javascript">
     $( document ).ready(function() {
       
        $('#applicantLogin').modal('show'); 
        
    });  
    </script>
    @endif

    @if (!$errors->isEmpty() )
    <script type="text/javascript">
        $( document ).ready(function() {
          
           $('#applicantRegister').modal('show'); 
           
       });  
       </script>
        
    @endif

    <script>
        $(document).ready(function() {

        if (document.location.href == 'http://localhost:8000/'){
            if (Cookies.get('modal') == undefined){

            Cookies.set('modal', 'yes');
            $(".welcomeDialog").modal('show');


            }else {

            $(".welcomeDialog").modal('hide');
            }
        }
    });
    </script>

    <script>
        document.getElementById('showPassword').onclick = function() {
            if ( this.checked ) {
            document.getElementById('password').type = "text";
            } else {
            document.getElementById('password').type = "password";
            }
        };
    </script>
        
</body>

</html>