<?php
if (isset($_POST['submit'])) {
    // Tangkap data dari form
    $tanggal_latihan = $_POST["tanggal_latihan"];
    $waktu_latihan = $_POST["waktu_latihan"];
    $trainer = $_POST["trainer"];

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

    // Mendapatkan ID terakhir dari tabel jadwal
    $query_get_last_jadwal_id = "SELECT id_jadwal FROM jadwal ORDER BY id_jadwal DESC LIMIT 1";
    $result_jadwal = mysqli_query($conn, $query_get_last_jadwal_id);

    // Periksa hasil query
    if ($result_jadwal && mysqli_num_rows($result_jadwal) > 0) {
        $row_jadwal = mysqli_fetch_assoc($result_jadwal);
        $last_jadwal_id = $row_jadwal['id_jadwal'];

        // Manipulasi string untuk mendapatkan ID berikutnya
        $new_jadwal_id = 'JD' . sprintf('%d', substr($last_jadwal_id, 2) + 1);
    } else {
        // Jika tidak ada ID sebelumnya, mulai dari JD1
        $new_jadwal_id = 'JD1';
    }

    // Mendapatkan ID member terakhir dari tabel jadwal
    $query_get_last_member_id = "SELECT id_member FROM jadwal ORDER BY id_member DESC LIMIT 1";
    $result_member = mysqli_query($conn, $query_get_last_member_id);

    if ($result_member && mysqli_num_rows($result_member) > 0) {
        $row_member = mysqli_fetch_assoc($result_member);
        $last_member_id = $row_member['id_member'];

        // Manipulasi string untuk mendapatkan ID berikutnya
        $new_member_id = 'MMB' . sprintf('%06d', substr($last_member_id, 3) + 1);
    } else {
        // Jika tidak ada ID sebelumnya, mulai dari MMB000001
        $new_member_id = 'MMB000001';
    }

    // Mendapatkan ID trainer sesuai pilihan
    switch ($trainer) {
        case 'EKO':
            $id_trainer = 'TRN0000001';
            break;
        case 'EMA':
            $id_trainer = 'TRN0000002';
            break;
        case 'WONGKA':
            $id_trainer = 'TRN0000003';
            break;
        case 'AGHATA':
            $id_trainer = 'TRN0000004';
            break;
        default:
            $id_trainer = ''; // handle default case here
    }

    // Query untuk menyimpan data ke database
    $query_sql = "INSERT INTO jadwal (id_jadwal, id_member, id_trainer, tanggal_latihan, waktu_latihan, trainer) 
                  VALUES ('$new_jadwal_id', '$new_member_id', '$id_trainer', '$tanggal_latihan', '$waktu_latihan', '$trainer')";

    // Eksekusi query
    if (mysqli_query($conn, $query_sql)) {
        // Pendaftaran berhasil, arahkan pengguna ke halaman testdisplay.php
        echo "<script>window.location.href = 'testdisplay.php';</script>";
        exit(); // Pastikan untuk keluar dari skrip setelah pengalihan
    } else {
        echo "Error: " . $query_sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
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
    <title>Jadwal</title>

    <link rel="stylesheet" href="jadwal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0305f8347c.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar" style="background-color: #241c15;">
        <a href="profil.php" class="navbar-logo"><</a>
    </nav>

    <section class="form" style="margin-top: -14rem;">
        <div class="keseluruhan">
            <div class="kiri">
                <h1>CUSTOMISE <br>YOUR PLAN</h1>
                <img src="Aset/profile.png" alt="">
            </div>
            <div class="kanan">
                <div class="info">
                    <h3 class="satu"><span>•</span>PROFILE</h3>
                    <h3 class="dua"><span>2</span>SCHEDULE</h3>
                    <h3 class="tiga"><span>•</span>PAYMENT</h3>
                </div>

                <form id="myForm" action="jadwal.php" method="POST">
                    <label for="tanggal_latihan">Date:</label>
                    <input type="date" id="tanggal_latihan" name="tanggal_latihan" required style="font-family: 'Poppins', sans-serif;"><br><br>

                    <label for="waktu_latihan">Time:</label>
                    <select id="waktu_latihan" name="waktu_latihan" required style="font-family: 'Poppins', sans-serif;">
                        <option value="" disabled selected>Set the Date</option>
                        <option value="PAGI">PAGI</option>
                        <option value="SIANG">SIANG</option>
                        <option value="SORE">SORE</option>
                        <option value="MALAM">MALAM</option>
                    </select><br><br>

                    <label for="trainer">Trainer:</label>
                    <select id="trainer" name="trainer" required style="font-family: 'Poppins', sans-serif;">
                        <option value="" disabled selected>Choose a Trainer</option>
                        <option value="EKO">EKO</option>
                        <option value="EMA">EMA</option>
                        <option value="WONGKA">WONGKA</option>
                        <option value="AGHATA">AGHATA</option>
                    </select><br><br>

                    <p class="tulisan">*You can cancel your membership in the first 14 days of sign up. Terms and conditions apply.</p>

                    <!-- Tombol Continue -->
                    <button type="submit" name="submit" class="next" style="border: none;">Continue</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>