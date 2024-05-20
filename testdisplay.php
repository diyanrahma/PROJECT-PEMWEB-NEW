<?php
// Koneksi ke database
$servername = "localhost";
$database = "membership_gym";
$username = "root";
$password_db = "";

$conn = mysqli_connect($servername, $username, $password_db, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi Gagal : " . mysqli_connect_error());
}

// Query untuk menampilkan data dari member
$query_member = "SELECT nama_depan, nama_belakang, tanggal_lahir, email, telpon, layanan FROM member ORDER BY id_member DESC LIMIT 1";
$result_member = mysqli_query($conn, $query_member);

// Query untuk menampilkan data dari jadwal
$query_jadwal = "SELECT tanggal_latihan, waktu_latihan, trainer FROM jadwal ORDER BY id_jadwal DESC LIMIT 1";
$result_jadwal = mysqli_query($conn, $query_jadwal);

// Ambil nilai-nilai dari member dan jadwal terbaru
if (mysqli_num_rows($result_member) > 0) {
    $row_member = mysqli_fetch_assoc($result_member);
    // Ambil nilai dari local storage untuk form profil
    $nama_depan = $row_member['nama_depan'];
    $nama_belakang = $row_member['nama_belakang'];
    $tanggal_lahir = $row_member['tanggal_lahir'];
    $email = $row_member['email'];
    $telpon = $row_member['telpon'];
    $layanan = $row_member['layanan'];
} else {
    echo "Tidak ada data member yang ditemukan.";
}

if (mysqli_num_rows($result_jadwal) > 0) {
    $row_jadwal = mysqli_fetch_assoc($result_jadwal);
    // Ambil nilai dari local storage untuk form jadwal
    $date = $row_jadwal['tanggal_latihan'];
    $time = $row_jadwal['waktu_latihan'];
    $trainer = $row_jadwal['trainer'];
} else {
    echo "Tidak ada data jadwal yang ditemukan.";
}

// Simpan alamat ke database jika formulir dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kota = $_POST["kota"];
    $provinsi = $_POST["provinsi"];
    $negara = $_POST["negara"];
    $kode_pos = $_POST["kode_pos"];

    // Query untuk mendapatkan ID terakhir dari tabel alamat
    $query_get_last_alamat_id = "SELECT id_alamat FROM alamat ORDER BY id_alamat DESC LIMIT 1";
    $result_alamat = mysqli_query($conn, $query_get_last_alamat_id);

    // Periksa hasil query
    if ($result_alamat && mysqli_num_rows($result_alamat) > 0) {
        $row_alamat = mysqli_fetch_assoc($result_alamat);
        $last_alamat_id = $row_alamat['id_alamat'];

        // Manipulasi string untuk mendapatkan ID berikutnya
        $new_alamat_id = 'A' . sprintf('%d', substr($last_alamat_id, 1) + 1);
    } else {
        // Jika tidak ada ID sebelumnya, mulai dari A1
        $new_alamat_id = 'A1';
    }

    // Query untuk menyimpan data alamat ke database
    $query_sql = "INSERT INTO alamat (id_alamat, kota, provinsi, negara, kode_pos) 
                  VALUES ('$new_alamat_id', '$kota', '$provinsi', '$negara', '$kode_pos')";

    // Eksekusi query penyimpanan alamat
    if (mysqli_query($conn, $query_sql)) {
        // Redirect pengguna ke halaman testdisplay.php setelah berhasil menyimpan alamat
        echo "<script>window.location.href = 'indexnew.php';</script>";
        exit(); // Pastikan untuk keluar dari skrip setelah melakukan pengalihan
    } else {
        echo "Error: " . $query_sql . "<br>" . mysqli_error($conn);
    }
}
?>

// Tutup koneksi database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>

    <link rel="stylesheet" href="testdisplay.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0305f8347c.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar" style="background-color: #241c15;">
        <a href="indexnew.php" class="navbar-logo">Membership<span>Gym.</span></a>
    </nav>

    <!-- Container untuk profil dan form -->
    <div class="container">
        <div class="satuu">
            <!-- Konten untuk menampilkan data form profil -->
            <div class="profil">
                <h1>Profil Data:</h1>
                <p id="displayFirstName"><b>First Name: </b><?php echo $nama_depan; ?></p>
                <p id="displayLastName"><b>Last Name: </b><?php echo $nama_belakang; ?></p>
                <p id="displayDob"><b>Date of Birth: </b><?php echo $tanggal_lahir; ?></p>
                <p id="displayEmail"><b>Email: </b><?php echo $email; ?></p>
                <p id="displayPhone"><b>Phone Number: </b><?php echo $telpon; ?></p>
                <p id="displayService"><b>Service: </b><?php echo $layanan; ?></p>
            </div>

            <!-- Konten untuk menampilkan data form jadwal -->
            <div class="jadwal">
                <h1>Jadwal Data:</h1>
                <p id="displayDate"><b>Date: </b><?php echo $date; ?></p>
                <p id="displayTime"><b>Time: </b><?php echo $time; ?></p>
                <p id="displayTrainer"><b>Trainer: </b><?php echo $trainer; ?></p>
            </div>
        </div>

        <div class="duaa">
            <!-- Form Address -->
            <div class="form">
                <div>
                    <h1>Address</h1>
                </div>
                <div>
                    <form id="myForm" action="testdisplay.php" method="POST">
                        <label for="kota" style="padding-right: 96px;">Kota</label>
                        <input type="text" id="kota" name="kota" required style="width: 72%;"><br><br>
                        <label for="provinsi" style="padding-right: 70px;">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" required style="width: 72%;"><br><br>
                        <label for="negara" style="padding-right: 72px;">Negara</label>
                        <input type="text" id="negara" name="negara" required style="width: 72%;"><br><br>
                        <label for="kode_pos" style="padding-right: 58px;">Kode pos</label>
                        <input type="text" id="kode_pos" name="kode_pos" required style="width: 72%;"><br><br>
                        <button type="submit" class="next" style="border: none;">Continue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr style="margin-right: 4rem; margin-left: 4rem; margin-top: 2rem;">

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