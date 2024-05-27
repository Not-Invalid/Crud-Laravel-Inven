<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #212529;">

    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text text-light mx-3" style="font-size: 13px">Inventaris Barang</div>
    </a>
  
    <hr class="sidebar-divider my-0">
  
    <div class="text-dark" style="font-size: 24px">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-grip" style="font-size: 24px;"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if(Auth::user()->role === 'Admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('inventaris.index') }}">
                <i class="fas fa-fw fa-table" style="font-size: 24px;"></i>
                <span>Data Inventaris</span>
            </a>
        </li>
        @endif
  
        @if(Auth::user()->role === 'Admin' || Auth::user()->role === 'Operator')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('barang.index') }}">
                <i class="fas fa-fw fa-box" style="font-size: 24px;"></i>
                <span>Data Barang</span>
            </a>
        </li>
        @endif
  
        @if(Auth::user()->role === 'Admin' || Auth::user()->role === 'Operator' || Auth::user()->role === 'Petugas')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pemakaian.index') }}">
                <i class="fas fa-fw fa-box-open" style="font-size: 24px;"></i>
                <span>Pemakaian</span>
            </a>
        </li>
        @endif
  
        @if(Auth::user()->role === 'Admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ruangan.index') }}">
                <i class="fas fa-fw fa-door-open" style="font-size: 24px;"></i>
                <span>Data Ruangan</span>
            </a>
        </li>
  
        <li class="nav-item">
            <a class="nav-link" href="{{ route('jenis_barang.index') }}">
                <i class="fas fa-fw fa-tag" style="font-size: 24px;"></i>
                <span>Jenis Barang</span>
            </a>
        </li>
        @endif
  
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
                <i class="ri-logout-box-fill" style="font-size: 24px;"></i>
                <span>Logout</span>
            </a>
        </li>
    </div>
  
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  
  </ul>
  