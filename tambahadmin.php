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

    // Mengambil data dari form
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menyimpan data ke tabel admin
    $query = "INSERT INTO admin (nama_depan, nama_belakang, alamat, telpon, username, password) 
              VALUES ('$nama_depan', '$nama_belakang', '$alamat', '$telpon', '$username', '$password')";

    if (mysqli_query($conn, $query)) {
        echo "<p>Admin baru berhasil ditambahkan.</p>";
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
    <title>Tambah Admin</title>

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
                <a href="tambahadmin.php?type=admin">Tambah Admin</a>
            </div>
        </div>
        <a href="layananadmin.php">Layanan</a>
        <div class="has-submenu">
            <a href="#">Member</a>
            <div class="submenu">
                <a href="admin_data.php?type=member&action=view">Data Member</a>
                <a href="admin_data.php?type=member&action=add">Tambah Member</a>
            </div>
        </div>
        <div class="has-submenu">
            <a href="#">Trainer</a>
            <div class="submenu">
                <a href="admin_data.php?type=trainer&action=view">Data Trainer</a>
                <a href="admin_data.php?type=trainer&action=add">Tambah Trainer</a>
            </div>
        </div>
        <a href="admin_data.php?type=pembayaran">Konfirmasi Pembayaran</a>
    </div>
</div>

<div class="content">
    <div class="form-container">
        <h2>Tambah Admin</h2>
        <form action="tambahadmin.php" method="POST">
            <label for="nama_depan">Nama Depan:</label>
            <input type="text" id="nama_depan" name="nama_depan" required>

            <label for="nama_belakang">Nama Belakang:</label>
            <input type="text" id="nama_belakang" name="nama_belakang" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="telpon">Telpon:</label>
            <input type="text" id="telpon" name="telpon" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Tambah Admin" onclick="window.location.href='tabel_admin.php'">
        </form>
    </div>
</div>
</body>
</html>