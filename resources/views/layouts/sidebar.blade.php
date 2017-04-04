<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset( Auth::User()->photo ) }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ Auth::User()->name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <!-- Optionally, you can add icons to the links-->
      <li class="{!! classActivePath('home') !!}"><a href="{{ route('home') }}"><span>Home</span></a></li>
      <li class="treeview {!! classActiveSegment(1,['profile']) !!}">
        <a href="#"><span>My Profile</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="{!! classActiveSegment(2,['grades']) !!}"><a href="{{ route('profile.grades') }}">Grades</a></li>
          <li class="{!! classActiveSegment(2,['details']) !!}"><a href="{{ route('profile.details') }}">Personal Details</a></li>
          <li class="{!! classActiveSegment(2,['ects']) !!}"><a href="{{ route('profile.ects') }}">ECTS</a></li>
        </ul>
      </li>
      <li class="treeview {!! classActiveSegment(1,['erasmus']) !!}">
        <a href="#"><span>Erasmus+</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="{!! classActiveSegment(2,['application']) !!}"><a href="{{ route('erasmus.application') }}">Apply for Erasmus+</a></li>
		   <li class="{!! classActiveSegment(2,['viewapplication']) !!}"><a href="{{ route('erasmus.viewapplication') }}">View my application</a></li>
        </ul>
      </li>
      <li class="{!! classActivePath('settings') !!}"><a href="{{ route('settings') }}"><span>Settings</span></a></li>
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
