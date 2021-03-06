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
      @if(EGuard::user()->type != 'Administrator' && EGuard::user()->type != 'Superadmin')
      <li class="{!! classActivePath('student_details') !!}"><a href="{{ route('details') }}"><span>Στοιχεία φοιτητή</span></a></li>
      <li class="treeview {!! classActiveSegment(1,['erasmus']) !!}">
        <a href="#"><span>Αιτήσεις</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="{!! classActiveSegment(2,['application2','closed','success']) !!}"><a href="{{ route('erasmus.application2') }}">Νέα αίτηση</a></li>
		   <li class="{!! classActiveSegment(2,['view_applications','view_application']) !!}"><a href="{{ route('erasmus.viewapplication') }}">Προβολή αιτήσεων</a></li>
        </ul>
      </li>
      @endif
      @if(EGuard::user()->type == 'Administrator')
      <li class="treeview {!! classActiveSegment(1,['applications']) !!}">
        <a href="#"><span>Αιτήσεις</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="{!! classActiveSegment(2,['unconfirmed']) !!}"><a href="{{ route('admin.applications.unconfirmed') }}">Προς επιβεβαίωση</a></li>
          <li class="{!! classActiveSegment(2,['confirmed']) !!}"><a href="{{ route('admin.applications.confirmed') }}">Εγκεκριμένες</a></li>
        </ul>
      </li>


      <li class="{!! classActiveSegment(1,['ranking']) !!}"><a href="{{ route('admin.ranking.index') }}"><span>Αποτελέσματα Κατάταξης</span></a></li>
      @endif
      @if(EGuard::user()->type == 'Superadmin')
      <li class="treeview {!! classActiveSegment(1,['users','universities','ranking']) !!}">
        <a href="#"><span>Ρυθμίσεις πλατφόρμας</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="{!! classActiveSegment(2,['settings']) !!}"><a href="{{ route('superadmin.settings.ranking') }}">Ρυθμίσεις κατάταξης</a></li>
          <li class="{!! classActiveSegment(1,['universities']) !!}"><a href="{{ route('admin.university.index') }}"><span>Πανεπιστήμια Erasmus</span></a></li>
          <li class="{!! classActiveSegment(2,['index']) !!}"><a href="{{ route('superadmin.settings.users_index') }}">Λογαριασμοί χρηστών</a></li>
        </ul>
      </li>
      <li class="{!! classActivePath('statistics') !!}"><a href="{{ route('superadmin.statistics') }}"><span>Στατιστικά χρήσης</span></a></li>
      @endif


    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
