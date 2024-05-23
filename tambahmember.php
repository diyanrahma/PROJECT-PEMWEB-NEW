<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Koneksi ke database
    $servername = "localhost";
    $database = "membership_gym";
    $db_username = "root";
    $db_password = "";

    $conn = mysqli_connect($servername, $db_username, $db_password, $database);

    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Mendapatkan ID user baru
    $query_get_next_id = "SELECT CONCAT('U', LPAD(COALESCE(MAX(SUBSTRING(id_user, 2) + 1), 1), 7, '0')) AS next_id FROM user";
    $result_get_next_id = mysqli_query($conn, $query_get_next_id);
    $row = mysqli_fetch_assoc($result_get_next_id);
    $next_id = $row['next_id'];

    // Mengambil data dari form
    $email = $_POST['email'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_telp = $_POST['no_telp'];

    // Menyimpan data ke tabel member
    $query = "INSERT INTO user (id_user, email, nama_depan, nama_belakang, tgl_lahir, no_telp) 
              VALUES ('$next_id', '$email', '$nama_depan', '$nama_belakang', '$tgl_lahir', '$no_telp')";

    if (mysqli_query($conn, $query)) {
        echo "<p>Member baru berhasil ditambahkan.</p>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Menutup koneksi
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #241c15;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #241c15;
            display: flex;
            flex-direction: column;
            padding: 1rem;
            position: fixed;
        }
        .sidebar-logo {
            color: #fff;
            text-decoration: none;
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        .sidebar-logo span {
            color: #e0ac1c;
        }
        .sidebar-links {
            display: flex;
            flex-direction: column;
        }
        .sidebar-links a {
            color: #fff;
            text-decoration: none;
            margin: 1rem 0;
            font-size: 1rem;
            display: flex;
            align-items: center;
        }
        .sidebar-links a:hover {
            color: #e0ac1c;
        }
        .sidebar-links .submenu {
            display: none;
            flex-direction: column;
            margin-left: 1rem;
        }
        .sidebar-links .submenu a {
            margin: 0.5rem 0;
        }
        .sidebar-links .has-submenu:hover .submenu {
            display: flex;
        }
        .content {
            margin-left: 250px;
            padding: 2rem;
            flex-grow: 1;
        }
        .form-container {
            background-color: #333;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            margin: auto;
        }
        .form-container h2 {
            margin-bottom: 1rem;
            color: #e0ac1c;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container label {
            margin-bottom: 0.5rem;
            color: #ffffff;
        }
        .form-container input {
            margin-bottom: 1rem;
            padding: 0.5rem;
            border: none;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            background-color: #e0ac1c;
            color: #000;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container input[type="submit"]:hover {
            background-color: #c79717;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <a href="#" class="sidebar-logo">Membership<span>Gym.</span></a>
    <div class="sidebar-links">
        <div class="has-submenu">
            <a href="admin.php">Admin</a>
            <div class="submenu">
                <a href="tabel_admin.php">Data Admin</a>
                <a href="tambahadmin.php">Tambah Admin</a>
            </div>
        </div>
        <a href="layananadmin.php">Layanan</a>
        <div class="has-submenu">
            <a href="#">User</a>
            <div class="submenu">
                <a href="tabel_member.php">Data User</a>
                <a href="tambahmember.php">Tambah User</a>
            </div>
        </div>
        <div class="has-submenu">
            <a href="#">Trainer</a>
            <div class="submenu">
                <a href="tabel_trainer.php">Data Trainer</a>
                <a href="tambahtrainer.php">Tambah Trainer</a>
            </div>
        </div>
        <a href="konfirmasi_pembayaran.php">Konfirmasi Pembayaran</a>
    </div>
</div>

<div class="content">
    <div class="form-container">
        <h2>Tambah User</h2>
        <form action="tambahmember.php" method="POST">
            <label for="email">Nama Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="nama_depan">Nama Depan:</label>
            <input type="text" id="nama_depan" name="nama_depan" required>

            <label for="nama_belakang">Nama Belakang:</label>
            <input type="text" id="nama_belakang" name="nama_belakang" required>

            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" id="tgl_lahir" name="tgl_lahir" required>

            <label for="no_telp">Telpon:</label>
            <input type="text" id="no_telp" name="no_telp" required>
            
            <input type="submit" value="Tambah Member">
        </form>
    </div>
</div>
</body>
</html>