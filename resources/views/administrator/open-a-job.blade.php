<x-main>
    <x-flash-message/>
    <div class="home-content mb-4">
        <div class="text">Manage Jobs</div>
        <p><a class="text-decoration-none text-reset">Manage Jobs</a> / Open a Job</p>
    </div>
    <div class="row">
        <form class="form-horizontal" action="/job-management/open-job" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card" style="height: 100%; overflow-y: auto;">
              <div class="card-body">
                {{-- Image Upload --}}
                <div class="form-group row">
                  <label for="job_image"  class="col-sm-3 control-label col-form-label">Upload Job Image (Recommend: 400x300px)</label>
                  <div class="col-sm-5">
                    
                    <input type="file" class="form-control" name="job_image" id="job_image" placeholder="Job Image Here" accept="/images/Job/.png, .jpg, .jpeg, .webp"/>
                    {{-- <input type="button" value="Upload" class="form-control"> --}}
                    @error('job_image')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                  
                </div>
                <div class="form-group row mt-2">
                  <label for="job_title" class="col-sm-3 control-label col-form-label">Job Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title Here" required/>
                    @error('job_title')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mt-2">
                  <label for="item_number" class="col-sm-3 control-label col-form-label">Item Number</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="item_number" id="item_number" placeholder="Item Number Here" required/>
                    @error('item_number')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mt-2">
                  <label for="status" class="col-sm-3 control-label col-form-label">Status</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="status" id="status" placeholder="Status Here" required/>
                    @error('status')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
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
                    @error('salary')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
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
                    @error('place_of_assignment')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
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
                    @error('education')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
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
                    @error('training')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
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
                    @error('experience')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
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
                    @error('eligibility')
                    <p class="text-danger mt-1">{{$message}}</p>
                  @enderror
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
                    @error('competency')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
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
                      @error('duties')
                      <p class="text-danger mt-1">{{$message}}</p>
                      @enderror
                  </div>
                </div>
                <div class="form-group row ">
                  
                </div>
                <div class="form-group row mt-2">
                  <label for="opening_date" class="col-sm-3 control-label col-form-label">Opening Date</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="opening_date" id="opening_date" required/>
                    @error('opening_date')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mt-2">
                  <label for="closing_date" class="col-sm-3 control-label col-form-label">Closing Date</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="closing_date" id="closing_date" required/>
                    @error('closing_date')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
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
            
          </div>
        </form>
        </div>

</x-main>