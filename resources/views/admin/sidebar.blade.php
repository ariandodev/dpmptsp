<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed admin-home" href="{{ route('admin.home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        
        <li class="nav-item">
            <a class="nav-link collapsed skm-links" data-bs-target="#skm-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-graph-up"></i><span>Survei Kepuasan Masyarakat</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="skm-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.skm') }}" class="admin-skm">
                        <i class="bi bi-circle"></i><span>Hasil SKM</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.skm.kelolaDataLayanan') }}" class="admin-skm-kelola-data-layanan">
                        <i class="bi bi-circle"></i><span>Kelola Data Layanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.skm.kelolaDataPertanyaan') }}" class="admin-skm-kelola-data-pertanyaan">
                        <i class="bi bi-circle"></i><span>Kelola Data Pertanyaan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.skm.simulasi') }}" class="admin-skm-simulasi">
                        <i class="bi bi-circle"></i><span>Simulasi</span>
                    </a>
                </li>
            </ul>
        </li><!-- End SKM Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed users-links" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Data Pengguna dan Hak Akses</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#" class="admin-users">
                        <i class="bi bi-circle"></i><span>Data Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.kelolaHakAkses') }}" class="admin-users-kelola-hak-akses">
                        <i class="bi bi-circle"></i><span>Kelola Hak Akses</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Pengguna Nav -->
    </ul>
</aside>