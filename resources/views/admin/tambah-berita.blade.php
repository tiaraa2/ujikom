<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita | Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7fb;
            color: #17324d;
            font-size: 12px;
        }

        .navbar {
            height: 72px;
        }

        .logo {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }

        .title-icon {
            width: 48px;
            height: 48px;
        }

        .form-control,
        .form-select {
            font-size: 12px;
            padding: 10px 12px;
            border-color: #e0e6ed;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3778d2;
            box-shadow: 0 0 0 .15rem rgba(55, 120, 210, .12);
        }

        textarea {
            resize: vertical;
        }

        .upload-box {
            border: 2px dashed #d5dfeb;
            background: #f9fbfd;
            transition: .2s;
        }

        .upload-box:hover {
            border-color: #3778d2;
            background: #f5f9ff;
        }

        .preview {
            height: 170px;
            background: #edf3f9;
        }

        .preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn {
            font-size: 11px;
            padding: 9px 15px;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <nav class="navbar bg-white border-bottom">
        <div class="container">

            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" class="logo">

                <div>
                    <strong class="d-block">SMKN 4 KOTA BOGOR</strong>
                    <small class="text-primary fw-semibold">
                        ADMIN SEKOLAH
                    </small>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle bg-primary-subtle text-primary d-flex
                            align-items-center justify-content-center"
                    style="width:38px;height:38px;">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div class="d-none d-sm-block">
                    <strong class="d-block">Admin</strong>
                    <small class="text-secondary">Administrator</small>
                </div>
            </div>

        </div>
    </nav>


    <!-- CONTENT -->
    <main class="container py-4">

        <!-- BACK -->
        <a href="{{ route('admin.berita') }}"
            class="text-primary text-decoration-none small">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Berita
        </a>


        <!-- TITLE -->
        <div class="d-flex align-items-center gap-3 my-4">

            <div class="title-icon bg-primary-subtle text-primary rounded-3
                        d-flex align-items-center justify-content-center">
                <i class="bi bi-newspaper fs-5"></i>
            </div>

            <div>
                <h4 class="fw-bold mb-1">Tambah Berita</h4>
                <p class="text-secondary mb-0">
                    Tambahkan berita terbaru untuk website sekolah.
                </p>
            </div>

        </div>


        <!-- FORM CARD -->
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4 p-md-5">

                <div class="d-flex align-items-center gap-2 mb-4">
                    <i class="bi bi-pencil-square text-primary fs-5"></i>

                    <div>
                        <h6 class="fw-bold mb-0">Informasi Berita</h6>
                        <small class="text-secondary">
                            Lengkapi data berita di bawah ini.
                        </small>
                    </div>
                </div>


                <form action="{{ route('admin.berita.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <!-- JUDUL -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Judul Berita
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            name="judul"
                            class="form-control rounded-3"
                            value="{{ old('judul') }}"
                            placeholder="Masukkan judul berita"
                            required>

                        @error('judul')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <!-- KATEGORI + TANGGAL -->
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Kategori
                                <span class="text-danger">*</span>
                            </label>

                            <select name="kategori"
                                class="form-select rounded-3"
                                required>

                                <option value="">Pilih kategori</option>

                                @foreach(['Kegiatan','Prestasi','Pengumuman','Sekolah'] as $kategori)
                                    <option value="{{ $kategori }}"
                                        {{ old('kategori') == $kategori ? 'selected' : '' }}>
                                        {{ $kategori }}
                                    </option>
                                @endforeach

                            </select>

                            @error('kategori')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Tanggal Berita
                                <span class="text-danger">*</span>
                            </label>

                            <input type="date"
                                name="tanggal"
                                class="form-control rounded-3"
                                value="{{ old('tanggal') }}"
                                required>

                            @error('tanggal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>


                    <!-- ISI -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Isi Berita
                            <span class="text-danger">*</span>
                        </label>

                        <textarea name="isi"
                            class="form-control rounded-3"
                            rows="7"
                            placeholder="Tuliskan isi berita di sini..."
                            required>{{ old('isi') }}</textarea>

                        @error('isi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- FOTO -->
                    <div class="mb-3">

                        <div class="d-flex align-items-center gap-2 mb-3">

                            <i class="bi bi-image text-primary fs-5"></i>

                            <div>
                                <h6 class="fw-bold mb-0">Foto Berita</h6>
                                <small class="text-secondary">
                                    Pilih foto untuk berita.
                                </small>
                            </div>

                        </div>


                        <div class="upload-box rounded-4 p-3">

                            <div class="row align-items-center g-3">

                                <!-- PREVIEW -->
                                <div class="col-md-5">

                                    <div id="preview"
                                        class="preview rounded-3 overflow-hidden
                                               d-flex align-items-center
                                               justify-content-center
                                               text-secondary">

                                        <i class="bi bi-image fs-1"></i>

                                    </div>

                                </div>


                                <!-- INPUT -->
                                <div class="col-md-7">

                                    <label for="gambar"
                                        class="btn btn-primary rounded-3">

                                        <i class="bi bi-cloud-arrow-up me-1"></i>
                                        Pilih Foto

                                    </label>

                                    <input type="file"
                                        id="gambar"
                                        name="gambar"
                                        class="d-none"
                                        accept="image/png,image/jpeg,image/jpg,image/webp"
                                        required>

                                    <h6 class="mt-3 mb-1 fw-semibold">
                                        Upload foto berita
                                    </h6>

                                    <small class="text-secondary d-block">
                                        Format: JPG, JPEG, PNG, WEBP
                                    </small>

                                    <small class="text-secondary">
                                        Ukuran maksimal 2 MB
                                    </small>

                                </div>

                            </div>

                        </div>

                        @error('gambar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- BUTTON -->
                    <div class="border-top mt-4 pt-4
                                d-flex justify-content-end gap-2">

                        <a href="{{ route('admin.berita') }}"
                            class="btn btn-light border rounded-3">

                            <i class="bi bi-x-lg me-1"></i>
                            Batal

                        </a>

                        <button type="submit"
                            class="btn btn-primary rounded-3">

                            <i class="bi bi-check-lg me-1"></i>
                            Simpan Berita

                        </button>

                    </div>

                </form>

            </div>

        </div>


        <footer class="text-center text-secondary mt-4 small">
            © {{ date('Y') }} SMKN 4 Kota Bogor
        </footer>

    </main>


    <!-- PREVIEW -->
    <script>
        document.getElementById('gambar').addEventListener('change', function () {

            const file = this.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('preview').innerHTML =
                    `<img src="${e.target.result}" alt="Preview">`;
            };

            reader.readAsDataURL(file);
        });
    </script>

</body>
</html>