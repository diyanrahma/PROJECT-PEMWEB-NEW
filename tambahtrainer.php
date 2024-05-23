<?php
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

// Mencari ID trainer terakhir
$queryLastId = "SELECT id_trainer FROM trainer ORDER BY id_trainer DESC LIMIT 1";
$resultLastId = mysqli_query($conn, $queryLastId);
if ($resultLastId && mysqli_num_rows($resultLastId) > 0) {
    $lastId = mysqli_fetch_assoc($resultLastId)['id_trainer'];
    // Mengambil angka dari ID terakhir
    $lastIdNumber = intval(substr($lastId, 3));
    // Membuat ID baru dengan menambahkan 1 ke angka terakhir
    $newIdNumber = $lastIdNumber + 1;
    // Mengonversi ID baru ke format yang diinginkan (misal: TRN0000006)
    $newId = "TRN" . str_pad($newIdNumber, 7, "0", STR_PAD_LEFT);
} else {
    // Jika tidak ada data trainer, ID pertama adalah TRN0000001
    $newId = "TRN0000001";
}

// Menyimpan data ke database jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];

    $query_insert = "INSERT INTO trainer (id_trainer, nama, alamat, tgl_lahir, jenis_kelamin, no_telp) VALUES ('$newId', '$nama', '$alamat', '$tgl_lahir', '$jenis_kelamin', '$no_telp')";
    $result_insert = mysqli_query($conn, $query_insert);

    if ($result_insert) {
        echo "<script>alert('Data trainer berhasil disimpan');</script>";
        // Redirect atau refresh halaman jika ingin kembali ke halaman sebelumnya
        // header("Location: tabel_trainer.php");
    } else {
        echo "<script>alert('Gagal menyimpan data trainer');</script>";
        echo "Error: " . $query_insert . "<br>" . mysqli_error($conn);
    }
}

// Menutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Trainer</title>

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
        <a href="admin_data.php?type=pembayaran">Konfirmasi Pembayaran</a>
    </div>
</div>

<div class="content">
    <div class="form-container">
        <h2>Tambah Trainer</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" id="tgl_lahir" name="tgl_lahir" required>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki - laki">Laki - laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label for="no_telp">Nomor Telepon:</label>
            <input type="text" id="no_telp" name="no_telp" required>
            <input type="submit" value="Simpan">
        </form>
    </div>
</div>
</body>
</html>