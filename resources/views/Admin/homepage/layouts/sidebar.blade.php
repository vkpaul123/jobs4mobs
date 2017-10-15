<aside class="main-sidebar" style="background-color: #384452;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('assets/userPage/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
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
          <i class="fa fa-dashboard"></i> <span>Admin Home</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Messaging</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Send E-Mail</a></li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Inbox</a></li>
        </ul>
      </li>
      <li>
        <a href="">
          <i class="fa fa-dashboard"></i> <span>Job Categories</span>
        </a>
      </li>
      <li>
        <a href="">
          <i class="fa fa-dashboard"></i> <span>Questionnaire Template</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>View Profiles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Jobseeker Profiles</a></li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Employer Profiles</a></li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Vacancies</a></li>
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
          <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Jobseekers</a></li>
          <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Jobseeker Profiles</a></li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Employer Profiles</a></li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Vacancies</a></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>JobCategory-wise</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Jobseeker Profiles</a></li>
              <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Employer Profiles</a></li>
              <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Vacancies</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Location-wise</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Jobseeker Profiles</a></li>
              <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Employer Profiles</a></li>
              <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Vacancies</a></li>
            </ul>
          </li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Test Reports</a></li>
        </ul>
      </li>
      <li>
        <a href="">
          <i class="fa fa-dashboard"></i> <span>Add Admin</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>