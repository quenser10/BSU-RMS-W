<x-main>
    <div class="home-content">
        <div class="text">Final Comparative Assessment Form</div>
    </div>
    @foreach($applicants as $applicant)
    <div class="applicant">
        <div class="card shadow-lg">
            <div class="card-body">
                <form class="form-horizontal" action="/applicant-tracking/generate-form/{{$applicant->applicant_id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="row">
                        <div class="applicant">
                          <h3 class="text-center">{{$applicant->applying_for}}</h3>
                        </div>
                      </div>
                      <div class="row  mt-4">                       
                          <div class="col-md-4 ">
                            <div class="applicant offset-2 mb-2">
                                <a href="/assets/{{$applicant->application_letter}}" class="btn btn-info text-white">Application Letter</a>
                            </div>
                            <div class="applicant offset-2 mb-2">
                              <a href="/assets/{{$applicant->pds}}" class="btn btn-info text-white">Personal Data Sheet</a>
                            </div>
                            <div class="applicant offset-2">
                              <a href="/assets/{{$applicant->work_experience}}" class="btn btn-info text-white">Work Experience</a>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="applicant offset-2 mb-2">
                              <a href="/assets/{{$applicant->otr}}" class="btn btn-info text-white">OTR</a>
                            </div>
                            <div class="applicant offset-2 mb-2">
                              <a href="/assets/{{$applicant->employment_certificates}}" class="btn btn-info text-white">Employment Certificates</a>
                            </div>
                            <div class="applicant offset-2">
                              <a href="/assets/{{$applicant->eligibility}}" class="btn btn-info text-white">Eligibility</a>
                            </div> 
                          </div>
                          <div class="col-md-4">
                            <div class="applicant offset-2 mb-2">
                              <a href="/assets/{{$applicant->training_certificates}}" class="btn btn-info text-white">Training Certificates</a>
                            </div>
                            <div class="applicant offset-2 mb-2">
                              <a href="/assets/{{$applicant->performance_evaluation}}" class="btn btn-info text-white">Performance Evaluation</a>
                            </div>
                            <div class="applicant offset-2">
                              <a href="/assets/{{$applicant->commendation}}" class="btn btn-info text-white">Awards and Commendation</a>
                            </div>                   
                          </div>                        
                      </div>

                      <div class="row mt-4">
                        <div class="row">
                            <div class="form-group col-md-2">
                              <label for="job_title" class="control-label col-form-label" >Name of Candidate </label>
                              <div>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="job_title"
                                  id="job_title"
                                  placeholder=""
                                  value="{{$applicant->first_name . ' ' . $applicant->last_name}}"
                                  required
                                />
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                              <label
                                for="education"
                                class="control-label col-form-label"
                                >Education</label
                              >
                              <div class="">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="education"
                                  id="education"
                                  placeholder=""
                                  required
                                />
                              </div>
                            </div>
                            <div class="form-group col-md-2">
                              <label
                                for="experience"
                                class="control-label col-form-label"
                                >Experience</label
                              >
                              <div class="">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="experience"
                                  id="experience"
                                  required
                                />
                              </div>
                            </div>
                            <div class="form-group col-md-2" >
                              <label
                                for="performance_evaluation"
                                class="control-label col-form-label"
                                >Performance Evaluation</label
                              >
                              <div class="">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="performance_evaluation"
                                  id="performance_evaluation"
                                  placeholder=""
                                  required
                                />
                              </div>
                            </div>
                            <div class="form-group col-md-2">
                              <label
                                for="training"
                                class="control-label col-form-label"
                                >Training</label
                              >
                              <div class="">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="training"
                                  id="training"
                                  placeholder=""
                                  required
                                />
                              </div>
                            </div>
                            <div class="form-group col-md-2">
                              <label
                                for="eligilibity"
                                class="control-label col-form-label"
                                >Eligibility</label
                              >
                              <div class="">
                                <input type="text" class="form-control" name="eligibility" id="eligibility" placeholder="" required/>
                              </div>
                            </div>
                            <div class="form-group col-md-2">
                              <label
                                for="outstanding_accomplishment"
                                class="control-label col-form-label"
                                >Outstanding Accomplishment
                              </label>
                              <div class="">
                                <input type="text" class="form-control" name="outstanding_accomplishment" id="outstanding_accomplishment" placeholder="" required/>
                              </div>
                            </div>
                        </div>
                      </div>
                      
                      <div class="applicant text-center">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-primary mt-4 col-md-2 ">Generate</button>
                        </div>
                      </div>
                  </form>
            </div>
        </div>
    </div>
    @endforeach
</x-main>