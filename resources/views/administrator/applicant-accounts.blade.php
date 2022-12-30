<x-main>

    <div class="home-content">
        <div class="text">Applicant Accounts</div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="hidden"></label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="applicantAccountSearch" class="form-control" id="applicantAccountSearch" placeholder="Search Table..">
                </div>
            </div>
            <table class="table table-striped text-center applicantAccountsTable">
                <thead>
                  <tr>
                    <th style="font-weight: bold; text-align:center;">Name</th>
                    <th style="font-weight: bold; text-align:center;">Email</th>
                    <th style="font-weight: bold; text-align:center;">Applied</th>
                    <th style="font-weight: bold; text-align:center;">Action</th>
                    
                  </tr>
                </thead>
                <tbody id="applicantAccountTableSearch">
                    @foreach ($applicants as $applicant)
                        <tr>
                            <td>{{$applicant->name}}</td>
                            <td>{{$applicant->email}}</td>
                            @if($applicant->userApplicant)
                                <td> <a class="btn btn-sm btn-outline-primary" style="pointer-events: none;">Yes</a></td>
                            @else
                                <td> <a class="btn btn-sm btn-outline-secondary" style="pointer-events: none;">No</a> </td>
                            @endif
                            
                            <td>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
                </table>
        </div>
    </div>
    
    </x-main>