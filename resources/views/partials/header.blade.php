<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky {{ Request::is('/') ? 'tagline-height' : '' }}">
    <div class="container relative">

        <!-- Logo container-->
        <a class="logo" href="{{ url('/') }}">
            <span class="inline-block dark:hidden">
                <img src="{{ asset('assets/images/logo-dark.png') }}" class="h-7 l-dark" alt="">
                <img src="{{ asset('assets/images/logo-light.png') }}" class="h-7 l-light" alt="">
            </span>
            <img src="{{ asset('assets/images/logo-white.png') }}" class="hidden dark:inline-block" alt="">
        </a>
        <!-- End Logo container-->

        <!-- Mobile Toggle -->
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines"><span></span><span></span><span></span></div>
                </a>
            </div>
        </div>
        
        @php
            use Illuminate\Support\Facades\Auth;
            $authUser = Auth::user();
        @endphp

        <!-- Login/Profile button Start-->
        <ul class="buy-button list-none mb-0">

            @if ($authUser && (
                $authUser->provider === 'google' || 
                $authUser->hasVerifiedEmail() || 
                $authUser->isAdmin()
            ))
                <li class="dropdown inline-block relative ps-0.5">
                    <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                        <span
                            class="inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-red-500 bg-red-500 text-white">
                            <!-- Foto Profil -->
                            <img src="{{ $authUser->image ? asset('storage/' . $authUser->image) : asset('assets/images/client/16.jpg') }}"
                                alt="User Profile" class="rounded-full object-cover" style="width: 40px; height: 40px;">

                        </span>
                    </button>

                    <!-- Dropdown Profile -->
                    <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-48 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-800 hidden"
                        onclick="event.stopPropagation();">
                        <ul class="py-2 text-start">
                            <li><a href="{{ route('user.profile.edit') }}"
                                    class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i
                                        data-feather="user" class="size-4 me-2"></i>Akun Saya</a></li>
                            <li>
                                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="button"
                                        class="w-full text-left flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white btn-logout"
                                        data-form-id="logoutForm">
                                        <i data-feather="log-out" class="size-4 me-2"></i>Logout
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>

                </li>
            @else
                <li class="inline-block relative ps-0.5">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 transition">
                        Login
                    </a>
                </li>
            @endif

        </ul>
        <!-- Login/Profile button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-right !justify-end nav-light">
                <li><a href="{{ url('/') }}" class="sub-menu-item">Beranda</a></li>
                <li><a href="{{ url('/destinasi') }}" class="sub-menu-item">Destinasi</a></li>
                <li><a href="{{ url('/blog') }}" class="sub-menu-item">Memoar Wisata</a></li>
                <li><a href="{{ url('/galeri') }}" class="sub-menu-item">Galeri</a></li>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Panduan Wisata</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ url('/akomodasi') }}" class="sub-menu-item">Akomodasi Wisata</a></li>
                        <li><a href="{{ url('/penyedia-tur') }}" class="sub-menu-item">Operator Tur & Selam</a></li>
                        <li><a href="{{ url('/transportasi') }}" class="sub-menu-item">Transportasi</a></li>
                        <li><a href="{{ url('/tentang-wakatobi') }}" class="sub-menu-item">Tentang Wakatobi</a></li>
                        <li><a href="{{ url('/kontak-kami') }}" class="sub-menu-item">Kontak</a></li>
                    </ul>
                </li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->

    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->
