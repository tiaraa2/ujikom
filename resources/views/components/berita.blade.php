<section id="berita" class="py-4 bg-white">
    <div class="container" style="max-width:1200px;">

        <div class="d-flex align-items-center gap-2">
            <div class="d-flex align-items-center justify-content-center rounded-3"
                 style="width:43px;height:43px;background:#dce5f0;color:#10376f;">
                <i class="fa-solid fa-newspaper"></i>
            </div>

            <div>
                <h2 class="mb-0" style="font-family:Georgia,'Times New Roman',serif;color:#222;font-size:20px;font-weight:400;">
                    Berita
                </h2>
                <p class="mb-0" style="color:#9b7d48;font-size:10px;">
                    Informasi dan berita terbaru sekolah
                </p>
            </div>
        </div>

        <hr class="mt-2 mb-4" style="border-color:#c9b98e;opacity:1;">

        @if($beritas->count())
            @php
                $utama = $beritas->first();
                $tanggal = fn($tgl) => $tgl
                    ? \Carbon\Carbon::parse($tgl)->locale('id')->translatedFormat('d F Y')
                    : '-';
            @endphp

            <div class="row g-3">

                {{-- BERITA UTAMA --}}
                <div class="col-lg-7">
                    <article class="card h-100 border rounded-4 overflow-hidden"
                             style="border-color:#c9b98e !important;">

                        <div style="height:300px;background:#dce3eb;overflow:hidden;">
                            @if($utama->gambar)
                                <img src="{{ asset('storage/'.$utama->gambar) }}"
                                     alt="{{ $utama->judul }}"
                                     class="w-100 h-100"
                                     style="object-fit:cover;">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-secondary">
                                    <i class="fa-regular fa-image fs-1"></i>
                                </div>
                            @endif
                        </div>

                        <div class="card-body p-3">
                            <div class="d-flex align-items-center gap-1 mb-2"
                                 style="font-size:9px;color:#777;">
                                <i class="fa-regular fa-calendar" style="color:#10376f;"></i>
                                {{ $tanggal($utama->tanggal) }}
                            </div>

                            <h3 class="mb-2"
                                style="color:#222;font-size:18px;font-weight:600;line-height:25px;">
                                {{ $utama->judul }}
                            </h3>

                            <p class="mb-3"
                               style="color:#666;font-size:10px;line-height:17px;">
                                {{ \Illuminate\Support\Str::limit(strip_tags($utama->isi),150) }}
                            </p>

                            <a href="{{ route('detail.berita',$utama->id) }}"
                               class="text-decoration-none fw-semibold"
                               style="color:#10376f;font-size:9px;">
                                Selengkapnya
                                <i class="fa-solid fa-arrow-right ms-1" style="font-size:8px;"></i>
                            </a>
                        </div>
                    </article>
                </div>

                {{-- BERITA SAMPING --}}
                <div class="col-lg-5">
                    <div class="d-flex flex-column gap-3">

                        @foreach($beritas->skip(1)->take(3) as $berita)
                            <article class="card border rounded-4 overflow-hidden"
                                     style="min-height:135px;border-color:#c9b98e !important;">

                                <div class="row g-0 h-100">

                                    <div class="col-auto" style="width:165px;">
                                        <div style="height:135px;background:#dce3eb;overflow:hidden;">
                                            @if($berita->gambar)
                                                <img src="{{ asset('storage/'.$berita->gambar) }}"
                                                     alt="{{ $berita->judul }}"
                                                     class="w-100 h-100"
                                                     style="object-fit:cover;">
                                            @else
                                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-secondary">
                                                    <i class="fa-regular fa-image fs-3"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="h-100 p-3 d-flex flex-column justify-content-center">

                                            <div class="d-flex align-items-center gap-1 mb-2"
                                                 style="font-size:9px;color:#777;">
                                                <i class="fa-regular fa-calendar" style="color:#10376f;"></i>
                                                {{ $tanggal($berita->tanggal) }}
                                            </div>

                                            <h3 class="mb-2"
                                                style="color:#222;font-size:12px;font-weight:600;line-height:17px;">
                                                {{ $berita->judul }}
                                            </h3>

                                            <a href="{{ route('detail.berita',$berita->id) }}"
                                               class="text-decoration-none fw-semibold"
                                               style="color:#10376f;font-size:9px;">
                                                Selengkapnya
                                                <i class="fa-solid fa-arrow-right ms-1" style="font-size:8px;"></i>
                                            </a>

                                        </div>
                                    </div>

                                </div>
                            </article>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('berita') }}"
                   class="btn rounded-pill px-4 d-inline-flex align-items-center gap-2"
                   style="height:35px;background:#10376f;color:#fff;font-size:9px;">
                    Lihat Semua Berita
                    <i class="fa-solid fa-arrow-right" style="font-size:8px;"></i>
                </a>
            </div>

        @else
            <div class="text-center py-5 rounded-4"
                 style="border:1px solid #c9b98e;background:#fff;">

                <i class="fa-regular fa-newspaper mb-3"
                   style="color:#10376f;font-size:35px;"></i>

                <h3 class="mb-1" style="color:#222;font-size:16px;">
                    Belum Ada Berita
                </h3>

                <p class="mb-0" style="color:#777;font-size:10px;">
                    Belum ada berita sekolah yang tersedia.
                </p>
            </div>
        @endif

    </div>
</section>