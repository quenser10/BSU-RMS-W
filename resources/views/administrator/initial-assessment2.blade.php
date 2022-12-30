<x-main>
       <div class="home-content">
         <div class="text">Initial Assessment</div>
       </div>
          <!--///////////////////////// INSERT YOUR CODES BELOW ///////////////////////////-->
        <div class="row">
        <div class="col-md-5">
          <div class="row">
            <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-width: 95%; max-height: 800px;"> 
              <table class="table table-light table-striped table-hover table-bordered assessmentTable" id="myTable" style="height: 1;">
              <thead>
                <tr>
                    <th>Name</th>   
                    <th>Applying for</th>
                    <th>Contact Number</th>
                </tr>
                </thead>
                <tbody>
                  

                </tbody>
              </table>
            </div>
          </div>
        </div>



        <div class="col-md-7 ">
          <div class="row">
            <div class="container mb-5 mt-3 myTable">
              <form class="form-horizontal">
                <div class="card-body">
                  <h4 class="card-title">Personal Info</h4>
                  <img src="../assets/img/user (2).png" style="width:100px"/>
                  <div class="form-group">
                    <label
                      for="fname"
                      class="col-sm-3 control-label col-form-label"
                      >First Name</label
                    >
                    <div class="col-sm-9">
                      <input
                        type="text"
                        class="form-control"
                        id="fname"
                        placeholder="First Name Here"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label
                      for="lname"
                      class="col-sm-3 control-label col-form-label"
                      >Last Name</label
                    >
                    <div class="col-sm-9">
                      <input
                        type="text"
                        class="form-control"
                        id="lname"
                        placeholder="Last Name Here"
                      />
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label
                      for="email1"
                      class="col-sm-3 control-label col-form-label"
                      >Applying For</label
                    >
                    <div class="col-sm-9">
                      <input
                        type="text"
                        class="form-control"
                        id="email1"
                        placeholder="Company Name Here"
                      />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label
                      for="cono1"
                      class="col-sm-3 control-label col-form-label"
                      >Contact No</label
                    >
                    <div class="col-sm-9">
                      <input
                        type="text"
                        class="form-control"
                        id="cono1"
                        placeholder="Contact No Here"
                      />
                    </div>
                  </div>
                 
                </div>
                <div class="border-top">
                  <div class="card-body">


                    <table class="table table-light table-striped table-hover table-bordered assessmentTable" id="myTable">
                    
                        <tbody>
                        <tr>
                         
                              
                                  <td class="filterable-cell">  
                                   
                                    <button type="button" class="btn btn-info openPdf" data-bs-toggle="modal" data-bs-target="#openPdf" style="width:100%">View</button>
                                
                                  </td>
                              
                           
                              <!-- <button type="button" class="btn btn-info" style="width: 100%;">View</button>  -->
                              
                          
                            <td class="filterable-cell"><input type="checkbox" class="btn-check" id="btncheck1">
                              <label class="btn btn-outline-primary" for="btncheck1">Checkbox 2</label></td>
                            <td class="filterable-cell">Application Letter</td>
      
                        </tr>
                        <tr>
                            <td class="filterable-cell"><button type="button" class="btn btn-info" style="width: 100%;">View</button> </td>
                            <td class="filterable-cell"><input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                              <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label></td>
                            <td class="filterable-cell">Personal Data Sheet</td>
      
                        </tr>
                        <tr>
                          <td class="filterable-cell"><button type="button" class="btn btn-info" style="width: 100%;">View</button> </td>
                          <td class="filterable-cell"><input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck3">Checkbox 2</label></td>
                          <td class="filterable-cell">Work Experience</td>
                        </tr>
                         <tr>
                          <td class="filterable-cell"><button type="button" class="btn btn-info" style="width: 100%;">View</button> </td>
                          <td class="filterable-cell"><input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck4">Checkbox 2</label></td>
                          <td class="filterable-cell">Official Transcript of Records/Certificate of Grades</td>
                        </tr>
                        <tr>
                          <td class="filterable-cell"><button type="button" class="btn btn-info" style="width: 100%;">View</button> </td>
                          <td class="filterable-cell"><input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck5">Checkbox 2</label></td>
                          <td class="filterable-cell">Employment Certificates</td>
                      </tr>
                      <tr>
                        <td class="filterable-cell"><button type="button" class="btn btn-info" style="width: 100%;">View</button> </td>
                        <td class="filterable-cell"><input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck6">Checkbox 2</label></td>
                        <td class="filterable-cell">Eligibility/Profesional License</td>
                    </tr>
                    <tr>
                      <td class="filterable-cell"><button type="button" class="btn btn-info" style="width: 100%;">View</button> </td>
                      <td class="filterable-cell"><input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck7">Checkbox 2</label></td>
                      <td class="filterable-cell">Training Certificates after graduation</td>
                  </tr>
                  <tr>
                    <td class="filterable-cell"><button type="button" class="btn btn-info" style="width: 100%;">View</button> </td>
                    <td class="filterable-cell"><input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                      <label class="btn btn-outline-primary" for="btncheck8">Checkbox 2</label></td>
                    <td class="filterable-cell">Performance Evaluation Rating in the last rating period</td>
                </tr>
                <tr>
                  <td class="filterable-cell"><button type="button" class="btn btn-info" style="width: 100%;">View</button> </td>
                  <td class="filterable-cell"><input type="checkbox" class="btn-check" id="btncheck9" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck9">Checkbox 2</label></td>
                  <td class="filterable-cell">Commendation or Awards Certificates</td>
                </tr>
                     </tbody>
                    </table>

                    <button type="button" class="btn btn-primary" style="margin-left: 75%;">
                      Complete
                    </button>

                    <button type="button" class="btn btn-primary" style="margin-left:15px;">
                      Incomplete
                    </button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


        <!-- Show Info Modal -->
<div class="modal fade" id="openPdf" role="dialog" >
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="openPdfModal">Applicant PDF Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
</x-main>
              
 
