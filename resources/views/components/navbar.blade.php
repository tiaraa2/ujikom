<nav class="navbar navbar-expand-lg bg-white shadow-sm py-2 sticky-top">

    <div class="container">

        {{-- Tombol Mobile --}}
        <button class="navbar-toggler ms-auto border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto gap-lg-2">

                {{-- BERANDA --}}
                <li class="nav-item">
                    <a class="nav-link active px-3"
                       href="{{ route('home') }}#beranda">
                        Beranda
                    </a>
                </li>


                {{-- PROFIL --}}
                <li class="nav-item">
                    <a class="nav-link px-3"
                       href="{{ route('home') }}#profil">
                        Profil
                    </a>
                </li>


                {{-- JURUSAN --}}
                <li class="nav-item">
                    <a class="nav-link px-3"
                       href="{{ route('home') }}#jurusan">
                        Jurusan
                    </a>
                </li>


                {{-- GALERI --}}
                <li class="nav-item">
                    <a class="nav-link px-3"
                       href="{{ route('home') }}#galeri">
                        Galeri
                    </a>
                </li>


                {{-- BERITA --}}
                <li class="nav-item">
                    <a class="nav-link px-3"
                       href="{{ route('home') }}#berita">
                        Berita
                    </a>
                </li>


                {{-- KONTAK --}}
                <li class="nav-item">
                    <a class="nav-link px-3"
                       href="{{ route('home') }}#kontak">
                        Kontak
                    </a>
                </li>

            </ul>


            {{-- LOGIN --}}
            <a href="{{ url('/login') }}"
               class="btn rounded-pill px-4 fw-semibold text-white login-btn">

                Login

            </a>

        </div>

    </div>

</nav>


<style>

.nav-link {
    color:#333;
    font-size:14px;
    font-weight:500;
    transition:.2s;
}

.nav-link:hover,
.nav-link.active {
    color:#10376f;
}

.nav-link.active {
    font-weight:600;
}

.login-btn {
    background:#10376f;
    font-size:14px;
    transition:.2s;
}

.login-btn:hover {
    background:#0b2d5c;
    color:#fff;
    transform:translateY(-1px);
}

</style>