<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">SIM Inventaris Buku</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">Buku</a>
      </div>
      <ul class="sidebar-menu">

          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link ">
              <i class="fas fa-fire"></i>
              <span>Dashboard</span>
            </a>
          </li>

            <li class="menu-header">Data Master</li>
            @if (auth()->user()->akses=="admin")
            <li class="nav-item dropdown {{ Request::is('user', 'create_user') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('user') }}" class="nav-link">
                <i class="fas fa-user-plus"></i> 
                <span>Input User</span>
              </a>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/buku', 'create_user') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('buku.index') }}" class="nav-link">
                <i class="fas fa-book "></i> 
                <span>Input Buku</span>
              </a>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/Pasok', 'admin/input/pasok') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('buku.index') }}" class="nav-link">
                <i class="fas fa-plus"></i> 
                <span>Input Pasok</span>
              </a>
            </li>
            @endif
        </ul>
    </aside>
  </div>
