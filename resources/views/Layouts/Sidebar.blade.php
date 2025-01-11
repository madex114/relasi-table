<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('asset/dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <!-- Pasien -->
                <li class="nav-item">
                    <a href="{{ url('siswa') }}" class="nav-link">
                        <i class="fa-solid fa-table"></i>
                        <p>Daftar siswa</p>
                    </a>
                </li>

                <!-- Dropdown Menu -->
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-bars"></i>
        <p>Menu</p>
    </a>
    <ul class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
        <!-- Pasien -->
        <li>
            <a href="{{ url('guru.index') }}" class="dropdown-item">
                <i class="fa-solid fa-user text-primary"></i> Data guru
            </a>
        </li>
        <li>
            <a href="{{ url('kelas.index') }}" class="dropdown-item">
                <i class="fa-solid fa-calendar text-danger"></i> Data Kelas
            </a>
        </li>
        <li>
            <a href="{{ url('alumni.index') }}" class="dropdown-item">
                <i class="fa-solid fa-user-md text-success"></i> Data Alumni
            </a>
        </li>
    </ul>
</li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->

