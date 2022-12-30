<x-main>
    <x-flash-message/>
    <div class="home-content mb-4">
        <div class="text">Manage Jobs</div>
        <p><a class="text-decoration-none text-reset">Manage Jobs</a> / <b> Closed Jobs</b></p>
    </div>
    <div class="row">
        <div class="container" style="height: 100%px; overflow-y: auto;">
          <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 hidden">

                    </div>
                    <div class="col-md-4">
                        <table  cellspacing="5" cellpadding="5" style="float:right;">
                            <tbody>
                              <tr>
                                <td>Start Date:</td>
                                <td><input type="text" class="form-control ml-2" id="min" name="min"></td>
                              </tr>
                              <tr>
                                <td>End Date:</td>
                                <td><input type="text" class="form-control ml-2 mt-2" id="max" name="max"></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    
                </div>
              

          <div class="row mt-2">
            <div class="col-md-6">
                <label for="" class="hidden"></label>
            </div>
            <div class="col-md-6">
                <input type="text" name="closedJobsSearch" class="form-control" id="closedJobsSearch" placeholder="Search Table..">
           </div>
          </div>
          <table class="table table-striped display text-center" id="closedJobs">
          <thead>
            <tr >
              <th class="text-center" style="font-weight: bold;">Job Position</th>
              <th class="text-center" style="font-weight: bold;">Date of Job Opened</th>
              <th class="text-center" style="font-weight: bold;">Closing Date</th>
              <th class="text-center" style="font-weight: bold;">Created at</th>
              <th class="text-center" style="font-weight: bold;">Action</th>  
            </tr>
          </thead>
          <tbody id="closedJobsSearchTable">
            @if($jobs)
            @foreach ($jobs as $job)
              @if($job['to_close']==1)
                <tr>
                    <td>{{$job['job_title']}}</td>
                    <td>{{$job['opening_date']}}</td>
                    <td>{{ date('d-m-Y', strtotime($job->closing_date)) }}</td>
                    
                    <td>{{$job['created_at']}}</td>
                    <td>
                      
                        <a href="/admin/job-management/closed-jobs/republish-page/{{$job->job_id}}" class="btn btn-success" >Republish</a>
                    
                    </td>
                </tr>
              @endif
            @endforeach
            @endif
          </tbody>
          </table>
       
          </div>
        </div>
      </div>
        </div>

</x-main>

<script>
    var minDate, maxDate;
     
     // Custom filtering function which will search data in column four between two values
     $.fn.dataTable.ext.search.push(
         function( settings, data, dataIndex ) {
             let min = moment($('#min').val(), 'DD/MM/YYYY h:mm A', true).isValid() ?
                 moment($('#min').val(), 'DD/MM/YYYY').format('YYYYMMDD') : "";
             
              let max = moment($('#max').val(), 'DD/MM/YYYY h:mm A', true).isValid() ?
                  moment($('#max').val(), 'DD/MM/YYYY').format('YYYYMMDD') : "";
           
             var date = moment( data[2], 'DD/MM/YYYY' ).format('YYYYMMDD');
           
             if ( max <= "" ) {
               max = "29991231";
             }
             
           if ( date >= min && date <= max ) {
                 return true;
             }
             return false;
         }
     );
  
     
      
     $(document).ready(function() {
         // Create date inputs
         minDate = new DateTime($('#min'), {
             format: 'DD/MM/YYYY h:mm A'
         });
         maxDate = new DateTime($('#max'), {
             format: 'DD/MM/YYYY h:mm A'
         });
      
         // DataTables initialisation
          var table = $('#closedJobs').DataTable({
            dom: 'lrtip',
            pagingType: 'full_numbers',
          });
      
         // Refilter the table
         $('#min, #max').on('change', function () {
             table.draw();
         });
     });
    
    </script>


<script>
  $(".republishBtn").on("click", function(e) {
e.preventDefault(); 
Swal.fire({
    title: "Confirm Action",
    text:"Are you sure you want to republish job?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Republish!'
}).then(function(isConfirm) {
  if(isConfirm.value){
    $(e.target).closest('form').submit();
  }
  
    })
});
</script>


