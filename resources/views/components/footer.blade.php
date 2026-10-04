<!-- ==================================================
     FOOTER
================================================== -->

<footer class="footer">

    <div class="footer-container">

        <!-- BRAND SEKOLAH -->
        <div class="footer-brand">

            <div class="footer-brand-top">

                <img src="{{ asset('images/logo k4.jpg') }}"
                     alt="Logo SMKN 4 Kota Bogor">

                <div>
                    <h3>SMKN 4 KOTA BOGOR</h3>

                    <p>
                        Sekolah Menengah Kejuruan Negeri
                    </p>
                </div>

            </div>

            <p class="footer-description">
                SMKN 4 Kota Bogor berkomitmen mencetak
                generasi yang kompeten, berkarakter,
                kreatif, dan siap menghadapi dunia kerja.
            </p>

            <!-- SOCIAL MEDIA -->
            <div class="footer-social">

                <a href="https://www.instagram.com/smkn4kotabogor/"
                   target="_blank">
                    <i class="bi bi-instagram"></i>
                </a>

                <a href="https://www.facebook.com/p/SMK-NEGERI-4-KOTA-BOGOR-100054636630766/?locale=id_ID"
                   target="_blank">
                    <i class="bi bi-facebook"></i>
                </a>

                <a href="https://www.youtube.com/@smknegeri4bogor905"
                   target="_blank">
                    <i class="bi bi-youtube"></i>
                </a>

            </div>

        </div>


        <!-- MENU -->
        <div class="footer-menu">

            <h3>Menu</h3>

            <div class="footer-line"></div>

            <a href="#beranda">
                <i class="bi bi-chevron-right"></i>
                Beranda
            </a>

            <a href="#profil">
                <i class="bi bi-chevron-right"></i>
                Profil Sekolah
            </a>

            <a href="#jurusan">
                <i class="bi bi-chevron-right"></i>
                Jurusan
            </a>

            <a href="#galeri">
                <i class="bi bi-chevron-right"></i>
                Galeri
            </a>

            <a href="#berita">
                <i class="bi bi-chevron-right"></i>
                Berita
            </a>

            <a href="#kontak">
                <i class="bi bi-chevron-right"></i>
                Kontak
            </a>

        </div>


        <!-- KONTAK -->
        <div class="footer-contact">

            <h3>Informasi Kontak</h3>

            <div class="footer-line"></div>

            <div class="footer-contact-item">

                <i class="bi bi-geo-alt-fill"></i>

                <p>
                    Jalan Raya Tajur, Kampung Buntar RT 02/RW 08,
                    Kelurahan Muarasari, Kecamatan Bogor Selatan,
                    Kota Bogor, Jawa Barat 16137
                </p>

            </div>


            <div class="footer-contact-item">

                <i class="bi bi-telephone-fill"></i>

                <p>
                    +62 821 226 2442
                </p>

            </div>


            <div class="footer-contact-item">

                <i class="bi bi-envelope-fill"></i>

                <p>
                    smkn4@smkn4bogor.sch.id
                </p>

            </div>

        </div>

    </div>


    <!-- BAGIAN BAWAH -->
    <div class="footer-bottom">

        <div class="footer-bottom-container">

            <p>
                © 2026 SMKN 4 Kota Bogor. All Rights Reserved.
            </p>

            <a href="#beranda" class="footer-top">
                <i class="bi bi-arrow-up"></i>
            </a>

        </div>

    </div>

</footer>


<style>

/* ==================================================
   FOOTER
================================================== */

.footer {
    width: 100%;
    margin-top: 50px;
    background: #10376f;
    color: #ffffff;
}


/* ==================================================
   CONTAINER
================================================== */

.footer-container {
    width: 94%;
    max-width: 1200px;
    margin: auto;
    padding: 45px 0;

    display: grid;
    grid-template-columns: 1.5fr .7fr 1.2fr;
    gap: 55px;
}


/* ==================================================
   BRAND
================================================== */

.footer-brand-top {
    display: flex;
    align-items: center;
    gap: 14px;
}

.footer-brand-top img {
    width: 58px;
    height: 58px;
    object-fit: cover;
    border-radius: 50%;
    background: #fff;
    padding: 3px;
}

.footer-brand-top h3 {
    margin: 0 0 3px;
    font-size: 18px;
    font-weight: 600;
}

.footer-brand-top p {
    margin: 0;
    font-size: 12px;
    color: #d8e4f2;
}


/* ==================================================
   DESCRIPTION
================================================== */

.footer-description {
    margin: 18px 0;
    max-width: 390px;
    font-size: 13px;
    line-height: 1.7;
    color: #d8e4f2;
}


/* ==================================================
   SOCIAL
================================================== */

.footer-social {
    display: flex;
    gap: 8px;
}

.footer-social a {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(255,255,255,.14);
    color: #ffffff;

    text-decoration: none;

    font-size: 14px;

    transition: .2s;
}

.footer-social a:hover {
    background: #ffffff;
    color: #10376f;
    transform: translateY(-2px);
}


/* ==================================================
   MENU & KONTAK
================================================== */

.footer-menu h3,
.footer-contact h3 {
    margin: 0;
    font-size: 17px;
    font-family: "Times New Roman", Times, serif;
}

.footer-line {
    width: 35px;
    height: 2px;
    margin: 8px 0 17px;
    background: #c9b98e;
}


/* ==================================================
   MENU
================================================== */

.footer-menu a {
    display: block;
    margin-bottom: 10px;

    color: #d8e4f2;
    text-decoration: none;

    font-size: 13px;

    transition: .2s;
}

.footer-menu a i {
    margin-right: 5px;
    font-size: 9px;
}

.footer-menu a:hover {
    color: #ffffff;
    padding-left: 3px;
}


/* ==================================================
   KONTAK
================================================== */

.footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    margin-bottom: 14px;
}

.footer-contact-item i {
    color: #ffffff;
    font-size: 14px;
    margin-top: 2px;
    flex-shrink: 0;
}

.footer-contact-item p {
    margin: 0;
    color: #d8e4f2;
    font-size: 13px;
    line-height: 1.6;
}


/* ==================================================
   FOOTER BOTTOM
================================================== */

.footer-bottom {
    border-top: 1px solid rgba(255,255,255,.15);
}

.footer-bottom-container {
    width: 94%;
    max-width: 1200px;
    min-height: 58px;
    margin: auto;

    display: flex;
    align-items: center;
    justify-content: space-between;
}

.footer-bottom p {
    margin: 0;
    color: #d8e4f2;
    font-size: 12px;
}


/* ==================================================
   BACK TO TOP
================================================== */

.footer-top {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #ffffff;
    color: #10376f;

    text-decoration: none;

    font-size: 14px;

    transition: .2s;
}

.footer-top:hover {
    transform: translateY(-3px);
}


/* ==================================================
   TABLET
================================================== */

@media (max-width: 900px) {

    .footer-container {
        grid-template-columns: 1fr 1fr;
        gap: 35px;
    }

    .footer-brand {
        grid-column: 1 / -1;
    }

}


/* ==================================================
   HP
================================================== */

@media (max-width: 600px) {

    .footer-container {
        width: 90%;
        padding: 35px 0;

        grid-template-columns: 1fr;
        gap: 30px;
    }

    .footer-brand {
        grid-column: auto;
    }

    .footer-brand-top img {
        width: 52px;
        height: 52px;
    }

    .footer-brand-top h3 {
        font-size: 16px;
    }

    .footer-description {
        font-size: 12px;
    }

    .footer-bottom-container {
        width: 90%;
        padding: 12px 0;
    }

    .footer-bottom p {
        font-size: 10px;
    }

}

</style>