
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-mobile-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GADGET STORE</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Pengelolaan Data</div>

    <!-- Kategori -->
    <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('categories.*') ? '' : 'collapsed' }}"
           href="#"
           data-toggle="collapse"
           data-target="#collapseCategories"
           aria-expanded="{{ request()->routeIs('categories.*') ? 'true' : 'false' }}">
            <i class="fas fa-tags"></i>
            <span>Kategori</span>
        </a>

        <div id="collapseCategories"
             class="collapse {{ request()->routeIs('categories.*') ? 'show' : '' }}"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Kategori:</h6>
                <a class="collapse-item" href="{{ route('categories.index') }}">
                    Data Kategori
                </a>
                <a class="collapse-item" href="{{ route('categories.create') }}">
                    Tambah Kategori
                </a>
            </div>
        </div>
    </li>

    <!-- Produk -->
    <li class="nav-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('products.*') ? '' : 'collapsed' }}"
           href="#"
           data-toggle="collapse"
           data-target="#collapseProducts"
           aria-expanded="{{ request()->routeIs('products.*') ? 'true' : 'false' }}">
            <i class="fas fa-mobile-alt"></i>
            <span>Produk</span>
        </a>

        <div id="collapseProducts"
             class="collapse {{ request()->routeIs('products.*') ? 'show' : '' }}"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Produk:</h6>
                <a class="collapse-item" href="{{ route('products.index') }}">
                    Data Produk
                </a>
                <a class="collapse-item" href="{{ route('products.create') }}">
                    Tambah Produk
                </a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Informasi</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-chart-bar"></i>
            <span>Ringkasan Inventaris</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Information -->
    <div class="sidebar-card d-none d-lg-flex">
        <div class="text-center">
            <i class="fas fa-store fa-2x mb-3"></i>
            <p class="mb-0">
                <strong>Gadget Store</strong><br>
                Sistem pengelolaan data produk dan stok barang.
            </p>
        </div>
    </div>

</ul>
<!-- End Sidebar -->
