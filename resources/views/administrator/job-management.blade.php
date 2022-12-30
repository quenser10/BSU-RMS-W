{{-- <!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/date-1.1.1/datatables.min.css"/>
 

    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/rg-1.1.4/datatables.min.css"/>
    
    <meta charset=utf-8 />
    <title>DataTables - JS Bin</title>

    <style>
      body {
  font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
  background-color: #fff;
}

    </style>
  </head>
  <body>
    <div class="container">
      <table border="0" cellspacing="5" cellpadding="5">
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
      <table id="example" class="display nowrap" width="100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
            <th>Sum</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
            <th>Sum</th>
          </tr>
        </tfoot>

        <tbody>
          <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
             <td>05/02/2022 </td> 
            <td>$3,120</td>
            <td></td>
          </tr>
          <tr>
            <td>Garrett Winters</td>
            <td>Director</td>
            <td>Edinburgh</td>
            <td>63</td>
             <td>01/04/2022 </td> 
            <td>$5,300</td>
            <td></td>
          </tr>
          <tr>
            <td>Ashton Cox</td>
            <td>Technical Author</td>
            <td>San Francisco</td>
            <td>66</td>
            <td>01/02/2022 </td> 
            <td>$4,800</td>
            <td></td>
          </tr>
          <tr>
            <td>Cedric Kelly</td>
            <td>Javascript Developer</td>
            <td>Edinburgh</td>
            <td>22</td>
             <td>31/12/2021 </td>
            <td>$3,600</td>
            <td></td>
          </tr>
        
        </tbody>
      </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/date-1.1.1/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>


    <script>
      var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         let min = moment($('#min').val(), 'DD/MM/YYYY ', true).isValid() ?
             moment($('#min').val(), 'DD/MM/YYYY').format('YYYYMMDD') : "";
         
          let max = moment($('#max').val(), 'DD/MM/YYYY', true).isValid() ?
              moment($('#max').val(), 'DD/MM/YYYY').format('YYYYMMDD') : "";
       
         var date = moment( data[4], 'DD/MM/YYYY' ).format('YYYYMMDD');
       
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
        format: 'DD/MM/YYYY '
    });
    maxDate = new DateTime($('#max'), {
        format: 'DD/MM/YYYY '
    });
  
     // DataTables initialisation
     var table = $('#example').DataTable();
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });

    </script>
  </body>
</html> --}}




<x-main>
  <x-flash-message/>
    <div class="home-content">
        <div class="text">Job Management</div>
    </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-open-tab" data-bs-toggle="tab" data-bs-target="#nav-open" type="button" role="tab" aria-controls="nav-open" aria-selected="true"><i class='bx bx-add-to-queue'></i> Open Job</button>
                <button class="nav-link" id="nav-view-tab" data-bs-toggle="tab" data-bs-target="#nav-view" type="button" role="tab" aria-controls="nav-view" aria-selected="true"><i class='bx bxs-bookmarks' ></i> View Active Jobs</button>
                <button class="nav-link" id="nav-close-tab" data-bs-toggle="tab" data-bs-target="#nav-close" type="button" role="tab" aria-controls="nav-close" aria-selected="true"><i class='bx bx-window-close' ></i> Closed Jobs <label class=" p-1  bg-danger text-white rounded font-normal">{{$count}}</label></button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-open" role="tabpanel" aria-labelledby="nav-open-tab">
            
            </div>
            {{-- TAB FOR VIEW ACTIVE JOBS --}}
            <div class="tab-pane fade" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
            {{-- <div class="row">
                <div class="container" style="height: 100%px; overflow-y: auto;">
                  <div class="card">
                    <div class="card-body">

                    
                  <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="" class="hidden"></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="openedJobsSearch" class="form-control" id="openedJobsSearch" placeholder="Search Table..">
                   </div>
                  </div>
                  <table class="table table-striped display" id="openedJobs">
                  <thead>
                    <tr >
                      <th style="font-weight: bold;">Opened Job Positions</th>
                      <th style="font-weight: bold;">Date of Job Opened</th>
                      <th style="font-weight: bold;">Closing Date</th>
                      <th style="font-weight: bold;">Created at</th>
                      <!-- <th style="font-weight: bold;">Action</th>   -->
                    </tr>
                  </thead>
                  <tbody id="openedJobsSearchTable">
                    @if($serve)
                    @foreach ($serve as $row)
                      @if($row['to_close']==0)
                        <tr>
                            <td>{{$row['job_title']}}</td>
                            <td>{{$row['opening_date']}}</td>
                            <td>{{$row['closing_date']}}</td>
                            <td>{{$row['created_at']}}</td>
                            <!-- <td>
                              <a href="" class="btn btn-info" data-bs-toggle="modal" data-idUpdate="$row->user_id" data-bs-target="#updateJob">Edit</a>
                              <a href="" class="btn btn-danger">Delete</a>
                            </td> -->
                        </tr>
                      @endif
                    @endforeach
                    @endif
                  </tbody>
                  </table>
                </div>
              </div>
                </div>
              </div> --}}
            </div>
          
            <div class="tab-pane fade" id="nav-close" role="tabpanel" aria-labelledby="nav-close-tab">
              


                  {{-- <div class="row">
                      <table cellspacing="5" cellpadding="5">
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
                      <table id="testTable" class="display nowrap" width="100%">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Sum</th>
                          </tr>
                        </thead>
                
                        <tfoot>
                          <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Sum</th>
                          </tr>
                        </tfoot>
                
                        <tbody>
                          <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                             <td>05/02/2022 </td> 
                            <td>$3,120</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Garrett Winters</td>
                            <td>Director</td>
                            <td>Edinburgh</td>
                            <td>63</td>
                             <td>01/04/2022 </td> 
                            <td>$5,300</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Ashton Cox</td>
                            <td>Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>01/02/2022 </td> 
                            <td>$4,800</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Cedric Kelly</td>
                            <td>Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                             <td>31/12/2021 </td>
                            <td>$3,600</td>
                            <td></td>
                          </tr>
                        
                        </tbody>
                      </table>
                  </div> --}}




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

                  @foreach($serve as $row)
                    <input type="hidden" name="job_id" value="">
                    <label for="job_title"><b>Job Title:</b></label> <input class="form-control" type="text" id="job_title" name="job_title" value="">
                    <label for="item_number"><b>Item Number:</b></label> <input class="form-control" type="text" id="item_number" name="item_number">
                    <label for="status"><b>Status:</b></label> <input class="form-control" type="text" id="status" name="status">
                    <label for="salary"><b>Monthly Salary:</b></label> <input class="form-control" type="text" id="salary" name="salary" value="">

                    <label for="place_of_assignment"><b>Place of Assignment:</b></label> <input class="form-control" type="text" id="place_of_assignment" name="place_of_assignment" value="">
                    <label for="education"><b>Education:</b></label> <input class="form-control" type="email" id="education" name="education" value="">
                    <label for="training"><b>Training:</b></label> <input class="form-control" type="text" id="training" name="training" value="training">
                    <label for="experience"><b>Experience:</b></label> <input class="form-control" type="text" id="experience" name="experience" value="experience">
                    <label for="eligibility"><b>Eligibility:</b></label> <input class="form-control" type="text" id="eligibility" name="eligibility" value="">        
                    <label for="competency"><b>Competency:</b></label> <input class="form-control" type="text" id="competency" name="competency" value="">        
                    <label for="duties"><b>Duties:</b></label> <input class="form-control" type="text" id="duties" name="duties" value="">
                    <label for="closing_date"><b>Closing Date:</b></label> <input class="form-control" type="text" id="closing_date" name="closing_date" value="">
                  @endforeach
                
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












