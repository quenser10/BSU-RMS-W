<x-main>
<x-flash-message/>
    <div class="home-content">
        <div class="text">Admin Management</div>
    </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active " id="nav-view-tab" data-bs-toggle="tab" data-bs-target="#nav-view" type="button" role="tab" aria-controls="nav-view" aria-selected="true"><i class='bx bx-list-ol' ></i> Admin Users</button>
                <button class="nav-link" id="nav-open-tab" data-bs-toggle="tab" data-bs-target="#nav-open" type="button" role="tab" aria-controls="nav-open" aria-selected="true"><i class='bx bxs-add-to-queue'></i> Add Admin</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade " id="nav-open" role="tabpanel" aria-labelledby="nav-open-tab">
            <div class="row">
              <div class="container" >
                <div class="card">
                  <div class="card-body">
                  <form class="form-horizontal" action="/admin/admin-management/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row my-2">
                        <label
                          for="job_title"
                          class="col-sm-2 control-label col-form-label"
                          >Last Name</label
                        >
                        <div class="col-sm-7">
                          <input
                            type="text"
                            class="form-control"
                            name="lastName"
                            id="lastName"
                            placeholder=""
                            required
                          />
                        </div>
                    </div>
                    <div class="form-group row my-2">
                      <label
                        for="job_title"
                        class="col-sm-2 control-label col-form-label"
                        >First Name</label
                      >
                      <div class="col-sm-7">
                        <input
                          type="text"
                          class="form-control"
                          name="firstName"
                          id="firstName"
                          placeholder=""
                          required
                        />
                      </div>
                    </div>
                    <div class="form-group row my-2">
                      <label
                        for="middleName"
                        class="col-sm-2 control-label col-form-label"
                        >Middle Name</label
                      >
                      <div class="col-sm-7">
                        <input
                          type="text"
                          class="form-control"
                          name="middleName"
                          id="middleName"
                          placeholder=""
                          required
                        />
                      </div>
                  </div>
                  <div class="form-group row my-2">
                    <label
                      for="extensionName"
                      class="col-sm-2 control-label col-form-label"
                      >Extension Name</label
                    >
                    <div class="col-sm-7">
                      <input
                        type="text"
                        class="form-control"
                        name="extensionName"
                        id="extensionName"
                        placeholder=""
                        
                      />
                    </div>
                </div>
                <div class="form-group row my-2">
                  <label
                    for="sex"
                    class="col-sm-2 control-label col-form-label"
                    >Sex</label
                  >
                  <div class="col-sm-7">
                    <input
                      type="text"
                      class="form-control"
                      name="sex"
                      id="sex"
                      placeholder=""
                      required
                    />
                  </div>
                </div>
                <div class="form-group row my-2">
                  <label
                    for="employeeId"
                    class="col-sm-2 control-label col-form-label"
                    >Employee ID</label
                  >
                  <div class="col-sm-7">
                    <input
                      type="text"
                      class="form-control"
                      name="employeeId"
                      id="employeeId"
                      placeholder=""
                      required
                    />
                  </div>
                </div>
                    <div class="form-group row my-2">
                        <label
                          for="email"
                          class="col-sm-2 control-label col-form-label"
                          >Email</label
                        >
                        <div class="col-sm-7">
                          <input
                            type="text"
                            class="form-control"
                            name="email"
                            id="email"
                            placeholder=""
                            required
                          />
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label
                          for="officeDesignation"
                          class="col-sm-2 control-label col-form-label"
                          >Office Designation</label
                        >
                        <div class="col-sm-7">
                          <input
                            type="text"
                            class="form-control"
                            name="officeDesignation"
                            id="officeDesignation"
                            placeholder=""
                            required
                          />
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label
                          for="password"
                          class="col-sm-2 control-label col-form-label"
                          >Password</label
                        >
                        <div class="col-sm-7">
                          <input
                            type="text"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder=""
                            required
                          />
                        </div>
                    </div>
                    <div class="form-group row my-2">
                      <label
                        for="password_confirmation"
                        class="col-sm-2 control-label col-form-label"
                        >Confirm Password</label
                      >
                      <div class="col-sm-7">
                        <input
                          type="text"
                          class="form-control"
                          name="password_confirmation"
                          id="password_confirmation"
                          placeholder=""
                          required
                        />
                      </div>
                  </div>
                    <div class="border-top p-4">
                          <button type="submit" class="btn btn-primary addBtn" id="openJobBtn">
                            Add
                          </button>
                      </div>
                  </form>
                </div>
              </div>
              </div>
            </div>
            </div>
            {{-- TAB FOR VIEW ACTIVE JOBS --}}
            <div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
            <div class="row">
              
                @csrf
                <div class="container" style="height: 100%px; overflow-y: auto;">
                  <div class="card">
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="" class="hidden"></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="adminSearch" class="form-control" id="adminSearch" placeholder="Search Table..">
                        </div>
                      </div>
                      <table class="table table-striped text-center adminManagementTable">
                        <thead>
                          <tr>
                            <th style="font-weight: bold; text-align:center;">Last Name</th>
                            <th style="font-weight: bold; text-align:center;">First Name</th>
                            <th style="font-weight: bold; text-align:center;">Middle Name</th>
                            <th style="font-weight: bold; text-align:center;">Ext. Name</th>
                            <th style="font-weight: bold; text-align:center;">Employee ID</th>
                            <th style="font-weight: bold; text-align:center;">Email</th>
                            <th style="font-weight: bold; text-align:center;">Office</th>
                            <th style="font-weight: bold; text-align:center;">Approved</th>
                            <th style="font-weight: bold; text-align:center;">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody id="adminSearchTable">
                          
                          @foreach ($admins as $admin)
                          
                            @csrf
                          <tr>
                            <td>{{$admin->last_name}}</td>
                            <td>{{$admin->first_name}}</td>
                            <td>{{$admin->middle_name}}</td>
                            <td>{{$admin->extension_name}}</td>
                            <td>{{$admin->employee_id}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->office_designation}}</td>
                            <td>{{$admin->approved}}</td>
                            
                             
                            <td style="width: 150px;">
                              <form id="deleteAdmin" action="{{route('admin.delete', $admin->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <a href="/admin/admin-management/edit/{{$admin->id}}" class="btn btn-info" style="font-size:0.8em;">Edit</a>
                             
                              
                              <button type="submit" class="btn btn-danger deleteAdminBtn" style="font-size:0.8em;">Delete</button>
                              </form>
                            </td> 
                           
                          </tr>
                        
                          @endforeach
                          
                        
                        </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
            
        </div> <!-- tab-content -->

<!-- Edit Job Modal -->
<div class="modal fade" id="updateJob" role="dialog" >
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Applicant Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/job-management/update-job" method="POST">
          @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">

                  
                
                </div>
                
              </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="updateBtn" class="btn btn-primary updateBtn">Save Changes</button>      
          </form>
          </div>
      </div>
  </div>
</div>

</x-main>


<script>
  $(".addBtn").on("click", function(e) {
e.preventDefault(); 
Swal.fire({
    title: "Confirm Action",
    text:"Are you sure you want to add admin user?",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, I Confirm!'
}).then(function(isConfirm) {
  if(isConfirm.value){
    $(e.target).closest('form').submit();
  }
  
    })
});
</script>