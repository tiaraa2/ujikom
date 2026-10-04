<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kontak | Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Poppins -->
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

        .header h1 {
            font-size: 20px;
        }

        .breadcrumb-text {
            font-size: 10px;
        }

        .kontak-card {
            transition: .2s;
        }

        .kontak-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(20, 50, 80, .08);
        }

        .message-box {
            background: #f7f9fb;
            border-left: 3px solid #3778d2;
        }

        .admin-photo,
        .user-photo {
            width: 38px;
            height: 38px;
        }

        @media (max-width: 700px) {

            .main {
                margin-left: 0;
            }

            .admin-info,
            .admin-arrow {
                display: none !important;
            }

            .header {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            .content-section {
                padding: 20px 15px !important;
            }

            .pesan-top {
                align-items: flex-start !important;
                flex-direction: column;
                gap: 10px;
            }

            .pesan-date {
                margin-left: 48px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    @include('admin.sidebar')


    <main class="main min-vh-100">

        <!-- ================= HEADER ================= -->

        <header class="header bg-white border-bottom px-4
                       d-flex justify-content-between align-items-center">

            <div>

                <h1 class="fw-bold mb-1">
                    Kontak
                </h1>

                <div class="d-flex align-items-center gap-2
                            text-secondary breadcrumb-text">

                    <a href="{{ route('admin.dashboard') }}"
                        class="text-primary text-decoration-none">

                        Dashboard

                    </a>

                    <i class="fa-solid fa-chevron-right"
                        style="font-size:8px;"></i>

                    <span>
                        Kontak
                    </span>

                </div>

            </div>


            <!-- ADMIN PROFILE -->

            <div class="d-flex align-items-center gap-2">

                <div class="admin-photo rounded-circle
                            bg-primary-subtle text-primary
                            d-flex align-items-center justify-content-center">

                    <i class="fa-solid fa-user"></i>

                </div>

                <div class="admin-info d-flex flex-column">

                    <strong style="font-size:11px;">
                        Admin
                    </strong>

                    <span class="text-secondary"
                        style="font-size:9px;">

                        Administrator

                    </span>

                </div>

                <i class="fa-solid fa-chevron-down
                          text-secondary admin-arrow ms-2"
                    style="font-size:9px;"></i>

            </div>

        </header>


        <!-- ================= CONTENT ================= -->

        <section class="content-section p-4">


            <!-- TITLE -->

            <div class="mb-4">

                <h2 class="fw-bold mb-1"
                    style="font-size:19px;">

                    Pesan Masuk

                </h2>

                <p class="text-secondary mb-0"
                    style="font-size:10px;">

                    Pesan dan pertanyaan yang dikirim melalui halaman kontak.

                </p>

            </div>


            <!-- ================= SUCCESS ================= -->

            @if(session('success'))

                <div class="alert alert-success d-flex
                            align-items-center gap-2 py-2 mb-4"
                    style="font-size:10px;">

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            <!-- ================= ERROR ================= -->

            @if(session('error'))

                <div class="alert alert-danger d-flex
                            align-items-center gap-2 py-2 mb-4"
                    style="font-size:10px;">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <span>
                        {{ session('error') }}
                    </span>

                </div>

            @endif


            <!-- ================= LIST PESAN ================= -->

            <div class="d-flex flex-column gap-3">


                @forelse($kontaks as $kontak)


                    <!-- CARD PESAN -->

                    <div class="kontak-card bg-white border
                                rounded-3 p-3">


                        <!-- USER + TANGGAL -->

                        <div class="pesan-top d-flex
                                    justify-content-between
                                    align-items-center">


                            <!-- USER -->

                            <div class="d-flex align-items-center gap-2">

                                <div class="user-photo rounded-circle
                                            bg-primary-subtle text-primary
                                            d-flex align-items-center
                                            justify-content-center">

                                    <i class="fa-solid fa-user"
                                        style="font-size:14px;"></i>

                                </div>


                                <div>

                                    <h3 class="mb-0 fw-semibold"
                                        style="font-size:13px;">

                                        {{ $kontak->nama }}

                                    </h3>

                                    <p class="text-secondary mb-0"
                                        style="font-size:9px;">

                                        {{ $kontak->kontak }}

                                    </p>

                                </div>

                            </div>


                            <!-- TANGGAL -->

                            <div class="pesan-date text-secondary
                                        d-flex align-items-center gap-2"
                                style="font-size:9px;">

                                <i class="fa-regular fa-calendar
                                          text-primary"></i>

                                {{ $kontak->created_at
                                    ? $kontak->created_at->format('d F Y, H:i')
                                    : '-' }}

                            </div>

                        </div>


                        <!-- ================= ISI PESAN ================= -->

                        <div class="message-box rounded-2 p-3 mt-3">

                            <div class="text-primary fw-bold mb-1"
                                style="font-size:9px;">

                                PESAN

                            </div>

                            <p class="text-secondary mb-0"
                                style="font-size:10px;
                                       line-height:17px;
                                       white-space:pre-line;">

                                {{ $kontak->pesan }}

                            </p>

                        </div>


                        <!-- ================= ACTION ================= -->

                        <div class="border-top mt-3 pt-3
                                    d-flex justify-content-end">

                            <form
                                action="{{ route('admin.kontak.destroy', $kontak->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">

                                @csrf

                                @method('DELETE')


                                <button type="submit"
                                    class="btn btn-sm px-3"
                                    style="font-size:9px;
                                           background:#fff0f0;
                                           color:#dc4c4c;">

                                    <i class="fa-solid fa-trash me-1"></i>

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>


                @empty


                    <!-- ================= EMPTY ================= -->

                    <div class="bg-white border rounded-3
                                text-center py-5">

                        <i class="fa-regular fa-envelope
                                  text-primary"
                            style="font-size:35px;"></i>


                        <h3 class="fw-bold mt-3 mb-1"
                            style="font-size:16px;">

                            Belum Ada Pesan

                        </h3>


                        <p class="text-secondary mb-0"
                            style="font-size:10px;">

                            Belum ada pesan yang dikirim oleh pengunjung.

                        </p>

                    </div>


                @endforelse

            </div>

        </section>


        <!-- ================= FOOTER ================= -->

        <footer class="text-center text-secondary pb-4"
            style="font-size:9px;">

            © {{ date('Y') }} SMKN 4 Kota Bogor.
            All rights reserved.

        </footer>

    </main>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>