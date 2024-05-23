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

// Mengambil data dari tabel layanan
$query = "SELECT * FROM layanan";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - Membership Gym</title>
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
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #333;
            color: white;
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
                <a href="tabel_member.php">Data Member</a>
                <a href="tambahadmin.php">Tambah Member</a>
            </div>
        </div>
        <div class="has-submenu">
            <a href="#">Trainer</a>
            <div class="submenu">
                <a href="tabel_trainer.php">Data Trainer</a>
                <a href="admin_data.php?type=trainer&action=add">Tambah Trainer</a>
            </div>
        </div>
        <a href="admin_data.php?type=pembayaran">Konfirmasi Pembayaran</a>
    </div>
</div>

<div class="content">
    <h1>Daftar Layanan</h1>
    <table>
        <thead>
            <tr>
                <th>ID Layanan</th>
                <th>Jenis Layanan</th>
                <th>Jumlah Latihan Maksimal</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id_layanan"] . "</td>";
                    echo "<td>" . $row["jenis_layanan"] . "</td>";
                    echo "<td>" . $row["jml_lat_max"] . "</td>";
                    echo "<td>" . $row["biaya"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data ditemukan</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
// Menutup koneksi
mysqli_close($conn);
?>