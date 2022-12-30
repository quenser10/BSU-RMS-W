<x-main>
  <x-flash-message/>
    <div class="home-content">
        <div class="text">Job Management</div>
    </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              {{-- Navigation Tabs --}}
                <button class="nav-link active" id="nav-open-tab" data-bs-toggle="tab" data-bs-target="#nav-open" type="button" role="tab" aria-controls="nav-open" aria-selected="true"><i class='bx bx-add-to-queue'></i> Home Page</button>
                <button class="nav-link" id="nav-view-tab" data-bs-toggle="tab" data-bs-target="#nav-view" type="button" role="tab" aria-controls="nav-view" aria-selected="true"><i class='bx bxs-bookmarks' ></i> Contact & Footer</button>
                {{-- <button class="nav-link" id="nav-close-tab" data-bs-toggle="tab" data-bs-target="#nav-close" type="button" role="tab" aria-controls="nav-close" aria-selected="true"><i class='bx bx-window-close' ></i> Closed Jobs <label class=" p-1  bg-danger text-white rounded font-normal">{{$count}}</label></button> --}}
            </div>
        </nav>

        {{-- TAB FOR OPENING HOME PAGE--}}
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-open" role="tabpanel" aria-labelledby="nav-open-tab">
            <div class="row">
                <div class="card" style="height: 100%; overflow-y: auto;">
                  <form class="form-horizontal" action="/job-management/open-job" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      {{-- <div class="form-group row">
                        <label for="job_image" class="col-sm-3 control-label col-form-label">Upload Job Image</label>
                        <div class="col-sm-5">
                          
                          <input type="file" class="form-control" name="image[]" id="image[]" placeholder="Job Image Here" required/>
                          <input type="submit" value="Upload" class="form-control">
                        </div>
                        
                      </div> --}}
                      <div class="form-group row mt-2">
                        <label for="job_title" class="col-sm-3 control-label col-form-label">Job Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title Here" required/>
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label for="item_number" class="col-sm-3 control-label col-form-label">Item Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="item_number" id="item_number" placeholder="Item Number Here" required/>
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label for="status" class="col-sm-3 control-label col-form-label">Status</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="status" id="status" placeholder="Status Here" required/>
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label
                          for="rate"
                          class="col-sm-3 control-label col-form-label"
                          >Monthly Salary</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            name="salary"
                            id="salary"
                            placeholder="Monthly Salary Here"
                            required
                          />
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label
                          for="place_of_assignment"
                          class="col-sm-3 control-label col-form-label"
                          >Place of Assignment</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            name="place_of_assignment"
                            id="place_of_assignment"
                            placeholder="Place of Assignment Here"
                            required
                          />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label
                          class="col-sm-6 control-label col-form-label"
                          ><b>MININUM QUALIFICATION STANDARDS</b>
                        </label>
                      </div>
                      <div class="form-group row mt-2" >
                        <label
                          for="education"
                          class="col-sm-3 control-label col-form-label"
                          >Education</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            name="education"
                            id="education"
                            placeholder="Education Here"
                            required
                          />
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label
                          for="training"
                          class="col-sm-3 control-label col-form-label"
                          >Training</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            name="training"
                            id="training"
                            placeholder="Training Here"
                            required
                          />
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label
                          for="experience"
                          class="col-sm-3 control-label col-form-label"
                          >Experience</label
                        >
                        <div class="col-sm-9">
                          <textarea class="form-control" name="experience" id="experience" placeholder="Experience Here" required></textarea>
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label
                          for="eligibility"
                          class="col-sm-3 control-label col-form-label"
                          >Eligibility</label
                        >
                        <div class="col-sm-9">
                          <textarea class="form-control" name="eligibility" id="eligibility" placeholder="Eligibility Here" required></textarea>
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label
                          for="competency"
                          class="col-sm-3 control-label col-form-label"
                          >Compentency/Other Requirements</label
                        >
                        <div class="col-sm-9">
                          <textarea class="form-control" name="competency" id="competency" placeholder="Compentency/Other Requirements Here" required></textarea>
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label
                          for="duties"
                          class="col-sm-3 control-label col-form-label"
                          >Duties & Responsibilities</label
                        >
                        <div class="col-sm-9">
                          <textarea class="form-control" name="duties" id="duties" placeholder="Duties & Responsibilities Here" required></textarea>
                        </div>
                      </div>
                      <div class="form-group row ">
                        
                      </div>
                      <div class="form-group row mt-2">
                        <label for="opening_date" class="col-sm-3 control-label col-form-label">Opening Date</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="opening_date" id="opening_date" required/>
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <label for="closing_date" class="col-sm-3 control-label col-form-label">Closing Date</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="closing_date" id="closing_date" required/>
                        </div>
                      </div>
                    </div>
                    <div class="border-top">
                      <div class="card-body">
                        <button type="submit" class="btn btn-primary openJobBtn" id="openJobBtn">
                          Open Job
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>



            {{-- TAB FOR VIEW ACTIVE JOBS --}}
            <div class="tab-pane fade" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
            <div class="row">
                <div class="container" style="height: 100%px; overflow-y: auto;">
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
                    <tr>
                      <th style="font-weight: bold;">Opened Job Positions</th>
                      <th style="font-weight: bold;">Date of Job Opened</th>
                      <th style="font-weight: bold;">Closing Date</th>
                      <th style="font-weight: bold;">Created at</th>
                      {{-- <th style="font-weight: bold;">Action</th>   --}}
                    </tr>
                  </thead>
                  <tbody>
                    @if($serve)
                    @foreach ($serve as $row)
                      @if($row['to_close']==0)
                        <tr>
                            <td>{{$row['job_title']}}</td>
                            <td>{{$row['opening_date']}}</td>
                            <td>{{$row['closing_date']}}</td>
                            <td>{{$row['created_at']}}</td>
                            {{-- <td>
                              <a href="" class="btn btn-info" data-bs-toggle="modal" data-idUpdate="$row->user_id" data-bs-target="#updateJob">Edit</a>
                              <a href="" class="btn btn-danger">Delete</a>
                            </td> --}}
                        </tr>
                      @endif
                    @endforeach
                    @endif
                  </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          
            {{-- TAB FOR CLOSED JOBS --}}
            <div class="tab-pane fade" id="nav-close" role="tabpanel" aria-labelledby="nav-close-tab">
              <div class="row">
                  <div class="container" style="height: 100%px; overflow-y: auto;">
                    <div class="row mt-2">
                      <div class="col-md-6">
                          <label for="" class="hidden"></label>
                      </div>
                      <div class="col-md-6">
                          <input type="text" name="closedJobsSearch" class="form-control" id="closedJobsSearch" placeholder="Search Table..">
                     </div>
                    </div>
                    <table class="table table-striped display" id="closedJobs">
                    <thead>
                      <tr>
                        <th style="font-weight: bold;">Opened Job Positions</th>
                        <th style="font-weight: bold;">Date of Job Opened</th>
                        <th style="font-weight: bold;">Closing Date</th>
                        <th style="font-weight: bold;">Created at</th>
                        <th style="font-weight: bold;">Action</th>  
                      </tr>
                    </thead>
                    <tbody>
                      @if($serve)
                      @foreach ($serve as $row)
                        @if($row['to_close']==1)
                          <tr>
                              <td>{{$row['job_title']}}</td>
                              <td>{{$row['opening_date']}}</td>
                              <td>{{$row['closing_date']}}</td>
                              <td>{{$row['created_at']}}</td>
                              <td>
                                {{-- <a href="" class="btn btn-info" data-bs-toggle="modal" data-idUpdate="$row->user_id" data-bs-target="#updateJob">Edit</a> --}}
                                <a href="" class="btn btn-success">Republish</a>
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
        </div> <!-- tab-content -->

        
<!-- Edit Job Modal --> {{-- This is Probably Removed For Future Uses --}}
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


