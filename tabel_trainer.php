<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Trainer</title>
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
        form {
            display: inline;
        }
        button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            background-color: #e0ac1c;
            color: #241c15;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
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

    <!-- Content -->
    <div class="content">
        <h1>Data Trainer</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Trainer</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
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

            // Menampilkan data dalam tabel
            $query = "SELECT id_trainer, nama, alamat, tgl_lahir, jenis_kelamin, no_telp FROM trainer";
            $result = mysqli_query($conn, $query);

            // Mengecek apakah query berhasil dijalankan
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    // Menampilkan data dalam tabel
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id_trainer"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td>" . $row["tgl_lahir"] . "</td>";
                        echo "<td>" . $row["jenis_kelamin"] . "</td>";
                        echo "<td>" . $row["no_telp"] . "</td>";
                        echo "<td><form method='post'><input type='hidden' name='id_trainer' value='" . $row["id_trainer"] . "'><button type='submit' name='hapus_trainer'>Hapus</button></form></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data trainer.</td></tr>";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            // Menutup koneksi
            mysqli_close($conn);
            ?>
            </tbody>
        </table>
    </div>
    <?php
    // Menghapus data trainer jika tombol hapus ditekan
    if (isset($_POST['hapus_trainer'])) {
        $id_trainer_to_delete = $_POST['id_trainer'];
        $conn = mysqli_connect($servername, $db_username, $db_password, $database);

        // Memeriksa koneksi
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $query_delete = "DELETE FROM trainer WHERE id_trainer = '$id_trainer_to_delete'";
        $result_delete = mysqli_query($conn, $query_delete);
        
        if ($result_delete) {
            echo "<script>alert('Data trainer berhasil dihapus');</script>";
            // Refresh halaman setelah penghapusan berhasil
            echo "<script>window.location.href = 'tabel_trainer.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data trainer');</script>";
        }

        // Menutup koneksi
        mysqli_close($conn);
    }
    ?>
</body>
</html>