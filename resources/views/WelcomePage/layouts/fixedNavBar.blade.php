<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/" style="padding-top: 10px;"><img src="{{asset('assets/staticImages/Logos/Logo_Nav.png')}}" alt="Logo_Nav.png" width="175">{{-- SOLID. --}}</a>
    </div>
    <div class="navbar-collapse collapse navbar-right">
      <ul class="nav navbar-nav">
        <li @yield('select_HOME')><a href="home"><button type="button" class="btn btn-success btn-xs"><b>
        @if(Auth::guest())
          LOGIN
        @else  
          HOME
        @endif
        </b></button></a></li>
        <li @yield('select_ABOUT')><a href="about">ABOUT</a></li>
        <li @yield('select_CONTACT')><a href="contact">CONTACT</a></li>
        <li><a href="/employer"><button type="button" class="btn btn-warning btn-xs"><b>EMPLOYER'S SECTION</b></button></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>