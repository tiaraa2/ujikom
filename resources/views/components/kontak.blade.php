<section id="kontak" class="py-4 bg-white">

    <div class="container" style="max-width:1200px;">

        <!-- JUDUL -->
        <div class="d-flex align-items-center gap-3 mb-2">

            <div class="d-flex align-items-center justify-content-center rounded-3"
                 style="width:42px;height:42px;background:#dce5f0;color:#10376f;">

                <i class="bi bi-telephone" style="font-size:18px;"></i>

            </div>

            <div>

                <h2 class="mb-1"
                    style="font-size:22px;color:#10376f;
                           font-family:'Times New Roman',Times,serif;">
                    Kontak
                </h2>

                <p class="mb-0" style="font-size:14px;color:#9b7d48;">
                    Hubungi kami untuk informasi lebih lanjut
                </p>

            </div>

        </div>

        <hr class="mt-3 mb-4">


        <!-- PESAN BERHASIL -->
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show mb-4">

                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        <!-- ERROR VALIDASI -->
        @if($errors->any())

            <div class="alert alert-danger mb-4">

                @foreach($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        @endif


        <div class="row g-4">


            <!-- ================= KIRI ================= -->

            <div class="col-lg-6">

                <!-- INFORMASI SEKOLAH -->
                <div class="p-3 rounded-4"
                     style="border:1px solid #c9b98e;background:#fff;">

                    <div class="d-flex align-items-center gap-2 mb-3">

                        <i class="bi bi-building"
                           style="font-size:19px;color:#10376f;"></i>

                        <h3 class="mb-0"
                            style="font-size:17px;color:#10376f;
                                   font-family:'Times New Roman',Times,serif;">
                            Informasi Sekolah
                        </h3>

                    </div>


                    <!-- ALAMAT -->
                    <div class="d-flex gap-3 mb-3">

                        <i class="bi bi-geo-alt-fill"
                           style="font-size:17px;color:#10376f;"></i>

                        <p class="mb-0"
                           style="font-size:14px;line-height:1.5;color:#222;">

                            Jalan Raya Tajur, Kampung Buntar, 
                            RT.02/RW.08, Kelurahan Muarasari, 
                            Kecamatan Bogor Selatan, Kota Bogor, 
                            Jawa Barat 16137

                        </p>

                    </div>


                    <!-- TELEPON -->
                    <div class="d-flex gap-3 mb-3">

                        <i class="bi bi-telephone-fill"
                           style="font-size:16px;color:#10376f;"></i>

                        <p class="mb-0"
                           style="font-size:14px;color:#222;">

                            +62 821 226 244

                        </p>

                    </div>


                    <!-- EMAIL -->
                    <div class="d-flex gap-3 mb-3">

                        <i class="bi bi-envelope-fill"
                           style="font-size:16px;color:#10376f;"></i>

                        <p class="mb-0"
                           style="font-size:14px;color:#222;">

                            smkn4@smkn4bogor.sch.id.

                        </p>

                    </div>


                    <!-- JAM -->
                    <div class="d-flex gap-3">

                        <i class="bi bi-clock-fill"
                           style="font-size:16px;color:#10376f;"></i>

                        <p class="mb-0"
                           style="font-size:14px;color:#222;">

                            Senin - Jumat, 07.30 - 17.00 WIB

                        </p>

                    </div>

                </div>


                <!-- GOOGLE MAPS -->
                <div class="mt-3">

                    <div class="overflow-hidden rounded-4"
                         style="height:220px;border:1px solid #c9b98e;">

                        <iframe
                            src="https://www.google.com/maps?q=SMKN%204%20Kota%20Bogor&output=embed"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            loading="lazy">
                        </iframe>

                    </div>

                </div>

            </div>


            <!-- ================= KANAN ================= -->

            <div class="col-lg-6">

                <div class="p-4 rounded-4"
                     style="border:1px solid #c9b98e;">

                    <div class="d-flex align-items-center gap-2 mb-3">

                        <i class="bi bi-envelope-paper-fill"
                           style="font-size:20px;color:#10376f;"></i>

                        <h3 class="mb-0"
                            style="font-size:18px;color:#10376f;
                                   font-family:'Times New Roman',Times,serif;">
                            Kirim Pesan
                        </h3>

                    </div>


                    <p class="mb-4"
                       style="font-size:14px;color:#666;line-height:1.6;">

                        Silakan isi formulir berikut untuk mengirimkan
                        pesan atau pertanyaan kepada pihak sekolah.

                    </p>


                    <!-- FORM -->
                    <form action="{{ route('kontak.store') }}" method="POST">

                        @csrf

                        <div class="row g-3">


                            <!-- NAMA -->
                            <div class="col-md-6">

                                <label class="form-label mb-1"
                                       style="font-size:14px;font-weight:600;">

                                    Nama

                                </label>

                                <input type="text"
                                       name="nama"
                                       class="form-control"
                                       placeholder="Masukkan nama"
                                       value="{{ old('nama') }}"
                                       required>

                            </div>


                            <!-- EMAIL -->
                            <div class="col-md-6">

                                <label class="form-label mb-1"
                                       style="font-size:14px;font-weight:600;">

                                    Email

                                </label>

                                <input type="email"
                                       name="kontak"
                                       class="form-control"
                                       placeholder="Masukkan email"
                                       value="{{ old('kontak') }}"
                                       required>

                            </div>


                            <!-- PESAN -->
                            <div class="col-12">

                                <label class="form-label mb-1"
                                       style="font-size:14px;font-weight:600;">

                                    Pesan

                                </label>

                                <textarea name="pesan"
                                          class="form-control"
                                          rows="6"
                                          placeholder="Tuliskan pesan..."
                                          required>{{ old('pesan') }}</textarea>

                            </div>


                            <!-- BUTTON -->
                            <div class="col-12">

                                <button type="submit"
                                        class="btn text-white px-4"
                                        style="background:#10376f;font-size:14px;">

                                    <i class="bi bi-send-fill me-2"></i>

                                    Kirim Pesan

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>