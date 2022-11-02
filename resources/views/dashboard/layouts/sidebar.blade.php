<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
              <span data-feather="file-text"></span>
              My Posts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/programs*') ? 'active' : '' }}" href="/dashboard/programs">
              <span data-feather="file-text"></span>
              My Program
            </a>
          </li>

        </ul>

    @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-content-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
              <span data-feather="grid"></span>
              Post Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
              <span data-feather="user"></span>
             User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/beasiswa*') ? 'active' : '' }}" href="/dashboard/beasiswa">
              <span data-feather="users"></span>
             Penerima Beasiswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/campus*') ? 'active' : '' }}" href="/dashboard/campus">
              <span data-feather="briefcase"></span>
             Kampus
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/fakultas*') ? 'active' : '' }}" href="/dashboard/fakultas">
              <span data-feather="briefcase"></span>
             Fakultas
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/prodi*') ? 'active' : '' }}" href="/dashboard/prodi">
              <span data-feather="briefcase"></span>
             Program Studi
            </a>
          </li>

        </ul>
    @endcan
      </div>
    </nav>