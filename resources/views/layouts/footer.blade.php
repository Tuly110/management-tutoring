 
 
   <aside id="sidebar" class="sidebar">
    @if (Auth::user()->usertype==1)
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='dashboard') active @endif" href="{{ url('admin/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
        
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='admin') active @endif" href="{{ url('admin/admin/list') }}">
          <i class="fas fa-user"></i>
          <span>Admin</span>
        </a>
      </li><!-- End Admin Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='student') active @endif" href="{{ url('admin/student/list') }}">
          <i class="fa-solid fa-graduation-cap"></i>
          <span>Student</span>
        </a>
      </li><!-- End Admin Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='parent') active @endif" href="{{ url('admin/parent/list') }}">
          <i class="fa-solid fa-graduation-cap"></i>
          <span>Parent</span>
        </a>
      </li><!-- End Admin Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='class') active @endif" href="{{ url('admin/class/list') }}">
          <i class="fa-solid fa-school"></i>
          <span>Class</span>
        </a>
      </li><!-- End Admin Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='subject') active @endif" href="{{ url('admin/subject/list') }}">
          <i class="fa-solid fa-book"></i>
          <span>Subject</span>
        </a>
      </li><!-- End Admin Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='assign_subject') active @endif" href="{{ url('admin/assign_subject/list') }}">
          <i class="fa-solid fa-book"></i>
          <span>Assign Subject</span>
        </a>
      </li><!-- End Admin Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='change_password') active @endif" href="{{ url('admin/change_password') }}">
          <i class="fa-solid fa-recycle"></i>
          <span>Change password</span>
        </a>
      </li><!-- End Admin Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->


    </ul>
    @elseif (Auth::user()->usertype==2)
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='dashboard') active @endif" href="{{ url('teacher/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='change_password') active @endif" href="{{ url('teacher/change_password') }}">
          <i class="fa-solid fa-book"></i>
          <span>Change password</span>
        </a>
      </li><!-- End Admin Page Nav -->
        
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->


    </ul>
    @elseif (Auth::user()->usertype==3)
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='dashboard') active @endif" href="{{ url('student/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='change_password') active @endif" href="{{ url('student/change_password') }}">
          <i class="fa-solid fa-book"></i>
          <span>Change password</span>
        </a>
      </li><!-- End Admin Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->


    </ul>
    @elseif (Auth::user()->usertype==4)
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='dashboard') active @endif" href="{{ url('parent/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed @if (Request::segment(2)=='change_password') active @endif" href="{{ url('parent/change_password') }}">
          <i class="fa-solid fa-book"></i>
          <span>Change password</span>
        </a>
      </li><!-- End Admin Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->


    </ul>
    @endif
    

  </aside><!-- End Sidebar--><!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->
