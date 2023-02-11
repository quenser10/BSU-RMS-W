<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Online BSU RMS </title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>

    @vite(['resources/js/app.js'])

    <script src="//unpkg.com/alpinejs" defer></script>

    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <!-- Boxiocns CDN Link -->


    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/date-1.1.1/datatables.min.css"/>
  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/rg-1.1.4/datatables.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>  

  <div class="sidebar">
    <div class="logo-details">
      <img src="{{url('/images/bsu_logo.png')}}" alt="logo" class="light-logo icon" width="35"/>
      <span class="logo_name">BSU HRMO RMS</span>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-links">
      <li>
        
      </li>
      <li>
        <a href="{{url('/dashboard')}}">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="dashboard.php">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-user-account'></i>
            <span class="link_name">Applicants</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Tasks</a></li>
          <li><a href="{{url('/initial-assessment') }}">Initial Assessment</a></li>
          <li><a href="{{url('/applicant-tracking') }}">Applicant Tracking</a></li>
        </ul>
      </li>



      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-book-open'></i>
            <span class="link_name">Manage Jobs</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Manage Jobs</a></li>
          <li><a href="{{url('/admin/job-management/open-a-job') }}">Open a Job</a></li>
          <li><a href="{{url('/admin/job-management/opened-jobs') }}">Opened Jobs</a></li>
          <li><a href="{{url('/admin/job-management/closed-jobs') }}">Closed Jobs</a></li>
        </ul>
      </li>

      <li>
        <a href="{{url('/admin/masterlist')}}">
          <i class='bx bx-list-ul' ></i>
          <span class="link_name">Master List</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{url('/admin/masterlist')}}">Master List</a></li>
        </ul>
      </li>
      {{-- <li>
        <a href="{{url('/applicant-tracking')}}">
          <i class='bx bxs-user-account' ></i>
          <span class="link_name">Applicant Tracking</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="applicant-tracking.php">Tracking</a></li>
        </ul>
      </li> --}}
      {{-- IF ADMIN IS LOGGED IN --}}
      
      {{-- @if(auth('admin')->user()->is_admin == 1) --}}
      
      
        {{-- <li>
            <a href="audit-trail.php">
            <i class="bx bxs-file-find"></i>
              <span class="link_name">Audit Trail</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="audit-trail.php">Audit Trail</a></li>
            </ul>
        </li> --}}
        <li>
            <a href="{{url('/admin/admin-management')}}">
            <i class="bx bxs-user-detail"></i>
              <span class="link_name">Admin Management</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="{{url('/admin-management')}}">Admin Management</a></li>
            </ul>
        </li>
        <li>
          <a href="{{url('/admin/audit-trail')}}">
            <i class='bx bx-book-content'></i>
            <span class="link_name">Audit Trail</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="{{url('/admin-management')}}">Audit Trail</a></li>
          </ul>
      </li>
        <li>
          <a href="{{url('/admin/on-site-application')}}">
            <i class='bx bx-folder-plus'></i>
            <span class="link_name">On-site Application</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="/admin/on-site-application">On-site Application</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
            <i class="bx bxs-data"></i>
              <span class="link_name">Database</span>
            </a>
            <i class="bx bxs-chevron-down backupArrow" ></i>
          </div>
          <ul class="sub-menu">
              <li><a class="link_name" href="#">Database</a></li>
              <li><a href="{{url('/backup-database')}}">Backup Database</a></li>
              <li><a href="{{url('/restore-database')}}">Restore Database</a></li>
          </ul>
        </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="{{url('/images/user.png')}}" alt="profileImg">
        <div class="name-job">
          <div class="profile_name">
            @if (auth('admin')->check())
              {{ auth('admin')->user()->first_name . ' ' .  auth('admin')->user()->last_name}} 
            @endif
          </div>
          <div class="job">
            @if (auth('admin')->check())
              {{ auth('admin')->user()->employee_id }}
            @endif
          </div>
        </div>
     </div>
     <a href="" class="adminLogout" >
          <i class='bx bx-log-out' id="log_out"></i>
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">
          @csrf
      </form>
      </li>
    </ul>
  </div>


  <!-- CONTENT SECTION -->
  
<div class="home-section">
  
    <div class="container-fluid">
     
      <div class="con">
       
      <!-- PUT CODE HERE-->
         
      {{$slot}}
                
      </div>
    </div>
    <footer class="sticky-footer">
        <ul>
          <li><a href="{{url('/dashboard')}}">Home</a></li>
          <li><a href="{{url('/pdf/20-DPPolicy-May-06-2021.pdf')}}">BSU Data Privacy Policy</a></li>
        </ul>
        <p>Copyright 2022</p>
    </footer>
    
</div>
{{-- <x-applicant-side.flash-message/> --}}



  <!-- SCRIPTS -->
  <script>
  let arrow = document.querySelectorAll(".arrow, .backupArrow, .usersArrow .jobArrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- \<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/date-1.1.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>

{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>






<script>
  $(document).ready(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>


<script>

$(document).ready(function () {
  $('.adminManagementTable').DataTable({
    searching: true,
      dom: 'lBfrtip<"actions">',
        buttons: [
                    {
                      extend:'excel',
                      className: 'btn ',
                      text: window.excelButtonTrans,
                        exportOptions: {
                            columns: ['0','1','2','3','4','5','6','7'],
                        }
                    }, 
                ],
        
    });
    $("#adminSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#adminSearchTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    
    });
});
  $(document).ready(function () {
    $('#auditTable').DataTable({
        searching:false,
        pagingType: 'full_numbers',
    });
    $('#qualifiedTable').DataTable({
        searching:false,
        pagingType: 'full_numbers',
    });
    $('#disqualifiedTable').DataTable({
      searching:false,
        pagingType: 'full_numbers',
    });
    $('.applicantAccountsTable').DataTable({
      searching:false,
        pagingType: 'full_numbers',
    });
    $('.adminLogsTable').DataTable({
      searching:false,
        pagingType: 'full_numbers',
        
    });
    $("#adminLogsSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#adminLogsSearchTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    
    $("#applicantAccountSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#applicantAccountTableSearch tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    
    $("#qualifiedSearch, #disqualifiedSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#qualifiedSearchTable tr, #disqualifiedSearchTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    
  });
});
    
</script>
<script>
  $(document).ready( function () {
    $('#myTable tfoot th').each( function () {
        var title = $('#myTable tfoot th').eq( $(this).index() ).text();
        if(title!=""){
            $(this).html( '<input type="text" placeholder="Search" style="width: 80%"/>' );
            // $(this).html( '<input type="text" placeholder="Search '+title+'" style="width: 80%"/>' );
      }
    } );
//**********
    
    // DataTable
    var table = $('#myTable').DataTable({
      searching:false,
      
    "columnDefs": [
        { "searchable": false, "targets": [5] ,}
    ],
    });
 
    // Apply the search
    // table.columns().eq(0).each( function ( colIdx ) { //    table.columns().eq( 0 ).each( function ( colIdx ) {
    //     if( !table.settings()[0].aoColumns[colIdx].bSearchable ){
    //     table.column( colIdx ).footer().innerHTML=table.column( colIdx ).header().innerHTML;
    // }
    //     $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
    //         table
    //             .column( colIdx )
    //             .search( this.value )
    //             .draw();
    //     } );
    // } );
    // $('#myTable tfoot tr').appendTo('#myTable thead');
 //***   
    $("#initialSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tableSearch tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
} );
</script>
<script>
  $(function() {
    var dateToday = new Date();
     $( "#opening_date" ).datepicker({
      dateFormat: "yy-mm-dd",
      minDate: '-1M',
      maxDate: '+1M'
      });
      $( "#closing_date" ).datepicker({
      dateFormat: "yy-mm-dd",
      minDate: '-1M',
      maxDate: '+2M'
      });
  
  });
</script>

<script>
  $(".deleteAdminBtn").on("click", function(e) {
e.preventDefault(); 
Swal.fire({
    title: "Confirm Action",
    text:"Are you sure you want to delete admin user?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Delete!'
}).then(function(isConfirm) {
  if(isConfirm.value){
    $(e.target).closest('form').submit();
  }
  
    })
});
</script>

<script>
  $(".adminLogout").on("click", function(e) {
e.preventDefault(); 
Swal.fire({
    title: "Confirm Action",
    text:"Are you sure you want log out?",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
}).then(function(isConfirm) {
  if(isConfirm.value){
    document.getElementById('logout-form').submit();
  }
  
    })
});
</script>



<script>
  $('.openJobBtn').on('click', function(e){
if($(this).closest('form')[0].checkValidity()){
    e.preventDefault();
    var form = $(this).parents('form');
        
    Swal.fire({
    title: 'Confirm Action',
    text: "Proceed opening job.",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Submit!'
    }).then(function(isConfirm) {
    if (isConfirm.value) {
        form.submit();
    }
    })
return false;
    }
});
</script>





<script>
  // $('#jobDescription').modal('hide');
  $(document).ready(function(){
      $('.view_applicant').click(function(){
          var id = $(this).attr('data-id');               
          $.ajaxSetup({
              headers:{
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
          url: 'view-applicant/'+id,
          type: 'GET',
          data: {
              
              "applicant_id": id
          },
          success: function(data){
            // $('#competency').html(data.competency)
              $('#fname').val(data.first_name)
              $('#lname').val(data.last_name)
              $('#pnumber').val(data.mobile_number)
              $('#address').val(data.address)
              $('#birthdate').val(data.birhtday)
              $('#sex').val(data.sex)
              // $('#bloodtype').val(data.blood_type)
              $('#jobinterest').val(data.applying_for)
              $('#education').val(data.college_degree)
              $('#jobdiscovery').val(data.job_discovery)
          }, 
          error:function(xhr){
              console.log(xhr.responseText);
          }
      });
          
      });
  });
</script>


<script>
  // $('#jobDescription').modal('hide');
  $(document).ready(function(){
      $('.view_applicant').click(function(){
          var id = $(this).attr('data-id');               
          $.ajaxSetup({
              headers:{
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
          url: 'view-applicant/'+id,
          type: 'GET',
          data: {
              
              "applicant_id": id
          },
          success: function(data){
            // $('#competency').html(data.competency)
              $('#fname').val(data.first_name)
              $('#lname').val(data.last_name)
              $('#pnumber').val(data.mobile_number)
              $('#address').val(data.address)
              $('#birthdate').val(data.birhtday)
              $('#sex').val(data.sex)
              // $('#bloodtype').val(data.blood_type)
              $('#jobinterest').val(data.applying_for)
              $('#education').val(data.college_degree)
              $('#jobdiscovery').val(data.job_discovery)
          }, 
          error:function(xhr){
              console.log(xhr.responseText);
          }
      });
          
      });
  });
</script>


  
<script>
  $(function() {
      
     $( "#birthday" ).datepicker({
      dateFormat: "yy-mm-dd",
     changeMonth: true,
     changeYear: true,
     yearRange: "1940:2022",
     maxDate: "-18y",

      });
  
  });
</script>
<script>
  $(function() {
      
     $( "#from_date" ).datepicker({
      dateFormat: "yy-mm-dd",
     changeMonth: true,
     changeYear: true,


      });
      $( "#to_date" ).datepicker({
      dateFormat: "yy-mm-dd",
     changeMonth: true,
     changeYear: true,


      });
  
  });
</script>

<script>
// $('#closedJobs').DataTable({
//       searching:false,
//         pagingType: 'full_numbers',
//     });

// $("#closedJobsSearch").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//     $("#closedJobsSearchTable tr").filter(function() {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });


</script>

<script>
  $('.submitApplication').on('click', function(e){

      if($(this).closest('form')[0].checkValidity()){
          e.preventDefault();

          var form = $(this).parents('form');                    

          if(emptyFileField !=0){
              Swal.fire({
              title: 'Submit Application?',
              icon: 'question',
              html:
                  '<p> Some files are empty, would you like to continue?</p> '+
              
                  '<ul id="myList" style="text-align:left; margin-left:45px; font-size:0.9em;"></ul> ',
              
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Submit!'
              }).then(function(isConfirm) {
              if (isConfirm.value) {
                  form.submit();
              }
              })

              //********
              var emptyFileField = [];

              if( document.getElementById("work_experience").files.length == 0 ){
              emptyFileField.push("Work Experience is Empty");
              }
              if( document.getElementById("otr").files.length == 0 ){
                  emptyFileField.push("OTR is Empty");
              }
              if( document.getElementById("employment_certificates").files.length == 0 ){
                  emptyFileField.push("Employment certificates is Empty");
              }
              if( document.getElementById("eligibility").files.length == 0 ){
                  emptyFileField.push("Eligibility/Professional License is Empty");
              }
              if( document.getElementById("performance_evaluation").files.length == 0 ){
                  emptyFileField.push("Performance Evaluation is Empty");
              }
              if( document.getElementById("commendation").files.length == 0 ){
                  emptyFileField.push("Commendation certificates is Empty");
              }
              if( document.getElementById("training_certificates").files.length == 0 ){
                  emptyFileField.push("Training certificates is Empty");
              }

              let list = document.getElementById("myList");

              

              emptyFileField.forEach((item)=>{
              let li = document.createElement("li");
              li.innerText = item;
              list.appendChild(li);
              })
          }
          if(emptyFileField == 0){
              Swal.fire({
              title: 'Submit Application?',
              text: "You won't be able to edit after submitting!",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Submit!'
              }).then(function(isConfirm) {
              if (isConfirm.value) {
                  form.submit();
              }
              })
          }
          
      return false;
          }
  });
</script>   

{{-- DATATABLE BUTTONS --}}
 <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

</body>
</html>