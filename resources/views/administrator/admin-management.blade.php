<x-main>
<x-flash-message/>
    <div class="home-content">
        <div class="text">Admin Management</div>
    </div>
    <div class="row p-2">
      <div class="col-md-3">
        <a class="btn btn-primary" href="/admin/admin-management/add-admin">Create Admin User</a>
      </div>
      
    </div>    
            <div class="row">             
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
                            <th style="font-weight: bold; text-align:center;">Status</th>
                            <th style="font-weight: bold; text-align:center;">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody id="adminSearchTable">
                          
                          @foreach ($admins as $admin)
                          
                          <tr>
                            <td>{{$admin->last_name}}</td>
                            <td>{{$admin->first_name}}</td>
                            <td>{{$admin->middle_name}}</td>
                            <td>{{$admin->extension_name}}</td>
                            <td>{{$admin->employee_id}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->office_designation}}</td>
                            @if ($admin->approved == 1)
                            <td>Active</td>
                            @else
                            <td>Deactivated</td>
                            @endif
                            
                            
                             
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