<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>

        @vite(['resources/js/app.js'])

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('/css/login-main.css') }}">
        <link rel="stylesheet" href="{{ url('/css/login-util.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     

    </head>
    <body class="antialiased" >

        <div class="limiter">
          <div class="container-login100" style="background-image: url({{url('images/bg-01.jpg')}});">
            <div class="wrap-login100">
              <form  class="login100-form validate-form" action="{{route('admin.login')}}" method="POST">
                @csrf
                <div class="card-body p-5 text-center"> 
                  <div class="mb-md-3 mt-md-0 pb-0">
                    <img src="{{url('images/bsu_logo.png')}}" alt="" style="width: 40%;">
                    <h2 class="fw-bold mb-2 text-uppercase text-white p-2">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your ID Number and Password.</p>
                  @if ($errors->has('throttle'))
                  <div class="alert alert-danger">
                      <strong>{{ $errors->first('throttle') }}</strong>
                    </div>
                  @endif
                    @if(session()->has('message'))
                        <p class="alert alert-info">
                            {{session()->get('message')}}
                        </p>
                    @endif
                    
                    <div class="form-outline form-white mb-4">
                      <input type="text" id="employee_id" name="employee_id" class="form-control form-control-lg" />
                      <label class="form-label text-white" for="employee_id">Employee ID Number</label>
                      @error('employee_id')
                      <p class="text-danger mt-1">{{$message}}</p>
                      @enderror
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      
                      {{-- <input type="password" id="password" name="password" class="form-control form-control-lg" />                      
                      <label class="form-label text-white" for="password">Password</label> --}}
                      <div class="input-group flex-nowrap">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" aria-describedby="addon-wrapping">
                        <span class="input-group-text" id="addon-wrapping"><i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i></span>
                        
                      </div>
                      <label class="form-label text-white" for="password">Password</label>
                      @error('password')
                      <p class="text-danger mt-1">{{$message}}</p>
                      @enderror
                    </div>
                    

                    <div class="form-check text-white">
                      <input class="form-check-input" type="checkbox" value="" id="terms" required>
                      <label class="form-check-label" for="terms">
                        I agree to the <a href="{{url('/pdf/TERMS AND CONDITIONS.pdf')}}" style="color: green; font-size:1em; font-family: initial !important; font-size: initial !important;">Terms and Conditions</a> in using the system.
                      </label>
                    </div>
      
                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!"></a></p>
      
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                  </div>
      
                  <div>
                    <p>Create an acccount <a href="/admin/register">Register Here</a></p>
                  </div>
      
                </div>
              </form>
            </div>
          </div>
	</div>

<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
    </body>
</html>
