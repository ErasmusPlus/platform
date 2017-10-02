<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset( 'img/avatar_default.jpg' ) }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ EGuard::user()->fullname }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> {{ EGuard::user()->type }} {{EGuard::user()->education  }}</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Αναζήτηση..."/>
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
      <li class="{!! classActivePath('home') !!}"><a href="{{ route('home') }}"><span>Αρχική</span></a></li>
      @if(EGuard::user()->type != 'Administrator')
      <li class="{!! classActivePath('student_details') !!}"><a href="{{ route('details') }}"><span>Στοιχεία φοιτητή</span></a></li>
      <li class="treeview {!! classActiveSegment(1,['erasmus']) !!}">
        <a href="#"><span>Αιτήσεις</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="{!! classActiveSegment(2,['application']) !!}"><a href="{{ route('erasmus.application') }}">Νέα αίτηση</a></li>
          <li class="{!! classActiveSegment(2,['application2']) !!}"><a href="{{ route('erasmus.application2') }}">Νέα αίτηση v2</a></li>
		   <li class="{!! classActiveSegment(2,['view_applications']) !!}"><a href="{{ route('erasmus.viewapplication') }}">Προβολή αιτήσεων</a></li>
        </ul>
      </li>
      @endif
      @if(EGuard::user()->type == 'Administrator')
      <li class="{!! classActiveSegment(1,['universities']) !!}"><a href="{{ route('admin.university.index') }}"><span>Πανεπιστήμια Erasmus</span></a></li>
      <li class="{!! classActiveSegment(1,['ranking']) !!}"><a href="{{ route('admin.ranking.index') }}"><span>Κατάταξη Erasmus</span></a></li>
      <li class="{!! classActivePath('settings') !!}"><a href="{{ route('settings') }}"><span>Ρυθμίσεις</span></a></li>
      @endif
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
