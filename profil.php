<?php
if(isset($_POST['nama_depan'])){
    $nama_depan = $_POST["nama_depan"];
    $nama_belakang = $_POST["nama_belakang"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $email = $_POST["email"];
    $telpon = $_POST["telpon"];
    $layanan = $_POST["layanan"];

    // Menentukan id_layanan berdasarkan pilihan layanan
    switch ($layanan) {
        case "REGULER GREY - 250.000":
            $id_layanan = "GR";
            break;
        case "REGULER BLACK - 450.000":
            $id_layanan = "BL";
            break;
        case "REGULER GOLD - 600.000":
            $id_layanan = "GL";
            break;
        case "UNLIMITED 1 - 1.400.000":
            $id_layanan = "U1";
            break;
        case "UNLIMITED 2 - 10.000.000":
            $id_layanan = "U2";
            break;
        default:
            // Menangani kasus default jika pilihan layanan tidak sesuai
            // Di sini Anda dapat menetapkan id_layanan default atau menangani kesalahan sesuai kebutuhan bisnis Anda.
            break;
    }

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

    // Mengambil ID member terakhir dari database
    $query_last_id = "SELECT id_member FROM member ORDER BY id_member DESC LIMIT 1";
    $result_last_id = mysqli_query($conn, $query_last_id);
    if (mysqli_num_rows($result_last_id) > 0) {
        $row = mysqli_fetch_assoc($result_last_id);
        $last_id = $row["id_member"];
        // Menyimpan ID member baru dengan format MMB0000003 dan seterusnya
        $next_id = "MMB" . sprintf('%07d', intval(substr($last_id, 3)) + 1);
    } else {
        // Jika tidak ada data di tabel member, ID member pertama akan dimulai dari MMB0000001
        $next_id = "MMB0000003";
    }

    // Menyimpan data ke dalam database, termasuk id_layanan yang baru ditambahkan
    $query_sql = "INSERT INTO member (id_member, nama_depan, nama_belakang, tanggal_lahir, email, telpon, layanan, id_layanan) 
                  VALUES ('$next_id', '$nama_depan', '$nama_belakang', '$tanggal_lahir', '$email', '$telpon', '$layanan', '$id_layanan')";
    if(mysqli_query($conn, $query_sql)) {
        // Pendaftaran berhasil, arahkan pengguna ke halaman jadwal
        echo "<script>window.location.href = 'jadwal.php';</script>";
        exit(); // Pastikan untuk keluar dari skrip setelah pengalihan
    } else {
        echo "Error: " . $query_sql . "<br>" . mysqli_error($conn);
    }

    $nama_depan = isset($_GET['nama_depan']) ? $_GET['nama_depan'] : '';
    $nama_belakang = isset($_GET['nama_belakang']) ? $_GET['nama_belakang'] : '';
    $tanggal_lahir = isset($_GET['tanggal_lahir']) ? $_GET['tanggal_lahir'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $telpon = isset($_GET['telpon']) ? $_GET['telpon'] : '';
    $layanan = isset($_GET['layanan']) ? $_GET['layanan'] : '';
    // Menutup koneksi
    mysqli_close($conn);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <link rel="stylesheet" href="profil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0305f8347c.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar" style="background-color: #241c15;">
        <a href="indexnew.php" class="navbar-logo">Membership<span>Gym.</span></a>
    </nav>

    <section class="form">
        <div class="keseluruhan">
            <div class="kiri">
                <h1>SET UP <br>YOUR PROFILE </h1>
                <img src="Aset/profil.png" alt="">
            </div>
            <div class="kanan">
                <div class="info">
                    <h3 class="satu"><span>1</span>PROFILE</h3>
                    <h3 class="dua"><span>•</span>SCHEDULE</h3>
                    <h3 class="tiga"><span>•</span>PAYMENT</h3>
                </div>

                <form action="profil.php" method="POST">
                    <!-- Menambahkan input hidden untuk menyimpan ID member -->
                    <input type="hidden" name="id_member" value="<?php echo $next_id; ?>">
                    
                    <label for="nama_depan">First Name:</label>
                    <input type="text" id="nama_depan" name="nama_depan" required><br><br>

                    <label for="nama_belakang">Last Name:</label>
                    <input type="text" id="nama_belakang" name="nama_belakang" required><br><br>

                    <label for="tanggal_lahir">Date of Birth:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required style="font-family: 'Poppins', sans-serif;;"><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="telpon">Phone Number:</label>
                    <input type="tel" id="telpon" name="telpon" required><br><br>

                    <label for="layanan">Service:</label>
                    <select id="layanan" name="layanan" required style="font-family: 'Poppins', sans-serif;;">
                        <option value="" disabled selected>Select a service</option>
                        <option value="REGULER GREY - 250.000">REGULER GREY - 250.000</option>
                        <option value="REGULER BLACK - 450.000">REGULER BLACK - 450.000</option>
                        <option value="REGULER GOLD - 600.000">REGULER GOLD - 600.000</option>
                        <option value="UNLIMITED 1 - 1.400.000">UNLIMITED 1 - 1.400.000</option>
                        <option value="UNLIMITED 2 - 10.000.000">UNLIMITED 2 - 10.000.000</option>
                    </select><br><br>

                    <div class="checkbox-containersatu">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms" style="white-space: pre;">I've read and agreed to the <a href="terms.html" style="color: #241c15;"><i><u>terms and conditions</u></i></a></label>
                    </div>
                
                    <div class="checkbox-containerdua">
                        <input type="checkbox" id="content_offers" name="content_offers" required>
                        <label for="content_offers">I'm happy to sign up for my personalized content and offers</label>
                    </div>
                    <br>

                    <!-- Mengubah tipe tombol menjadi "submit" -->
                    <button type="submit" class="next" style="border: none;">Continue</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("myForm");
            form.addEventListener("submit", function(e) {
                // Menghentikan proses submit form bawaan
                e.preventDefault();

                // Ambil nilai dari form
                var firstName = form.querySelector("#first_name").value;
                var lastName = form.querySelector("#last_name").value;
                var dob = form.querySelector("#dob").value;
                var email = form.querySelector("#email").value;
                var phone = form.querySelector("#phone").value;
                var service = form.querySelector("#service").value;

                // Simpan nilai form ke local storage
                localStorage.setItem("firstName", firstName);
                localStorage.setItem("lastName", lastName);
                localStorage.setItem("dob", dob);
                localStorage.setItem("email", email);
                localStorage.setItem("phone", phone);
                localStorage.setItem("service", service);

                // Redirect ke halaman jadwal.html
                window.location.href = "jadwal.php";
            });
        });
    </script>
</body>
</html>