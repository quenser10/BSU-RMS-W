<div id="jobDescription" class="modal jobDescriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <!-- Modal content -->
        <div class="modal-content ">

            <div class="modal-header">
                <h2 class="jobTitle" id="jobTitle"></h2> 
                {{-- <span class="close">&times;</span> --}}
            </div>
            <div class="p-lg-3 ps-lg-3">
                <div class="container-fluid description border border-3 border-clear">
                    {{-- <p> <b>Job title: </b>Insert job title </p> --}}
                    <p><b>Item Number:</b></p> 
                    <p id="item_number"></p>
                    <br>
                    <p><b>Status:</b></p> 
                    <p id="status"></p>
                    <br/>
                    <p><b>Location:</b></p> 
                    <p id="location"></p>
                    <br>
                    <p> <b>Monthy Salary: </b></p>
                    <p id="salary"></p>
                    <br/>
                    <p> <b>Education Requirement: </b></p>
                    <p id="education"></p>
                    <br/>
                </div>

                <br/>
                <div class="container-fluid description border border-3 border-clear">
                    <p> <b>Training: </b></p> <br>
                    <p id="training"></p>
                    <br/>
                    <p> <b>Experience: </b></p> <br>
                    <p id="experience"></p>
                    <br/>
                    <p><b>Eligibility: </b></p> <br>
                    <p id="eligibility"></p>
                    <br/>
                    <p> <b>Competency: </b></p> <br>
                    <p id="competency"></p>
                    <br/>
                    <p> <b>Duties and Responsibilities: </b></p> <br>
                    <p id="duties"></p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Close</button>            </div>
        </div>
    </div>
 </div>