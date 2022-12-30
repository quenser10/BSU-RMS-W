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
          <h2><i class="fa fa-dollar"></i> {{$countJobs}}</h2>
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
              <a href="/job-management">View All</a>
            </div>
          
          </div>
        </div>
      </div>
    </div> <!--col-md-7-->               
  </div>
  <div class="row">
    <div class="card" style="margin-bottom:10px;">
      <div class="card-body">
        <canvas id="myChart" width="400" height="100"></canvas>
      </div>
    </div>
                  
  </div>
  </div>
</x-main>

<script>

  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['2020', '2021', '2022' ],
          datasets: [{
              label: 'Number of Applicants',
              data: [12, 39, 3],
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
  
  </script>