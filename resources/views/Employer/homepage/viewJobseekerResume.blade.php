@extends('Employer.homepage.layouts.app')
@section('title', 'Employers - Resume')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{asset('assets/others/resume.css')}}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <span style="color:#e08e0b;"><b>Employer</b> </span> View Jobseeker's Resume
        <small>view Jobseeker's Resume</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Jobseeker's Resume</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Resume</h3>
        </div>

        <div class="box-body">
            @if(count($resume) == 1)
            
            <div class="row">
                <div class="col-md-8">
                    <div class="c29" id="elem">

                        <p class="resume c25"><span class="c3 c17"></span></p>
                        <a id="t.b5e152db183d5bf10508dda6fb9beae91810a391"></a>
                        <a id="t.0"></a>
                        <table class="c16">
                            <tbody>
                                <tr class="c28">
                                    <td class="c19" colspan="1" rowspan="1">
                                        <p class="resume c8 title" id="h.x8fm1uorkbaw"><span class="c10 c13 c31">{{ $resume->firstname." ".$resume->middlename." ".$resume->lastname }}</span></p>
                                        <p class="resume c6 subtitle" id="h.ymi089liagec"><span>{{ $resume->tagline }}</span></p>
                                    </td>
                                    <td class="c24" colspan="1" rowspan="1">

                                        @if(count($address))
                                        <p class="resume c6"><span class="c12 c10 c3">{{ $address->address }}</span></p>
                                        <p class="resume c6"><span class="c12 c10 c3">{{ $address->cityName." - ".$address->postalCode }}</span></p>
                                        <p class="resume c6"><span class="c12 c10 c3">{{ $address->stateName.", ".$address->countryName }}</span></p>
                                        <p class="resume c6"><span class="c12 c10 c3">{{ $address->primaryPhoneNo.", ".$address->secondaryPhnoeNo }}</span></p>
                                        <p class="resume c6"><span class="c12 c10 c13">{{ Auth::user()->email }}</span></p>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="c30">
                                    <td class="c19" colspan="1" rowspan="1">

                                        @if(count($jobseekerExperience))
                                        
                                        <h1 class="resume c20" id="h.y7d3xdxnr44m"><span class="c2">EXPERIENCE</span></h1>

                                        @foreach($jobseekerExperience as $jobseekerExperienceI)
                                        <h2 class="resume c15" id="h.rfgvkg2ifhfd"><span class="c10">{{ $jobseekerExperienceI->companyName }}, </span><span class="c10 c3">{{ $jobseekerExperienceI->companyLocation }}</span><span class="c3">&nbsp;&mdash; </span><span class="c3 c21">{{ $jobseekerExperienceI->jobTitle }}</span></h2>

                                        <h3 class="resume c9" id="h.n64fgzu3lwuy"><span>{{ $jobseekerExperienceI->fromMonth }} - {{ $jobseekerExperienceI->toMonth }}</span></h3>

                                        <p class="resume c0"><span>{{ $jobseekerExperienceI->jobDescription }}</span></p>
                                        @endforeach

                                        @endif
                                        
                                        @if(count($jobseekerAcademics))

                                        <h1 class="resume c20" id="h.yk8luflkpwij"><span>EDUCATION</span></h1>

                                        @foreach($jobseekerAcademics as $jobseekerAcademic)

                                        <h2 class="resume c15" id="h.czfiadnsgnzp"><span>{{ $jobseekerAcademic->qualificationText }}, </span><span class="c3">{{ $jobseekerAcademic->boardName }} &mdash; </span><span class="c14 c10 c3">{{ $jobseekerAcademic->marks }}%</span></h2>
                                        <h3 class="resume c9" id="h.miiyt1y6sl7g"><span>{{ $jobseekerAcademic->yearOfPassing }}</span></h3>
                                        <p class="resume c0"><span class="c1">{{ $jobseekerAcademic->academyName }}</span></p>

                                        @endforeach
                                        @endif

                                        @if($resume->projectsWorkedOn)
                                        <h1 class="resume c20" id="h.jhv78pp9wtzd"><span>PROJECTS</span></h1>

                                        <p class="resume c0"><span class="c1">{{ $resume->projectsWorkedOn }}</span></p>
                                        @endif
                                    </td>
                                    <td class="c24" colspan="1" rowspan="1">

                                        @if(count($jobseekerSkills))
                                        <h1 class="resume c20" id="h.ca0awj8022e2"><span class="c2">SKILLS</span></h1>
                                        
                                        <ul class="c5 lst-kix_d52h1clnbs3c-0 start"><li class="resume c11 c27">
                                            @foreach($jobseekerSkills as $jobseekerSkill)
                                            <span class="c1">{{ $jobseekerSkill->skillName }} &nbsp &nbsp</span>
                                            @endforeach
                                        </li></ul>
                                        @endif

                                        @if(count($jobseekerAchievements))
                                        <h1 class="resume c20" id="h.tuxh7mwdaxox"><span class="c2">ACHIEVEMENTS</span></h1>
                                        @foreach($jobseekerAchievements as $jobseekerAchievement)
                                        <p class="resume c27"><span class="c13">{{ $jobseekerAchievement->achievementTitle }}</span><span>&nbsp;</span><span class="c1">&nbsp;{{ $jobseekerAchievement->achievementDescription }}</span></p>
                                        @endforeach
                                        @endif

                                        @if($resume->languagesSpoken)
                                        <h1 class="resume c20" id="h.cxxkes25b26"><span>LANGUAGES</span></h1>

                                        <p class="resume c27"><span class="c1">{{ $resume->languagesSpoken }}</span></p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="resume c0 c26"><span class="c1"></span></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3><span class="text-info"><strong>Tools</strong></span>&nbsp <small>Resume Tools</small></h3>
                            <hr>
                            <button type="button" class="btn btn-success btn-block btn-lg" data-toggle="tooltip"
                            title="Print" onclick="printElem()">
                            <i class="fa fa-print"></i> &nbsp <strong>Print</strong> </button>
                        </div>
                    </div>
                </div>
            </div>

            @else

            <div class="box-body">
                <div class="container-fluid">
                    <br>
                    <div class="jumbotron">
                        <center>
                            <h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">Resume Not Found<br><small>This Job Seeker Doesn't have any Resume created.</small></span></h4>
                        </center>
                    </div>
                </div>
            </div>

            @endif
        </div>


        <input type="hidden" value="{{ Auth::user()->id }} {{ Auth::user()->name }}" id="jobseekerNameForPrinting">
    </section>

    @endsection

    @section('extraPageSpecificLoadScriptsContent')

    <script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script type="text/javascript">
        function printElem()
        {
            var resumeCSS = '@import url(https://themes.googleusercontent.com/fonts/css?kit=RFda8w1V0eDZheqfcyQ4EGb3DKsRMD34dqg1gT8Z-p6isjtAVhoKeKPV_uAAgBOSk3k702ZOKiLJc3WVjuplzPesZW2xOQ-xsNqO47m55DA);.c1,.c2{font-size:9pt}.c15,.c9,h2.resume{page-break-after:avoid}ul.lst-kix_3expns8knkd9-0,ul.lst-kix_3expns8knkd9-1,ul.lst-kix_3expns8knkd9-2,ul.lst-kix_3expns8knkd9-3,ul.lst-kix_3expns8knkd9-4,ul.lst-kix_3expns8knkd9-5,ul.lst-kix_3expns8knkd9-6,ul.lst-kix_3expns8knkd9-7,ul.lst-kix_3expns8knkd9-8,ul.lst-kix_d52h1clnbs3c-0,ul.lst-kix_d52h1clnbs3c-1,ul.lst-kix_d52h1clnbs3c-2,ul.lst-kix_d52h1clnbs3c-3,ul.lst-kix_d52h1clnbs3c-4,ul.lst-kix_d52h1clnbs3c-5,ul.lst-kix_d52h1clnbs3c-6,ul.lst-kix_d52h1clnbs3c-7,ul.lst-kix_d52h1clnbs3c-8{list-style-type:none}ol.resume{margin:0;padding:0}.c19,.c24{padding:7.2pt;vertical-align:top;border-style:solid;border-color:#fff;border-width:0}.c24{width:165pt}.c19{width:358.5pt}.c15,.c25{padding-bottom:0;line-height:1;text-align:left;margin-right:15pt}.c1{color:#666;font-weight:400;text-decoration:none;vertical-align:baseline;font-family:Merriweather;font-style:normal}.c18,.c2{color:#2079c7;font-family:"Open Sans";font-style:normal;text-decoration:none;vertical-align:baseline}.c2{font-weight:700}.c18{font-size:10pt}.c25{padding-top:6pt;height:9pt}.c15{padding-top:16pt}.c4{color:#000;text-decoration:none;vertical-align:baseline;font-size:12pt;font-family:Merriweather;font-style:italic}.c17,.c7{color:#666}.c17,.c23,.c31,.c7{font-style:normal}.c9{padding-top:5pt;padding-bottom:5pt;line-height:1;text-align:left;margin-right:15pt}.c20,.c6{padding-bottom:0}.c7{text-decoration:none;vertical-align:baseline;font-size:8pt;font-family:"Open Sans"}.c14,.c17,.c23,.c31{font-family:Merriweather;text-decoration:none;vertical-align:baseline}.c17{font-size:6pt}.c20{padding-top:30pt;line-height:1;text-align:left;margin-right:15pt}.c6,.c8{padding-top:0}.c23{font-size:11pt}.c31{font-size:24pt}.c8{padding-bottom:6pt;line-height:1;text-align:left;margin-right:15pt}.c6{line-height:1.15;text-align:left;margin-right:15pt}.c0,.c27{padding-bottom:0;line-height:1.3;text-align:left;margin-right:15pt}.c14{font-size:11pt;font-style:italic}.c12{text-decoration:none;vertical-align:baseline;font-size:9pt;font-family:"Open Sans";font-style:normal}.c21,h6.resume{font-style:italic}.c0{padding-top:6pt}.c27{padding-top:16pt}.c16{border-spacing:0;border-collapse:collapse;margin-right:auto}.c5,p.resume{margin:0}.c29{background-color:#fff;max-width:525.6pt;//padding:28.8pt 43.2pt 43.2pt 43.2pt}.c11{margin-left:0;list-style-position:inside}.c5{padding:0}.c10{color:#000}.c28{height:80pt}.c3{font-weight:400}.c13,.title,h1.resume,h2.resume{font-weight:700}.c22{color:#b7b7b7}.subtitle,.title{padding-top:0;color:#000}.c30{height:588pt}.c26{height:9pt}.title{font-size:24pt;padding-bottom:6pt;font-family:Merriweather;line-height:1;text-align:left}.subtitle,h1.resume,h2.resume{padding-bottom:0;text-align:left}.subtitle{font-size:9pt;font-family:"Open Sans";line-height:1.15}li.resume,p.resume{font-family:Merriweather;font-size:9pt;color:#666}h1.resume{padding-top:30pt;color:#2079c7;font-size:9pt;font-family:"Open Sans";line-height:1}h2.resume{padding-top:16pt;color:#000;font-size:11pt;font-family:Merriweather;line-height:1}h3.resume{padding-top:5pt;color:#666;font-size:8pt;padding-bottom:5pt;font-family:"Open Sans";line-height:1;page-break-after:avoid;text-align:left}h4.resume,h5.resume,h6.resume{padding-top:8pt;color:#666;font-size:11pt;padding-bottom:0;font-family:"Trebuchet MS";line-height:1.3;page-break-after:avoid;text-align:left}h4.resume{text-decoration:underline}';


            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

            mywindow.document.write('<html><head><title>' + document.title + ' - ' + document.getElementById('jobseekerNameForPrinting').value + '</title>');
            mywindow.document.write('<style>' + resumeCSS + '</style>');
            mywindow.document.write('</head><body >');
            mywindow.document.write(document.getElementById('elem').innerHTML);
            mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
</script>

@endsection

