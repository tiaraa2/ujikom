@extends('layouts.app')

@section('content')

@include('components.header')
@include('components.navbar')

<style>
    .foto-check {
        display: none;
    }

    .foto-detail {
        cursor: zoom-in;
        transition: .2s;
    }

    .foto-detail:hover {
        opacity: .92;
    }

    .foto-check:checked ~ .foto-full {
        display: flex;
    }

    .foto-full {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 99999;
        background: rgba(0, 0, 0, .92);
        align-items: center;
        justify-content: center;
        padding: 30px;
    }

    .foto-full img {
        max-width: 95%;
        max-height: 90vh;
        object-fit: contain;
        border-radius: 10px;
    }

    .foto-close {
        position: absolute;
        top: 25px;
        right: 30px;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: white;
        color: #10376f;
        font-size: 24px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 2;
    }

    .foto-close:hover {
        background: #10376f;
        color: white;
    }
</style>


<main class="bg-light py-4">

    <div class="container" style="max-width:850px;">


        {{-- CARD --}}
        <article class="card border-0 shadow-sm rounded-4 overflow-hidden">


            {{-- ================= FOTO ================= --}}

            @if($berita->gambar)

                {{-- CHECKBOX --}}
                <input
                    type="checkbox"
                    id="fotoBerita"
                    class="foto-check"
                >


                {{-- FOTO --}}
                <label for="fotoBerita"
                       class="d-block position-relative"
                       style="height:360px;">

                    <img
                        src="{{ asset('storage/' . $berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                        class="w-100 h-100 foto-detail"
                        style="object-fit:cover;"
                    >

                    {{-- TOMBOL KLIK --}}
                    <span
                        class="position-absolute bottom-0 end-0 m-3
                               bg-dark bg-opacity-75 text-white
                               rounded-pill px-3 py-2 small">

                        <i class="bi bi-zoom-in me-1"></i>
                        Klik foto untuk memperbesar

                    </span>

                </label>


                {{-- FOTO FULLSCREEN --}}
                <div class="foto-full">

                    {{-- TUTUP --}}
                    <label for="fotoBerita"
                           class="foto-close">

                        &times;

                    </label>


                    {{-- GAMBAR BESAR --}}
                    <img
                        src="{{ asset('storage/' . $berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                    >

                </div>

            @else

                <div
                    class="bg-secondary text-white
                           d-flex align-items-center
                           justify-content-center"
                    style="height:360px;">

                    <div class="text-center">

                        <i class="bi bi-image fs-1"></i>

                        <p class="mt-2 mb-0">
                            Tidak ada gambar
                        </p>

                    </div>

                </div>

            @endif


            {{-- ================= ISI BERITA ================= --}}

            <div class="card-body p-4">


                {{-- KATEGORI + TANGGAL --}}
                <div class="d-flex align-items-center gap-3 mb-3">

                    @if($berita->kategori)

                        <span
                            class="badge rounded-pill px-3 py-2"
                            style="background:#10376f;">

                            {{ $berita->kategori }}

                        </span>

                    @endif


                    <span class="text-secondary small">

                        <i class="bi bi-calendar3 me-1"></i>

                        {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                    </span>

                </div>


                {{-- JUDUL --}}
                <h1
                    class="fw-bold mb-3"
                    style="
                        color:#10376f;
                        font-size:32px;
                        line-height:1.25;
                    ">

                    {{ $berita->judul }}

                </h1>


                {{-- GARIS --}}
                <div
                    class="mb-4"
                    style="
                        width:55px;
                        height:4px;
                        background:#9B7D48;
                        border-radius:10px;
                    ">
                </div>


                {{-- ISI --}}
                <div
                    class="text-secondary"
                    style="
                        font-size:16px;
                        line-height:1.8;
                    ">

                    {!! nl2br(e($berita->isi)) !!}

                </div>


                {{-- BOTTOM --}}
                <div class="border-top mt-4 pt-3">

                    <a
                        href="{{ route('berita') }}"
                        class="btn btn-sm text-white rounded-pill px-4"
                        style="background:#10376f;">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </div>

        </article>

    </div>

</main>


@include('components.footer')

@endsection