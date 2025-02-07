<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EVENT & JOB PORTAL | ADMIN</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('admin/assets/images/logos/favicon.png')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/styles.min.css')}}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <!-- Sertakan pustaka DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
    <style>
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .loading-text {
            font-size: 18px;
            color: #333;
        }

        .chart {
            width: 519px !important;
            height: 519px !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="flash-data" data-flashdata="{{session('flash')}}"></div>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="#" class="text-nowrap logo-img" style="text-align: center;">
                        <h6>EVENT & JOB PORTAL | ADMIN</h6>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>

                </div>
                <br>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <img src="{{asset('admin/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12" style="text-align: center;">
                            {{auth()->user()->username}}
                        </div>
                    </div>
                    <hr>
                    <ul id="sidebarnav">
                        <li class="sidebar-item ">
                            <a class="sidebar-link {{ request()->is('administrator')  ? 'active' : '' }}" href="{{Route('indexAdmin')}}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">manajemen event</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('administrator/workshop*')  ? 'active' : '' }}" href="{{Route('indexWorkshop')}}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">Workshop</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">manajemen job</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('administrator/internship*')  ? 'active' : '' }}" href="{{ Route ('indexInternship') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-door"></i>
                                </span>
                                <span class="hide-menu">Internship</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('administrator/job*')  ? 'active' : '' }}" href="{{ Route ('indexJob') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-door"></i>
                                </span>
                                <span class="hide-menu">Pekerjaan</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="sidebarnav">
                        <li class="sidebar-item ">
                            <a class="sidebar-link" href="{{Route('logout')}}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-logout"></i>
                                </span>
                                <span class="hide-menu">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <h4>
                    @yield('title')
                </h4>
                <hr>
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
</body>
<script>
    // untuk get data error atau success
    const flashdata = $('.flash-data').data('flashdata');

    if (flashdata == 'successAdd') {
        Swal.fire({
            title: 'Berhasil',
            text: 'Data berhasil ditambahkan',
            icon: 'success'
        });
    }

    if (flashdata == 'errorAdd') {
        Swal.fire({
            title: 'Gagal',
            text: 'Data gagal ditambahkan',
            icon: 'error'
        });
    }

    if (flashdata == 'successUpdate') {
        Swal.fire({
            title: 'Berhasil',
            text: 'Data berhasil diubah',
            icon: 'success'
        });
    }

    if (flashdata == 'errorUpdate') {
        Swal.fire({
            title: 'Gagal',
            text: 'Data gagal diubah',
            icon: 'error'
        });
    }

    if (flashdata == 'successDelete') {
        Swal.fire({
            title: 'Berhasil',
            text: 'Data berhasil dihapus',
            icon: 'success'
        });
    }

    if (flashdata == 'errorDelete') {
        Swal.fire({
            title: 'Gagal',
            text: 'Data gagal dihapus',
            icon: 'error'
        });
    }

    if (flashdata == 'errorAddExistingStudent') {
        Swal.fire({
            title: 'Gagal',
            text: 'NIK atau NISN siswa telah terdaftar sebelumnya',
            icon: 'error'
        });
    }

    if (flashdata == 'errorAddExistingParent') {
        Swal.fire({
            title: 'Gagal',
            text: 'Data orang tua telah terdaftar, silahkan pilih data orang tua pada menu.',
            icon: 'error'
        });
    }

    if (flashdata == 'errorAddExistingOriginSchool') {
        Swal.fire({
            title: 'Gagal',
            text: 'Data sekolah telah terdaftar, silahkan pilih data sekolah pada menu.',
            icon: 'error'
        });
    }

    if (flashdata == 'passwordNotMatch') {
        Swal.fire({
            title: 'Gagal',
            text: 'Password tidak valid.',
            icon: 'error'
        });
    }

    if (flashdata == 'passwordMin8Char') {
        Swal.fire({
            title: 'Gagal',
            text: 'Password minimal 8 karakter.',
            icon: 'error'
        });
    }

    if (flashdata == 'passwordHaveSpace') {
        Swal.fire({
            title: 'Gagal',
            text: 'Password dilarang menggunakan spasi.',
            icon: 'error'
        });
    }

    if (flashdata == 'userAlreadyRegister') {
        Swal.fire({
            title: 'Gagal',
            text: 'Username sudah terdaftar, gunakan username lain.',
            icon: 'error'
        });
    }

    if (flashdata == 'errorAddRequired') {
        Swal.fire({
            title: 'Gagal',
            text: 'Semua formulir harus diisi',
            icon: 'error'
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('buttonUpdateProfile').addEventListener('click', function() {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah anda yakin akan menyimpan data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formUdpateUser').submit();
                }
            });
        });
    });
</script>

@yield('script')

</html>