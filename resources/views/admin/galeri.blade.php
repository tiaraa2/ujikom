<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri | Admin Panel</title>

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
            margin-left: 235px;
        }

        .header {
            min-height: 92px;
        }

        .gallery-card {
            transition: .2s;
        }

        .gallery-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(20, 50, 80, .08);
        }

        .gallery-image {
            height: 165px;
        }

        .gallery-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-actions a,
        .gallery-actions button {
            min-width: 75px;
            height: 35px;
            font-size: 10px;
        }

        @media (max-width: 1000px) {
            .main {
                margin-left: 235px;
            }
        }

        @media (max-width: 700px) {
            .main {
                margin-left: 0;
            }

            .admin-info,
            .admin-arrow {
                display: none;
            }

            .gallery-actions {
                flex-wrap: wrap;
            }

            .gallery-actions a,
            .gallery-actions form {
                flex: 1;
            }

            .gallery-actions button {
                width: 100%;
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
                    Galeri
                </h1>

                <div class="d-flex align-items-center gap-2 text-secondary"
                    style="font-size:11px;">

                    <a href="{{ route('admin.dashboard') }}"
                        class="text-primary text-decoration-none">

                        Dashboard

                    </a>

                    <i class="fa-solid fa-chevron-right"
                        style="font-size:8px;"></i>

                    <span>Galeri</span>

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


            {{-- HEADING --}}
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fs-5 fw-bold mb-1">
                        Galeri Sekolah
                    </h2>

                    <p class="text-secondary mb-0"
                        style="font-size:10px;">

                        Kelola foto dan dokumentasi kegiatan sekolah.

                    </p>

                </div>


                {{-- TAMBAH FOTO --}}
                <a href="{{ route('admin.tambah-galeri') }}"
                    class="btn btn-primary px-4 py-2"
                    style="font-size:12px;">

                    <i class="fa-solid fa-plus me-2"></i>

                    Tambah Foto

                </a>

            </div>


            {{-- SUCCESS --}}
            @if(session('success'))

                <div class="alert alert-success d-flex align-items-center gap-2
                            py-2 px-3 mb-4"
                    style="font-size:10px;">

                    <i class="fa-solid fa-circle-check"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERROR --}}
            @if(session('error'))

                <div class="alert alert-danger d-flex align-items-center gap-2
                            py-2 px-3 mb-4"
                    style="font-size:10px;">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    {{ session('error') }}

                </div>

            @endif


            {{-- ================= GALERI ================= --}}
            <div class="row g-3">

                @forelse($galeris as $galeri)

                    <div class="col-lg-4 col-md-6">

                        <div class="gallery-card bg-white border rounded-3
                                    overflow-hidden h-100">


                            {{-- GAMBAR --}}
                            <div class="gallery-image bg-primary-subtle">

                                @if($galeri->gambar)

                                    <img src="{{ asset('storage/' . $galeri->gambar) }}"
                                        alt="{{ $galeri->judul }}">

                                @else

                                    <div class="h-100 d-flex align-items-center
                                                justify-content-center">

                                        <i class="fa-regular fa-image text-primary fs-1"></i>

                                    </div>

                                @endif

                            </div>


                            {{-- BODY --}}
                            <div class="p-3">


                                {{-- KATEGORI --}}
                                <span class="badge bg-primary-subtle text-primary"
                                    style="font-size:8px;">

                                    {{ strtoupper($galeri->kategori) }}

                                </span>


                                {{-- JUDUL --}}
                                <h3 class="fw-semibold mt-2 mb-2"
                                    style="font-size:13px;">

                                    {{ $galeri->judul }}

                                </h3>


                                {{-- TANGGAL --}}
                                <p class="text-secondary mb-0"
                                    style="font-size:9px;">

                                    <i class="fa-regular fa-calendar me-1"></i>

                                    @if($galeri->tanggal)

                                        {{ \Carbon\Carbon::parse($galeri->tanggal)->locale('id')->translatedFormat('d F Y') }}

                                    @else

                                        -

                                    @endif

                                </p>


                                {{-- EDIT & HAPUS --}}
                                <div class="gallery-actions d-flex gap-2 mt-3">

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                        class="btn btn-primary btn-sm
                                               d-flex align-items-center
                                               justify-content-center
                                               text-decoration-none">

                                        <i class="fa-solid fa-pen me-1"></i>

                                        Edit

                                    </a>


                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                                        method="POST"
                                        class="m-0">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-danger btn-sm
                                                   d-flex align-items-center
                                                   justify-content-center"
                                            onclick="return confirm('Yakin ingin menghapus foto ini?')">

                                            <i class="fa-solid fa-trash me-1"></i>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    {{-- DATA KOSONG --}}
                    <div class="col-12">

                        <div class="bg-white border rounded-3 text-center p-5">

                            <i class="fa-regular fa-image text-secondary fs-1"></i>

                            <h3 class="fs-6 fw-semibold mt-3 mb-1">

                                Belum Ada Foto

                            </h3>

                            <p class="text-secondary mb-3"
                                style="font-size:10px;">

                                Silakan tambahkan foto galeri terlebih dahulu.

                            </p>

                            <a href="{{ route('admin.tambah-galeri') }}"
                                class="btn btn-primary px-4 py-2"
                                style="font-size:11px;">

                                <i class="fa-solid fa-plus me-2"></i>

                                Tambah Foto

                            </a>

                        </div>

                    </div>

                @endforelse

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