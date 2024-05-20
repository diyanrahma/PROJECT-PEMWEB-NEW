<?php
if(isset($_POST['email'])){
    $email = $_POST["email"];
    $testimonial = $_POST["testimonial"];
    $tgl_post = date('Y-m-d H:i:s');

    $servername = "localhost";
    $database = "membership_gym";
    $username = "root";
    $password_db = "";

    $conn = mysqli_connect($servername, $username, $password_db, $database);

    if (!$conn) {
        die("Koneksi Gagal : " . mysqli_connect_error());
    }

    // Periksa apakah email pengguna sudah terdaftar sebagai member
    $query_check_member = "SELECT * FROM member WHERE email='$email'";
    $result_check_member = mysqli_query($conn, $query_check_member);
    if (mysqli_num_rows($result_check_member) > 0) {
        // Jika email sudah terdaftar sebagai member, simpan data ke tabel hubungi_kami
        $query_sql = "INSERT INTO testimonial (email, testimonial, tgl_post) 
                      VALUES ('$email', '$testimonial', '$tgl_post')";
        if(mysqli_query($conn, $query_sql)) {
            echo "<script>window.location.href = 'testimonii.php';</script>";
            exit(); // Pastikan untuk keluar dari skrip setelah pengalihan
        } else {
            echo "Error: " . $query_sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Email tidak terdaftar sebagai member.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni</title>

    <link rel="stylesheet" href="testimoni.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0305f8347c.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar" style="background-color: #241c15;">

        <a href="indexnew.php" class="navbar-logo">Membership<span>Gym.</span></a>

        <div class="navbar-nav">
            <a href="indexnew.php">HOME</a>
            <a href="layanann.php">LAYANAN</a>
            <a href="galerii.php">GALERI</a>
            <a href="contactt.php">CONTACT US</a>
            <a href="profil.php" class="satu">JOIN ONLINE ></a>

            <a href="lokasii.php" id="lokasi" class="two"><i class="fa-solid fa-location-dot two" style="font-size: 1.3rem;"></i></a>
            <a href="user.php" id="user" class="three"><i class="fa-solid fa-user three" style="font-size: 1.3rem;"></i></a>

            <a href="#" id="translate">ID | EN ></a>
        </div>
    </nav>

    <section class="hero" id="home">
        <main class="content">
            <h1>HIT US UP. GET <br><span>IN TOUCH.</span></h1>
            <p id="ganti-teks">GOT QUESTIONS? WANT TO SHARE YOUR FEEDBACK? TALK TO US!</p>
        </main>
    </section>

    <section class="isii">
        <div class="pertama">
            <h1>GOT QUESTIONS?</h1>
            <p>Want to share feedback or testimonials? talk to us!</p>
        </div>
        <div class="kedua">
            <div>
            <form action="testimonii.php" method="POST">
                    <label for="email" class="atas" style="padding-right: 109px;">Email</label>
                    <input type="text" id="email" name="email" required><br><br>

                    <label for="testimonial" class="atas" style="padding-right: 74px;">Testimoni</label>
                    <input type="text" id="testimonial" name="testimonial" required><br><br>

                    <button type="login" class="log">Kirim</button>
            </div>
        </div>
    </section>

    <hr style="margin-right: 4rem; margin-left: 4rem;">

    <footer class="footer">
        <div class="kolomjudul" style="margin-top: 1.2rem;">
            <a href="indexnew.php" class="satu"  style="text-decoration: none;">Membership<span>Gym.</span></a>
            <p>Tune Your Body <br>Transform Your Life!</p>
        </div>
        <div class="isi">
            <div class="kolomsatu">
                <h4>MEMBERSHIP</h4>
                <a href="layanann.php" style="text-decoration: none; color: white;"><p>Layanan</p></a>
                <a href="profil.php" style="text-decoration: none; color: white;"><p>Join Online</p></a>
            </div>
            <div class="kolomdua">
                <h4>FEATURE</h4>
                <a href="galerii.php" style="text-decoration: none; color: white;"><p>Galeri</p></a>
                <a href="lokasii.php" style="text-decoration: none; color: white;"><p>Location</p></a>
            </div>
            <div class="kolomtiga">
                <h4>OUR COMPANY</h4>
                <a href="aboutuss.php" style="text-decoration: none; color: white;"><p>About Us</p></a>
                <a href="faqq.php" style="text-decoration: none;color: white;"><p>FAQ</p></a>
            </div>
            <div class="kolomempat">
                <h4>CONTACT US</h4>
                <p>+62 812 4000 4000</p>
                <p>membershipgym@gmail.com</p>
                <a href="testimonii.php" style="text-decoration: none;color: white;"><p>Testimoni</p></a>
            </div>
        </div>
    </footer>

    <hr style="margin-right: 4rem; margin-left: 4rem; margin-top: 4rem;">

    <div class="bawah">
        <p>Created by <a>Kelompok 2 SID</a>. | &copy; 2024. |  Award Winning Fitness Chain in South East Asia. All Rights reserved. <a href="termss.php" style="color: white">Terms & Conditions</a> | <a href="privacyy.php" style="color: white;">Privacy Policy</a></p>
    </div>

    <script src="index.js"></script>
</body>
</html>