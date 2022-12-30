<div class="modal fade applicantLoginModal" id="applicantRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button> --}}
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Sign up</h4>
          </div>
          <div class="d-flex flex-column">
            <form action="/applicant/register" method="post">
            @csrf
                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                    @error('name')
                        <p class="text-danger mt-1" style="font-size:0.8em;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="form-group mt-2">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                    @error('email')
                        <p class="text-danger mt-1" style="font-size:0.8em;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2 ">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                    @error('password')
                        <p class="text-danger mt-1" style="font-size:0.8em;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2 ">
                    <label for="password_confirmation"><b>Confirm Password</b></label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="" required>
                    @error('password_confirmation')
                        <p class="text-danger mt-1" style="font-size:0.8em;">{{$message}}</p>
                    @enderror
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success btn-block btn-round mt-3">Register</button>
                </div>
                
            </form>
            
            <div class="text-center text-muted delimiter"></div>
            
        </div>
      </div>
        <div class="modal-footer d-flex justify-content-center">
          <div class="signup-section">Go to <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#applicantLogin" data-bs-dismiss="modal">Login</a>.</div>
        </div>
    </div>
  </div>
</div>