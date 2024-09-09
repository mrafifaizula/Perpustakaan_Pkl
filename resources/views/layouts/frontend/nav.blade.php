<style>
    .profile-placeholder {
        width: 50px;
        height: 50px;
        background-color: #fff;
        /* Warna background putih */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 14px;
        color: #000;
        /* Warna font */
    }


    .profile-image {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .navbar-profile-image {
        width: 30px;
        /* Ukuran dapat disesuaikan */
        height: 30px;
        /* Ukuran dapat disesuaikan */
        object-fit: cover;
        border-radius: 50%;
        /* Jika ingin berbentuk bulat */
    }


    .dropdown-menu {
        padding: 10px;
        border-radius: 12px;
        width: 250px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .dropdown-content {
        text-align: center;
        padding: 15px;
    }

    .profile-image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
        background-color: #ffffff;
        /* White background */
        width: 120px;
        height: 120px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-image-container img {
        border-radius: 50%;
        width: 110px;
        height: 110px;
        object-fit: cover;
        background-color: #ffffff;
        /* Ensure white background behind image */
    }

    .greeting {
        margin: 10px 0 5px 0;
        font-weight: bold;
        font-family: 'Comic Sans MS', cursive, sans-serif;
        color: #333;
        font-size: 1.2rem;
    }

    .dropdown-divider {
        margin: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        padding: 10px;
        justify-content: flex-start;
        font-size: 1rem;
        color: #333;
        transition: background-color 0.3s;
    }

    .dropdown-item i {
        margin-right: 10px;
        color: #007bff;
        /* Icon color */
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    .nav-link img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <h1>Perpus&nbsp;Smk&nbsp;Assalaam</h1>
                    </a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#services">Services</a></li>
                        <li class="scroll-to-section"><a href="#about">About</a></li>
                        <li class="scroll-to-section"><a href="#buku">Buku</a></li>
                        <li class="scroll-to-section"><a href="#contact">Contact</a></li>
                        <!-- Dropdown container -->
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                                id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ Auth::check() ? Auth::user()->profile_image_url : asset('images/guest-placeholder.png') }}"
                                    alt="Profile Image" class="rounded-circle profile-placeholder"
                                    style="width: 40px; height: 40px; object-fit: cover; display: block; margin: auto;">
                            </a>

                            <!-- Dropdown menu -->
                            <div class="dropdown-menu dropdown-menu-end shadow-sm rounded"
                                aria-labelledby="profileDropdown" style="min-width: 250px;">
                                <div class="dropdown-content text-center p-4">
                                    <div class="profile-image-container mb-3"
                                        style="display: flex; justify-content: center;">
                                        <img src="{{ Auth::check() ? Auth::user()->profile_image_url : asset('images/guest-placeholder.png') }}"
                                            alt="Profile Image" class="rounded-circle img-fluid profile-placeholder"
                                            style="width: 80px; height: 80px; object-fit: cover;">
                                    </div>
                                    <p class="greeting mb-1 font-weight-bold">
                                        Hello, {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                                    </p>
                                </div>
                                <hr class="dropdown-divider mx-3">
                                <div class="px-3">
                                    @if (Auth::check())
                                        @if (Auth::user()->isAdmin)
                                            <a class="dropdown-item d-flex align-items-center mb-2"
                                                href="{{ url('admin/dashboard') }}">
                                                <i class="fas fa-tachometer-alt me-2"></i> Admin Dashboard
                                            </a>
                                        @endif
                                        <a class="dropdown-item d-flex align-items-center mb-2"
                                            href="{{ url('profil/dashboard') }}">
                                            <i class="fas fa-user me-2"></i> Profile
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        <a class="dropdown-item d-flex align-items-center mb-2"
                                            href="{{ url('login') }}">
                                            <i class="fas fa-sign-in-alt me-2"></i> Login
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="{{ url('register') }}">
                                            <i class="fas fa-user-plus me-2"></i> Register
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </ul>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
