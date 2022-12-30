<x-main>
    @foreach ($admin as $row)
        
        <div class="home-content">
            <div class="text">Edit Admin</div>
            <p><a href="/admin-management" class="text-decoration-none text-primary">Admin Management</a> / Edit Admin</p>
    
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
                     </div>
                    <div class="mb-3">
                       <label for="firstName" class="form-label">First Name*</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="{{$row->first_name}}" placeholder="{{$row->first_name}}">
                    </div>
                     <div class="mb-3">
                        <label for="middleName" class="form-label">Middle Name*</label>
                         <input type="text" class="form-control" id="middleName" name="middleName" value="{{$row->middle_name}}" placeholder="{{$row->middle_name}}">
                     </div>
                     <div class="mb-3">
                        <label for="extensionName" class="form-label">Ext. Name*</label>
                         <input type="text" class="form-control" id="extensionName" name="extensionName" value="{{$row->extension_name}}" placeholder="{{$row->extension_name}}">
                     </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sex" class="form-label">Sex*</label>
                         <input type="text" class="form-control" id="sex" name="sex" value="{{$row->sex}}" placeholder="{{$row->sex}}">
                     </div>
                     <div class="mb-3">
                        <label for="employeeId" class="form-label">Employee ID*</label>
                         <input type="text" class="form-control" id="employeeId" name="employeeId" value="{{$row->employee_id}}" placeholder="{{$row->employee_id}}">
                     </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
                         <input type="email" class="form-control" id="email" name="email" value="{{$row->email}}" placeholder="{{$row->email}}">
                     </div>
                     <div class="mb-3">
                        <label for="officeDesignation" class="form-label">Office Designation*</label>
                         <input type="text" class="form-control" id="officeDesignation" name="officeDesignation" value="{{$row->office_designation}}" placeholder="{{$row->office_designation}}">
                     </div>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="approved" value="1" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Approved
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="approved" value="0" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Not Approved
                </label>
              </div>
                  <hr>
                  <button class="btn btn-primary">Save</button>
                        

            </div>     
        </div>
    </form>
            
    @endforeach
    </x-main>
    