<aside class="main-sidebar" style="background-color: #384452;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('assets/staticImages/user.png')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active">
        <a href="{{ route('admin.home') }}">
          <i class="fa fa-home"></i> <span>Admin Home</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-envelope"></i>
          <span>Messaging</span>
          <span class="pull-right-container">
            @if(isset($newMessagesCount) && $newMessagesCount)
            <span class="label label-danger pull-right">{{ $newMessagesCount }}</span>
            @else
            <i class="fa fa-angle-left pull-right"></i>
            @endif
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.adminEMail') }}"><i class="fa fa-send"></i> Send E-Mail</a></li>
          <li><a href="{{ route('admin.contact.inbox') }}"><i class="fa fa-inbox"></i> Inbox</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('viewJobCategories.index') }}">
          <i class="fa fa-sitemap"></i> <span>Job Categories</span>
        </a>
      </li>
      <li>
        <a href="{{ route('questionnaireTemplateUpload.showUploadForm') }}">
          <i class="fa fa-question"></i> <span>Questionnaire Template</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-search"></i>
          <span>Search &amp View Profiles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.jobseekerSearchResults') }}"><i class="fa fa-user"></i> Jobseeker Profiles</a></li>
          <li><a href="{{ route('admin.employerSearchResults') }}"><i class="fa fa-industry"></i> Employer Profiles</a></li>
          <li><a href="{{ route('admin.vacancySearchResults') }}"><i class="fa fa-briefcase"></i> Vacancies</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Reports</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.reports.showJobseekerReport') }}"><i class="fa fa-user"></i> Jobseeker Profiles</a></li>
          <li><a href="{{ route('admin.reports.employerDetails') }}"><i class="fa fa-industry"></i> Employer Profiles</a></li>
          <li><a href="{{ route('admin.reports.vacancyDetails') }}"><i class="fa fa-briefcase"></i> Vacancies</a></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-sitemap"></i>
              <span>JobCategory-wise</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.reports.categoryWiseJobseekerProfileReport') }}"><i class="fa fa-user"></i> Jobseeker Profiles</a></li>
              <li><a href="{{ route('admin.reports.categoryWiseEmployerReport') }}"><i class="fa fa-industry"></i> Employer Profiles</a></li>
              <li><a href="{{ route('admin.reports.categoryWiseVacancyReport') }}"><i class="fa fa-briefcase"></i> Vacancies</a></li>
              <li><a href="{{ route('admin.reports.categoryWiseQuestionnaireReport') }}"><i class="fa fa-question"></i> Questionnaire</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span>Location-wise</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.reports.locationWiseJobseekerProfileReport') }}"><i class="fa fa-user"></i> Jobseeker Profiles</a></li>
              <li><a href="{{ route('admin.reports.locationWiseEmployerReport') }}"><i class="fa fa-industry"></i> Employer Profiles</a></li>
              <li><a href="{{ route('admin.reports.locationWiseVacancyReport') }}"><i class="fa fa-briefcase"></i> Vacancies</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user-secret"></i>
          <span>Admins</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.editPasswordForm') }}"><i class="fa fa-unlock-alt"></i> Change My Password</a></li>
          <li><a href="{{ route('admin.viewAdmins') }}"><i class="fa fa-users"></i> View All Admins</a></li>
          <li><a href="{{ route('admin.addAdmin') }}"><i class="fa fa-user-plus"></i> Add Admin</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>