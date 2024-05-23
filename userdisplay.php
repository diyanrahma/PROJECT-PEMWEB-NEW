<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- Your CSS links and other meta tags -->
    <link rel="stylesheet" href="user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0305f8347c.js" crossorigin="anonymous"></script>
    <style>
        /* Add any additional styles here */
    </style>
</head>
<body>
    <!-- Your navigation bar and other HTML content -->

    <section class="hero" id="home">
        <main class="content">
            <h1>PROFIL <br><span>SAYA</span></h1>
        </main>
    </section>

    <section class="isii">
        <div class="pertama">
            <h1>DATA YANG ANDA ISI</h1>
        </div>
        <div class="kedua">
            <div>
                <?php
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

                // Query untuk mengambil data user terbaru dari database
                $query_select_data = "SELECT * FROM user ORDER BY id_user DESC LIMIT 1";

                // Menjalankan query
                $result = mysqli_query($conn, $query_select_data);

                // Memeriksa apakah ada data yang ditemukan
                if (mysqli_num_rows($result) > 0) {
                    // Menampilkan data
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<p>Email: " . $row["email"] . "</p>";
                        echo "<p>Nama Depan: " . $row["nama_depan"] . "</p>";
                        echo "<p>Nama Belakang: " . $row["nama_belakang"] . "</p>";
                        echo "<p>Tanggal Lahir: " . $row["tgl_lahir"] . "</p>";
                        echo "<p>No. Telepon: " . $row["no_telp"] . "</p>";
                    }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                }

                // Menutup koneksi
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </section>

    <!-- Your footer and additional HTML content -->

    <!-- Additional scripts here -->
    <script src="index.js"></script>
</body>
</html>
