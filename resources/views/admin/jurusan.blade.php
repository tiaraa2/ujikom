<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jurusan | Admin Panel</title>

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

    {{-- CSS SEDIKIT --}}
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

        .welcome-line {
            width: 42px;
            height: 3px;
            background: #3778d2;
        }

        .jurusan-card {
            transition: .2s;
        }

        .jurusan-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(20, 50, 80, .08);
        }

        .jurusan-image {
            width: 70px;
            height: 80px;
            flex-shrink: 0;
            background: #eaf2fb;
        }

        .jurusan-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* AKSI */
        .actions a,
        .actions button {
            width: 42px;
            height: 42px;
        }

        .actions i {
            font-size: 14px !important;
        }

        @media (max-width: 700px) {
            .main {
                margin-left: 0;
            }

            .jurusan-card {
                align-items: flex-start !important;
            }
        }
    </style>
</head>


<body>

{{-- SIDEBAR --}}
@include('admin.sidebar')


{{-- MAIN --}}
<main class="main min-vh-100">


    {{-- HEADER --}}
    <header class="header bg-white border-bottom px-4
                   d-flex justify-content-between align-items-center">

        <div>

            <h1 class="fs-5 fw-bold mb-1">
                Jurusan
            </h1>

            <div class="d-flex align-items-center gap-2 text-secondary"
                 style="font-size:11px;">

                <a href="{{ route('admin.dashboard') }}"
                   class="text-primary text-decoration-none">

                    Dashboard

                </a>

                <i class="fa-solid fa-chevron-right"
                   style="font-size:8px;"></i>

                <span>Jurusan</span>

            </div>

        </div>


        {{-- ADMIN --}}
        <div class="d-flex align-items-center gap-2">

            <div class="rounded-circle bg-primary-subtle text-primary
                        d-flex align-items-center justify-content-center"
                 style="width:38px;height:38px;">

                <i class="fa-solid fa-user"></i>

            </div>

            <div>

                <strong class="d-block" style="font-size:12px;">
                    Admin
                </strong>

                <small class="text-secondary" style="font-size:9px;">
                    Administrator
                </small>

            </div>

            <i class="fa-solid fa-chevron-down text-secondary ms-2"
               style="font-size:10px;"></i>

        </div>

    </header>



    {{-- CONTENT --}}
    <section class="p-4">


        {{-- PAGE HEADING --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fs-5 fw-bold mb-1">
                    Data Jurusan
                </h2>

                <p class="text-secondary mb-0"
                   style="font-size:10px;">

                    Kelola jurusan yang tersedia di SMKN 4 Kota Bogor.

                </p>

            </div>


            {{-- TAMBAH --}}
            <a href="{{ route('admin.tambah-jurusan') }}"
   class="btn btn-primary px-4 py-2"
   style="font-size:12px;">

    <i class="fa-solid fa-plus me-2"></i>
    Tambah Jurusan

</a>

        </div>



        {{-- DATA JURUSAN --}}
        <div class="d-flex flex-column gap-3">

            @forelse($jurusans as $jurusan)


                {{-- CARD --}}
                <div class="jurusan-card bg-white border rounded-3 p-3
                            d-flex align-items-center gap-3">


                    {{-- GAMBAR --}}
                    <div class="jurusan-image rounded-2 overflow-hidden
                                d-flex align-items-center justify-content-center">

                        @if($jurusan->gambar)

                            <img src="{{ asset('storage/' . $jurusan->gambar) }}"
                                 alt="{{ $jurusan->nama }}">

                        @else

                            <i class="fa-solid fa-book-open text-primary fs-4"></i>

                        @endif

                    </div>


                    {{-- DATA --}}
                    <div class="flex-grow-1">

                        {{-- SINGKATAN --}}
                        <span class="badge bg-primary-subtle text-primary"
                              style="font-size:9px;">

                            {{ $jurusan->singkatan }}

                        </span>


                        {{-- NAMA --}}
                        <h3 class="fs-6 fw-semibold mt-2 mb-1">

                            {{ $jurusan->nama }}

                        </h3>


                        {{-- DESKRIPSI --}}
                        <p class="text-secondary mb-0"
                           style="font-size:11px;line-height:1.6;">

                            {{ $jurusan->deskripsi }}

                        </p>

                    </div>


                    {{-- STATUS + ACTION --}}
                    <div class="d-flex align-items-center gap-2">


                        {{-- STATUS --}}
                        <span class="badge
                            {{ $jurusan->status == 'aktif'
                                ? 'bg-success-subtle text-success'
                                : 'bg-danger-subtle text-danger' }}"
                            style="font-size:8px;">

                            {{ ucfirst($jurusan->status) }}

                        </span>


                        {{-- ACTION --}}
                        <div class="actions d-flex gap-2">


                            {{-- EDIT --}}
                            <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}"
                               class="btn btn-primary-subtle text-primary
                                      rounded-2 d-flex align-items-center
                                      justify-content-center text-decoration-none"
                               title="Edit">

                                <i class="fa-solid fa-pen"></i>

                            </a>


                            {{-- HAPUS --}}
                            <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}"
                                  method="POST"
                                  class="m-0"
                                  onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger-subtle text-danger
                                               rounded-2 border-0
                                               d-flex align-items-center
                                               justify-content-center"
                                        title="Hapus">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>


            @empty


                {{-- DATA KOSONG --}}
                <div class="bg-white rounded-3 text-center p-5">

                    <i class="fa-solid fa-book-open text-primary fs-2"></i>

                    <h3 class="fs-6 fw-semibold mt-3 mb-1">
                        Belum Ada Jurusan
                    </h3>

                    <p class="text-secondary mb-0"
                       style="font-size:10px;">

                        Silakan tambahkan jurusan terlebih dahulu.

                    </p>

                </div>


            @endforelse

        </div>

    </section>



    {{-- FOOTER --}}
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