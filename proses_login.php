<?php
// Mulai session
session_start();

// Hubungkan ke database
$host = "localhost"; // host
$username = "root"; // username database
$password = ""; // password database
$database = "registration"; // nama database

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari form login
$no_telepon = $_POST['no_telepon'];

// Query untuk mengambil data pengguna berdasarkan no_telepon
$sql = "SELECT nama, no_telepon, nama_instansi, email FROM regis WHERE no_telepon = '$no_telepon'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Pengguna ditemukan, simpan data pengguna ke dalam session
    $row = $result->fetch_assoc();
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['no_telepon'] = $row['no_telepon'];
    $_SESSION['nama_instansi'] = $row['nama_instansi'];
    $_SESSION['email'] = $row['email'];

    // Redirect ke halaman selamat datang
    header("Location: halaman_utama.php");
} else {
    // Pengguna tidak ditemukan, tampilkan pesan error di halaman login
    // dan biarkan pengguna tetap di halaman login
    header("Location: form_login.html");
}
// Tutup koneksi database
$conn->close();
?>
