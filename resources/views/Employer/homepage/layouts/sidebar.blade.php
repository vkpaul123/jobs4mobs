<aside class="main-sidebar" style="background-color: #384452;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        @isset(Auth::user()->photo)
          <img style="background-color: white;" src="{{Auth::user()->photo}}" height="160px" width="160px" class="img-circle" alt="User Image">
        @else
          <img src="{{ asset('assets/staticImages/user.png') }}" height="160px" width="160px" class="img-circle" alt="User Image">
        @endisset
      </div>
      <div class="pull-left info">
        <p><a href="/employer/home" style="color: white;">{{ Auth::user()->firstname." ".Auth::user()->lastname }}</a></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active"><a href="/employer/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Profile</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('employerProfile.show', Auth::user()->id) }}"><i class="fa fa-eye"></i> View Profile</a></li>
          <li><a href="{{ route('employerProfile.edit', Auth::user()->id) }}"><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
          <li><a href="{{ route('employerAddress.show', Auth::user()->id) }}"><i class="fa fa-map-marker"></i> Edit Address</a></li>
        </ul>
      </li>
      <li><a href="/employer/jobseekerSearchResults"><i class="fa fa-search"></i> <span>Search JobSeekers</span></a></li>
      <li class="treeview">
        <a href="">
          <i class="fa fa-briefcase"></i>
          <span>Vacancies</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('vacancy.create') }}"><i class="fa fa-circle-o"></i> Create New Vacancy</a></li>
          <li><a href="{{ route('vacancies.index', Auth::user()->id) }}"><i class="fa fa-circle-o"></i> View All Vacancies</a></li>
        </ul>
      </li>
      <li><a href="{{ route('questionnareBuilder.index') }}"><i class="fa fa-question"></i> <span>Questionnaire Builder</span></a></li>
      <li class="treeview">
        <a href="">
          <i class="fa fa-files-o"></i>
          <span>Reports</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('employer.reports.vacancyDetails') }}"><i class="fa fa-circle-o"></i> My Vacancy Report</a></li>
          <li><a href="{{ route('employer.reports.locationWiseVacancyReport') }}"><i class="fa fa-circle-o"></i> Location-wise Vacancies</a></li>
          <li><a href="{{ route('employer.reports.showJobseekerReport') }}"><i class="fa fa-circle-o"></i> Jobseeker Profile Report</a></li>
          <li><a href="{{ route('employer.reports.categoryWiseJobseekerProfileReport') }}"><i class="fa fa-circle-o"></i> Category-wise Jobseekers</a></li>
          <li><a href="{{ route('employer.reports.locationWiseJobseekerProfileReport') }}"><i class="fa fa-circle-o"></i> Location-wise Jobseekers</a></li>
        </ul>
      </li>
      <li><a href="{{ route('logo.upload', Auth::user()->id ) }}"><i class="fa fa-gear"></i> <span>Account Settings</span></a></li>
      <li><a href="/employer/home/contactAdmin"><i class="fa fa-life-bouy"></i> <span>Contact Admin</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>