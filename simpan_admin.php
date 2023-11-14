<?php
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

// Ambil data dari formulir
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa apakah nomor telepon sudah terdaftar
$check_query = "SELECT * FROM admin WHERE username = '$username'";
$result = $conn->query($check_query);

if ($result->num_rows > 0) {
    echo "and sudah memiliki akun";
    header("Location: pendaftaran_admin.html");
} else {
    // Nomor telepon belum terdaftar, lanjutkan dengan penyimpanan data
    $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login_admin.html"); // nama file halaman login
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
