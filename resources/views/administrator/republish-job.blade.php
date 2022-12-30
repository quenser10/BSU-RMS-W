<x-main>
    <x-flash-message/>
    <div class="home-content mb-4">
        <div class="text">Republish Job</div>
        <p><a href="/admin/job-management/closed-jobs" class="text-decoration-none ">Closed Jobs</a> / Republish Job</p>
    </div>
    <div class="row">
        @foreach ($job as $item)
        <form class="form-horizontal" action="/admin/job-management/closed-jobs/republish/{{$item->job_id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card" style="height: 100%; overflow-y: auto;">
                <div class="card-body">
                  
                  <div class="form-group row mt-2">
                    <label for="opening_date" class="col-sm-3 control-label col-form-label">Opening Date</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="opening_date" id="opening_date" value="{{$item->opening_date}}" required/>
                      @error('opening_date')
                        <p class="text-danger mt-1">{{$message}}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row mt-2">
                    <label for="closing_date" class="col-sm-3 control-label col-form-label">Closing Date</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="closing_date" id="closing_date" value="{{$item->closing_date}}" required/>
                      @error('closing_date')
                        <p class="text-danger mt-1">{{$message}}</p>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="border-top">
                  <div class="card-body">
                    <button type="submit" class="btn btn-primary">
                      Submit
                    </button>
                  </div>
                </div>
              
            </div>
          </form>
        @endforeach
        
        </div>

</x-main>