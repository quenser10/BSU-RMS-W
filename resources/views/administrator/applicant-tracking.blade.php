<x-main>
    <x-email-message/>
    <form action="/admin/prequalification-report" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="modal fade" id="prequalificationReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            {{-- <form action="/applicant/disqualify/{{$row->applicant_id}}" method="POST"> --}}
                {{-- @csrf --}}
            <div class="modal-header border-bottom-0 d-flex justify-content-center">
              <h3 >Pre-qualification Report</h3>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <p class="text-center">Choose job to generate report:</p>
                </div>
                <div class="row mx-5">
                    <div class="col-md-12">
                        @foreach ($uniqueJobs as $job)
                            <div class="form-check mx-5">
                                <input class="form-check-input" type="radio" name="flexRadio"  value="{{$job}}">
                                <label class="form-check-label text-capitalize" >
                                {{$job}}
                                </label>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
                
            </div>
            <div class="modal-footer d-flex justify-content-center m-0">
            
                <div class="row">
                        <div class="col-sm-3">
                            <div>
                                <button type="submit" name="action" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    {{-- MOdal --}}
    <div class="home-content">
        <div class="text">Applicant Tracking</div>
    </div>
    <div class="row row-border">
      <div class="col-md-12 applicantTable">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-qualified-tab" data-bs-toggle="tab" data-bs-target="#nav-qualified" type="button" role="tab" aria-controls="nav-qualified" aria-selected="true">Qualified</button>
            <button class="nav-link" id="nav-disqualified-tab" data-bs-toggle="tab" data-bs-target="#nav-disqualified" type="button" role="tab" aria-controls="nav-disqualified" aria-selected="true">Disqualified</button>

          </div>
        </nav>

      <div class="tab-content" id="nav-tabContent" >
        <div class="tab-pane fade show active" id="nav-qualified" role="tabpanel" aria-labelledby="nav-qualified-tab">
          <div class="row">
            <div class="col-md-12">
                <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light shadow-lg" style="max-width: 95%; max-height: 800px;"> 
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#prequalificationReport">Pre-qualification Report</a>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="hidden"></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="qualifiedSearch" class="form-control" id="qualifiedSearch" placeholder="Search Table..">
                       </div>
                    </div>
                    <table class="table table-light table-striped table-hover table-bordered assessmentTable" id="qualifiedTable" style="height: 1;">
                        <thead>
                            <tr >
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Applying for</th>
                                <th>Remarks</th>                               
                            </tr>
                        </thead>
                        <tbody id="qualifiedSearchTable">
                            @foreach($qualifiedApplicants as $applicant)
                                {{-- @if ($applicant->status == "qualified") --}}
                                <tr>
                                    <td>{{$applicant['first_name']}}</td>
                                    <td>{{$applicant['last_name']}}</td>
                                    <td>{{$applicant['email']}}</td>
                                    <td>{{$applicant['applying_for']}}</td>   
                                    <td>{{$applicant->applicantPrequalification->remarks}}</td>                                                                                               
                                </tr>
                                {{-- @endif --}}
                                
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
       </div>

        <div class="tab-pane fade show" id="nav-disqualified" role="tabpanel" aria-labelledby="nav-disqualified-tab">
          <div class="row">
            <div class="col-md-12">
                <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light shadow-lg" style="max-width: 95%; max-height: 800px;"> 
                    <div class="row mb-3">
                        
                        <div class="col-md-6">
                            <label for="" class="hidden"></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="disqualifiedSearch" class="form-control" id="disqualifiedSearch" placeholder="Search Table..">
                       </div>
                    </div>
                    <table class="table table-light table-striped table-hover table-bordered assessmentTable" id="disqualifiedTable" style="height: 1;">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Applying for</th>
                                <th>Reason for Disqualification </th>   
                                
                            </tr>
                        </thead>
                        <tbody id="disqualifiedSearchTable">
                            @foreach($disqualifiedApplicants as $applicant)
                                {{-- @if ($row->status == "disqualified") --}}
                                <tr>
                                    <td>{{$applicant->first_name}}</td>
                                    <td>{{$applicant->last_name}}</td>
                                    <td>{{$applicant->email}}</td>
                                    <td>{{$applicant->applying_for}}</td>
                                    <td>{{$applicant->applicantPrequalification->reason_for_disqualification}}</td>
                                                                                            
                                </tr>
                                {{-- @endif --}}
                                
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
     </div>
    </div>
   </div>
</form>
</x-main>
