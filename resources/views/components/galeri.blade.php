<section id="galeri" class="py-4 bg-white">

    <div class="container" style="max-width:1200px;">

        <!-- JUDUL -->
        <div class="d-flex align-items-center gap-3 mb-2">

            <div class="d-flex align-items-center justify-content-center rounded-3"
                 style="width:42px;height:42px;background:#dce5f0;color:#10376f;">

                <i class="bi bi-images" style="font-size:18px;"></i>

            </div>

            <div>

                <h2 class="mb-1"
                    style="font-size:22px;color:#10376f;
                           font-family:'Times New Roman',Times,serif;">
                    Galeri
                </h2>

                <p class="mb-0"
                   style="font-size:14px;color:#9b7d48;">
                    Dokumentasi Sekolah
                </p>

            </div>

        </div>

        <hr class="mt-3 mb-4">


        <!-- FILTER -->
        <div class="d-flex align-items-center justify-content-start gap-2 mb-4 flex-wrap">

            <button type="button"
                    class="btn btn-sm rounded-pill px-4 filter-btn active"
                    data-filter="semua">
                Semua
            </button>

            <button type="button"
                    class="btn btn-sm rounded-pill px-4 filter-btn"
                    data-filter="upacara">
                Upacara
            </button>

            <button type="button"
                    class="btn btn-sm rounded-pill px-4 filter-btn"
                    data-filter="kegiatan">
                Kegiatan
            </button>

            <button type="button"
                    class="btn btn-sm rounded-pill px-4 filter-btn"
                    data-filter="prestasi">
                Prestasi
            </button>

        </div>


        <!-- GALERI -->
        <div class="row g-4">

            @forelse($galeris as $galeri)

                <!-- 4 CARD SEJAJAR -->
                <div class="col-12 col-sm-6 col-lg-3 galeri-card"
                     data-category="{{ strtolower($galeri->kategori) }}">

                    <div class="gallery-box h-100">

                        <!-- FOTO -->
                        <div class="gallery-image">

                            @if($galeri->gambar)

                                <img src="{{ asset('storage/' . $galeri->gambar) }}"
                                     alt="{{ $galeri->judul }}">

                            @else

                                <div class="no-image">
                                    <i class="bi bi-image"></i>
                                </div>

                            @endif

                        </div>


                        <!-- INFORMASI -->
                        <div class="gallery-info">

                            <h5>
                                {{ $galeri->judul }}
                            </h5>

                            @if($galeri->tanggal)

                                <p>
                                    <i class="bi bi-calendar3"></i>

                                    {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}

                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="text-center py-5">

                        <i class="bi bi-images text-secondary"
                           style="font-size:45px;"></i>

                        <p class="text-secondary mt-3 mb-0">
                            Belum ada foto di galeri.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- FILTER GALERI -->
<script>

document.addEventListener('DOMContentLoaded', function () {

    const buttons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.galeri-card');

    buttons.forEach(function (button) {

        button.addEventListener('click', function () {

            const filter = this.getAttribute('data-filter');

            buttons.forEach(function (btn) {
                btn.classList.remove('active');
            });

            this.classList.add('active');

            cards.forEach(function (card) {

                const category = card.getAttribute('data-category');

                if (filter === 'semua' || category === filter) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }

            });

        });

    });

});

</script>


<style>

/* FILTER */

.filter-btn {
    border: 1px solid #d0d0d0;
    color: #666;
    background: #fff;
    transition: .2s;
}

.filter-btn:hover,
.filter-btn.active {
    background: #10376f;
    border-color: #10376f;
    color: #fff;
}


/* CARD */

.gallery-box {
    padding: 7px;

    border: 1px solid #c9b98e;
    border-radius: 15px;

    background: linear-gradient(
        to bottom,
        #ffffff 0%,
        #ffffff 35%,
        #dbe2ec 65%,
        #66809f 100%
    );

    transition: .25s;
}

.gallery-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(16,55,111,.15);
}


/* FOTO */

.gallery-image {
    width: 100%;
    height: 160px;

    overflow: hidden;

    border-radius: 10px;

    background: #e9edf2;
}

.gallery-image img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;
    object-position: center;

    transition: .3s ease;
}

.gallery-box:hover .gallery-image img {
    transform: scale(1.04);
}


/* TIDAK ADA FOTO */

.no-image {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #aaa;
    font-size: 30px;
}


/* INFORMASI */

.gallery-info {
    padding: 9px 4px 4px;

    min-height: 72px;
}

.gallery-info h5 {
    margin: 0 0 6px;

    min-height: 39px;

    font-size: 13px;
    font-weight: 600;

    line-height: 1.4;

    color: #fff;
}

.gallery-info p {
    margin: 0;

    font-size: 10px;

    color: #17324d;
}

.gallery-info p i {
    margin-right: 4px;
    color: #17324d;
}

</style>