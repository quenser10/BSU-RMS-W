<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BSU | Transparency Seal</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partials.applicant-link')
</head>

<body>          
    <x-flash-message/>
    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    @include('partials.top-nav')


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">

            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <img class="img-fluid" src="{{url('/images/BSU-Banner.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('partials._navbar')
    <!-- Navbar End -->
    @include('components.login')
    @include('components.cv-application')
    @include('components.register')

    <div class="container-fluid page-header py-2 mb-2">
        <div class="container py-5">
            <h3 class="display-3 text-white mb-3 animated slideInDown">Transparency Seal</h3>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Transparency Seal</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="p-5">

        <div class="field field-name-body field-type-text-with-summary field-label-hidden">
            <div class="field-items">
                <div class="field-item even" property="content:encoded">
                    <div style="display:block;position:relative;">
                        <img alt="BSU Logo" src="{{url('images/bsu_logo.png')}}" style="width: 200px; height: 197px; padding: 10px; display: inline-block; float: left;" />
                        <h4 style="text-align:center;position:absolute;width:100%;margin-top:15px;">BSU Compliance with Section 93 (Transparency Seal)<br />
                        R.A. No. 10155 (General Appropriations Act FY 2012)<br />
                        National Budget Circular 542</h4>
                        <p>	<img alt="" src="{{url('images/transparencyseal.png')}}" style="width: 200px; height: 200px; padding: 10px; display: inline-block; float: right;" /></p>
                    </div>
                </div>
            </div>
        </div>
    <div style="clear:both;display:block;">
        <span style="font-size:14px;">National Budget Circular 542, issued by the Department of Budget and Management on August 29, 2012, reiterates compliance with Section 93 of the General Appropriations Act of FY2012. Section 93 is the Transparency Seal provision, to wit:</span><br />
    </div>
    <div class="rtejustify" style="clear:both;display:block;">
        <span style="font-size:14px;">Sec. 93. Transparency Seal. To enhance transparency and enforce accountability, all national government agencies shall maintain a transparency seal on their official websites. The transparency seal shall contain the following information: (i) the agency’s mandates and functions, names of its officials with their position and designation, and contact information; (ii) annual reports, as required under National Budget Circular Nos. 507 and 507-A dated January 31, 2007 and June 12, 2007, respectively, for the last three (3) years; (iii) their respective approved budgets and corresponding targets immediately upon approval of this Act; (iv) major programs and projects categorized in accordance with the five key results areas under E.O. No. 43, s. 2011; (v) the program/projects beneficiaries as identified in the applicable special provisions; (vi) status of implementation and program/project evaluation and/or assessment reports; and (vii) annual procurement plan, contracts awarded and the name of contractors/suppliers/consultants. The respective heads of the agencies shall be responsible for ensuring compliance with this section.</span><br />
    </div>
    <div class="rtejustify" style="clear:both;display:block;">
        <span style="font-size:14px;">A Transparency Seal, prominently displayed on the main page of the website of a particular government agency, is a certificate that it has complied with the requirements of Section 93. This Seal links to a page within the agency’s website which contains an index of downloadable items of each of the above-mentioned documents.</span><br />
    </div>


    </div>

    



    @include('partials._footer')

    <!--                        Back to Top Arrow                         -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/easing.min.js') }}"></script> 
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counterup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script> 
    <script type="javascript" src="{{ asset('js/lightbox.min.js') }}"></script> 
    
    <!-- Template Javascript -->

    <script src="{{ asset('js/main.js') }}"></script> <!-- working -->
</body>

</html>