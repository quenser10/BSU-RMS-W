
<x-main>
    <div class="home-content">
        <div class="text">Master List</div>
    </div>
    <div class="row">
        <div class="card" style="height: 100%px; overflow-y: auto;">
            <x-flash-message/>
            <div class="card-body">

                <form action="" method="get">
                    <div class="row mb-4  justify-content-end" style="padding: 0%;">
                    
                        
                        <div class="col-md-2">
                
                            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" value="{{old('from_date')}}"  readonly/>
                            
                        </div>
                
                        <div class="col-md-2">
                
                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" value="{{old('to_date')}}"  readonly/>
                
                        </div>
    
                        <div class="col-md-2 m-0">
                
                            <button type="submit" name="filter" id="filter" class="btn  btn-primary">Filter</button>
                
                            <a href="/masterlist" type="button" name="refresh" id="refresh" class="btn btn-secondary">Refresh</a>
                
                        </div>
                
                    </div>                
                </form>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="" class="hidden"></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="masterlistSearch" class="form-control" id="masterlistSearch" placeholder="Search Table..">
                   </div>
                </div>
                <div class="category-filter">

                    <select id="categoryFilter" class="form-control" style="display: inline; width: 200px; margin-left: 25px;">
                         <option value="">All Jobs</option>
                        @foreach($openedJobs as $job)
                            <option value="{{ $job->job_title }}">{{ $job->job_title}}</option>
                        @endforeach
                    </select>

                    
                  </div>
                  
                <table id="filterTable" class="table table-striped table-hover text-center"  style="width: 100%;">
                    <thead>
                    <tr>
                        <th class="text-center"> Name</th>
                        <th class="text-center">Applying for</th>
                        <th class="text-center"> College Course </th>
                        <th class="text-center"> Educational Attainment </th>
                        <th class="text-center"> Email </th>
                        <th class="text-center"> Mobile Number </th>
                        <th class="text-center"> Date Applied</th>
                        <th class="text-center"> Action </th>
                    </tr>
                    </thead>
                    <tbody id="masterlistSearchTable">
                        @foreach ($users as $row)
                            <tr>
                                <td>{{$row['first_name'].' '.$row['last_name']}}</td>
                                <td>{{$row['applying_for']}}</td>
                                <td>{{$row['college_course']}}</td>
                                <td>{{$row['educational_attainment']}}</td>
                                <td>{{$row['email']}}</td>
                                <td>{{$row['mobile_number']}}</td>
                                <td>{{$row['created_at']}}</td>
                                <td>
                                    <a  
                                        href="/admin/masterlist/applicant-profile/{{ $row->id }}" 
                                        class="view_applicant btn btn-info">View</a>
                                </td>
                            </tr>
                                
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-main>

<script type="text/javascript" src="{{ asset('js/masterlist.js') }}"></script>

  


