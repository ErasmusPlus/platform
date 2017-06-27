<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="#" class="logo"><b>Erasmus+</b> Platform</a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">


        <!-- User Account Menu -->
        <li class="dropdown">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ EGuard::user()->email }}</span>
          </a>
          <ul class="dropdown-menu">

              <li><a href="{{ route('profile') }}">Προφίλ</a></li>
              <li><a href="#">Ρυθμίσεις</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('logout') }}">Αποσύνδεση</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
