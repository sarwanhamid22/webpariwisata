<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Dashboard User | @yield('title', 'Beranda')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Tour & Travels Agency Tailwind CSS Template" name="description">
    <meta
        content="Tour, Travels, agency, business, corporate, tour packages, journey, trip, tailwind css, Admin, Landing"
        name="keywords">
    <meta name="author" content="Shreethemes">
    <meta name="website" content="https://shreethemes.in">
    <meta name="email" content="support@shreethemes.in">
    <meta name="version" content="1.5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Css -->
    <!-- Main Css -->
    <link href="{{ asset('assets/css/tailwind.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Css -->
    <link href="{{ asset('assets/libs/swiper/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/js-datepicker/datepicker.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">

    @yield('head')
</head>

<body class="dark:bg-slate-900">

    @include('layouts.alert')

    <!-- Loader Start -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader End -->
    @php
        $authUser = Auth::user();
    @endphp


    <!-- Start Navbar -->
    <nav id="topnav" class="defaultscroll is-sticky">
        <div class="container relative">
            <!-- Logo container-->
            <a class="logo" href="{{ url('/') }}">
                <div>
                    <img src="{{ asset('assets/images/logo-dark.png') }}" class="h-7 inline-block dark:hidden"
                        alt="">
                    <img src="{{ asset('assets/images/logo-light.png') }}" class="h-7 hidden dark:inline-block"
                        alt="">
                </div>
            </a>
            <!-- End Logo container-->

            <!-- Start Mobile Toggle -->
            <div class="menu-extras">
                <div class="menu-item">
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Mobile Toggle -->

            <!--Login button Start-->
            <ul class="buy-button list-none mb-0">
                <li class="dropdown inline-block relative ps-0.5">
                    <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                        <span
                            class="inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-red-500 bg-red-500 text-white">
                            <!-- Foto Profil -->
                            <img src="{{ $authUser->image ? asset('storage/' . $authUser->image) : asset('assets/images/client/16.jpg') }}"
                                alt="User Profile" class="rounded-full object-cover" style="width: 40px; height: 40px;">

                        </span>
                    </button>

                    <!-- Dropdown menu -->
                    <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-48 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-800 hidden"
                        onclick="event.stopPropagation();">
                        <ul class="py-2 text-start">
                            <li>
                                <a href="{{ route('user.profile.edit') }}"
                                    class="flex items-center font-medium py-2 px-4 text-slate-700 dark:text-white/70 hover:text-red-500 dark:hover:text-red-400 transition">
                                    <i data-feather="user" class="size-4 me-2"></i>Akun Saya
                                </a>
                            </li>
                            <li>
                                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="button"
                                        class="w-full text-left flex items-center font-medium py-2 px-4 text-slate-700 dark:text-white/70 hover:text-red-500 dark:hover:text-red-400 transition btn-logout"
                                        data-form-id="logoutForm">
                                        <i data-feather="log-out" class="size-4 me-2"></i>Logout
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>

                </li><!--end dropdown-->
            </ul>
            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu nav-right !justify-end">
                    <li><a href="{{ url('/') }}" class="sub-menu-item">Beranda</a></li>
                    <li><a href="{{ url('/destinasi') }}" class="sub-menu-item">Destinasi</a></li>
                    <li><a href="{{ url('/blog') }}" class="sub-menu-item">Memoar Wisata</a></li>
                    <li><a href="{{ url('/galeri') }}" class="sub-menu-item">Galeri</a></li>
                    <li class="has-submenu parent-menu-item">
                        <a href="javascript:void(0)">Panduan Wisata</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="{{ url('/akomodasi') }}" class="sub-menu-item">Akomodasi Wisata</a></li>
                            <li><a href="{{ url('/penyedia-tur') }}" class="sub-menu-item">Operator Tur & Selam</a>
                            </li>
                            <li><a href="{{ url('/transportasi') }}" class="sub-menu-item">Transportasi</a></li>
                            <li><a href="{{ url('/tentang-wakatobi') }}" class="sub-menu-item">Tentang Wakatobi</a>
                            <li><a href="{{ url('/kontak-kami') }}" class="sub-menu-item">Kontak</a></li>

                            </li>
                        </ul>
                    </li>
                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </nav><!--end header-->
    <!-- End Navbar -->

    <!-- Start Hero -->
    <section class="relative lg:pb-24 pb-16 md:mt-[84px] mt-[70px]">
        <div class="container md:!px-3 !px-0 relative">
            <div
                class="relative overflow-hidden md:rounded-md shadow-sm dark:shadow-gray-800 h-52 bg-[url('../../assets/images/bg/cta.jpg')] bg-center bg-no-repeat bg-cover">
            </div>
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="md:flex">
                <div class="lg:w-1/4 md:w-1/3 md:px-3">
                    <div class="relative md:-mt-48 -mt-32">
                        <div class="p-6 rounded-md shadow-sm dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <div class="profile-pic text-center mb-5">
                                <input id="pro-img" name="profile-image" type="file" class="hidden"
                                    onchange="loadFile(event)" />
                                <div>
                                    <div
                                        class="w-28 h-28 mx-auto rounded-full overflow-hidden ring-4 ring-slate-50 dark:ring-slate-800">
                                        <img src="{{ $authUser->image ? asset('storage/' . $authUser->image) : asset('assets/images/client/16.jpg') }}"
                                            alt="Foto Profil" class="w-full h-full object-cover">
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="text-lg font-semibold text-slate-900 dark:text-white">
                                            {{ auth()->user()->name }}
                                        </h5>
                                        <p class="text-slate-400 dark:text-slate-500">
                                            {{ auth()->user()->email }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="border-t border-gray-100 dark:border-gray-700">
                                <ul class="list-none sidebar-nav mb-0 pb-0" id="navmenu-nav">

                                    <!-- Profil -->
                                    <li
                                        class="navbar-item account-menu {{ request()->routeIs('user.profile.edit') ? 'active' : '' }}">
                                        <a href="{{ route('user.profile.edit') }}"
                                            class="navbar-link flex items-center py-2 rounded text-slate-400 hover:text-red-500 {{ request()->routeIs('user.profile.edit') ? 'text-red-500' : '' }}">
                                            <span class="me-2 mb-0"><i data-feather="airplay"
                                                    class="size-4"></i></span>
                                            <h6 class="mb-0 font-medium">Profil</h6>
                                        </a>
                                    </li>

                                    <!-- Memoar Wisata -->
                                    <li
                                        class="navbar-item account-menu {{ request()->routeIs('user.blog.index') || request()->routeIs('user.blog.create') || request()->routeIs('user.blog.edit') || request()->routeIs('user.blog.show') ? 'active' : '' }}">
                                        <a href="{{ route('user.blog.index') }}"
                                            class="navbar-link flex items-center py-2 rounded text-slate-400 hover:text-red-500 {{ request()->routeIs('user.blog.index') || request()->routeIs('user.blog.create') || request()->routeIs('user.blog.edit') || request()->routeIs('user.blog.show') ? 'text-red-500' : '' }}">
                                            <span class="me-2 mb-0"><i data-feather="edit" class="size-4"></i></span>
                                            <h6 class="mb-0 font-medium">Memoar Wisata</h6>
                                        </a>
                                    </li>

                                    <!-- Galeriku -->
                                    <li
                                        class="navbar-item account-menu {{ request()->routeIs('user.galeri.index') || request()->routeIs('user.galeri.create') || request()->routeIs('user.galeri.edit') || request()->routeIs('user.galeri.show') ? 'active' : '' }}">
                                        <a href="{{ route('user.galeri.index') }}"
                                            class="navbar-link flex items-center py-2 rounded text-slate-400 hover:text-red-500 {{ request()->routeIs('user.galeri.index') || request()->routeIs('user.galeri.create') || request()->routeIs('user.galeri.edit') || request()->routeIs('user.galeri.show') ? 'text-red-500' : '' }}">
                                            <span class="me-2 mb-0"><i data-feather="credit-card"
                                                    class="size-4"></i></span>
                                            <h6 class="mb-0 font-medium">Galeriku</h6>
                                        </a>
                                    </li>

                                    <!-- Reviewku -->
                                    <li
                                        class="navbar-item account-menu {{ request()->routeIs('user.review.index') || request()->routeIs('user.review.edit') ? 'active' : '' }}">
                                        <a href="{{ route('user.review.index') }}"
                                            class="navbar-link flex items-center py-2 rounded text-slate-400 hover:text-red-500 {{ request()->routeIs('user.review.index') || request()->routeIs('user.review.edit') ? 'text-red-500' : '' }}">
                                            <span class="me-2 mb-0"><i data-feather="file-text"
                                                    class="size-4"></i></span>
                                            <h6 class="mb-0 font-medium">Riwayat Review</h6>
                                        </a>
                                    </li>

                                    <!-- Social Profile -->
                                    <li
                                        class="navbar-item account-menu {{ request()->routeIs('user.social.edit') ? 'active' : '' }}">
                                        <a href="{{ route('user.social.edit') }}"
                                            class="navbar-link flex items-center py-2 rounded text-slate-400 hover:text-red-500 {{ request()->routeIs('user.social.edit') ? 'text-red-500' : '' }}">
                                            <span class="me-2 mb-0"><i data-feather="share-2"
                                                    class="size-4"></i></span>
                                            <h6 class="mb-0 font-medium">Social Profile</h6>
                                        </a>
                                    </li>

                                    <!-- Logout -->
                                    <li class="navbar-item account-menu">
                                        <form id="logoutForm" method="POST" action="{{ route('logout') }}"
                                            class="w-full">
                                            @csrf
                                            <button type="button"
                                                class="w-full text-left navbar-link flex items-center py-2 rounded text-slate-400 hover:text-red-500 btn-logout"
                                                data-form-id="logoutForm">
                                                <span class="me-2 mb-0"><i data-feather="log-out"
                                                        class="size-4"></i></span>
                                                <h6 class="mb-0 font-medium">Logout</h6>
                                            </button>
                                        </form>
                                    </li>


                                </ul>
                            </div>




                        </div>
                    </div>
                </div>

                <main class="md:w-3/4 w-full">
                    @yield('content')
                </main>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->


        <!-- Footer Start -->
        <footer class="footer bg-slate-900 relative text-gray-200">

            <div class="py-[30px] px-0 border-t border-gray-800">
                <div class="container relative text-center">
                    <div class="grid grid-cols-1">
                        <div class="text-center">
                            <p class="mb-0">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Wakatobi. Desain <i
                                    class="mdi mdi-heart text-red-600"></i> by <a
                                    href="https://www.linkedin.com/in/sarwan-hamid/" target="_blank"
                                    class="text-reset">Sarwan Hamid</a>.
                            </p>
                        </div>
                    </div><!--end grid-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->




    <!-- JAVASCRIPTS -->


    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/libs/swiper/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tobii/js/tobii.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tiny-slider/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/libs/js-datepicker/datepicker.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>


    @yield('scripts')
    <!-- JAVASCRIPTS -->

</body>

</html>
