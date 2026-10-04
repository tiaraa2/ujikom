<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Jurusan | Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            color: #18202b;
        }

        .logo {
            width: 45px;
            height: 45px;
            object-fit: cover;
        }

        .icon-box {
            width: 44px;
            height: 44px;
            background: #eaf2ff;
            color: #3475d1;
        }

        .preview {
            width: 110px;
            height: 110px;
            background: #fafcff;
        }

        .form-control {
            font-size: 12px;
        }

        .form-control:focus {
            border-color: #3475d1;
            box-shadow: 0 0 0 .15rem rgba(52,117,209,.1);
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="bg-white border-bottom">
        <div class="container d-flex justify-content-between align-items-center py-3">

            <!-- LOGO SEKOLAH -->
            <div class="d-flex align-items-center gap-2">

                <img src="{{ asset('images/logo.png') }}"
                     class="logo rounded-circle border"
                     alt="Logo SMKN 4 Kota Bogor">

                <div class="lh-sm">
                    <strong class="d-block text-primary" style="font-size:14px;">
                        SMKN 4
                    </strong>

                    <span class="text-secondary" style="font-size:9px;">
                        KOTA BOGOR
                    </span>
                </div>

            </div>


            <!-- ADMIN -->
            <div class="d-flex align-items-center gap-2">

                <div class="rounded-circle d-flex align-items-center justify-content-center"
                     style="width:36px;height:36px;background:#edf4ff;color:#3475d1;">

                    <i class="fa-solid fa-user"></i>

                </div>

                <div class="lh-sm">

                    <strong class="d-block" style="font-size:11px;">
                        Admin
                    </strong>

                    <span class="text-secondary" style="font-size:8px;">
                        Administrator
                    </span>

                </div>

            </div>

        </div>
    </header>


    <!-- CONTENT -->
    <main class="container py-4" style="max-width:960px;">

        <!-- KEMBALI -->
        <a href="{{ route('admin.jurusan') }}"
           class="text-secondary text-decoration-none d-inline-flex align-items-center gap-2 mb-3"
           style="font-size:10px;">

            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Jurusan

        </a>


        <!-- JUDUL -->
        <div class="d-flex align-items-center gap-3 mb-4">

            <div class="icon-box rounded-3 d-flex align-items-center justify-content-center">

                <i class="fa-solid fa-graduation-cap"></i>

            </div>

            <div>

                <h1 class="fw-bold mb-1" style="font-size:21px;">
                    Tambah Jurusan
                </h1>

                <p class="text-secondary mb-0" style="font-size:10px;">
                    Tambahkan jurusan baru ke dalam sistem sekolah.
                </p>

            </div>

        </div>


        <!-- CARD FORM -->
        <div class="bg-white border rounded-3 shadow-sm">

            <form action="{{ route('admin.jurusan.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-4">

                @csrf


                <!-- INFORMASI JURUSAN -->
                <div class="d-flex align-items-center gap-2 border-bottom pb-3 mb-4">

                    <div class="icon-box rounded-2 d-flex align-items-center justify-content-center"
                         style="width:34px;height:34px;font-size:13px;">

                        <i class="fa-solid fa-school"></i>

                    </div>

                    <div>

                        <h2 class="mb-1 fw-semibold" style="font-size:13px;">
                            Informasi Jurusan
                        </h2>

                        <p class="text-secondary mb-0" style="font-size:9px;">
                            Masukkan informasi dasar jurusan.
                        </p>

                    </div>

                </div>


                <!-- NAMA & SINGKATAN -->
                <div class="row g-3 mb-3">

                    <div class="col-md-8">

                        <label class="form-label fw-semibold" style="font-size:10px;">
                            Nama Jurusan <span class="text-danger">*</span>
                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="fa-solid fa-graduation-cap text-secondary"></i>
                            </span>

                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   placeholder="Contoh: Pengembangan Perangkat Lunak dan Gim"
                                   value="{{ old('nama') }}"
                                   required>

                        </div>

                        @error('nama')
                            <small class="text-danger" style="font-size:8px;">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <div class="col-md-4">

                        <label class="form-label fw-semibold" style="font-size:10px;">
                            Singkatan <span class="text-danger">*</span>
                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="fa-solid fa-tag text-secondary"></i>
                            </span>

                            <input type="text"
                                   name="singkatan"
                                   class="form-control"
                                   placeholder="Contoh: PPLG"
                                   maxlength="20"
                                   value="{{ old('singkatan') }}"
                                   required>

                        </div>

                        @error('singkatan')
                            <small class="text-danger" style="font-size:8px;">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>


                <!-- DESKRIPSI -->
                <div class="mb-4">

                    <label class="form-label fw-semibold" style="font-size:10px;">
                        Deskripsi Jurusan <span class="text-danger">*</span>
                    </label>

                    <textarea name="deskripsi"
                              id="deskripsi"
                              class="form-control"
                              rows="5"
                              maxlength="500"
                              placeholder="Masukkan deskripsi mengenai jurusan..."
                              required>{{ old('deskripsi') }}</textarea>

                    <div class="d-flex justify-content-between mt-1">

                        <small class="text-secondary" style="font-size:8px;">
                            Jelaskan secara singkat mengenai jurusan.
                        </small>

                        <small id="counter" class="text-secondary" style="font-size:8px;">
                            0 / 500
                        </small>

                    </div>

                    @error('deskripsi')
                        <small class="text-danger" style="font-size:8px;">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <!-- GAMBAR -->
                <div class="d-flex align-items-center gap-2 border-bottom pb-3 mb-3">

                    <div class="icon-box rounded-2 d-flex align-items-center justify-content-center"
                         style="width:34px;height:34px;font-size:13px;">

                        <i class="fa-regular fa-image"></i>

                    </div>

                    <div>

                        <h2 class="mb-1 fw-semibold" style="font-size:13px;">
                            Gambar Jurusan
                        </h2>

                        <p class="text-secondary mb-0" style="font-size:9px;">
                            Upload gambar yang akan ditampilkan pada halaman utama.
                        </p>

                    </div>

                </div>


                <!-- UPLOAD -->
                <div class="border border-2 rounded-3 p-3 d-flex align-items-center gap-3">

                    <!-- PREVIEW -->
                    <div id="preview"
                         class="preview rounded-3 border d-flex flex-column align-items-center justify-content-center text-secondary overflow-hidden flex-shrink-0">

                        <i class="fa-regular fa-image fs-3 mb-1"></i>

                        <small style="font-size:8px;">
                            Preview
                        </small>

                    </div>


                    <div>

                        <label for="gambar"
                               class="btn btn-primary btn-sm"
                               style="font-size:9px;">

                            <i class="fa-solid fa-cloud-arrow-up me-1"></i>
                            Pilih Gambar

                        </label>

                        <input type="file"
                               id="gambar"
                               name="gambar"
                               accept="image/png,image/jpeg,image/jpg,image/webp"
                               hidden>

                        <h3 class="fw-semibold mt-3 mb-1" style="font-size:11px;">
                            Upload gambar jurusan
                        </h3>

                        <p class="text-secondary mb-1" style="font-size:9px;">
                            PNG, JPG, JPEG atau WEBP
                        </p>

                        <small class="text-secondary" style="font-size:8px;">
                            Maksimal ukuran file 2 MB
                        </small>

                    </div>

                </div>

                @error('gambar')
                    <small class="text-danger d-block mt-1" style="font-size:8px;">
                        {{ $message }}
                    </small>
                @enderror


                <!-- BUTTON -->
                <div class="border-top mt-4 pt-3 d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.jurusan') }}"
                       class="btn btn-light border btn-sm px-3"
                       style="font-size:9px;">

                        <i class="fa-solid fa-xmark me-1"></i>
                        Batal

                    </a>

                    <button type="submit"
                            class="btn btn-primary btn-sm px-3"
                            style="font-size:9px;">

                        <i class="fa-solid fa-check me-1"></i>
                        Simpan Jurusan

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


    <!-- PREVIEW + COUNTER -->
    <script>

        const gambar = document.getElementById('gambar');
        const preview = document.getElementById('preview');

        gambar.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {

                preview.innerHTML = `
                    <img src="${e.target.result}"
                         class="w-100 h-100 object-fit-contain p-2">
                `;

            };

            reader.readAsDataURL(file);

        });


        const deskripsi = document.getElementById('deskripsi');
        const counter = document.getElementById('counter');

        deskripsi.addEventListener('input', function () {

            counter.textContent = this.value.length + ' / 500';

        });

    </script>

</body>
</html>