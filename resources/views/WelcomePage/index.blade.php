@extends('WelcomePage.layouts.app')
@section('title', 'Welcome')

@section('select_HOME', 'class=active')
@section('select_ABOUT', '')
@section('select_CONTACT', '')

@section('body')
<!-- *****************************************************************************************************************
 HEADERWRAP
 ***************************************************************************************************************** -->
 <div id="headerwrap">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-8 col-lg-offset-2">
 				<h3>India's leading website</h3>
 				{{-- <h1>Eyecatching Bootstrap 3 Theme.</h1> --}}
 				<img src="{{ asset('assets/staticImages/Logos/Logo_Main_Whitened.png') }}" alt="Logo" width="85%">
 				<h5>Don't wait for long,register and find your dream job.</h5>
 				<h5>Upload your resume today!</h5>				
 			</div>
 			{{-- <div class="col-lg-8 col-lg-offset-2 himg">
 				<img src="{{ asset('assets/welcomePage/img/browser.png') }}" class="img-responsive">
 			</div> --}}
 		</div><!-- /row -->
 	</div> <!-- /container -->
 </div><!-- /headerwrap -->

<!-- *****************************************************************************************************************
 SERVICE LOGOS
 ***************************************************************************************************************** -->
 <div id="service">
 	<div class="container">
 		<div class="row centered" style="text-align: justify;">
 			<div class="col-md-4">
 				<i class="fa fa-globe" style="width: 100%;
    vertical-align: middle;
    text-align: center;"></i>
 				<h4 style="text-align: center;">Google</h4>
 				<p>Google's mission is to organise the world's information and make it universally accessible and useful. When ideas aren’t backed by data and research, impact is harder to achieve and measure. We look for teams that break down large problems into small ones, and then test and iterate solutions.</p>
 				<p><br/><a href="#" class="btn btn-theme">More Info</a></p>
 			</div>
 			<div class="col-md-4">
 				<i class="fa fa-desktop" style="width: 100%;
    vertical-align: middle;
    text-align: center;"></i>
 				<h4 style="text-align: center;">SAS Inc.</h4>
 				<p>Some people see data as facts and figures. But it’s more than that. It’s the lifeblood of your business. It contains your organization's history. And it’s trying to tell you something.SAS helps you make sense of the message. As the leader in business analytics software and services, SAS transforms your data into insights that give you a fresh perspective on your business.</p>
 				<p><br/><a href="#" class="btn btn-theme">More Info</a></p>
 			</div>
 			<div class="col-md-4">
 				<i class="fa fa-group" style="width: 100%;
    vertical-align: middle;
    text-align: center;"></i>
 				<h4 style="text-align: center;">NetApp Inc</h4>
 				<p>Our Team Is Data Driven. You have a vision for digital transformation. We help you make it all possible. Your data holds a wealth of opportunity. Harness it, and you create more value across your organization.Data that’s united lets you expand customer touchpoints, foster new innovations, and optimize your operations.</p>
 				<p><br/><a href="#" class="btn btn-theme">More Info</a></p>
 			</div>		 				
 		</div>
 	</div><! --/container -->
 </div><! --/service -->
 
<!-- *****************************************************************************************************************
 PORTFOLIO SECTION
 ***************************************************************************************************************** -->
<div id="portfoliowrap">
        <h3>LATEST WORKS</h3>

        <div class="portfolio-centered">
            <div class="recentitems portfolio">
				<div class="portfolio-item graphic-design">
					<div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/nick.png" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">NIKE</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/nick.png" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->
                            
                <div class="portfolio-item web-design">
                    <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/2.jpg" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">ASCENT</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/2.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->

				<div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/11.png" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">DEWALT</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/11.png" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->
        
               
				 <div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/8.png" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">IOT</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/8.png" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->
        
               
                                        
                <div class="portfolio-item books">
                    <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/9.png" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">GRASSINGTON HUB</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/9.png" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->

				 <div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/5.jpg" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">TECH TARGET</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/5.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->
                                        
               
                    
                    <div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/7.jpg" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">EMPRESS</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/7.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->


				 <div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/3.png" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">WELLNESS COMPASS</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/3.png" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->

				
				<div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/13.png" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">GOLD FEILDS</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/13.png" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->
				<div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/Complog/10.jpg" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">TWITTER</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/10.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->
                
               
                                        
                
    
			<div class="portfolio-item books">
                <div class="he-wrap tpl6">
					<img src="assets/welcomePageEmployer/img/portfolio/Complog/7.jpg" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">EMPRESS</h3>
                                <a data-rel="prettyPhoto" href="assets/welcomePageEmployer/img/Complog/7.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
				</div><!-- end col-12 -->
                    
            </div><!-- portfolio -->
        </div><!-- portfolio container -->
	 </div><!--/Portfoliowrap -->
 
<!-- *****************************************************************************************************************
 MIDDLE CONTENT
 ***************************************************************************************************************** -->

<div class="container mtb">
	 	<div class="row" style="text-align: justify;">
	 		<div class="col-lg-4 col-lg-offset-1">
		 		<h4>Get to know us!</h4>
		 		<p>
Jobs4mobs, India's leading online career and recruitment resource with its cutting edge technology provides relevant profiles to employers and relevant jobs to jobseekers across industry verticals, experience levels and geographies. More than 200 million people have registered on the Monster Worldwide network. </p> 
 				<p><br/><a href="about" class="btn btn-theme">More Info</a></p>
	 		</div>
	 		
	 		<div class="col-lg-3"></div>
	 		
	 		
	 		<div class="col-lg-3">
 			<h4>FAQS</h4>
 			<div class="hline"></div>
 			<p><a href="singleproject">How do I register?</a></p>
 			<p><a href="singleproject1">Should I pay?</a></p>
 			<p><a href="singleproject2">What if I fail the test?</a></p>
 			<p><a href="singleproject2">Are there practice tests?</a></p>
 			<p><a href="singleproject3">How long does it take to get a response from a company? </a></p>
 		</div>
	 		
	 	</div><! --/row -->
	 </div><! --/container -->
 
<!-- *****************************************************************************************************************
 TESTIMONIALS
 ***************************************************************************************************************** -->
 <div id="twrap">
	 	<div class="container centered">
	 		<div class="row">
	 			<div class="col-lg-8 col-lg-offset-2">
	 			
	 			<p><strong>"</strong>Arrange your commitments in such a way that you get to spend more time embracing your passions even when you are busy.<strong>"</strong></p>
	 			<h4><br/>Steve Jobs</h4>
	 			<p>CEO , APPLE Inc.</p>
	 			</div>
	 		</div>
	 	</div>
	 	</div>
 
 
<!-- *****************************************************************************************************************
 OUR CLIENTS
 ***************************************************************************************************************** -->
 <!--<div id="cwrap">
 	<div class="container">
 		<div class="row centered">
 			<h3>OUR CLIENTS</h3>
 			<div class="col-lg-3 col-md-3 col-sm-3">
 				<img src="{{ asset('assets/welcomePage/img/clients/client01.png') }}" class="img-responsive">
 			</div>
 			<div class="col-lg-3 col-md-3 col-sm-3">
 				<img src="{{ asset('assets/welcomePage/img/clients/client02.png') }}" class="img-responsive">
 			</div>
 			<div class="col-lg-3 col-md-3 col-sm-3">
 				<img src="{{ asset('assets/welcomePage/img/clients/client03.png') }}" class="img-responsive">
 			</div>
 			<div class="col-lg-3 col-md-3 col-sm-3">
 				<img src="{{ asset('assets/welcomePage/img/clients/client04.png') }}" class="img-responsive">
 			</div>
 		</div><! --/row -->
 	<!--</div><! --/container -->
 <!--</div><! --/cwrap -->
 
 @endsection