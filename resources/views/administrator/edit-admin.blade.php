<x-main>
    @foreach ($admin as $row)
        
        <div class="home-content">
            <div class="text">Edit Admin</div>
            <p><a href="/admin/admin-management" class="text-decoration-none text-primary">Admin Management</a> / Edit Admin</p>
    
        </div>
        <form action="/admin/admin-management/update/{{$row->id}}" method="POST">
        @csrf
        <div class="card shadow-lg m-3">
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name*</label>
                         <input type="text" class="form-control" id="lastName" name="lastName" value="{{$row->last_name}}" placeholder="{{$row->last_name}}">
                         @error('lastName')
                         <p class="text-danger mt-1">{{$message}}</p>
                         @enderror
                    </div>
                    <div class="mb-3">
                       <label for="firstName" class="form-label">First Name*</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="{{$row->first_name}}" placeholder="{{$row->first_name}}">
                        @error('firstName')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                    </div>
                     <div class="mb-3">
                        <label for="middleName" class="form-label">Middle Name*</label>
                         <input type="text" class="form-control" id="middleName" name="middleName" value="{{$row->middle_name}}" placeholder="{{$row->middle_name}}">
                     </div>
                     <div class="mb-3">
                        <label for="extensionName" class="form-label">Ext. Name*</label>
                         <input type="text" class="form-control" id="extensionName" name="extensionName" value="{{$row->extension_name}}" placeholder="{{$row->extension_name}}">
                         @error('extensionName')
                         <p class="text-danger mt-1">{{$message}}</p>
                         @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label " for="password">Password</label>
                       <div class="form-outline form-white mb-4">
                          <div class="input-group flex-nowrap">
                              
                            <input type="password" id="password" name="password" class="form-control form-control-lg" aria-describedby="addon-wrapping">
                            <span class="input-group-text" id="addon-wrapping"><i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i></span>
                            
                          </div>
                          
                          @error('password')
                          <p class="text-danger mt-1">{{$message}}</p>
                          @enderror
                        </div>
                   </div>
                     
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sex" class="form-label">Sex*</label>
                         <input type="text" class="form-control" id="sex" name="sex" value="{{$row->sex}}" placeholder="{{$row->sex}}">
                         @error('sex')
                         <p class="text-danger mt-1">{{$message}}</p>
                         @enderror
                         {{-- <select class="form-select" id="sex" name="sex">
                          <option value="Male" selected>Male</option>
                          <option value="Female">Female</option>
                        </select> --}}
                    </div>
                     <div class="mb-3">
                        <label for="employeeId" class="form-label">Employee ID*</label>
                         <input type="text" class="form-control" id="employeeId" name="employeeId" value="{{$row->employee_id}}" placeholder="{{$row->employee_id}}">
                         @error('employeeId')
                         <p class="text-danger mt-1">{{$message}}</p>
                         @enderror
                    </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
                         <input type="email" class="form-control" id="email" name="email" value="{{$row->email}}" placeholder="{{$row->email}}">
                         @error('email')
                         <p class="text-danger mt-1">{{$message}}</p>
                         @enderror
                    </div>
                     <div class="mb-3">
                        <label for="officeDesignation" class="form-label">Office Designation*</label>
                         <input type="text" class="form-control" id="officeDesignation" name="officeDesignation" value="{{$row->office_designation}}" placeholder="{{$row->office_designation}}">
                         @error('officeDesignation')
                         <p class="text-danger mt-1">{{$message}}</p>
                         @enderror
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="approved" value="1" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Activate
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="approved" value="0" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                  Deactivate
                </label>
              </div>
                  <hr>
                  <button class="btn btn-primary">Save</button>
                        

            </div>     
        </div>
    </form>
            
    @endforeach
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
    