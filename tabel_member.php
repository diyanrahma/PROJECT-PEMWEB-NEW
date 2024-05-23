<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
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

        .delete-button {
            background-color: #e0ac1c;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .delete-button:hover {
            background-color: #c7911e;
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
                    <a href="admin.php">Data Admin</a>
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
        <h1>Data User</h1>
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

        // Menghapus data jika parameter id_user disertakan dalam POST
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) && isset($_POST['idToDelete'])) {
            $id_user = $_POST['idToDelete'];
            $delete_query = "DELETE FROM user WHERE id_user = ?";
            $stmt = $conn->prepare($delete_query);
            $stmt->bind_param("s", $id_user);
            if ($stmt->execute()) {
                header("Location: tabel_member.php"); // Arahkan kembali ke halaman tabel data user
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Query untuk mendapatkan data user
        $query = "SELECT id_user, email, nama_depan, nama_belakang, tgl_lahir, no_telp FROM user";
        $result = mysqli_query($conn, $query);

        // Mengecek apakah query berhasil dijalankan
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // Menampilkan data dalam tabel
                echo "<table>";
                echo "<tr>
                        <th>ID User</th>
                        <th>Email</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Tanggal Lahir</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id_user"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["nama_depan"] . "</td>";
                    echo "<td>" . $row["nama_belakang"] . "</td>";
                    echo "<td>" . $row["tgl_lahir"] . "</td>";
                    echo "<td>" . $row["no_telp"] . "</td>";
                    echo "<td>
                            <form method='post' action=''>
                                <input type='hidden' name='idToDelete' value='" . $row["id_user"] . "'>
                                <input type='submit' name='delete' value='Hapus' class='delete-button'>
                            </form>
                        </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Tidak ada data user.";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Menutup koneksi
        mysqli_close($conn);
        ?>
    </div>
    <script>
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data user ini?")) {
                document.querySelector('input[name="idToDelete"]').value = id;
                document.querySelector('input[name="delete"]').click();
            }
        }
    </script>
</body>
</html>