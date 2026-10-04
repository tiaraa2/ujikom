<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- FONT POPPINS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            color: #17324d;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 250px;
            background: #0b437a;
            padding: 22px 16px !important;
            box-shadow: 3px 0 15px rgba(0, 0, 0, .08);
        }

        /* ================= LOGO ================= */

        .brand-logo {
            width: 62px;
            height: 62px;
            object-fit: cover;
            border: 3px solid rgba(255,255,255,.3);
        }

        .brand-title {
            font-size: 14px;
            line-height: 1.25;
        }

        .brand-subtitle {
            font-size: 9px;
            color: #bdd2e8;
            letter-spacing: 1px;
        }

        /* ================= MENU ================= */

        .menu-title {
            font-size: 9px;
            color: #a9c3dd;
            letter-spacing: 1.2px;
            margin-bottom: 10px;
        }

        .menu a {
            color: #e4edf6;
            font-size: 13px;
            font-weight: 500;
            padding: 13px 15px;
            margin-bottom: 5px;
            border-radius: 8px !important;
            transition: .2s;
        }

        .menu a:hover {
            background: rgba(255,255,255,.1);
            color: white;
            transform: translateX(2px);
        }

        .menu a.active {
            background: #3778d2;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,.12);
        }

        .menu a i {
            width: 22px;
            font-size: 15px;
            text-align: center;
        }

        /* ================= LOGOUT ================= */

        .logout-btn {
            font-size: 12px !important;
            font-weight: 500;
            padding: 11px 14px !important;
            border-color: rgba(255,255,255,.3) !important;
            transition: .2s;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,.1);
            border-color: rgba(255,255,255,.5) !important;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 250px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 700px) {

            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
            }

            .brand-logo {
                width: 52px;
                height: 52px;
            }

            .brand-title {
                font-size: 12px;
            }

            .menu a {
                font-size: 12px;
            }

        }

    </style>

</head>

<body>

{{-- ================= SIDEBAR ================= --}}

<aside class="sidebar position-fixed top-0 start-0 vh-100 d-flex flex-column">

    {{-- ================= LOGO ================= --}}

    <div class="d-flex align-items-center gap-3 px-2 mb-5">

        <img src="{{ asset('images/logo k4.jpg') }}"
             alt="Logo SMKN 4"
             class="brand-logo rounded-circle bg-white p-1">

        <div class="text-white">

            <div class="brand-title fw-bold">
                SMKN 4
            </div>

            <div class="brand-title fw-bold">
                KOTA BOGOR
            </div>

            <div class="brand-subtitle mt-1">
                ADMIN PANEL
            </div>

        </div>

    </div>


    {{-- ================= MENU ================= --}}

    <nav class="menu">

        <div class="menu-title px-3">
            MENU UTAMA
        </div>


        {{-- DASHBOARD --}}

        <a href="{{ route('admin.dashboard') }}"
           class="d-flex align-items-center gap-3 text-decoration-none
           {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <i class="fa-solid fa-house"></i>

            <span>Dashboard</span>

        </a>


        {{-- JURUSAN --}}

        <a href="{{ route('admin.jurusan') }}"
           class="d-flex align-items-center gap-3 text-decoration-none
           {{ request()->routeIs('admin.jurusan*') ? 'active' : '' }}">

            <i class="fa-solid fa-book-open"></i>

            <span>Jurusan</span>

        </a>


        {{-- GALERI --}}

        <a href="{{ route('admin.galeri') }}"
           class="d-flex align-items-center gap-3 text-decoration-none
           {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">

            <i class="fa-regular fa-image"></i>

            <span>Galeri</span>

        </a>


        {{-- BERITA --}}

        <a href="{{ route('admin.berita') }}"
           class="d-flex align-items-center gap-3 text-decoration-none
           {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">

            <i class="fa-solid fa-newspaper"></i>

            <span>Berita</span>

        </a>


        {{-- KONTAK --}}

        <a href="{{ route('admin.kontak') }}"
           class="d-flex align-items-center gap-3 text-decoration-none
           {{ request()->routeIs('admin.kontak*') ? 'active' : '' }}">

            <i class="fa-solid fa-phone"></i>

            <span>Kontak</span>

        </a>

    </nav>


    {{-- ================= LOGOUT ================= --}}

    <div class="mt-auto">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit"
                    class="logout-btn btn w-100 text-start text-white
                           border rounded-2">

                <i class="fa-solid fa-right-from-bracket me-2"></i>

                Keluar

            </button>

        </form>

    </div>

</aside>

</body>
</html>