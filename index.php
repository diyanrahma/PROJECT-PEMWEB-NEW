<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Gym</title>

    <link rel="stylesheet" href="indexnew.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0305f8347c.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar" style="background-color: #241c15;">

        <a href="index.php" class="navbar-logo">Membership<span>Gym.</span></a>

        <div class="navbar-nav">
            <a href="index.php">HOME</a>
            <a href="layanan.php">LAYANAN</a>
            <a href="galeri.php">GALERI</a>
            <a href="contact.php">CONTACT US</a>
            <a href="login.php" class="satu">JOIN ONLINE ></a>

            <a href="lokasi.php" id="lokasi" class="two"><i class="fa-solid fa-location-dot two" style="font-size: 1.3rem;"></i></a>
            <a href="login.php" id="user" class="three"><i class="fa-regular fa-user three" style="font-size: 1.3rem;"></i></a>

            <a href="#" id="translate">ID | EN ></a>
        </div>
    </nav>

    <section class="hero" id="home">
        <main class="content">
            <h1>WAKE UP. WORK OUT. <br><span>POWER ON.</span></h1>
            <p id="ganti-teks">TUNE YOUR BODY, TRANSFORM YOUR LIFE!</p>
            <a href="login.php" class="cta">SIGN UP NOW ></a>
        </main>
    </section>

    <section class="galeri">
        <div class="outdoor">
            <a href="galerioutdoor.php" style="text-decoration: none; color: #241c15;"><h2>GALERI OUTDOOR ></h2></a>
        </div>
        <div class="indoor">
            <a href="galeriindoor.php" style="text-decoration: none; color: #241c15;"><h2>GALERI INDOOR ></h2></a>
        </div>
        <div class="alat">
            <a href="galerialat.php" style="text-decoration: none; color: #241c15;"><h2>GALERI ALAT ></h2></a>
        </div>
    </section>

    <section class="layanan">
        <div class="pertama">
            <h1>LAYANAN <br><span>KAMI</span></h1>
            <p>Why settle for boring workouts when you can party with us? <br>Have fun while you work it!</p>
            <a href="layanan.php" class="lengkap">SELENGKAPNYA ></a>
        </div>
        <div class="kedua">
            <div class="grey">
                <h2>GREY ></h2>
                <p>Keanggotaan dengan jumlah <br>latihan
                    maksimal <br>4 selama 1 bulan</p>
            </div>
            <div class="black">
                <h2>BLACK ></h2>
                <p>Keanggotaan dengan jumlah <br>latihan
                    maksimal <br>8 selama 1 bulan</p>
            </div>
            <div class="gold">
                <h2>GOLD ></h2>
                <p>Keanggotaan dengan jumlah <br>latihan
                    maksimal <br>12 selama 1 bulan</p>
            </div>
        </div>
    </section>

    <section class="keunggulan">
        <div class="pertama">
            <h1>PENAWARAN <span>KAMI</span></h1>
            <p>Membership Gym, tempat di mana kebugaran dan kesehatan menjadi prioritas utama. Kami bangga menjadi salah satu <br>tujuan utama bagi mereka yang mencari perubahan positif dalam gaya hidup mereka.</p>
        </div>
        <div class="kedua">
            <div class="ft">
                <img src="">
                <h2>Fasilitas Terbaik</h2>
                <p>Dari peralatan kebugaran hingga ruang latihan, kami menyediakan segala yang Anda butuhkan untuk mencapai hasil terbaik</p>
            </div>
            <div class="pp">
                <img src="">
                <h2>Pelatih Profesional</h2>
                <p>Tim pelatih kami terdiri dari para ahli yang berpengalaman untuk membimbing Anda melalui setiap langkah perjalanan kebugaran Anda</p>
            </div>
            <div class="pl">
                <img src="">
                <h2>Program Latihan</h2>
                <p>Kami percaya bahwa setiap individu unik, itulah mengapa kami menawarkan program yang disesuaikan dengan kebutuhan Anda</p>
            </div>
            <div class="km">
                <img src="">
                <h2>Komunitas Mendukung</h2>
                <p>Bergabunglah dengan komunitas kami, di mana Anda dapat mendapatkan dukungan dan motivasi dari sesama anggota.</p>
            </div>
        </div>
    </section>

    <section class="carousel-container" style="margin-bottom: 2rem;">
        <div class="pertama">
            <h1>APA KATA <br><span>PELANGGAN</span></h1>
        </div>
        <div class="carousel-slide">
            <div class="slidee">
                <h2>Johann Hari</h2>
                <p>"Fasilitas gym di sini sungguh luar biasa! <br>Mesinnya modern dan terawat dengan baik, <br>membuat pengalaman berolahraga jadi lebih menyenangkan."</p>
            </div>
            <div class="slidee">
                <h2>James Clear</h2>
                <p>"Saya sangat puas dengan kebersihan dan kenyamanan di gym ini. <br>Stafnya ramah dan membantu, membuat saya <br>merasa di rumah sendiri saat berlatih."</p>
            </div>
            <div class="slidee">
                <h2>Carl Sagan</h2>
                <p>"Fasilitas gym yang lengkap dengan program latihan yang disesuaikan <br>membuat saya merasa semakin termotivasi. Suasana di <br>sini juga sangat mendukung untuk mencapai tujuan kebugaran saya."</p> 
            </div>
        </div>

        <button class="prev-btn" style="margin-left: 38rem;">Prev</button>
        <button class="next-btn">Next</button>
    </section> 

    <hr style="margin-right: 4rem; margin-left: 4rem;">

    <footer class="footer">
        <div class="kolomjudul" style="margin-top: 1.2rem;">
            <a href="index.php" class="satu"  style="text-decoration: none;">Membership<span>Gym.</span></a>
            <p>Tune Your Body <br>Transform Your Life!</p>
        </div>
        <div class="isi">
            <div class="kolomsatu">
                <h4>MEMBERSHIP</h4>
                <a href="layanan.php" style="text-decoration: none; color: white;"><p>Layanan</p></a>
                <a href="profil.php" style="text-decoration: none; color: white;"><p>Join Online</p></a>
            </div>
            <div class="kolomdua">
                <h4>FEATURE</h4>
                <a href="galeri.php" style="text-decoration: none; color: white;"><p>Galeri</p></a>
                <a href="lokasi.php" style="text-decoration: none; color: white;"><p>Location</p></a>
            </div>
            <div class="kolomtiga">
                <h4>OUR COMPANY</h4>
                <a href="aboutus.php" style="text-decoration: none; color: white;"><p>About Us</p></a>
                <a href="faq.php" style="text-decoration: none;color: white;"><p>FAQ</p></a>
            </div>
            <div class="kolomempat">
                <h4>CONTACT US</h4>
                <p>+62 812 4000 4000</p>
                <p>membershipgym@gmail.com</p>
                <a href="login.php" style="text-decoration: none;color: white;"><p>Testimoni</p></a>
            </div>
        </div>
    </footer>

    <hr style="margin-right: 4rem; margin-left: 4rem; margin-top: 4rem;">

    <div class="bawah">
        <p>Created by <a>Kelompok 2 SID</a>. | &copy; 2024. |  Award Winning Fitness Chain in South East Asia. All Rights reserved. <a href="terms.php" style="color: white">Terms & Conditions</a> | <a href="privacy.php" style="color: white;">Privacy Policy</a></p>
    </div>

    <script src="index.js"></script>
</body>
</html>