<x-main>
    <x-flash-message/>
        <div class="home-content">
            <div class="text">Audit Trail</div>
        </div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-activities-tab" data-bs-toggle="tab" data-bs-target="#nav-activities" type="button" role="tab"><i class='bx bx-spreadsheet'></i> Admin Activities</button>
                    <button class="nav-link  " id="nav-loginInfo-tab" data-bs-toggle="tab" data-bs-target="#nav-loginInfo" type="button" role="tab"><i class='bx bx-info-circle'></i> Admin Login Info</button>
                    <button class="nav-link  " id="nav-applicants-tab" data-bs-toggle="tab" data-bs-target="#nav-applicants" type="button" role="tab"><i class='bx bx-info-circle'></i> Applicant Activities</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-activities" role="tabpanel" aria-labelledby="nav-activities-tab">
                    <div class="card">
                        <div class="card-body " style="overflow: auto;">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="" class="hidden"></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="activitySearch" class="form-control" id="activitySearch" placeholder="Search Table..">
                                </div>
                            </div>
                            <div class="container-fluid" id="double-scroll">
                                <table class="table table-striped table-bordered text-center" id="auditTable" style="table-layout: fixed; width:150%">
                                    <thead>
                                      <tr>
                                        <th style="font-weight: bold; text-align:center;">NAME</th>
                                        <th  style="font-weight: bold; text-align:center;">ID</th>
                                        <th style="font-weight: bold; text-align:center;">ROLE</th>
                                        <th style="font-weight: bold; text-align:center;">EVENT</th>
                                        <th style="font-weight: bold; text-align:center; width:20%">OLD VALUE</th>
                                        <th style="font-weight: bold; text-align:center; width:20%">NEW VALUE</th>
                                        <th style="font-weight: bold; text-align:center;">IP ADDRESS</th>
                                        <th style="font-weight: bold; text-align:center;">USER AGENT</th>
                                        <th style="font-weight: bold; text-align:center;">DATE</th>
                                      </tr>
                                    </thead>
                                    <tbody id="activitySearchTable">
                                    @foreach($allAuds as $audit)
                                        @if ($audit != null)
                                        @if ($audit->user_type !=  null)
                                        <tr>
                                            <td>  
                                                @if($audit->adminAuditAccount ==  null)
                                                    <td></td>
                                                @else
                                                    {{$audit->adminAuditAccount->first_name . ' ' . $audit->adminAuditAccount->last_name }}
                                                @endif
                                                
                                            
                                            </td>
                                            <td>
                                                @if($audit->adminAuditAccount ==  null)
                                                    <td></td>
                                                @else
                                                {{$audit->adminAuditAccount->employee_id}}
                                                @endif
                                                
                                            </td>
                                            <td>
                                                @if($audit->adminAuditAccount ==  null)
                                                    <td></td>
                                                @else
                                                {{$audit->adminAuditAccount->is_admin}}
                                                @endif
                                                
                                            
                                            </td>
                                            <td>{{$audit->event}}</td>
                                            <td >{{$audit->old_values}}</td>
                                            <td >{{$audit->new_values}}</td>
                                            <td>{{$audit->ip_address}}</td>
                                            <td>{{$audit->user_agent}}</td>
                                            <td>{{$audit->created_at}}</td>                                  
                                        </tr>
                                        @endif
                                        
                                        @endif
                                    @endforeach
                                    </tbody>
                                    </table>
                            </div>  
                            
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade " id="nav-loginInfo" role="tabpanel" aria-labelledby="nav-loginInfo-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="" class="hidden"></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="adminLogsSearch" class="form-control" id="adminLogsSearch" placeholder="Search Table..">
                                </div>
                            </div>
                            <table class="table table-striped table-bordered text-center adminLogsTable">
                                <thead>
                                  <tr>
                                    <th style="font-weight: bold; text-align:center;">FIRST_NAME</th>
                                    <th style="font-weight: bold; text-align:center;">LAST NAME</th>
                                    <th style="font-weight: bold; text-align:center;">EMPLOYEE ID</th>
                                    <th style="font-weight: bold; text-align:center;">ACTIVITY</th>
                                    <th style="font-weight: bold; text-align:center;">DATE/TIME</th>
                                    
                                  </tr>
                                </thead>
                                <tbody id="adminLogsSearchTable">
                                
                                    @foreach ($adminLogs as $log)
                                    <tr>
                                        <td>{{$log->first_name}}</td>
                                        <td>{{$log->last_name}}</td>
                                        <td>{{$log->employee_id}}</td>
                                        <td>{{$log->activity}}</td>
                                        <td>{{$log->created_at}}</td>
                                    </tr>
                                    @endforeach
                                    
                                
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="nav-applicants" role="tabpanel" aria-labelledby="nav-applicants-tab">
                    <div class="card">
                        <div class="card-body " style="overflow: auto;">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="" class="hidden"></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="activitySearch" class="form-control" id="activitySearch" placeholder="Search Table..">
                                </div>
                            </div>
                            <div class="container-fluid" id="double-scroll">
                                <table class="table table-striped table-bordered text-center" id="auditTable" style="table-layout: fixed; width:150%">
                                    <thead>
                                      <tr>
                                        
                                        <th style="font-weight: bold; text-align:center;">EVENT</th>
                                        <th style="font-weight: bold; text-align:center; width:20%">OLD VALUE</th>
                                        <th style="font-weight: bold; text-align:center; width:20%">NEW VALUE</th>
                                        <th style="font-weight: bold; text-align:center;">IP ADDRESS</th>
                                        <th style="font-weight: bold; text-align:center;">USER AGENT</th>
                                        <th style="font-weight: bold; text-align:center;">DATE</th>
                                      </tr>
                                    </thead>
                                    <tbody id="activitySearchTable">
                                    @foreach($allAuds as $audit)
                                        @if ($audit != null)
                                        @if ($audit->user_type ==  null)
                                        <tr>
                                            
                                            <td>{{$audit->event}}</td>
                                            <td >{{$audit->old_values}}</td>
                                            <td >{{$audit->new_values}}</td>
                                            <td>{{$audit->ip_address}}</td>
                                            <td>{{$audit->user_agent}}</td>
                                            <td>{{$audit->created_at}}</td>                                  
                                        </tr>
                                        @endif
                                        
                                        @endif
                                    @endforeach
                                    </tbody>
                                    </table>
                            </div>  
                            
                        </div>
                    </div>
                </div>
                
            </div> <!-- tab-content -->
    </div>
    
    </x-main>
    
    
    