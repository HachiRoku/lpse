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

// Ambil data dari formulir
$jenis_layanan = $_POST['jenis_layanan'];
$keperluan = $_POST['keperluan'];

// Ambil data pengguna dari session
$nama = $_SESSION['nama'];
$no_telepon = $_SESSION['no_telepon'];
$nama_instansi = $_SESSION['nama_instansi'];
$email = $_SESSION['email'];

// Tambahkan datetime saat menyimpan data
$currentDatetime = date("Y-m-d H:i:s");

// Query SQL untuk menyimpan data ke dalam tabel
$sql = "INSERT INTO user (nama, no_telepon, nama_instansi, email, jenis_layanan, keperluan, tanggal_waktu) 
        VALUES ('$nama', '$no_telepon', '$nama_instansi', '$email', '$jenis_layanan', '$keperluan', '$currentDatetime')";

if ($conn->query($sql) === TRUE) {
    // Data berhasil disimpan
    header("Location: halaman_utama.php"); // Redirect kembali ke halaman utama
    exit();
} else {
    // Terjadi kesalahan saat menyimpan data
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
