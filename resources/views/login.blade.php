<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SMKN 4 Kota Bogor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<div class="min-vh-100 d-flex align-items-center justify-content-center position-relative"
     style="
        background-image:url('{{ asset('images/lap 4.jpeg') }}');
        background-size:cover;
        background-position:center;
     ">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background:rgba(255,255,255,.25);">
    </div>


    <!-- LOGIN CARD -->
    <div class="card border-0 shadow-lg position-relative"
         style="
            width:100%;
            max-width:400px;
            border-radius:18px;
            background:rgba(255,255,255,.82);
            backdrop-filter:blur(6px);
         ">

        <div class="card-body p-4">

            <!-- LOGO -->
            <div class="text-center mb-2">

                <img src="{{ asset('images/logo k4.jpg') }}"
                     alt="Logo SMKN 4 Kota Bogor"
                     width="65"
                     height="65"
                     class="rounded-circle bg-white p-1">

            </div>


            <!-- JUDUL -->
            <h1 class="text-center fw-bold mb-1"
                style="
                    font-size:23px;
                    color:#16439b;
                ">
                Masuk
            </h1>

            <p class="text-center text-muted mb-4"
               style="font-size:12px;">
                Masukkan akun admin Anda
            </p>


            <!-- PESAN ERROR -->
            @if ($errors->any())

                <div class="alert alert-danger py-2"
                     style="font-size:12px;">

                    <i class="bi bi-exclamation-circle me-1"></i>

                    {{ $errors->first() }}

                </div>

            @endif


            <!-- FORM LOGIN -->
            <form action="{{ route('login.process') }}" method="POST">

                @csrf


                <!-- USERNAME -->
                <div class="mb-3">

                    <label class="form-label fw-semibold mb-1"
                           style="font-size:12px;">
                        Username
                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-person text-secondary"></i>
                        </span>

                        <input type="text"
                               name="username"
                               class="form-control"
                               placeholder="Masukkan username"
                               value="{{ old('username') }}"
                               required>

                    </div>

                </div>


                <!-- PASSWORD -->
                <div class="mb-3">

                    <label class="form-label fw-semibold mb-1"
                           style="font-size:12px;">
                        Password
                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-lock text-secondary"></i>
                        </span>

                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control"
                               placeholder="Masukkan password"
                               required>

                        <button type="button"
                                class="btn btn-light border"
                                onclick="togglePassword()">

                            <i class="bi bi-eye"
                               id="eyeIcon">
                            </i>

                        </button>

                    </div>

                </div>


                <!-- INGAT SAYA -->
                <div class="form-check mb-3">

                    <input class="form-check-input"
                           type="checkbox"
                           name="remember"
                           id="remember">

                    <label class="form-check-label"
                           for="remember"
                           style="font-size:11px;">
                        Ingat Saya
                    </label>

                </div>


                <!-- TOMBOL LOGIN -->
                <button type="submit"
                        class="btn w-100 text-white fw-semibold py-2"
                        style="
                            background:#2947aa;
                            font-size:12px;
                            border-radius:7px;
                        ">

                    Masuk

                    <i class="bi bi-arrow-right ms-2"></i>

                </button>

            </form>


            <!-- KEMBALI -->
            <p class="text-center text-muted mb-0 mt-3"
               style="font-size:10px;">

                Kembali ke

                <a href="{{ route('home') }}"
                   class="text-decoration-none fw-semibold"
                   style="color:#3155a9;">

                    Beranda

                </a>

            </p>

        </div>

    </div>

</div>


<!-- PASSWORD SHOW/HIDE -->
<script>

function togglePassword() {

    const password = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');

    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    } else {

        password.type = 'password';

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }

}

</script>

</body>
</html>