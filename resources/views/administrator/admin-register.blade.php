<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Register</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>

        @vite(['resources/js/app.js'])

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('/css/admin-register-main.css') }}">
        <link rel="stylesheet" href="{{ url('/css/admin-register-util.css') }}">
     

    </head>
    <body class="antialiased" >
    <section class="" style="background-color: #eee; width:100%; height:100%;   ">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-3">
                  <div class="row justify-content-center">
                    {{-- <img src="{{asset('/images/bsu-logo.png')}}" alt="" style="width:20%;"> --}}
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="font-family:Verdana, Geneva, Tahoma, sans-serif"> <img src="{{asset('/images/bsu-logo.png')}}" alt="" style=" width:10%;"> Register Account</p>
                    <form action="/admin/register-account" method="post">
                    @csrf
                    <div class="row border border-1 border-grey border-top-1 p-2">
                    
                    <div class="row">
                        <h2 class="mb-2">Basic Information</h2>
                        <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1">
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" id="firstName" name="firstName" class="form-control" value="{{old('firstName')}}" required/>
                                <label class="form-label" for="firstName">First Name</label>
                                @error('firstName')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" id="lastName" name="lastName" class="form-control" value="{{old('lastName')}}" required/>
                                <label class="form-label" for="form3Example3c">Last Name</label>
                                @error('lastName')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                              </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1">
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" id="middleName" name="middleName" class="form-control" value="{{old('middleName')}}" />
                                <label class="form-label" for="form3Example4c">Middle Name <i>(Optional)</i> </label>
                                @error('middleName')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                              </div>
                            </div>
          
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" id="extensionName" name="extensionName" class="form-control" value="{{old('extensionName')}}"/>
                                <label class="form-label" for="extensionName">Extension Name <i>(Leave Blank if not Applicable)</i> </label>
                                @error('extensionName')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                              </div>
                            </div>
                         </div>
                         <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1">
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <select class="form-control " name="sex" id="sex" aria-label=".form-select-lg example" required>
                                  <option value="">-Select Option-</option>
                                  <option value="Male" {{ old('sex') == "Male" ? 'selected' : '' }}>Male</option>
                                  <option value="Female" {{ old('sex') == "Female" ? 'selected' : '' }}>Female</option>
                              </select>
                              <label class="form-label" for="sex">Sex</label>
                              @error('sex')
                                  <p class="text-danger mt-1">{{$message}}</p>
                              @enderror
                              </div>
                            </div>
                         </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h2 class="mb-2">Work Information</h2>
                        <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1">
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" id="employeeId" name="employeeId" class="form-control" value="{{old('employeeId')}}" required/>
                                <label class="form-label" for="employeeId">Employee ID Num.</label>
                                @error('employeeId')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                              </div>
                            </div>
          
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" required/>
                                <label class="form-label" for="email">Email</label>
                                @error('email')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                              </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1">
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" id="officeDesignation" name="officeDesignation" class="form-control" value="{{old('officeDesignation')}}" required/>
                                <label class="form-label" for="officeDesignation">Office Designation</label>
                                @error('officeDesignation')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                              </div>
                            </div>
                         </div>
                    </div>
                    <hr>
                    <div class="row">
                        {{-- <h2 class="mb-2">Work Information</h2> --}}
                        <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1">
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="password" id="password" name="password" class="form-control" required/>
                                <label class="form-label" for="password">Password</label>
                                @error('password')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                              </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1">
                            <div class="d-flex flex-row align-items-center mb-2">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required/>
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                @error('password_confirmation')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                              </div>
                            </div>
                         </div>
                    </div>    
                    </div>
                    <div class="row">
                        <div class="form-check d-flex justify-content-center mb-2 mt-2">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>
                            <label class="form-check-label" for="form2Example3">
                                I agree to all the <a class="text-primary" href="{{url('/pdf/TERMS AND CONDITIONS.pdf')}}" target="_blank">Terms and Conditions</a> in using the system.
                            </label>
                          </div>
                        <div class="d-flex justify-content-center mt-2">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                          </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </body>
</html>
