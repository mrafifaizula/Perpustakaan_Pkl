<style>
    body {
        font-family: Arial, sans-serif;
    }

    .profile-menu {
        position: relative;
        display: inline-block;
    }

    .profile-button {
        background-color: #fff;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 50%;
        outline: none;
    }

    .profile-button img {
        border-radius: 50%;
        width: 30px;
        height: 30px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #fff;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 10px;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .profile-menu:hover .dropdown-content {
        display: block;
    }

    .dropdown-content hr {
        margin: 0;
        border: none;
        border-top: 1px solid #f1f1f1;
    }

    .notification-icon {
        position: relative;
        cursor: pointer;
        display: inline-block;
        margin-right: 20px;
        /* Jarak lebih dekat antara notifikasi dan profil */
        z-index: 1000;
    }

    .notification-icon .badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: red;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        z-index: 1010;
    }

    .notification-dropdown {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #fff;
        min-width: 250px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        z-index: 1000;
        padding: 0;
    }

    .notification-icon:hover .notification-dropdown {
        display: block;
    }

    .notification-dropdown a {
        color: #333;
        text-decoration: none;
        display: block;
        padding: 8px 12px;
        /* Dekatkan jarak antar notifikasi */
        border-bottom: 1px solid #ddd;
    }

    .notification-dropdown a:last-child {
        border-bottom: none;
    }

    .notification-dropdown a:hover {
        background-color: #f8f9fa;
    }

    .notification-dropdown .d-flex {
        margin-bottom: 2px;
        /* Dekatkan jarak antar konten dalam dropdown */
    }
</style>


<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Perpustakaan</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">SMK ASSALAAM BANDUNG</h6>
        </nav>

        <div class="d-flex align-items-center">
            <!-- Notifications -->
            <div class="notification-icon mx-3">
                <i class="bi bi-bell" style="font-size: 24px; color: white;"></i>
                @if ($notifications->count() > 0)
                    <span class="badge">{{ $notifications->count() }}</span>
                @endif
                <div class="notification-dropdown">
                    @forelse ($notifications as $notification)
                        <a href="#">
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold" style="color: black">
                                            @switch($notification->status)
                                                @case('diterima')
                                                    Pinjam Buku Di Acc
                                                    @break
                                                @case('ditolak')
                                                    Pengajuan Buku Ditolak
                                                    @break
                                                @case('pengembalian ditolak')
                                                    Pengembalian Buku Ditolak
                                                    @break
                                                @case('dikembalikan')
                                                    Buku Berhasil Dikembalikan
                                                    @break
                                                @default
                                                    Status Tidak Dikenal
                                            @endswitch
                                        </span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        {{ $notification->created_at->diffForHumans() }}
                                    </p>
                                    @if ($notification->pesan)
                                        <p class="text-xs text-danger mb-0 mt-1">
                                            <strong>Alasan: </strong> {{ $notification->pesan }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </a>
                        <hr>
                    @empty
                        <p class="text-center p-3">Tidak ada notifikasi</p>
                    @endforelse
                </div>
            </div>            

            <!-- Profile Menu -->
            <div class="profile-menu">
                <button class="profile-button">
                    <img src="{{ asset('images/user/' . (Auth::user()->image_user ?? 'default.png')) }}"
                        alt="User Image">
                </button>

                <div class="dropdown-content">
                    <div style="padding: 20px; text-align: center;">
                        <div
                            style="width: 110px; height: 110px; background-color: #f1f1f1; border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/user/' . (Auth::user()->image_user ?? 'default.png')) }}"
                                alt="Profile Image"
                                style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <p
                            style="margin: 15px 0 0 0; font-weight: bold; font-family: 'Comic Sans MS', cursive, sans-serif; color: #1f1f1f;">
                            Hello {{ Auth::user()->name }}
                        </p>
                    </div>
                    <hr style="margin: 10px 0; border-color: #e0e0e0;">
                    <div style="padding: 10px;">
                        <a href="{{ url('/') }}"
                            style="display: flex; align-items: center; text-decoration: none; color: #333; padding: 5px 0;">
                            <i class="bi bi-house-fill" style="margin-right: 10px;"></i> Halaman Utama
                        </a>
                        @guest
                            <a class="nav-link" href="{{ url('login') }}"
                                style="display: flex; align-items: center; text-decoration: none; color: #333; padding: 5px 0;">
                                <i class="bi bi-box-arrow-in-right" style="margin-right: 10px;"></i> Login
                            </a>
                            <a class="nav-link" href="{{ url('register') }}"
                                style="display: flex; align-items: center; text-decoration: none; color: #333; padding: 5px 0;">
                                <i class="bi bi-r-circle" style="margin-right: 10px;"></i> Register
                            </a>
                        @else
                            @if (Auth::user()->isAdmin)
                                <a href="{{ url('admin/dashboard') }}"
                                    style="display: flex; align-items: center; text-decoration: none; color: #333; padding: 5px 0;">
                                    <i class="bi bi-speedometer2" style="margin-right: 10px;"></i> Admin Dashboard
                                </a>
                            @endif
                            <a class="nav-link text-dark" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                style="display: flex; align-items: center; text-decoration: none; color: #333; padding: 5px 0;">
                                <i class="bi bi-box-arrow-left" style="margin-right: 10px;"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
