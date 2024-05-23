<?php
if (isset($_POST['email']) && isset($_POST['nama_depan']) && isset($_POST['nama_belakang']) && isset($_POST['tgl_lahir']) && isset($_POST['no_telp'])) {
    // Mendapatkan data dari form
    $email = $_POST["email"]; 
    $nama_depan = $_POST["nama_depan"];
    $nama_belakang = $_POST["nama_belakang"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $no_telp = $_POST["no_telp"];

    // Konfigurasi database
    $servername = "localhost";
    $database = "membership_gym";
    $username = "root";
    $password_db = "";

    // Membuat koneksi ke database
    $conn = mysqli_connect($servername, $username, $password_db, $database);

    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi Gagal : " . mysqli_connect_error());
    }

    // Mendapatkan ID user baru
    $query_get_next_id = "SELECT CONCAT('U', LPAD(COALESCE(MAX(SUBSTRING(id_user, 2) + 1), 1), 7, '0')) AS next_id FROM user";
    $result_get_next_id = mysqli_query($conn, $query_get_next_id);
    $row = mysqli_fetch_assoc($result_get_next_id);
    $next_id = $row['next_id'];

    // Membuat query untuk menyimpan data pengguna ke database
    $query_insert_data = "INSERT INTO user (id_user, email, nama_depan, nama_belakang, tgl_lahir, no_telp) 
                          VALUES ('$next_id', '$email', '$nama_depan', '$nama_belakang', '$tgl_lahir', '$no_telp')";

    // Menjalankan query dan memeriksa keberhasilan
    if (mysqli_query($conn, $query_insert_data)) {
        // Menutup koneksi dan mengarahkan pengguna ke halaman userdisplay.php
        mysqli_close($conn);
        header("Location: userdisplay.php");
        exit();
    } else {
        // Menampilkan pesan kesalahan jika query tidak berhasil
        echo "Error: " . $query_insert_data . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <!-- Your CSS links and other meta tags -->
    <link rel="stylesheet" href="user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0305f8347c.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Your navigation bar and other HTML content -->

    <section class="isii">
        <div class="pertama">
            <h1>ISI IDENTITAS</h1>
        </div>
        <div class="kedua">
            <div>
            <form action="user.php" method="POST">
                <!-- Input field for email -->
                <label for="email" class="atas">Email </label>
                <input type="email" id="email" name="email" required><br><br>

                <!-- Input field for first name -->
                <label for="nama_depan" class="atas">Nama Depan </label>
                <input type="text" id="nama_depan" name="nama_depan" required><br><br>

                <!-- Input field for last name -->
                <label for="nama_belakang" class="atas">Nama Belakang </label>
                <input type="text" id="nama_belakang" name="nama_belakang" required><br><br>

                <!-- Input field for date of birth -->
                <label for="tgl_lahir" class="atas">Tanggal Lahir </label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" required><br><br>

                <!-- Input field for phone number -->
                <label for="no_telp" class="atas">Telepon </label>
                <input type="text" id="no_telp" name="no_telp" required><br><br>

                <!-- Submit button -->
                <button type="submit" class="log">Kirim</button>
            </form>

                <!-- Logout link -->
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
                <a href="testimonii.php" style="text-decoration:none;color: white;"><p>Testimoni</p></a>
            </div>
        </div>
    </footer>
    <hr style="margin-right: 4rem; margin-left: 4rem; margin-top: 4rem;">

<div class="bawah">
    <p>Created by <a>Kelompok 2 SID</a>. | &copy; 2024. |  Award Winning Fitness Chain in South East Asia. All Rights reserved. <a href="termss.php" style="color: white">Terms & Conditions</a> | <a href="privacyy.php" style="color: white;">Privacy Policy</a></p>
</div>

<!-- Your JavaScript links and other scripts -->
<script src="index.js"></script>
</body>
</html>
