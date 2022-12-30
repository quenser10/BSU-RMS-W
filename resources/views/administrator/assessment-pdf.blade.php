<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/js/app.js'])
</head>
<body class="p-4">
    @foreach ($applicants as $applicant)
    
    <div class="row">
        <div class="col-md-2">
            <img class="img-fluid w-50" src="{{url('/images/bsu_logo.png')}}" alt="" >
        </div>
        <div class="col-md-5 text-center">
            <h2 class="text-uppercase">Final Comparative Assessment Form</h2>
            <h3>{{$applicant->applying_for}}</h3>
        </div>
        <div class="col-md-5">
            <table class="table-bordered" style="empty-cells: show">
                <tr>
                    <td>Document Code:</td>
                    <td class="w-50"></td>
                    <td>Revision Number</td>
                    <td class=""></td>
                </tr>
                <tr>
                    <td>Effectivity</td>
                    <td></td>
                    <td></td>
                </tr>

            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <p class="text-uppercase">Position to be filled:</p>
            <p class="text-uppercase">Item number:</p>
        </div>
        <div class="col-md-4">
            <p class="text-uppercase">former incumbent:</p>
            <p class="text-uppercase">date of publication:</p>
        </div>
        <div class="col-md-4">
            <p class="text-uppercase">salary grade:</p>
            <p class="text-uppercase">monthly salary:</p>
            <p class="text-uppercase">place of assignment:</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <p class="text-uppercase">qualification standards</p>
        </div>
        <div class="col-md-4">
            <p class="text-uppercase">education:</p>
            <p class="text-uppercase">experience:</p>
        </div>
        <div class="col-md-4">
            <p class="text-uppercase">training:</p>
            <p class="text-uppercase">eligibility:</p>
        </div>
    </div>
    <div class="row p-4">
        <table class="table-bordered" style="">
            <tr>
                <td>Name of Candidates</td>
                <td>Education</td>
                <td>Experience</td>
                <td>Performance Evaluation</td>
                <td>Training</td>
                <td>Eligibility</td>
                <td>Outstanding Accomplishment</td>
                <td>Psycho-metric Exam</td>
                <td>Potential</td>
                <td>Total Points</td>
                <td>Remarks</td>
            </tr>
            <tr>
                <td></td>
                <td>Minimum Educational Requirement</td>
                <td>Experience Acquired after graduation</td>
                <td>Latest Performance Rating</td>
                <td>Relevant training taken after graduation for the last 5 years</td>
                <td>Indicate License/Eligibility</td>
                <td>Only those not previously credited(National/Regional/Local)</td>
                <td>Aptitude/Personality Test</td>
                <td>Function Specific Exam(Technical competency)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>25</td>
                <td>20</td>
                <td>10</td>
                <td>10</td>
                <td>/</td>
                <td>5</td>
                <td>10</td>
                <td>5</td>
                <td>15</td>
                <td>100</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        
        </table>
    </div>
    <div class="row">
        <p>Human Resource Merit Promotion and Selection Board(HRMPSB) Certification</p>
        <p>This is to certify that the above-listed candidates/applicants were assessed and deliberated on (date) via zoom. They all meet the required qualification standards for the position to be filled.</p>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3 text-center">
                    <p class="text-uppercase">Hazeline N. Tibangay</p>
                    <p>Immediate Supervisor</p>
                </div>
                <div class="col-md-3">
                    <p class="text-uppercase">Hazeline N. Tibangay</p>
                    <p>Immediate Supervisor</p>
                </div>
                <div class="col-md-3">
                    <p class="text-uppercase">Hazeline N. Tibangay</p>
                    <p>Immediate Supervisor</p>
                </div>
                <div class="col-md-3">
                    <p class="text-uppercase">Hazeline N. Tibangay</p>
                    <p>Immediate Supervisor</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <p class="text-uppercase">Hazeline N. Tibangay</p>
                    <p>Immediate Supervisor</p>
                </div>
                <div class="col-md-4">
                    <p class="text-uppercase">Hazeline N. Tibangay</p>
                    <p>Immediate Supervisor</p>
                </div>
                <div class="col-md-4">
                    <p class="text-uppercase">Hazeline N. Tibangay</p>
                    <p>Immediate Supervisor</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 border border-dark text-center">
            <div class="row">
               <p>(Name of Candidate)</p> 
                <p>is appointed to the position</p>
            </div>
            <div class="row">
                <p class="text-uppercase">felipe salaing comila</p>
                <p>President</p>
            </div>
        </div>
    </div>

    
    @endforeach

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>