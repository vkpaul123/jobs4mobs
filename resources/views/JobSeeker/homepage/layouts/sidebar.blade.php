<aside class="main-sidebar" style="background-color: #384452;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
          @isset(Auth::user()->photo)
            <img src="{{Auth::user()->photo}}" height="160px" width="160px" class="img-circle" alt="User Image">
          @else
            <img src="{{ asset('assets/staticImages/user.png') }}" height="160px" width="160px" class="img-circle" alt="User Image">
          @endisset
      </div>
      <div class="pull-left info">
        <p><a href="/home" style="color: white;">{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</a></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"><strong>MAIN NAVIGATION</strong></li>
      <li class="active"><a href="/home"><i class="fa fa-home text-default"></i> <span>Home</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Profiles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/home/profile/create"><i class="fa fa-user-plus"></i> Create Profile</a></li>
          <li><a href="/home/profile"><i class="fa fa-user-times"></i> Edit Profile</a></li>
          <li><a href="/home/profile"><i class="fa fa-user"></i> View Profile</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-picture-o"></i>
          <span>Resume Builder</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/home/resumeBuilder"><i class="fa fa-file-o"></i> Create Resume</a></li>
          <li><a href="/home/resumeBuilder/uploadResume"><i class="fa fa-upload"></i> Upload Resume</a></li>
          <li><a href="/home/resumeBuilder/viewResume"><i class="fa fa-file-text"></i> View Resume</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-search"></i>
          <span>Search</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/home/searchVacancy"><i class="fa fa-briefcase"></i> Search Vacancy</a></li>
          <li><a href="/home/searchEmployer"><i class="fa fa-black-tie"></i> Search Employer</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-clipboard"></i>
          <span>Tests</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/home/searchVacancy"><i class="fa fa-briefcase"></i> Search Vacancy</a></li>
          <li><a href="/home/searchEmployer"><i class="fa fa-black-tie"></i> Search Employer</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-line-chart"></i>
          <span>Reports</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-blue">2</small>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/home/searchVacancy"><i class="fa fa-briefcase"></i> Search Vacancy</a></li>
          <li><a href="/home/searchEmployer"><i class="fa fa-black-tie"></i> Search Employer</a></li>
        </ul>
      </li>
      <li><a href="/home/contactAdmin"><i class="fa fa-life-buoy text-default"></i> <span>Contact Admin</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>