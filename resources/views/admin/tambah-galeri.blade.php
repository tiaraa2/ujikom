<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Galeri | Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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
            min-height: 75px;
        }

        .upload-box {
            min-height: 250px;
            border: 2px dashed #d5e0eb;
            border-radius: 10px;
            cursor: pointer;
            transition: .2s;
        }

        .upload-box:hover {
            border-color: #3778d2;
            background: #f8fbff;
        }

        #preview {
            max-width: 100%;
            max-height: 240px;
            object-fit: cover;
            border-radius: 8px;
        }

        .form-control,
        .form-select {
            font-size: 12px;
            padding: 10px 12px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<header class="top-header bg-white border-bottom px-4
               d-flex justify-content-between align-items-center">

    <div class="d-flex align-items-center gap-3">

        <img src="{{ asset('images/logo.png') }}"
             alt="Logo SMKN 4"
             class="rounded-circle"
             style="width:42px;height:42px;object-fit:cover;">

        <div>
            <strong class="d-block" style="font-size:13px;">
                SMKN 4 Kota Bogor
            </strong>

            <small class="text-secondary" style="font-size:9px;">
                Admin Panel
            </small>
        </div>

    </div>

    <div class="d-flex align-items-center gap-2">

        <div class="rounded-circle bg-primary-subtle text-primary
                    d-flex align-items-center justify-content-center"
             style="width:38px;height:38px;">

            <i class="fa-solid fa-user"></i>

        </div>

        <div class="d-none d-sm-block">

            <strong class="d-block" style="font-size:12px;">
                Admin
            </strong>

            <small class="text-secondary" style="font-size:9px;">
                Administrator
            </small>

        </div>

    </div>

</header>

<main class="container py-4" style="max-width:900px;">

    <a href="{{ route('admin.galeri') }}"
       class="text-primary text-decoration-none d-inline-flex
              align-items-center gap-2 mb-3"
       style="font-size:11px;">

        <i class="fa-solid fa-arrow-left"></i>
        Kembali ke Galeri

    </a>

    <div class="mb-4">

        <h1 class="fw-bold mb-1" style="font-size:22px;">
            Tambah Foto Galeri
        </h1>

        <p class="text-secondary mb-0" style="font-size:11px;">
            Tambahkan foto dan dokumentasi kegiatan sekolah.
        </p>

    </div>

    @if($errors->any())

        <div class="alert alert-danger" style="font-size:11px;">

            <ul class="mb-0 ps-3">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('admin.galeri.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row g-4">

            <!-- INFORMASI -->
            <div class="col-lg-6">

                <div class="bg-white border rounded-3 p-4 h-100">

                    <h2 class="fw-semibold mb-4"
                        style="font-size:15px;">

                        Informasi Foto

                    </h2>

                    <!-- JUDUL -->
                    <div class="mb-4">

                        <label class="form-label">
                            Judul Foto
                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul') }}"
                               placeholder="Contoh: Upacara Hari Kemerdekaan"
                               required>

                    </div>

                    <!-- KATEGORI -->
                    <div class="mb-4">

                        <label class="form-label">
                            Kategori
                        </label>

                        <select name="kategori"
                                class="form-select"
                                required>

                            <option value="">
                                Pilih kategori
                            </option>

                            <option value="kegiatan"
                                {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>
                                Kegiatan
                            </option>

                            <option value="prestasi"
                                {{ old('kategori') == 'prestasi' ? 'selected' : '' }}>
                                Prestasi
                            </option>

                            <option value="upacara"
                                {{ old('kategori') == 'upacara' ? 'selected' : '' }}>
                                Upacara
                            </option>

                        </select>

                    </div>

                    <!-- TANGGAL -->
                    <div>

                        <label class="form-label">
                            Tanggal
                        </label>

                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal') }}"
                               required>

                    </div>

                </div>

            </div>


            <!-- UPLOAD -->
            <div class="col-lg-6">

                <div class="bg-white border rounded-3 p-4 h-100">

                    <h2 class="fw-semibold mb-4"
                        style="font-size:15px;">

                        Upload Foto

                    </h2>

                    <label for="gambar"
                           class="upload-box d-flex flex-column
                                  align-items-center justify-content-center
                                  text-center p-3">

                        <div id="uploadIcon">

                            <i class="fa-solid fa-cloud-arrow-up
                                      text-primary fs-1 mb-3"></i>

                            <h3 class="fw-semibold mb-1"
                                style="font-size:13px;">

                                Pilih Foto

                            </h3>

                            <p class="text-secondary mb-0"
                               style="font-size:9px;">

                                JPG, JPEG, PNG atau WEBP
                                <br>
                                Maksimal 2 MB

                            </p>

                        </div>

                        <img id="preview"
                             src=""
                             alt="Preview"
                             class="d-none">

                    </label>

                    <input type="file"
                           id="gambar"
                           name="gambar"
                           class="d-none"
                           accept=".jpg,.jpeg,.png,.webp"
                           required>

                    <p class="text-secondary mt-2 mb-0"
                       style="font-size:9px;">

                        <i class="fa-solid fa-circle-info me-1"></i>

                        Pilih foto yang jelas untuk dokumentasi sekolah.

                    </p>

                </div>

            </div>

        </div>


        <!-- BUTTON -->
        <div class="d-flex justify-content-end gap-2 mt-4">

            <a href="{{ route('admin.galeri') }}"
               class="btn btn-light border px-4 py-2"
               style="font-size:11px;">

                Batal

            </a>

            <button type="submit"
                    class="btn btn-primary px-4 py-2"
                    style="font-size:11px;">

                <i class="fa-solid fa-floppy-disk me-2"></i>

                Simpan Foto

            </button>

        </div>

    </form>

</main>


<script>

document.getElementById('gambar').addEventListener('change', function(event) {

    const file = event.target.files[0];

    const preview = document.getElementById('preview');

    const icon = document.getElementById('uploadIcon');

    if (file) {

        preview.src = URL.createObjectURL(file);

        preview.classList.remove('d-none');

        icon.classList.add('d-none');

    }

});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>