<?php
// Mulai session
session_start();

// Koneksi ke database MySQL
$host = "localhost"; // sesuai dengan host
$user = "root"; // username MySQL
$pass = ""; // password MySQL
$db = "registration"; // nama database

$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// // Tombol Logout
// if (isset($_POST['logout'])) {
//     session_unset(); // Unset semua variabel session
//     session_destroy(); // Hapus session
//     header("Location: login_admin.php"); // Redirect ke halaman login atau halaman lainnya
//     exit();
// }

// Query SQL untuk mengambil data dari tabel user
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" type="text/css" href="halaman_admin.css">
</head>
<body>

<h2>Data Pengguna</h2>

<table border="1">
    <tr>
        <!-- <th>ID</th> -->
        <th>Nama</th>
        <th>No Telepon</th>
        <th>Nama Instansi</th>
        <th>Email</th>
        <th>Jenis Layanan</th>
        <th>Keperluan</th>
        <th>Tanggal dan Waktu</th>
    </tr>

    <?php
    // Tampilkan data dalam tabel
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            // echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['no_telepon'] . "</td>";
            echo "<td>" . $row['nama_instansi'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['jenis_layanan'] . "</td>";
            echo "<td>" . $row['keperluan'] . "</td>";
            echo "<td>" . $row['tanggal_waktu'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
    }

    // Tutup koneksi
    $conn->close();
    ?>

</table>

<!-- Tombol Logout -->
<!-- <form method="post">
    <input type="submit" name="logout" value="Logout">
</form> -->
<a href="logout_admin.php">Logout</a>
</body>
</html>
