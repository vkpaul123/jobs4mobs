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
          <li><a href="{{ route('profile.index', Auth::user()->id) }}"><i class="fa fa-user"></i> View All Profile</a></li>
          <li><a href="/home/profile/create"><i class="fa fa-user-plus"></i> Create Profile</a></li>
        </ul>
      </li>
      <li><a href="/home/resumeBuilder"><i class="fa fa-file-picture-o"></i> <span>Resume Builder</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-search"></i>
          <span>Search</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/home/vacancySearchResults"><i class="fa fa-briefcase"></i> Search Vacancy</a></li>
          <li><a href="/home/employerSearchResults"><i class="fa fa-industry"></i> Search Employer</a></li>
        </ul>
      </li>
      <li><a href="/home/resumeBuilder"><i class="fa fa-black-tie"></i> <span>My Job Applications</span></a></li>
      <li><a href="{{ route('profilePic.upload', Auth::user()->id ) }}"><i class="fa fa-gear"></i> <span>Account Settings</span></a></li>
      <li><a href="/home/contactAdmin"><i class="fa fa-life-buoy text-default"></i> <span>Contact Admin</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>