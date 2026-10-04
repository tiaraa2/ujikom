<style>
    .biru {
        color: #10376F !important;
    }

    .bg-biru {
        background: #10376F !important;
    }

    .emas {
        color: #9B7D48 !important;
    }

    .border-emas {
        border-color: #9B7D48 !important;
    }

    .icon-box {
        width: 42px;
        height: 42px;
        background: #dce5f0;
        color: #10376F;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .icon-box i {
        font-size: 18px;
    }
</style>


<section id="profil" class="py-4 bg-white">

    <div class="container" style="max-width:1200px">


        {{-- ================= JUDUL ================= --}}
        <div class="d-flex align-items-center gap-2">

            <div class="icon-box rounded-2">
                <i class="bi bi-building"></i>
            </div>

            <div>
                <h2 class="mb-0 biru"
                    style="font-size:22px;color:#10376f;font-family:'Times New Roman', Times, serif;">
                    Profil Sekolah
                </h2>

                <small class="emas"
                       style="font-size:14px;">
                    Mengenal SMKN 4 Kota Bogor
                </small>
            </div>

        </div>

        <div class="border-bottom mt-2 mb-3"
             style="border-color:#9B7D48 !important;">
        </div>


        {{-- ================= STATISTIK ================= --}}
        <div class="row g-3 mb-3">

            @php
                $stats = [
                    ['bi-mortarboard-fill', $profil->jumlah_siswa ?? '1.296', 'Siswa/i'],
                    ['bi-person-workspace', $profil->jumlah_guru_staf ?? '105', 'Guru & Staf'],
                    ['bi-building-fill', $profil->jumlah_jurusan ?? '4', 'Jurusan'],
                    ['bi-calendar-event-fill', $profil->tahun_berdiri ?? '2009', 'Tahun Berdiri']
                ];
            @endphp

            @foreach($stats as $stat)

                <div class="col-6 col-lg-3">

                    <div class="d-flex align-items-center gap-3
                                p-3 border rounded-3 h-100">

                        <div class="icon-box rounded-3">
                            <i class="bi {{ $stat[0] }}"></i>
                        </div>

                        <div>

                            <strong class="d-block biru"
                                    style="font-size:22px;">
                                {{ $stat[1] }}
                            </strong>

                            <small class="text-secondary"
                                   style="font-size:14px;">
                                {{ $stat[2] }}
                            </small>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- ================= TENTANG + MOTTO ================= --}}
        <div class="row g-3 mb-3">

            {{-- TENTANG --}}
            <div class="col-lg-7">

                <div class="border border-emas rounded-4 p-4 h-100">

                    <small class="emas fw-semibold"
                           style="font-size:14px;">
                        TENTANG SEKOLAH
                    </small>

                    <h2 class="mt-1 mb-2 biru"
                        style="font-size:22px;">
                        SMKN 4 Kota Bogor
                    </h2>

                    <p class="text-secondary lh-base mb-0"
                       style="font-size:14px;">

                        {{ $profil->tentang_sekolah ??
                        'SMKN 4 Bogor (sering dikenal oleh siswanya dengan julukan Kr4bat atau Nebrazka) adalah sekolah menengah kejuruan negeri yang berfokus pada program keahlian Teknologi & Rekayasa serta Teknologi Informasi & Komunikasi. Sekolah ini memiliki Akreditasi A.' }}

                    </p>

                </div>

            </div>


            {{-- MOTTO --}}
            <div class="col-lg-5">

                <div class="bg-biru text-white rounded-4 p-4 h-100
                            d-flex flex-column justify-content-center
                            align-items-center text-center">

                    <i class="bi bi-quote fs-2"></i>

                    <small style="font-size:14px;">
                        MOTTO SEKOLAH
                    </small>

                    <h3 class="mt-2 mb-0"
                        style="font:22px/1.5 Georgia;">

                        "{{ $profil->motto ??
                        'Akhlak Terpuji, Ilmu Terkaji, Terampil dan Teruji' }}"

                    </h3>

                </div>

            </div>

        </div>


        {{-- ================= VISI & MISI ================= --}}
        <div class="row g-3 mb-3">

            {{-- VISI --}}
            <div class="col-lg-6">

                <div class="border border-emas rounded-4 p-4 h-100">

                    <div class="d-flex align-items-center gap-3 mb-2">

                        <div class="icon-box rounded-3">
                            <i class="bi bi-eye-fill"></i>
                        </div>

                        <div>

                            <small class="emas"
                                   style="font-size:14px;">
                                ARAH SEKOLAH
                            </small>

                            <h2 class="mb-0 biru"
                                style="font-size:22px;">
                                Visi
                            </h2>

                        </div>

                    </div>

                    <p class="text-secondary lh-base mb-0"
                       style="font-size:14px;">

                        {{ $profil->visi ??
                        'mewujudkan generasi unggul, berkarakter, dan kompeten di bidang teknologi dan kejuruan yang siap kerja, santun, mandiri, dan kreatif' }}

                    </p>

                </div>

            </div>


            {{-- MISI --}}
            <div class="col-lg-6">

                <div class="border border-emas rounded-4 p-4 h-100">

                    <div class="d-flex align-items-center gap-3 mb-2">

                        <div class="icon-box rounded-3">
                            <i class="bi bi-bullseye"></i>
                        </div>

                        <div>

                            <small class="emas"
                                   style="font-size:14px;">
                                TUJUAN SEKOLAH
                            </small>

                            <h2 class="mb-0 biru"
                                style="font-size:22px;">
                                Misi
                            </h2>

                        </div>

                    </div>


                    @php
                        $misi = [
                            'Menyiapkan lulusan yang siap kerja, santun, mandiri, dan kreatif.',
                            'Mengembangkan kompetensi peserta didik di bidang teknologi dan kejuruan.',
                            'Membentuk karakter peserta didik yang berakhlak mulia dan berbudaya kerja.'
                        ];
                    @endphp


                    <div class="d-flex flex-column gap-2">

                        @foreach($misi as $i => $item)

                            <div class="d-flex align-items-start gap-2">

                                <span class="bg-biru text-white rounded-circle
                                             d-flex align-items-center
                                             justify-content-center
                                             flex-shrink-0"
                                      style="width:28px;height:28px;font-size:14px;">

                                    {{ $i + 1 }}

                                </span>

                                <p class="text-secondary lh-base mb-0"
                                   style="font-size:14px;">

                                    {{ $item }}

                                </p>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>


        {{-- ================= SEJARAH ================= --}}
        <div class="border border-emas rounded-4 p-3">

            <div class="mb-3">

                <small class="emas fw-semibold"
                       style="font-size:14px;">
                    PERJALANAN SEKOLAH
                </small>

                <h2 class="mt-1 mb-0 biru"
                    style="font-size:22px;">
                    Sejarah SMKN 4 Kota Bogor
                </h2>

            </div>


            <div class="row g-3 align-items-center">

                {{-- TAHUN --}}
                <div class="col-md-2">

                    <div class="bg-biru text-white rounded-3
                                d-flex align-items-center
                                justify-content-center"
                         style="min-height:90px;">

                        <span style="font:22px Georgia;">
                            {{ $profil->tahun_berdiri ?? '2009' }}
                        </span>

                    </div>

                </div>


                {{-- ISI SEJARAH --}}
                <div class="col-md-10">

                    <p class="text-secondary lh-base mb-2"
                       style="font-size:14px;">

                        {{ $profil->sejarah ??
                        'SMK Negeri 4 Kota Bogor dirintis tahun 2008 dan resmi beroperasi pada 2009. Sekolah ini berlokasi di Kelurahan Muarasari, Bogor Selatan. Fokus utamanya adalah pendidikan kejuruan bidang Teknologi Informasi dan Rekayasa yang bekerja sama dengan dunia industri.' }}

                    </p>

                    <p class="text-secondary lh-base mb-0"
                       style="font-size:14px;">

                        Hingga saat ini, SMKN 4 Kota Bogor terus
                        berkomitmen menjadi sekolah yang mampu
                        menghasilkan lulusan berkualitas dan siap
                        menghadapi perkembangan dunia kerja.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>