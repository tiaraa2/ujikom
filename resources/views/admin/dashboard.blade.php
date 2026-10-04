<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Admin Panel</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- FONT --}}
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

        .main {
            margin-left: 220px;
        }

        .header {
            min-height: 92px;
        }

        /* WELCOME */
        .welcome {
            background: linear-gradient(135deg, #0b437a, #3778d2);
            border-radius: 12px;
            color: white;
        }

        .welcome h2 {
            font-size: 19px;
            font-weight: 600;
        }

        .welcome p {
            font-size: 10px;
            margin-bottom: 0;
            opacity: .9;
        }

        /* STATISTIK */
        .stat-card {
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(20, 50, 80, .08);
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e8f1ff;
            color: #3778d2;
            font-size: 17px;
        }

        .stat-number {
            font-size: 22px;
            font-weight: 700;
            color: #17324d;
        }

        .stat-title {
            font-size: 10px;
            color: #7b8794;
        }

        /* MENU CEPAT */
        .quick-card {
            transition: .2s;
            text-decoration: none;
            color: #17324d;
        }

        .quick-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(20, 50, 80, .08);
            color: #0b437a;
        }

        .quick-icon {
            width: 40px;
            height: 40px;
            border-radius: 9px;
            background: #e8f1ff;
            color: #3778d2;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quick-title {
            font-size: 11px;
            font-weight: 600;
        }

        .quick-text {
            font-size: 9px;
            color: #8995a1;
        }

        @media (max-width: 700px) {
            .main {
                margin-left: 0;
            }

            .admin-info,
            .admin-arrow {
                display: none;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    @include('admin.sidebar')


    <main class="main min-vh-100">

        {{-- ================= HEADER ================= --}}
        <header class="header bg-white border-bottom px-4
                       d-flex justify-content-between align-items-center">

            <div>

                <h1 class="fs-5 fw-bold mb-1">
                    Dashboard
                </h1>

                <div class="d-flex align-items-center gap-2 text-secondary"
                    style="font-size:11px;">

                    <span class="text-primary">
                        Dashboard
                    </span>

                </div>

            </div>


            {{-- ADMIN --}}
            <div class="d-flex align-items-center gap-2">

                <div class="rounded-circle bg-primary-subtle text-primary
                            d-flex align-items-center justify-content-center"
                    style="width:38px;height:38px;">

                    <i class="fa-solid fa-user"></i>

                </div>

                <div class="admin-info">

                    <strong class="d-block" style="font-size:12px;">
                        Admin
                    </strong>

                    <small class="text-secondary" style="font-size:9px;">
                        Administrator
                    </small>

                </div>

                <i class="fa-solid fa-chevron-down text-secondary ms-2 admin-arrow"
                    style="font-size:10px;"></i>

            </div>

        </header>


        {{-- ================= CONTENT ================= --}}
        <section class="p-4">


            {{-- WELCOME --}}
            <div class="welcome p-4 mb-4">

                <h2 class="mb-2">
                    Selamat Datang, Admin 👋
                </h2>

                <p>
                    Kelola informasi dan konten website SMKN 4 Kota Bogor
                    melalui halaman administrasi.
                </p>

            </div>


            {{-- ================= STATISTIK ================= --}}
            <div class="row g-3 mb-4">

                {{-- JURUSAN --}}
                <div class="col-lg-3 col-md-6">

                    <div class="stat-card bg-white border rounded-3 p-3 h-100">

                        <div class="stat-icon mb-3">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>

                        <div class="stat-number">
                            {{ $jumlahJurusan }}
                        </div>

                        <div class="stat-title">
                            Jumlah Jurusan
                        </div>

                    </div>

                </div>


                {{-- GALERI --}}
                <div class="col-lg-3 col-md-6">

                    <div class="stat-card bg-white border rounded-3 p-3 h-100">

                        <div class="stat-icon mb-3">
                            <i class="fa-solid fa-images"></i>
                        </div>

                        <div class="stat-number">
                            {{ $jumlahGaleri }}
                        </div>

                        <div class="stat-title">
                            Jumlah Galeri
                        </div>

                    </div>

                </div>


                {{-- BERITA --}}
                <div class="col-lg-3 col-md-6">

                    <div class="stat-card bg-white border rounded-3 p-3 h-100">

                        <div class="stat-icon mb-3">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>

                        <div class="stat-number">
                            {{ $jumlahBerita }}
                        </div>

                        <div class="stat-title">
                            Jumlah Berita
                        </div>

                    </div>

                </div>


                {{-- KONTAK --}}
                <div class="col-lg-3 col-md-6">

                    <div class="stat-card bg-white border rounded-3 p-3 h-100">

                        <div class="stat-icon mb-3">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div class="stat-number">
                            {{ $jumlahKontak }}
                        </div>

                        <div class="stat-title">
                            Pesan Masuk
                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= MENU CEPAT ================= --}}
            <div class="mb-3">

                <h2 class="fs-5 fw-bold mb-1">
                    Menu Cepat
                </h2>

                <p class="text-secondary mb-0"
                    style="font-size:10px;">

                    Akses pengelolaan website dengan cepat.

                </p>

            </div>


            <div class="row g-3 mt-1">


                {{-- JURUSAN --}}
                <div class="col-lg-3 col-md-6">

                    <a href="{{ route('admin.jurusan') }}"
                        class="quick-card bg-white border rounded-3
                               p-3 d-flex align-items-center gap-3">

                        <div class="quick-icon">

                            <i class="fa-solid fa-graduation-cap"></i>

                        </div>

                        <div>

                            <div class="quick-title">
                                Kelola Jurusan
                            </div>

                            <div class="quick-text">
                                Tambah dan edit jurusan
                            </div>

                        </div>

                    </a>

                </div>


                {{-- GALERI --}}
                <div class="col-lg-3 col-md-6">

                    <a href="{{ route('admin.galeri') }}"
                        class="quick-card bg-white border rounded-3
                               p-3 d-flex align-items-center gap-3">

                        <div class="quick-icon">

                            <i class="fa-solid fa-images"></i>

                        </div>

                        <div>

                            <div class="quick-title">
                                Kelola Galeri
                            </div>

                            <div class="quick-text">
                                Kelola foto sekolah
                            </div>

                        </div>

                    </a>

                </div>


                {{-- BERITA --}}
                <div class="col-lg-3 col-md-6">

                    <a href="{{ route('admin.berita') }}"
                        class="quick-card bg-white border rounded-3
                               p-3 d-flex align-items-center gap-3">

                        <div class="quick-icon">

                            <i class="fa-solid fa-newspaper"></i>

                        </div>

                        <div>

                            <div class="quick-title">
                                Kelola Berita
                            </div>

                            <div class="quick-text">
                                Tambah dan edit berita
                            </div>

                        </div>

                    </a>

                </div>


                {{-- KONTAK --}}
                <div class="col-lg-3 col-md-6">

                    <a href="{{ route('admin.kontak') }}"
                        class="quick-card bg-white border rounded-3
                               p-3 d-flex align-items-center gap-3">

                        <div class="quick-icon">

                            <i class="fa-solid fa-envelope"></i>

                        </div>

                        <div>

                            <div class="quick-title">
                                Pesan Masuk
                            </div>

                            <div class="quick-text">
                                Lihat pesan pengunjung
                            </div>

                        </div>

                    </a>

                </div>


            </div>

        </section>


        {{-- ================= FOOTER ================= --}}
        <footer class="text-center text-secondary py-3"
            style="font-size:9px;">

            © {{ date('Y') }} SMKN 4 Kota Bogor.
            All rights reserved.

        </footer>

    </main>


    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>