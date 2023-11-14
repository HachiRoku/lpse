<?php
// Mulai session
session_start();

// Hancurkan semua session
session_destroy();

// Redirect ke halaman login atau halaman lain setelah logout
header("Location: form_login.html"); // Ganti dengan halaman login atau halaman lain yang sesuai
exit();
?>
