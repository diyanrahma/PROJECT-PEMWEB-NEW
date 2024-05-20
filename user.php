<?php
if (isset($_POST['email']) && isset($_POST['nama_lengkap']) && isset($_POST['tgl_lahir']) && isset($_POST['no_telp'])) {
    $email = $_POST["email"]; 
    $nama_depan = $_POST["nama_depan"];
    $nama_belakang = $_POST["nama_belakang"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $no_telp = $_POST["no_telp"];

    $servername = "localhost";
    $database = "membership_gym";
    $username = "root";
    $password_db = "";

    $conn = mysqli_connect($servername, $username, $password_db, $database);

    if (!$conn) {
        die("Koneksi Gagal : " . mysqli_connect_error());
    }

    $query_check_email = "SELECT * FROM user WHERE email = '$email'";
    $result_check_email = mysqli_query($conn, $query_check_email);

    if (mysqli_num_rows($result_check_email) > 0) {
        echo "Email sudah terdaftar.";
    } else {
        $query_insert_data = "INSERT INTO user (email, nama_lengkap, tgl_lahir, no_telp) VALUES ('$email', '$nama_lengkap', '$tgl_lahir', '$no_telp')";
        if (mysqli_query($conn, $query_insert_data)) {
            mysqli_close($conn);
            header("Location: userdisplay.php");
            exit();
        } else {
            echo "Error: " . $query_insert_data . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" href="user.css">
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
            <a href="indexnew.php" id="user" class="three"><i class="fa-solid fa-user three" style="font-size: 1.3rem;"></i></a>

            <a href="#" id="translate">ID | EN ></a>
        </div>
    </nav>

    <section class="hero" id="home">
        <main class="content">
            <h1>PROFIL <br><span>SAYA</span></h1>
        </main>
    </section>

    <section class="isii">
        <div class="pertama">
            <h1>ISI IDENTITAS</h1>
        </div>
        <div class="kedua">
            <div>
            <form action="userdisplay.php" method="POST">
                <label for="email" class="atas" style="padding-right: 108px;">Email </label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="nama_depan" class="atas" style="padding-right: 28px;">Nama Lengkap </label>
                <input type="text" id="nama_depan" name="nama_depan" required><br><br>

                <label for="nama_belakang" class="atas" style="padding-right: 28px;">Nama Lengkap </label>
                <input type="text" id="nama_belakang" name="nama_belakang" required><br><br>

                <label for="tgl_lahir" class="atas" style="padding-right: 42px;">Tanggal Lahir </label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" required><br><br>

                <label for="no_telp" class="atas" style="padding-right: 86px;">Telepon </label>
                <input type="text" id="no_telp" name="no_telp" required><br><br>

             <button type="login" class="log">Kirim</button>
             </form>

                <p class="empat">
                    <a href="userdisplay.php" style="color: #241c15;">Logout</a>
                </p>
            </div>
        </div>
    </section>

    <hr style="margin-right: 4rem; margin-left: 4rem; margin-top: 4rem;">

    <footer class="footer">
        <div class="kolomjudul" style="margin-top: 1.2rem;">
            <a href="index.html" class="satu"  style="text-decoration: none;">Membership<span>Gym.</span></a>
            <p>Tune Your Body <br>Transform Your Life!</p>
        </div>
        <div class="isi">
            <div class="kolomsatu">
                <h4>MEMBERSHIP</h4>
                <a href="layanan.html" style="text-decoration: none; color: white;"><p>Layanan</p></a>
                <a href="profil.html" style="text-decoration: none; color: white;"><p>Join Online</p></a>
            </div>
            <div class="kolomdua">
                <h4>FEATURE</h4>
                <a href="galeri.html" style="text-decoration: none; color: white;"><p>Galeri</p></a>
                <a href="lokasi.html" style="text-decoration: none; color: white;"><p>Location</p></a>
            </div>
            <div class="kolomtiga">
                <h4>OUR COMPANY</h4>
                <a href="aboutus.html" style="text-decoration: none; color: white;"><p>About Us</p></a>
                <a href="faq.html" style="text-decoration: none;color: white;"><p>FAQ</p></a>
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