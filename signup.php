<?php
if(isset($_POST['nama_depan'])){
    $nama_depan = $_POST["nama_depan"];
    $nama_belakang = $_POST["nama_belakang"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $servername = "localhost";
    $database = "membership_gym";
    $username = "root";
    $password_db = "";

    $conn = mysqli_connect($servername, $username, $password_db, $database);

    if (!$conn) {
        die("Koneksi Gagal : " . mysqli_connect_error());
    }

    $query_sql = "INSERT INTO signup (nama_depan, nama_belakang, email, password) 
                  VALUES ('$nama_depan', '$nama_belakang', '$email', '$password')";
    if(mysqli_query($conn, $query_sql)) {
        // Pendaftaran berhasil, arahkan pengguna ke halaman login
        echo "<script>window.location.href = 'login.php';</script>";
        exit(); // Pastikan untuk keluar dari skrip setelah pengalihan
    } else {
        echo "Error: " . $query_sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0305f8347c.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="login">
        <div class="kanan">
            <a href="index.php" style="text-decoration: none;"><p class="satu" >Gym.</p></a>

            <p class="dua">Sign up</p>

            <p class="tiga">The email has to be the same email registered <br>under your membership</p>

            <form action="signup.php" method="POST" class="form">
                <div class="a">
                    <label for="nama_depan" style="padding-right: 33px;">Nama Depan </label>
                    <input type="text" id="nama_depan" name="nama_depan" required style="border-radius: 8px;"><br>
                    <label for="nama_belakang" style="padding-right: 5px;">Nama Belakang </label>
                    <input type="text" id="nama_belakang" name="nama_belakang" required style="border-radius: 8px;"><br>
                    <label for="email" style="padding-right: 108px;">Email </label>
                    <input type="email" id="email" name="email" required style="border-radius: 8px;"><br>
                    <label for="password" style="padding-right: 68px;">Password </label>
                    <input type="password" id="password" name="password" required style="border-radius: 8px;"><br>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="tph" name="tph" required>
                    <label for="tph">I have read and accepted the <a href="terms.php"><i><u>Terms and <br>Conditions</u></i></a>, <a href="privacy.php"><i><u>Privacy Policy</u></i></a> and <a href="health.php"><i><u>Health Statement</u></i></a>.</label>
                </div>
                <button type="submit" class="log">Sign Up</button>
            </form>

            <p class="empat">
                <a href="login.php">Back to Login</a>
            </p>
        </div>
    </section>
</body>
</html>