<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
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
            overflow-x: auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            min-width: 150px;
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
        <h1>Data Admin</h1>
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

        $query = "SELECT nama_depan, nama_belakang, alamat, telpon, username, password FROM admin";
        $result = mysqli_query($conn, $query);

        // Mengecek apakah query berhasil dijalankan
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // Menampilkan data dalam tabel
                echo "<table>";
                echo "<tr><th>Nama Depan</th><th>Nama Belakang</th><th>Alamat</th><th>Telpon</th><th>Username</th><th>Password</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["nama_depan"] . "</td>";
                    echo "<td>" . $row["nama_belakang"] . "</td>";
                    echo "<td>" . $row["alamat"] . "</td>";
                    echo "<td>" . $row["telpon"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Tidak ada data admin.";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Menutup koneksi
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>