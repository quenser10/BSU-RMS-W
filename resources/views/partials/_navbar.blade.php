<!--                     Navbar Start                   -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0">
    <a href="https://www.gov.ph/" class="navbar-brand d-flex align-items-center px-0 px-lg-3">
        <h2 class="m-0 text-primary">GOVPH</h2>
    </a>
    
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav " >
            <li class="nav-item d-flex justify-content align-items-center">
                <a href="/" class="nav-link d-flex align-items-center">Home</a>  
            </li>
            <li class="nav-item">
                @if(auth()->check())
                    <li class="nav-item">
                    <a href="/my-application" class=" nav-link">My Application</a>
                    </li>
                    <li class="nav-item">
                    <a href="" class=" nav-link"  id="adminLogout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    </li>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <li class="nav-item">
                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#applicantLogin">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#applicantRegister">Sign up</a>
                    </li>
                    
                    @endif
            </li>
            <li class="nav-item">
                <a href="/contact-us" class="nav-item nav-link">Contact Us</a> 
            </li>
            <li class="nav-item">
                {{-- <a href="{{url('/pdf/Manual [Applicants].pdf')}}" target="_blank" class="nav-item nav-link">Help</a>  --}}
                <a href="/help" class="nav-item nav-link">Help</a>
            </li>
            
        </ul>
        {{-- <div class="navbar-nav ">
            <a href="/" class="nav-item nav-link">Home</a>            
            
            @if(auth()->check())
             <a href="/my-application" class="nav-item nav-link">My Application</a>

           <a href="" class="nav-item nav-link"  id="adminLogout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
            </a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                @csrf
            </form>
            

            @else
            <a href="" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#applicantLogin">Login</a>
            <a href="" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#applicantRegister">Sign up</a>
            @endif

        </div>
        --}}
        <div class="navbar-nav ms-auto p-4 p-lg-0">
             

            <a href="/job-offers" class="admin btn btn-success rounded-10 py-4 px-lg-5 d-none d-lg-block">JOB OFFERS<i class="fa fa-arrow-right ms-3"></i></a> 
        </div> 
    </div>
</nav>
<x-flash-message/>
<!--                    Navbar End                  -->