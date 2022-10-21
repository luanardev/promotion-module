<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{$staff->name()}}</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        
        <style>           
            .page-break {
                page-break-after: always;
            }

            .logo{
                display: block;
                text-align: center;
            }

            .logo img{
                position: absolute;
                top: 5%;
                left: 50%;                             
                transform: translate(-50%, -5%);
                max-width: 150px;
                max-height: 150px;
            }

            .field-label {
                display: inline-block;
                width: 200px;
                text-align: right;
            }

            .field-value {
                display: inline-block;
                width: auto;
                text-align: right;
                padding-left: 50px;
                
            }
         </style>

    </head>
    <body>

        <main>
            @php 
                $logo = Institution::get('company_logo'); 
            @endphp
            <!-- Front page -->
            <div class="row">
                <div class="col-md-12"> 
                    
                    <!-- Logo -->
                    <div class="logo">
                        <img src="{{ asset("storage/{$logo}") }}" class="img-fluid" />                       
                    </div>
                    
                    <!-- Front page text -->
                    <div class="text-center" style="margin-top: 300px">
                        <h2>{{$application->financial_year}} Promotion Form</h2>
                        <h3>({{$application->getCategory()}} Staff)</h3>
                        <br/>
                        <h2>{{$staff->fullname()}}</h2>                
                        <h4 class="text-muted">{{$staff->employment->getPosition()}}</h4>                
                    </div>
                    
                    <!-- Front page date -->
                    <div class="text-center" style="margin-top: 300px">
                        <h5>{{now()->format('d-M-Y')}}</h5>               
                    </div>
                </div>              
            </div>
            <!-- End Front page -->
        
            <!-- page break -->
            <div class="page-break"></div>

            <!-- Start page-->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="py-4 mb-3">A. Personal Information</h4>
                    <p class="mb-3">
                        <span class="text-bold field-label"> Employee Number : </span>                           
                        <span class="text-bold field-value">{{$staff->id}}</span>                            
                    </p>
                    <p class="mb-3">
                        <span class="text-bold field-label"> National ID : </span>                           
                        <span class="text-bold field-value">{{$staff->national_id}}</span>                            
                    </p>
                    <p class="mb-3">
                        <span class="text-bold field-label"> Title : </span>                           
                        <span class="text-bold field-value">{{$staff->title}}</span>                            
                    </p>
                    <p class="mb-3">
                        <span class="text-bold field-label"> Firstname : </span>                           
                        <span class="text-bold field-value">{{$staff->firstname}}</span>                            
                    </p>
                    <p class="mb-3">
                        <span class="text-bold field-label"> Lastname : </span>                           
                        <span class="text-bold field-value">{{$staff->lastname}}</span>                            
                    </p>
                   
                    <p class="mb-3">
                        <span class="text-bold field-label">Contact Address : </span>
                        <span class="text-bold field-value">{{$staff->contact_address}}</span>
                    </p>

                    <p class="mb-3">
                        <span class="text-bold field-label">Official Email : </span>
                        <span class="text-bold field-value">{{$staff->official_email}}</span>
                    </p>

                    <p class="mb-3">
                        <span class="text-bold field-label">Personal Email : </span>
                        <span class="text-bold field-value">{{$staff->personal_email}}</span>
                    </p>
                    
                </div>
            </div>
            
           
            <!-- End page -->

            <!-- page break 
            <div class="page-break"></div>-->

            <!-- Start page-->
            <div class="row">
                <div class="col-md-12">

                    <h4 class="py-4 mb-3">B. Promotion Information</h4>

                    <p class="mb-3">
                        <span class="text-bold field-label"> Present Position : </span>                           
                        <span class="text-bold field-value">{{$staff->employment->getPosition() }}</span>                            
                    </p>
                    <p class="mb-3">
                        <span class="text-bold field-label"> Present Grade : </span>                           
                        <span class="text-bold field-value">{{$staff->employment->getGradeScale() }}</span>                            
                    </p>

                    <p class="mb-3">
                        <span class="text-bold field-label">Period Of Service : </span>
                        <span class="text-bold field-value">{{$staff->employment->elapsedPeriod()}}</span>
                    </p>
    
                    <p class="mb-3">
                        <span class="text-bold field-label"> Grade Applied : </span>                           
                        <span class="text-bold field-value">Grade {{$application->grade_applied}}</span>                            
                    </p>

                    <p class="mb-3">
                        <span class="text-bold field-label"> Rank Applied : </span>                           
                        <span class="text-bold field-value">{{$application->rankApplied->name}}</span>                            
                    </p>

                    <p class="mb-3">
                        <span class="text-bold field-label"> Application Date : </span>                           
                        <span class="text-bold field-value">{{$application->getApplyDate()}}</span>                            
                    </p>
                    
                </div>               
            </div>
            <!-- End page -->

            <!-- page break -->
            <div class="page-break"></div>

            <!-- Start page-->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="py-4 mb-3">C. LUANAR Service</h4>

                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Position</th>
                                <th>Progression</th>
                                <th>Staff Grade</th>
                                <th>Staff Notch</th>
                                <th>Start Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($staff->orderedProgress() as $key => $progress )
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$progress->getPosition()}}</td>
                                <td>{{$progress->getType()}}</td>
                                <td>{{$progress->grade}}</td>
                                <td>{{$progress->notch}}</td>
                                <td>{{$progress->startDate()}}</td>
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End page -->

             <!-- page break 
             <div class="page-break"></div>-->

             <!-- Start page-->

            <div class="row">
                <div class="col-md-12">
                    <h4 class="py-4 mb-3">D. Previous Employment</h4>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Position</th>
                                <th>Employer Name</th>
                                <th>Employer Address</th>
                                <th>Employer Phone</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Period</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($staff->experience as $key=> $experience )
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$experience->job_position}}</td>
                                <td>{{$experience->employer_name}}</td>
                                <td>{{$experience->employer_address}}</td>
                                <td>{{$experience->employer_phone}}</td>
                                <td>{{$experience->startDate()}}</td>
                                <td>{{$experience->endDate()}}</td>
                                <td>{{$experience->period()}}</td>
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>
  
                </div>
            </div>
            <!-- End page -->

            <!-- page break -->
            <div class="page-break"></div>

            <!-- Start page-->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="py-4 mb-3">E. Achievements</h4>

                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Key Area</th>
                                <th>Achievement</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($application->achievements as $key=> $achievement )
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$achievement->keyarea}}</td>
                                <td>{{$achievement->achievement}}</td>
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End page -->

            <!-- page break 
            <div class="page-break"></div>-->

            <!-- Start page-->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="py-4 mb-3">F. Academic Qualifications</h4>

                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Specialty</th>
                                <th>Institution</th>
                                <th>Country</th>
                                <th>Year</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($staff->qualifications as $key=> $qualification )
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$qualification->name}}</td>
                                <td>{{$qualification->getLevel()}}</td>
                                <td>{{$qualification->specialization}}</td>
                                <td>{{$qualification->institution}}</td>
                                <td>{{$qualification->country}}</td>
                                <td>{{$qualification->year}}</td>
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- End page -->

            <!-- page break -->
            <div class="page-break"></div>

            <!-- Start page-->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="py-4 mb-3">G.  Awards</h4>

                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Institution</th>
                                <th>Country</th>
                                <th>Year</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($staff->awards as $key=> $award )
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$award->name}}</td>
                                <td>{{$award->institution}}</td>
                                <td>{{$award->country}}</td>
                                <td>{{$award->year}}</td>
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- End page -->

            <!-- page break 
            <div class="page-break"></div>-->

            <!-- Start page-->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="py-4 mb-3">H. References</h4>

                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Relation</th>
                                <th>Organisation</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($staff->referees as $key=> $referee )
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$referee->fullname()}}</td>
                                <td>{{$referee->relation}}</td>
                                <td>{{$referee->organisation}}</td>
                                <td>{{$referee->contact_address}}</td>
                                <td>{{$referee->email_address}}</td>
                                <td>{{$referee->phonenumbers()}}</td>
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- End page -->
        </main>

        <!-- Script for adding Page Number -->
        <script type="text/php">
            if (isset($pdf)) {
                $text = "page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width) / 2;
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
        <!-- End script --> 

    </body>
</html>