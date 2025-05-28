<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | @yield('title', 'Beranda')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}" sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}">
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}">
    <!-- prism css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/prism.css') }}">
    <!-- file upload css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/file-upload.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/lib/audioplayer.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    @yield('head')

</head>

<body>

    <!-- ..::  header area start ::.. -->
    <aside class="sidebar">
        <button type="button" class="sidebar-close-btn">
            <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
        </button>
        <div>
            <a href="{{ url('/admin/dashboard') }}" class="sidebar-logo">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="site logo" class="light-logo">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
                <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
            </a>
        </div>
        <div class="sidebar-menu-area">
            <ul class="sidebar-menu" id="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.destinasi.index') }}"
                        class="{{ Request::is('admin/destinasi') || Request::is('admin/destinasi/*') ? 'active' : '' }}">
                        <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                        <span>Destinasi Wisata</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.memoar.index') }}"
                        class="{{ Request::is('admin/memoar*') ? 'active' : '' }}">
                        <iconify-icon icon="ri-news-line" class="menu-icon"></iconify-icon>
                        <span>Memoar Wisata</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galeri.index') }}"
                        class="{{ Request::is('admin/galeri*') ? 'active' : '' }}">
                        <iconify-icon icon="solar:gallery-wide-linear" class="menu-icon"></iconify-icon>
                        <span>Galeri Wisata</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.review.index') }}"
                        class="{{ Request::is('admin/review*') ? 'active' : '' }}">
                        <iconify-icon icon="mdi:star-outline" class="menu-icon"></iconify-icon>
                        <span>Review Wisata</span>
                    </a>
                </li>
               <li>
                    <a href="{{ route('admin.akomodasi.index') }}"
                        class="{{ Request::is('admin/akomodasi*') ? 'active' : '' }}">
                        <iconify-icon icon="mdi:bed-outline" class="menu-icon"></iconify-icon>
                        <span>Akomodasi Wisata</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penyedia-tur.index') }}"
                        class="{{ Request::is('admin/penyedia-tur*') ? 'active' : '' }}">
                        <iconify-icon icon="mdi:diving-snorkel" class="menu-icon"></iconify-icon>
                        <span>Operator Tour & Selam</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}"
                        class="{{ Request::is('admin/user*') ? 'active' : '' }}">
                        <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                        <span>Akun User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.edit') }}"
                        class="{{ Request::is('admin/setting*') ? 'active' : '' }}">
                        <iconify-icon icon="ri-user-settings-line" class="menu-icon"></iconify-icon>
                        <span>Setting</span>
                    </a>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" data-form-id="logoutForm"
                            class="flex items-center px-10 py-12 text-sm font-medium text-slate-600 hover-text-danger btn-logout">
                            <iconify-icon icon="lucide:power" class="menu-icon text-xl"></iconify-icon>
                            <span>Log out</span>
                        </a>
                    </form>
                </li>

            </ul>
        </div>

    </aside>

    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
        <div class="navbar-header">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <button type="button" class="sidebar-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid"
                                class="icon text-2xl non-active"></iconify-icon>
                            <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                        </button>
                        <button type="button" class="sidebar-mobile-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                        </button>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>

                        <div class="dropdown">
                            <button class="d-flex justify-content-center align-items-center rounded-circle"
                                type="button" data-bs-toggle="dropdown">
                                <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/images/client/16.jpg') }}"
                                    alt="Foto Profil" class="w-40-px h-40-px object-fit-cover rounded-circle">
                            </button>

                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <div
                                    class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-2">
                                            {{ Auth::user()->name }}</h6>
                                        <span
                                            class="text-secondary-light fw-medium text-sm">{{ ucfirst(Auth::user()->role) }}</span>
                                    </div>
                                    <button type="button" class="hover-text-danger" data-bs-dismiss="dropdown">
                                        <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                    </button>
                                </div>

                                <ul class="to-top-list">
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="{{ route('admin.setting.edit') }}">
                                            <iconify-icon icon="solar:user-linear"
                                                class="icon text-xl"></iconify-icon> My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="{{ route('admin.setting.edit') }}">
                                            <iconify-icon icon="icon-park-outline:setting-two"
                                                class="icon text-xl"></iconify-icon> Setting
                                        </a>
                                    </li>
                                    <li>
                                        <form id="logoutForm" method="POST" action="{{ route('logout') }}"
                                            class="w-100">
                                            @csrf
                                            <button type="button"
                                                class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3 w-100 text-start btn-logout"
                                                data-form-id="logoutForm">
                                                <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>
                                                Log Out
                                            </button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- ..::  navbar end ::.. -->
        <div class="dashboard-main-body">

            <!-- ..::  breadcrumb  start ::.. -->
            {{-- <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0"><?php echo $title; ?></h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium"><?php echo $subTitle; ?></li>
                </ul>
            </div> --}}
            <!-- ..::  header area end ::.. -->

            @yield('content')

            @include('layouts.alert')


        </div>
        <!-- ..::  footer  start ::.. -->
        <footer class="d-footer">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <p class="mb-0">© 2025 Wakatobi.</p>
                </div>
                <div class="col-auto">
                    <p class="mb-0">by <span class="text-primary-600">Sarwan Hamid</span></p>
                </div>
            </div>
        </footer>
        <!-- ..::  footer area end ::.. -->

    </main>

    <!-- jQuery library js -->
    <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
    <!-- Data Table js -->
    <script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Popup js -->
    <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
    <!-- prism js -->
    <script src="{{ asset('assets/js/lib/prism.js') }}"></script>
    <!-- file upload js -->
    <script src="{{ asset('assets/js/lib/file-upload.js') }}"></script>
    <!-- audioplayer -->
    <script src="{{ asset('assets/js/lib/audioplayer.js') }}"></script>


    <!-- main js -->
    <script src="{{ asset('assets/js/appadmin.js') }}"></script>




    @yield('scripts')

</body>

</html>
