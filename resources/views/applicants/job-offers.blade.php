<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BSU | Job Offers</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partials.applicant-link')

</head>

<body>
    <x-flash-message/>
    {{-- @include('partials.top-nav')     --}}
    
    <!--                    Spinner Start                   -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!--                    Spinner End                     -->


    <!--                    Topbar Start                     -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <img class="img-fluid" src="{{url('/images/BSU-Banner.png')}}" alt="">
                </div>  
            </div>
        </div>
    </div>
    <!--                    Topbar End                  -->

    @include('partials._navbar')

    <!--                    Page Header Start                    -->
    <div class="container-fluid page-header py-2 mb-2">
        <div class="container py-5">
            <h3 class="display-3 text-white mb-3 animated slideInDown">Job Offers</h3>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Job Offers</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--                     Page Header End                    -->


    <!--                    Job Offers                   -->
    <div class="container-xxl py-5">
        <div class="container">
            {{-- <p class="mt-4 text-center">
                Interested and qualified applicants regardless of age, sex, sexual orientation, gender identity
                civil status, disability(PWD), <br> ethnicity or political affiliation should dignify their interest
                by attaching the following documents.
            </p> --}}
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Available Job Offers</h1>
            </div>

            @include('partials._search')

             <div class="row">
                @unless(count($openedJob) == 0)

                @foreach ($openedJob as $job)
                        <div class="col-md-12 col-lg-4 wow fadeInUp mt-2" data-wow-delay="0.1s"> {{--col-md-12 col-lg-4--}}
                            <div class="service-item flex">
                                <div class="overflow-hidden border border-5 border-light border-bottom-0 mx-auto">
                                    <img class=" img-fluid hidden w-48 md:block" src="{{$job->job_image ? asset('storage/' . $job->job_image) : asset('/images/bsu-logo.png')}}" alt="" style="max-width: 400px; height:300px;"/>
                                </div>
                                <div class=" p-2 text-center border border-5 border-light border-top-0">
                                    <h4 class="mb-3">{{$job['job_title']}}</h4>
                                    <p>{{$job['place_of_assignment']}}</p>
                                    {{-- <button href="#myModal1" class="modal-button fw-medium btn btn-success py-2 " >Job Description</button> --}}
                                    <a href="" class="modal-button fw-medium btn btn-success py-2 jobDescription modBtn" data-bs-toggle="modal" data-bs-target="#jobDescription" data-id="{{$job['job_id']}}"> Job Description </a>
                                    
                                    @if(auth()->check())
                                        @if($userData->userApplicant != null )
                                            @if ($userData->userApplicant->status == 'disqualified')
                                            <a href="/job-application/{{$job['job_id']}}" class="fw-medium btn btn-success rounded-10 py-2 modBtn" >Apply<i class="fa fa-arrow-right ms-1"></i></a>
                                            @else
                                            <button type="button" class="fw-medium btn btn-success rounded-10 py-2 modBtn applicationExist" >Apply<i class="fa fa-arrow-right ms-1"></i></button>
                                            @endif
                                        @else
                                            <a href="/job-application/{{$job['job_id']}}" class="fw-medium btn btn-success rounded-10 py-2 modBtn" >Apply<i class="fa fa-arrow-right ms-1"></i></a>
                                        @endif
                                    @else
                                        <button type="button" class="fw-medium btn btn-success rounded-10 py-2 modBtn applyBtn" >Apply<i class="fa fa-arrow-right ms-1"></i></button>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                @endforeach

                @else
                    <p>No Listings Found!</p>
                @endunless
                <div class="mt-6 p-4">
                    {{$openedJob->links()}}
                </div>
            </div>
             

            <!-- MODAL FOR JOB DESCRIPTION-->
            @include('components.job-description')

             <!-- MODAL FOR CV APPLICATION-->
             @include('components.cv-application')

             @include('components.login')

             @include('components.register')
             

            {{--modal for log in --}}
            <div class="modal fade" tabindex="-1" role="dialog" id="applicantLogin">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!--                    Job Offers End                     -->

    <!--                        Footer Start                         -->
    @include('partials._footer')
    <!--                        Footer End                      -->

    <!--                    Back to Top                    -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/easing.min.js') }}"></script> 
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counterup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script> 
    <script type="javascript" src="{{ asset('js/lightbox.min.js') }}"></script> 

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script> <!-- working -->

    {{-- Job Description --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <script>
        // $('#jobDescription').modal('hide');
        $(document).ready(function(){
            $('.jobDescription').click(function(){
                var job_id = $(this).attr('data-id');               

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                url: 'job-description/'+job_id,
                type: 'GET',
                data: {
                    
                    "job_id": job_id
                },
                success: function(data){
                    $('#jobTitle').html(data.job_title)
                    $('#item_number').html(data.item_number)
                    $('#status').html(data.status)
                    $('#location').html(data.place_of_assignment)
                    $('#salary').html(data.salary)
                    $('#education').html(data.education)
                    $('#training').html(data.training)
                    $('#experience').html(data.experience)
                    $('#eligibility').html(data.eligibility)
                    $('#competency').html(data.competency)
                    $('#duties').html(data.duties)

                }, 
                error:function(xhr){
                    console.log(xhr.responseText);
                }
            });
                
            });
        });
     </script>


<script>
    $(document).ready(function(){
    $('.applyBtn').click(function(e){
        Swal.fire({
        title: 'Notice!',
        text: "Please Login first or Sign up if you don't have an account.",
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        })
    });
})
</script>

<script>
    $(document).ready(function(){
    $('.applicationExist').click(function(e){
        Swal.fire({
        title: 'Action Denied!',
        text: "You have an active application already.",
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        })
    });
})
</script>

</body> 

</html>