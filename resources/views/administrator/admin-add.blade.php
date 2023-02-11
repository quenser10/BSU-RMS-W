<x-main>
    <x-flash-message/>
    <div class="home-content mb-4">
        <div class="text">Add Admin</div>
        <p><a href="/admin/admin-management" class="text-decoration-none text-primary">Admin Management</a> / Add Admin</p>
    </div>
    <div class="row">
        <div class="container" >
            <div class="card">
              <div class="card-body">
              <form class="form-horizontal" action="/admin/admin-management/add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row my-2">
                    <label for="lastName" class="col-sm-2 control-label col-form-label">Last Name</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="lastName" id="lastName" value="{{old('lastName')}}" required/>
                    </div>
                </div>
                <div class="form-group row my-2">
                  <label for="job_title" class="col-sm-2 control-label col-form-label">First Name</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="firstName" id="firstName" value="{{old('firstName')}}" required/>
                  </div>
                </div>
                <div class="form-group row my-2">
                  <label for="middleName" class="col-sm-2 control-label col-form-label">Middle Name</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="middleName" id="middleName" value="{{old('middleName')}}" required/>
                  </div>
              </div>
              <div class="form-group row my-2">
                <label for="extensionName" class="col-sm-2 control-label col-form-label">Extension Name</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="extensionName" id="extensionName" value="{{old('extensionName')}}"/>
                </div>
            </div>
            <div class="form-group row my-2">
              <label for="sex" class="col-sm-2 control-label col-form-label" >Sex</label>
              <div class="col-sm-7">
                <select class="form-select" id="sex" name="sex">
                    <option value="Male" {{ old('sex') == "Male" ? 'selected' : '' }} selected>Male</option>
                    <option value="Female" {{ old('sex') == "Female" ? 'selected' : '' }}>Female</option>
                  </select>
              </div>
            </div>
            <div class="form-group row my-2">
              <label for="employeeId" class="col-sm-2 control-label col-form-label">Employee ID</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="employeeId" id="employeeId" value="{{old('employeeId')}}" required/>
              </div>
            </div>
                <div class="form-group row my-2">
                    <label for="email" class="col-sm-2 control-label col-form-label">Email</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}" required/>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label for="officeDesignation" class="col-sm-2 control-label col-form-label">Office Designation</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="officeDesignation" id="officeDesignation" value="{{old('officeDesignation')}}" required/>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="control-label col-form-label col-sm-2" for="password">Password</label>
                    <div class="col-sm-7">
                        <div class="form-outline form-white">
                            <div class="input-group flex-nowrap">
                            <input type="password" id="password" name="password" class="form-control form-control-md" required>
                            <span class="input-group-text" id="addon-wrapping"><i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i></span>
                            </div>
                            @error('password')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="control-label col-form-label col-sm-2" for="password_confirmation">Confirm Password</label>
                    <div class="col-sm-7">
                        <div class="form-outline form-white">
                            <div class="input-group flex-nowrap">
                                
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-md" required>
                            </div>
                            @error('password')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
              </div>
                <div class="border-top p-4">
                      <button type="submit" class="btn btn-primary addBtn">
                        Add
                      </button>
                  </div>
              </form>
            </div>
          </div>
          </div>
    </div>
</x-main>

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
