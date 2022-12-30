<div class="modal fade applicantLoginModal" id="applicantLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button> --}}
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h3>Login</h3>
          </div>
          <div class="d-flex flex-column text-center">
            <form action="/applicant/login" method="post">
              @csrf
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email address..." value="{{old('email')}}" required>
                @if (!$errors->loginErrors->isEmpty())
                        <p class="text-danger mt-1" style="font-size:0.8em;">{{$errors->loginErrors->first('email')}}</p>
                @endif
              </div>
              
              <div class="form-group mt-3 ">
                <input type="password" class="form-control" id="password" name="password" placeholder="Your password..." required>
                <div style="float: left;">
                  <input type="checkbox" id="showPassword"/>
                  <label for="showPassword" style="0.5em">Show password</label>
                </div>
                
                @if (!$errors->loginErrors->isEmpty())
                        <p class="text-danger mt-1" style="font-size:0.8em;">{{$errors->loginErrors->first('password')}}</p>
                @endif
              </div>
              <div class="row mt-5 float-right">
                <a href="/applicant/password-reset" class="" style="font-size:0.9em; color:#037BFF!important;">Forgot Password?</a>
              </div>
              <div class="row">
                <button type="submit" class="btn btn-success btn-block btn-round mt-3">Login</button>
              </div>
              
            </form>
            
            {{-- <div class="text-center text-muted delimiter">or login with</div>
            <div class="d-flex justify-content-center social-buttons">
              <a href="{{ route('login.google') }}" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Google">
                <i class="fab fa-google"></i>
              </a>
              <a href="{{ route('login.facebook') }}" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                <i class="fab fa-facebook"></i>
              </a>
              <a href="{{ route('login.linkedin') }}" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
                <i class="fab fa-linkedin"></i>
              </a>
          </div> --}}
        </div>
      </div>
        <div class="modal-footer d-flex justify-content-center">
          <div class="signup-section">Don't have an account yet? <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#applicantRegister" data-bs-dismiss="modal">Register Here</a>.</div>
        </div>
    </div>
  </div>
</div>