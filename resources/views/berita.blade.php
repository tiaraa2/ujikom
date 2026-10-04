@extends('layouts.app')

@section('content')

@include('components.header')
@include('components.navbar')

<section class="py-5 bg-light">

    <div class="container" style="max-width:1200px;">

        @if($beritas->count())

            <div class="row g-4">

                @foreach($beritas as $berita)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                            {{-- GAMBAR --}}
                            @if($berita->gambar)

                                <img
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                    alt="{{ $berita->judul }}"
                                    class="w-100"
                                    style="
                                        height:210px;
                                        object-fit:cover;
                                    "
                                >

                            @else

                                <div
                                    class="bg-secondary text-white
                                           d-flex align-items-center
                                           justify-content-center"
                                    style="height:210px;">

                                    <i class="bi bi-image fs-1"></i>

                                </div>

                            @endif


                            {{-- ISI --}}
                            <div class="card-body p-4">

                                {{-- KATEGORI + TANGGAL --}}
                                <div class="d-flex align-items-center gap-2 mb-3">

                                    @if($berita->kategori)

                                        <span
                                            class="badge rounded-pill px-3 py-2"
                                            style="background:#10376f;">

                                            {{ $berita->kategori }}

                                        </span>

                                    @endif

                                    <small class="text-secondary">

                                        <i class="bi bi-calendar3 me-1"></i>

                                        {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                                    </small>

                                </div>


                                {{-- JUDUL BERITA --}}
                                <h5 class="fw-bold mb-3"
                                    style="color:#10376f;">

                                    {{ $berita->judul }}

                                </h5>


                                {{-- DESKRIPSI --}}
                                <p class="text-secondary mb-4">

                                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 110) }}

                                </p>


                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('detail.berita', $berita->id) }}"
                                    class="btn btn-sm rounded-pill px-4 text-white"
                                    style="background:#10376f;">

                                    Baca Selengkapnya

                                    <i class="bi bi-arrow-right ms-1"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-5">

                <i class="bi bi-newspaper text-secondary"
                   style="font-size:50px;"></i>

                <p class="text-secondary mt-3">
                    Belum ada berita
                </p>

            </div>

        @endif

    </div>

</section>

@include('components.footer')

@endsection