<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? "active" : "" }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>गृह पृष्ट</p>
                    </a>
                </li>
            </ul>
            @can('isAdmin')
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('user*') ? "active" : "" }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>प्रयोगकर्ता व्यवस्थापन</p>
                    </a>
                </li>
            </ul>
            @endcan
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('disable.index') }}" class="nav-link {{ Request::is('disable*') ? "active" : "" }}">
                        <i class="nav-icon fas fa-wheelchair"></i>
                        <p>अपाङ्ग व्यक्ती व्यवस्थापन</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('senior.index') }}" class="nav-link {{ Request::is('senior*') ? "active" : "" }}">
                        <i class="nav-icon fas fa-blind"></i>
                        <p>जेष्ठ नागरिक व्यवस्थापन</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('excel') }}" class="nav-link {{ Request::is('import*') ? "active" : "" }}">
                        <i class="nav-icon fas fa-file-excel"></i>
                        <p>एक्सेल डेटा आयात गर्नुहोस्</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('certifier.index') }}" class="nav-link {{ Request::is('certifier*') ? "active" : "" }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>प्रमाणित गर्ने व्यक्ती </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('district') }}" class="nav-link {{ Request::is('districts*') ? "active" : "" }}">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>जिल्ला तालिका पृष्ठ </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('local-level') }}" class="nav-link {{ Request::is('local-level*') ? "active" : "" }}">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>स्थान्य तह तालिका पृष्ठ </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>