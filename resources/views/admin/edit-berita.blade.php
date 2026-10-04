<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Berita | Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Poppins -->
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

        .top-header {
            min-height: 78px;
        }

        .school-logo {
            width: 42px;
            height: 42px;
        }

        .school-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .school-name strong {
            font-size: 14px;
        }

        .school-name span {
            font-size: 9px;
        }

        .page-container {
            max-width: 1050px;
        }

        .page-title h1 {
            font-size: 20px;
        }

        .page-title p,
        .section-title p {
            font-size: 9px;
        }

        .title-icon,
        .section-icon {
            width: 40px;
            height: 40px;
        }

        .form-card {
            border-radius: 12px;
        }

        .form-label {
            font-size: 10px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            font-size: 10px;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .upload-preview {
            width: 150px;
            height: 100px;
        }

        .upload-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .small-text {
            font-size: 9px;
        }

        @media (max-width: 700px) {
            .admin-info {
                display: none;
            }

            .upload-preview {
                width: 100%;
                height: 180px;
            }
        }
    </style>
</head>

<body>


    <!-- ================= HEADER ================= -->

    <header class="top-header bg-white border-bottom">

        <div class="container-fluid px-4 d-flex justify-content-between align-items-center"
            style="min-height:78px;">

            <!-- LOGO SEKOLAH -->
            <div class="d-flex align-items-center gap-2">

                <div class="school-logo rounded-circle overflow-hidden">

                    <img src="{{ asset('images/logo.png') }}"
                        alt="Logo SMKN 4 Kota Bogor">

                </div>

                <div class="school-name d-flex flex-column lh-sm">

                    <strong>SMKN 4</strong>

                    <span class="text-secondary">
                        KOTA BOGOR
                    </span>

                </div>

            </div>


            <!-- ADMIN -->
            <div class="d-flex align-items-center gap-2">

                <div class="rounded-circle bg-primary-subtle text-primary
                            d-flex align-items-center justify-content-center"
                    style="width:38px;height:38px;">

                    <i class="fa-solid fa-user"></i>

                </div>

                <div class="admin-info d-flex flex-column">

                    <strong style="font-size:11px;">
                        Admin
                    </strong>

                    <span class="text-secondary"
                        style="font-size:8px;">
                        Administrator
                    </span>

                </div>

            </div>

        </div>

    </header>


    <!-- ================= CONTENT ================= -->

    <main class="container page-container py-4">


        <!-- KEMBALI -->

        <div class="mb-3">

            <a href="{{ route('admin.berita') }}"
                class="text-primary text-decoration-none"
                style="font-size:10px;">

                <i class="fa-solid fa-arrow-left me-1"></i>

                Kembali ke Berita

            </a>

        </div>


        <!-- ================= TITLE ================= -->

        <div class="page-title d-flex align-items-center gap-3 mb-4">

            <div class="title-icon rounded-3 bg-primary-subtle text-primary
                        d-flex align-items-center justify-content-center">

                <i class="fa-solid fa-pen"></i>

            </div>

            <div>

                <h1 class="fw-bold mb-1">
                    Edit Berita
                </h1>

                <p class="text-secondary mb-0">
                    Perbarui informasi berita sekolah.
                </p>

            </div>

        </div>


        <!-- ERROR -->

        @if ($errors->any())

            <div class="alert alert-danger"
                style="font-size:10px;">

                <strong>Terdapat kesalahan:</strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- ================= FORM CARD ================= -->

        <div class="form-card bg-white shadow-sm p-4">


            <form action="{{ route('admin.berita.update', $berita->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <!-- ================= INFORMASI ================= -->

                <div class="section-title d-flex align-items-center gap-3 mb-4">

                    <div class="section-icon rounded-3 bg-primary-subtle text-primary
                                d-flex align-items-center justify-content-center">

                        <i class="fa-solid fa-newspaper"></i>

                    </div>

                    <div>

                        <h2 class="fw-semibold mb-1"
                            style="font-size:14px;">

                            Informasi Berita

                        </h2>

                        <p class="text-secondary mb-0">

                            Perbarui informasi berita yang akan ditampilkan.

                        </p>

                    </div>

                </div>


                <!-- JUDUL -->

                <div class="mb-3">

                    <label for="judul" class="form-label">

                        Judul Berita <span class="text-danger">*</span>

                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="fa-solid fa-heading text-primary"
                                style="font-size:11px;"></i>

                        </span>

                        <input type="text"
                            id="judul"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul', $berita->judul) }}"
                            placeholder="Contoh: Kegiatan Terbaru SMKN 4 Kota Bogor"
                            required>

                    </div>

                    @error('judul')

                        <small class="text-danger small-text">
                            {{ $message }}
                        </small>

                    @enderror

                </div>


                <!-- KATEGORI -->

                <div class="mb-3">

                    <label for="kategori" class="form-label">

                        Kategori <span class="text-danger">*</span>

                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="fa-solid fa-layer-group text-primary"
                                style="font-size:11px;"></i>

                        </span>

                        <select id="kategori"
                            name="kategori"
                            class="form-select"
                            required>

                            <option value="">
                                Pilih Kategori
                            </option>

                            <option value="Kegiatan"
                                {{ old('kategori', $berita->kategori) == 'Kegiatan' ? 'selected' : '' }}>

                                Kegiatan

                            </option>

                            <option value="Prestasi"
                                {{ old('kategori', $berita->kategori) == 'Prestasi' ? 'selected' : '' }}>

                                Prestasi

                            </option>

                            <option value="Pengumuman"
                                {{ old('kategori', $berita->kategori) == 'Pengumuman' ? 'selected' : '' }}>

                                Pengumuman

                            </option>

                            <option value="Sekolah"
                                {{ old('kategori', $berita->kategori) == 'Sekolah' ? 'selected' : '' }}>

                                Sekolah

                            </option>

                        </select>

                    </div>

                    @error('kategori')

                        <small class="text-danger small-text">
                            {{ $message }}
                        </small>

                    @enderror

                </div>


                <!-- TANGGAL -->

                <div class="mb-3">

                    <label for="tanggal" class="form-label">

                        Tanggal Berita <span class="text-danger">*</span>

                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="fa-solid fa-calendar text-primary"
                                style="font-size:11px;"></i>

                        </span>

                        <input type="date"
                            id="tanggal"
                            name="tanggal"
                            class="form-control"
                            value="{{ old('tanggal', $berita->tanggal ? $berita->tanggal->format('Y-m-d') : '') }}"
                            required>

                    </div>

                    @error('tanggal')

                        <small class="text-danger small-text">
                            {{ $message }}
                        </small>

                    @enderror

                </div>


                <!-- ISI -->

                <div class="mb-4">

                    <label for="isi" class="form-label">

                        Isi Berita <span class="text-danger">*</span>

                    </label>

                    <textarea id="isi"
                        name="isi"
                        class="form-control"
                        placeholder="Tuliskan isi berita di sini..."
                        required>{{ old('isi', $berita->isi) }}</textarea>

                    @error('isi')

                        <small class="text-danger small-text">
                            {{ $message }}
                        </small>

                    @enderror

                </div>


                <!-- ================= FOTO ================= -->

                <div class="section-title d-flex align-items-center gap-3 mb-4">

                    <div class="section-icon rounded-3 bg-primary-subtle text-primary
                                d-flex align-items-center justify-content-center">

                        <i class="fa-regular fa-image"></i>

                    </div>

                    <div>

                        <h2 class="fw-semibold mb-1"
                            style="font-size:14px;">

                            Foto Berita

                        </h2>

                        <p class="text-secondary mb-0">

                            Ganti foto berita jika diperlukan.

                        </p>

                    </div>

                </div>


                <!-- UPLOAD -->

                <div class="border border-2 border-dashed rounded-3 p-3 mb-4">

                    <div class="d-flex align-items-center gap-3">


                        <!-- PREVIEW -->

                        <div class="upload-preview bg-light rounded-3 overflow-hidden
                                    d-flex align-items-center justify-content-center"
                            id="preview">

                            @if($berita->gambar)

                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                    alt="{{ $berita->judul }}">

                            @else

                                <div class="text-center text-secondary">

                                    <i class="fa-regular fa-image fs-3"></i>

                                    <div style="font-size:8px;">
                                        Preview Foto
                                    </div>

                                </div>

                            @endif

                        </div>


                        <!-- UPLOAD -->

                        <div>

                            <label for="gambar"
                                class="btn btn-primary btn-sm"
                                style="font-size:9px;">

                                <i class="fa-solid fa-cloud-arrow-up me-1"></i>

                                Ganti Foto

                            </label>

                            <input type="file"
                                id="gambar"
                                name="gambar"
                                accept="image/png,image/jpeg,image/jpg,image/webp"
                                class="d-none">

                            <h3 class="mt-2 mb-1"
                                style="font-size:11px;">

                                Upload foto berita

                            </h3>

                            <p class="text-secondary mb-1"
                                style="font-size:8px;">

                                PNG, JPG, JPEG atau WEBP

                            </p>

                            <small class="text-secondary"
                                style="font-size:8px;">

                                Maksimal ukuran file 2 MB

                            </small>

                        </div>

                    </div>

                </div>

                @error('gambar')

                    <small class="text-danger small-text">
                        {{ $message }}
                    </small>

                @enderror


                <!-- ================= BUTTON ================= -->

                <div class="border-top pt-3 d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.berita') }}"
                        class="btn btn-light border px-4"
                        style="font-size:10px;">

                        <i class="fa-solid fa-xmark me-1"></i>

                        Batal

                    </a>

                    <button type="submit"
                        class="btn btn-primary px-4"
                        style="font-size:10px;">

                        <i class="fa-solid fa-check me-1"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>


        <!-- FOOTER -->

        <footer class="text-center text-secondary py-4"
            style="font-size:8px;">

            © {{ date('Y') }} SMKN 4 Kota Bogor.
            All rights reserved.

        </footer>

    </main>


    <!-- ================= PREVIEW ================= -->

    <script>

        const gambarInput = document.getElementById('gambar');
        const preview = document.getElementById('preview');

        gambarInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {

                preview.innerHTML = `
                    <img src="${e.target.result}" alt="Preview Foto">
                `;

            };

            reader.readAsDataURL(file);

        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>