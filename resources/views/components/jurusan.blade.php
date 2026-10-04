<section id="jurusan" class="py-4 bg-white">

    <div class="container" style="max-width:1200px;">

        <!-- JUDUL -->
        <div class="d-flex align-items-center gap-3 mb-2">

            <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
                 style="width:42px;height:42px;background:#dce5f0;color:#10376f;">
                <i class="bi bi-mortarboard-fill" style="font-size:18px;"></i>
            </div>

            <div>
                <h2 class="mb-1"
                    style="font-size:22px;
                           color:#10376f;
                           font-family:'Times New Roman',Times,serif;">
                    Jurusan
                </h2>

                <p class="mb-0"
                   style="font-size:14px;color:#9b7d48;">
                    Terdapat {{ $jurusans->count() }} Jurusan di SMKN 4 Kota Bogor.
                </p>
            </div>

        </div>

        <hr class="mt-3 mb-4">


        <!-- JURUSAN -->
        <div class="row g-4 mb-4">

            @forelse($jurusans as $jurusan)

                <div class="col-6 col-lg-3">

                    <div class="text-center">

                        <!-- LOGO -->
                        <div class="mx-auto d-flex align-items-center justify-content-center rounded-3 mb-2"
                             style="width:110px;
                                    height:110px;
                                    border:1px solid #d8c59e;
                                    background:#fff;
                                    overflow:hidden;">

                            @if($jurusan->gambar)

                                <img src="{{ asset('storage/'.$jurusan->gambar) }}"
                                     alt="{{ $jurusan->nama }}"
                                     style="width:100%;
                                            height:100%;
                                            object-fit:contain;
                                            padding:8px;">

                            @else

                                <span style="font-size:12px;color:#999;">
                                    Tidak ada logo
                                </span>

                            @endif

                        </div>

                        <!-- SINGKATAN -->
                        <h3 class="mb-1"
                            style="font-size:22px;color:#123d78;font-weight:600;">
                            {{ $jurusan->singkatan }}
                        </h3>

                        <!-- NAMA -->
                        <p class="mb-0"
                           style="font-size:14px;color:#111;">
                            {{ $jurusan->nama }}
                        </p>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center py-4">
                    <p class="text-secondary mb-0">
                        Belum ada data jurusan.
                    </p>
                </div>

            @endforelse

        </div>


        <!-- DESKRIPSI JURUSAN -->
        <div class="row g-3">

            @forelse($jurusans as $jurusan)

                <div class="col-lg-6">

                    <div class="d-flex align-items-center gap-3 p-2 rounded-3"
                         style="border:1px solid #d8c59e;
                                background:#fff;
                                min-height:75px;">

                        <!-- LOGO KECIL -->
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:50px;
                                    height:50px;
                                    border:1px solid #d8c59e;
                                    border-radius:8px;
                                    overflow:hidden;
                                    background:#fff;">

                            @if($jurusan->gambar)

                                <img src="{{ asset('storage/'.$jurusan->gambar) }}"
                                     alt="{{ $jurusan->nama }}"
                                     style="width:100%;
                                            height:100%;
                                            object-fit:contain;
                                            padding:4px;">

                            @else

                                <span style="font-size:10px;color:#999;">
                                    -
                                </span>

                            @endif

                        </div>


                        <!-- DESKRIPSI -->
                        <div>

                            <h6 class="mb-1 fw-semibold"
                                style="font-size:14px;color:#123d78;">
                                {{ $jurusan->singkatan }}
                            </h6>

                            <p class="mb-0"
                               style="font-size:13px;
                                      line-height:1.5;
                                      color:#111;">
                                {{ $jurusan->deskripsi }}
                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <p class="text-secondary">
                        Belum ada deskripsi jurusan.
                    </p>
                </div>

            @endforelse

        </div>

    </div>

</section>