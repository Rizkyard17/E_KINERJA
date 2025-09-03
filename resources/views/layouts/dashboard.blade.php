<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'E-Kinerja Dashboard')</title>

    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <!-- Chart.js untuk grafik -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @stack('styles')
</head>
<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button class="toggle-btn" id="toggleSidebar">
                <i class="fas fa-bars"></i>
            </button>
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                E-Kinerja
            </div>
        </div>
        
        <div class="header-right">
            <!-- Notifications Dropdown -->
            <div class="dropdown" id="notificationDropdown">
                <button class="dropdown-toggle">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <div class="dropdown-menu">
                    <div class="dropdown-header">Notifikasi</div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user-plus" style="color: #3498db;"></i>
                        <span>Pengguna baru terdaftar</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-shopping-cart" style="color: #2ecc71;"></i>
                        <span>Laporan baru masuk</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-exclamation-triangle" style="color: #f39c12;"></i>
                        <span>Deadline mendekati</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-comment-dots" style="color: #9b59b6;"></i>
                        <span>Komentar baru</span>
                    </a>
                    <div class="dropdown-footer">
                        <a href="#">Tandai semua sudah dibaca</a>
                    </div>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="user-info">
                <div class="user-details">
                    <span class="user-name">{{ auth()->user()->name ?? 'User Name' }}</span>
                    <span class="user-role">{{ ucfirst(auth()->user()->role ?? 'user') }}</span>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div class="dropdown" id="profileDropdown">
                <button class="dropdown-toggle">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>
                </button>
                <div class="dropdown-menu">
                    <a href="{{ route('admin.profile') }}" class="dropdown-item">
                        <i class="fas fa-user-circle"></i>
                        <span>Profil Saya</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope"></i>
                        <span>Pesan</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-question-circle"></i>
                        <span>Bantuan</span>
                    </a>
                    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </a>

                    <!-- Form logout disembunyikan -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="main-layout">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <nav>
                <ul class="nav-menu">
                    @if(auth()->user()->role === 'superadmin')
                        <li class="nav-item">
                            <a href="{{ route('superadmin.dashboard') }}" class="nav-link {{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <span>Dashboard Super</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('superadmin.users') }}" class="nav-link {{ request()->routeIs('superadmin.users*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <span>Manajemen Pengguna</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('superadmin.logs') }}" class="nav-link {{ request()->routeIs('superadmin.logs*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <span>Log Sistem</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('superadmin.settings') }}" class="nav-link {{ request()->routeIs('superadmin.settings*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <span>Pengaturan Global</span>
                            </a>
                        </li>

                    @elseif(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <span>Dashboard Admin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.laporan') }}" class="nav-link {{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <span>Laporan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.team') }}" class="nav-link {{ request()->routeIs('admin.team') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <span>Tim</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.mapping') }}" class="nav-link {{ request()->routeIs('admin.mapping') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                <span>Mapping Lokasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->routeIs('') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <span>Rencana Kerja</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->routeIs('') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-exclamation-triangle"></i>
                                <span>Pelaporan Kendala</span>
                            </a>
                        </li>

                    @elseif(auth()->user()->role === 'user')
                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.profile') }}" class="nav-link {{ request()->routeIs('user.profile*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.reports.index') }}" class="nav-link {{ request()->routeIs('user.reports*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <span>Laporan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.reports.create') }}" class="nav-link {{ request()->routeIs('user.reports.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <span>Tambah Laporan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.tasks') }}" class="nav-link {{ request()->routeIs('user.tasks*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tasks"></i>
                                <span>Tugas Saya</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.issues.create') }}" class="nav-link {{ request()->routeIs('user.issues*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-exclamation-triangle"></i>
                                <span>Laporkan Kendala</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @stack('scripts')
</body>
</html>