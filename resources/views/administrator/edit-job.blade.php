<x-main>
  <x-email-message/>
    @foreach ($job as $data)
    <div class="home-content">
        <div class="text">Edit Job</div>
        <p><a href="/admin/job-management/opened-jobs" class="text-decoration-none text-primary">Opened Jobs</a> / Edit Job</p>
    </div>
    <div class="row mt-4">
        <form class="form-horizontal" action="/admin/job-management/edit-job/update/{{$data->job_id}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card" style="height: 100%; overflow-y: auto;">
              <div class="card-body">
                {{-- Image Upload --}}
                <div class="form-group row">
                    <div class="row mb-2">
                        <p>Job Image</p>
                        <img class=" img-fluid hidden w-48 md:block" src="{{$data->job_image ? asset('storage/' . $data->job_image) : asset('/images/user_photo.jpg')}}" 
                        alt="" style="max-width: 300px; height:200px;"/>
                    </div>
                    
                    <label for="job_image"  class="col-sm-3 control-label col-form-label">Upload Job Image (Recommend: 400x300px)</label>
                  <div class="col-sm-5">
                    
                    <input type="file" class="form-control" name="job_image" id="job_image"  accept="/images/Job/.png, .jpg, .jpeg, .webp"/>
                    {{-- <input type="button" value="Upload" class="form-control"> --}}
                    @error('job_image')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row mt-2">
                  <label for="job_title" class="col-sm-3 control-label col-form-label">Job Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="job_title" id="job_title" value="{{$data->job_title}}"/>
                    @error('job_title')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mt-2">
                  <label for="item_number" class="col-sm-3 control-label col-form-label">Item Number</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="item_number" id="item_number" value="{{$data->item_number}}"/>
                    @error('item_number')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mt-2">
                  <label for="status" class="col-sm-3 control-label col-form-label">Status</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="status" id="status" value="{{$data->status}}" />
                    @error('status')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mt-2">
                  <label for="rate" class="col-sm-3 control-label col-form-label" >Monthly Salary</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="salary" id="salary" value="{{$data->salary}}" />
                    @error('salary')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mt-2">
                  <label for="place_of_assignment" class="col-sm-3 control-label col-form-label">Place of Assignment</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="place_of_assignment" id="place_of_assignment" value="{{$data->place_of_assignment}}" />
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
                  <label for="education" class="col-sm-3 control-label col-form-label">Education</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="education" id="education" value="{{$data->education}}" />
                    @error('education')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mt-2">
                  <label for="training" class="col-sm-3 control-label col-form-label">Training</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="training" id="training" value="{{$data->training}}" />
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
                    <textarea class="form-control" name="experience" id="experience" value="{{$data->experience}}" >{{$data->experience}}</textarea>
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
                    <textarea class="form-control" name="eligibility" id="eligibility" value="{{$data->eligibility}}" >{{$data->eligibility}}</textarea>
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
                    <textarea class="form-control" name="competency" id="competency" value="{{$data->competency}}" >{{$data->competency}}</textarea>
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
                    <textarea class="form-control" name="duties" id="duties" value="{{$data->duties}}" >{{$data->duties}}</textarea>
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
                    <input type="text" class="form-control" name="opening_date" id="opening_date" value="{{$data->opening_date}}" />
                    @error('opening_date')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mt-2">
                  <label for="closing_date" class="col-sm-3 control-label col-form-label">Closing Date</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="closing_date" id="closing_date" value="{{$data->closing_date}}" />
                    @error('closing_date')
                      <p class="text-danger mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="border-top">
                <div class="card-body">
                  <button type="submit" class="btn btn-primary openJobBtn" id="openJobBtn">
                    Update Job
                  </button>
                </div>
              </div>
            
          </div>
        </form>
        </div>   
            
    @endforeach
</x-main>
    