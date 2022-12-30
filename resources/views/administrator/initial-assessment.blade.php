<x-main>
     
    <div class="home-content">
      <div class="text">Initial Assessment</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light shadow-lg"> 
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="" class="hidden"></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="initialSearch" class="form-control" id="initialSearch" placeholder="Search Table..">
                   </div>
                </div>
                
                <table class="table table-light table-striped table-hover table-bordered" id="myTable" >
                    <thead>
                        <tr>
                            
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>   
                            <th>Applying for</th>
                            <th>Contact Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        
                    </thead>
                    <tbody id="tableSearch">
                            
                        @foreach($applicants as $applicant)
                            @if ($applicant->status == "new")
                            <tr>
                                <td>{{$applicant['first_name']}}</td>
                                <td>{{$applicant['last_name']}}</td>
                                <td>{{$applicant['email']}}</td>
                                <td>{{$applicant['applying_for']}}</td>
                                <td>{{$applicant['mobile_number']}}</td>
                                <td class="text-info text-capitalize">{{$applicant['status']}}</td>
                                <td><a href="/initial-assessment/evaluate/{{$applicant->id}}" class="btn btn-success">Evaluate</a></td>
                            </tr>
                            @endif
                            
                        @endforeach

                    </tbody>
                    
                </table>
            </div>
        </div>
   </div>





</x-main>
           

