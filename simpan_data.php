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
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];
$nama = $_POST['nama'];
$nama_instansi = $_POST['nama_instansi'];

// Query untuk memeriksa apakah nomor telepon sudah terdaftar
$check_query = "SELECT * FROM regis WHERE no_telepon = '$no_telepon'";
$result = $conn->query($check_query);

if ($result->num_rows > 0) {
    echo "and sudah memiliki akun";
    header("Location: form_pendaftaran.html");
} else {
    // Nomor telepon belum terdaftar, lanjutkan dengan penyimpanan data
    $sql = "INSERT INTO regis (no_telepon, email, nama, nama_instansi) VALUES ('$no_telepon', '$email', '$nama', '$nama_instansi')";

    if ($conn->query($sql) === TRUE) {
        header("Location: form_login.html"); // nama file halaman login
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
