<x-main>
  <div class="home-content">
    <div class="text">Dashboard</div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <div class="stat-card">
        <div class="stat-card__content">
          <p class="text-uppercase mb-1 text-muted">New</p>
          <h2>{{$countApplicants}}</h2>
          <div>
             
            <span class="text-muted">Applicants</span>
          </div>
        </div>
        <div class="stat-card__icon stat-card__icon--primary">
          <div class="stat-card__icon-circle">
            <i class='bx bxs-user-detail'></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="stat-card">
        <div class="stat-card__content">
          <p class="text-uppercase mb-1 text-muted">Jobs</p>
          <h2> {{$countJobs}}</h2>
          <div>
            
            <span class="text-muted">Opened</span>
          </div>
        </div>
        <div class="stat-card__icon stat-card__icon--success">
          <div class="stat-card__icon-circle">
            <i class='bx bx-window-open' ></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="stat-card">
        <div class="stat-card__content">
          <p class="text-uppercase mb-1 text-muted">Jobs</p>
          <h2>{{$countClosedJobs}}</h2>
          <div>
             
            <span class="text-muted">Closed</span>
          </div>
        </div>
        <div class="stat-card__icon stat-card__icon--warning">
          <div class="stat-card__icon-circle">
            <i class='bx bx-window-close' ></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- No. of Qualified and Disqualified Applicants --}}
  <div class="row mb-3">
    <div class="card shadow" style="margin-bottom:10px;">
      <div class="card-body">
        <div class="card-title text-center">
          <h4>Prequalification</h4>
        </div>
        <div class="row">
          <form class="d-flex flex-row justify-content-center" id="qualificationfilter-form">
            @csrf
          <div class="col-md-3">
            <select class="form-select" name="qualificationYearSelect" id="qualificationYearSelect" >
              <option value="allYear" selected>All Years</option>
              @foreach ($uniqueYears as $data)
              <option value="{{$data}}">{{$data}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4 d-flex flex-row" style="margin-left: 10px;">
            <input type="text" name="qualificationSearch" class="form-control" id="qualificationSearch" placeholder="Search Job Title">
            <button type="submit" class="btn btn-primary" id="qualificationFilterBtn" style="margin-left: 10px">Filter</button>
          </div>
          </form>
        </div>
        <div class="row mt-2">
          <div class="col-md-6 text-center">
            Number of Qualified Applicants
          </div>
          <div class="col-md-6 text-center">
            Number of Disqualified Applicants
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-6 text-center">
            <h2 id="qualifiedApplicantsTxt">
              {{$qualifiedApplicants}}
            </h2>
          </div>
          <div class="col-md-6 text-center">
            <h2 id="disqualifiedApplicantsTxt">
              {{$disqualifiedApplicants}}
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row"  >
    <div class="col-md-5  dashboardApplicantTbl " >  
      <div class="card shadow " style="height: 720px;  text-align:center;"> {{--overflow-y: auto;--}}
        <div class="card-body d-flex flex-column">
          <h4 style="color:#11101D;">Recent Applicants</h4>
          <table class="table" style="text-align:center;">
                <thead class="bg-light">
                  <tr>
                   
                    <th>Name</th>
                    <th>Applying for</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($applicants as $applicant)
                    @if($applicant->status == "new")
                      <tr>
                        <td >                     
                            <div>
                              <p class="fw-bold mb-1"> {{$applicant['first_name'] . ' ' . $applicant['last_name']}}</p>
                              <p class="text-muted mb-0">{{$applicant['email']}}</p>
                            </div>
                        </td>
                        <td>{{$applicant['applying_for']}}</td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
            </table>
            
            <div class="mt-auto">
              <hr>
              <a href="/initial-assessment">View All</a>
            </div>
        </div>
      </div>
        
    </div>
    <div class="col-md-7">
      <div class="row">
        <div class="card container myTable shadow" style="height: 720px; text-align:center;">
          <div class="card-body d-flex flex-column">
            <h4 style="float:left; color:#11101D;">Active Job Positions</h4>
            <table class="table table-lg" id="example">
              <thead >
                <tr>
                  <th  style="font-size: 0.9em;"> Position Title</th>
                  <th style="font-size: 0.9em;"> Place of Assignment </th>
                  <th style="font-size: 0.9em;"> Opening Date </th>
                  <th style="font-size: 0.9em;"> Closing Date </th>
                  <!-- <th> View Applicant List </th> -->
                </tr>
              </thead>
              <tbody> 
                @foreach($jobs as $job)
                @if($job['to_close']==0)
                  <tr>
                    <td class="p-3" style="color:#24A0ED; font-weight:bold;">{{$job['job_title']}}</td>
                    <td class="p-3">{{$job['place_of_assignment']}}</td>
                    <td class="p-3">{{$job['opening_date']}}</td>
                    <td class="p-3">{{$job['closing_date']}}</td>
                  </tr>
                @endif
                @endforeach
                
              </tbody>
              
            </table>
            <div class="mt-auto">
              <hr>
              <a href="/admin/job-management/opened-jobs">View All</a>
            </div>
          
          </div>
        </div>
      </div>
    </div> <!--col-md-7-->               
  </div>
  
  <div class="row mt-4">
    <div class="card shadow" style="margin-bottom:10px;">
      <div class="card-body">
        <h4 class="float-left">Number of Applicants</h4>
        <div class="row d-flex  mt-4">
          <form class="d-flex flex-row" id="year-form">
            @csrf
          <div class="col-md-2">

              <select class="form-select" name="yearSelect" id="yearSelect" >
                <option value="allYear" selected>All Years</option>
                @foreach ($uniqueYears as $data)
                <option value="{{$data}}">{{$data}}</option>
                @endforeach
              </select>
            
          </div>
         
            <div class="col-md-5 d-flex flex-row" style="margin-left: 10px;">
                <input type="text" name="itemNumberSearch" class="form-control" id="itemNumberSearch" placeholder="Search Item Number" >
                <button type="submit" class="btn btn-primary" id="itemNumberFilterBtn" style="margin-left: 10px">Filter</button>
            </div>
          </form>
 
        </div>
        <div class="row mt-2">
          <canvas id="myChart" width="400" height="100"></canvas>
        </div>
      </div>
    </div>
                  
  </div>
</x-main>

<script>
 
  var _ydata = JSON.parse('{!! json_encode($months) !!}') ;
  var _xdata = JSON.parse('{!! json_encode($monthCount) !!}'); 
  
</script>

<script>

  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: _ydata,
          datasets: [{
              label: 'Number of Applicants',
              data: _xdata,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

  document.getElementById('yearSelect').addEventListener('change', function() {
    // make an AJAX request to the server and pass the selected year as a parameter
    $.ajax({
      url: '/admin/year-filter',
      type: 'GET',
      data: { yearSelect: this.value },
      success: function(response) {
        // update the chart with the new data
        myChart.data.datasets[0].data = response.monthCount;
        myChart.data.labels = response.months;
        myChart.update();
      }
    });
  });

// ITEM NUMBER SEARCH FILTER
  document.getElementById('itemNumberFilterBtn').addEventListener('click', function(event) {
    event.preventDefault(); 
   
    $.ajax({
      url: '/admin/year-filter',
      type: 'GET',
      data: { itemNumberSearch: document.getElementById('itemNumberSearch').value , yearSelect: document.getElementById('yearSelect').value},
      success: function(response) {
        // update the chart with the new data
        myChart.data.datasets[0].data = response.monthCount;
        myChart.data.labels = response.months;
        myChart.update();
      }
    });
  });

  document.getElementById('qualificationYearSelect').addEventListener('change', function() {
    
    $.ajax({
      url: '/admin/qualification-filter',
      type: 'GET',
       data: {qualificationYearSelect: this.value },
      success: function(response) {
        console.log(response);
        $('#qualifiedApplicantsTxt').html(response.qualifiedApplicants);
        $('#disqualifiedApplicantsTxt').html(response.disqualifiedApplicants);
        
      }
    });
  });

  document.getElementById('qualificationFilterBtn').addEventListener('click', function(event) {
    event.preventDefault(); 
   
    $.ajax({
      url: '/admin/qualification-filter',
      type: 'GET',
      data: { qualificationSearch: document.getElementById('qualificationSearch').value , qualificationYearSelect: document.getElementById('qualificationYearSelect').value},
      success: function(response) {

        $("#qualifiedApplicantsTxt").text(response.qualifiedApplicants);
        $("#disqualifiedApplicantsTxt").text(response.disqualifiedApplicants);
        
      }
    });
  });

  
  </script>



