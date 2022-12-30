<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-0 text-white">
    <div class="collapse navbar-collapse" id="navbarCollapse " >
        <div class="collapse navbar-collapse top-bar p-.5" id="navbarCollapse " >
        <div class="navbar-nav mx-5">
            <a class="nav-item nav-link" disabled> <img src="{{url('/images/republika-logo.png')}}" alt="logo" style="width: 22px"> </a>
            <a href="/" class="nav-item nav-link">Home</a>
            <a href="/transparency-seal" class="nav-item nav-link">Transparency Seal</a>  
            <a href="/contact-us" class="nav-item nav-link"  >Contact Us</a>

            
        </div>
        <div class="ms-auto pt-2 mx-4">
            <p class="">
                @auth
                <label>Hello! {{auth()->user()->name}} </label>  
                @endauth
            </p>
        </div>
        
        
    </div>
</nav>
