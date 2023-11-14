<?php
// Mulai session
session_start();

// Periksa apakah pengguna sudah login dengan memeriksa session
if (!isset($_SESSION['nama']) || !isset($_SESSION['no_telepon']) || !isset($_SESSION['nama_instansi']) || !isset($_SESSION['email'])) {
    // Jika tidak ada session, redirect ke halaman login
    header("Location: form_login.html"); // nama halaman login
    exit();
}

// Tampilkan nama dan nama_instansi dari session
$nama = $_SESSION['nama'];
$no_telepon = $_SESSION['no_telepon'];
$nama_instansi = $_SESSION['nama_instansi'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" type="text/css" href="halaman_utama.css">
    
    
    <body>
        <h1>SELAMAT DATANG</h2>
    <table>
        <tr>
            <th><?php echo $nama; ?></th>
            <!-- <td rowspan="2"><img src="[URL Foto Customer]" alt="Pas Foto" style="max-width: 150px;"></td> -->
        </tr>
        <tr>
            <th><?php echo $nama_instansi; ?></th>
            
        </tr>
        <tr>
            <th><?php echo $email; ?></th>
            
        </tr>
        <tr>
            <th><?php echo $no_telepon ?></th>
            
        </tr>
    </table>

    <!-- Form untuk memilih jenis layanan dan mengisi keperluan -->
    <form action="simpan_user.php" method="POST">
        <label>Pilih Jenis Layanan:</label><br>
        <input type="radio" id="admin_ppe" name="jenis_layanan" value="admin PPE" required>
        <label for="admin_ppe">Admin PPE</label><br>

        <input type="radio" id="agency_admin" name="jenis_layanan" value="Agency Admin" required>
        <label for="agency_admin">Agency Admin</label><br>

        <input type="radio" id="verifikator" name="jenis_layanan" value="Verifikator" required>
        <label for="verifikator">Verifikator</label><br>

        <input type="radio" id="helpdesk" name="jenis_layanan" value="Helpdesk" required>
        <label for="helpdesk">Helpdesk</label><br>
        
        <br>

        <label for="keperluan">Keperluan:</label><br><br>
        <textarea id="keperluan" name="keperluan" rows="4" cols="50" required></textarea>
        <br><br>

        <input type="submit" value="Submit">
        <a href="logout.php">Logout</a>
        <br><br>
    </form>

    <!-- Tambahkan elemen tabel untuk menampilkan data
<table id="data-table" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Submit</th>
            <th>Nama</th>
            <th>No. Telepon</th>
            <th>Email</th>
            <th>Nama Instansi</th>
            <th>Jenis Layanan</th>
            <th>Keperluan</th>
        </tr>
    </thead>
    <tbody>
        Data akan ditambahkan di sini dengan JavaScript -->
    <!-- </tbody>
</table> -->

<!-- <script>
document.addEventListener('DOMContentLoaded', function() {
    // Menangani pengiriman formulir
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman formulir yang standar

        // Ambil data dari formulir
        const jenisLayanan = form.querySelector('input[name="jenis_layanan"]:checked').value;
        const keperluan = form.querySelector('#keperluan').value;

        // Buat elemen baru untuk baris dalam tabel
        const newRow = document.createElement('tr');

        // Nomor baris akan otomatis dihitung berdasarkan jumlah baris saat ini
        const currentRowCount = document.querySelectorAll('#data-table tbody tr').length + 1;

        newRow.innerHTML = `
            <td>${currentRowCount}</td>
            <td>${getCurrentDate()}</td>
            <td>${"<?php echo $nama; ?>"}</td>
            <td>${"<?php echo $no_telepon; ?>"}</td>
            <td>${"<?php echo $email;?>"}</td>
            <td>${"<?php echo $nama_instansi; ?>"}</td>
            <td>${jenisLayanan}</td>
            <td>${keperluan}</td>
        `;
        
        // Tambahkan baris baru ke dalam tabel
        document.querySelector('#data-table tbody').appendChild(newRow);

        // Reset formulir
        form.reset();
    });
});

// Fungsi untuk mendapatkan tanggal saat ini dalam format "YYYY-MM-DD HH:MM:SS"
function getCurrentDate() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}
</script> -->

<div style="position: fixed; bottom: 10px; right: 10px; color: #888; font-size: 12px;">
    Daffa Himawan Rajasa | daffahimawan5@gmail.com | @daffahrajasa
</div>

</body>
</html>
