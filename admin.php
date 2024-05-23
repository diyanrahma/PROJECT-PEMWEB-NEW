<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
            display: flex; /* Set display to flex */
            align-items: center; /* Center vertically */
        }
        .sidebar-links a:hover {
            color: #e0ac1c;
        }
        .sidebar-links .submenu {
            display: none;
            flex-direction: column;
            margin-left: 1rem; /* Adjust margin */
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
    <div class="content">
        <!-- Main content goes here -->
        <h1>Welcome to the Admin Dashboard</h1>
        <p>Use the menu on the left to navigate through the different sections.</p>
    </div>

    <div class="sidebar">
        <a href="#" class="sidebar-logo">Membership<span>Gym.</span></a>
        <div class="sidebar-links">
            <div class="has-submenu">
                <a href="admin.php">Admin</a>
                <div class="submenu" onmouseleave="hideAdminTable()" onmouseenter="showAdminTable()">
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
    <script>
        function showAdminTable() {
            var adminContent = document.getElementById("adminContent");
            adminContent.style.display = "block";
        }

        function hideAdminTable() {
            var adminContent = document.getElementById("adminContent");
            adminContent.style.display = "none";
        }
    </script>
</body>
</html>