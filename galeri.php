<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>

    <link rel="stylesheet" href="galeri.css">
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
        <div class="galeri">
            <div class="outdoor">
                <a href="galerioutdoor.php" style="text-decoration: none; color: #241c15;"><h2>GALERI OUTDOOR ></h2></a>
            </div>
            <div class="indoor">
                <a href="galeriindoor.php" style="text-decoration: none; color: #241c15;"><h2>GALERI INDOOR ></h2></a>
            </div>
            <div class="alat">
                <a href="galerialat.php" style="text-decoration: none; color: #241c15;"><h2>GALERI ALAT ></h2></a>
            </div>
        </div>
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