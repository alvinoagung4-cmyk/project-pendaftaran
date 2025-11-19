<?php
include("koneksi.php");
// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['daftar'])) {
// ambil data dari formulir
$nama = htmlspecialchars($_POST['nama']);
$email = htmlspecialchars($_POST['email']);
$telepon = htmlspecialchars($_POST['telepon']);
$kelamin = htmlspecialchars($_POST['kelamin']);
$jurusan = htmlspecialchars($_POST['jurusan']);
$hobi = htmlspecialchars($_POST['hobi']);
// buat query
$sql = "INSERT INTO tb_siswa (nama, email, telepon, kelamin, jurusan, hobi)
VALUE ('$nama', '$email', '$telepon', '$kelamin', '$jurusan', '$hobi')";
$query = mysqli_query($conn, $sql);
// apakah query simpan berhasil?
if ($query) {
// kalau berhasil alihkan ke halaman index.php dengan status=sukses
header('Location: index.php?status=sukses');
} else {
// kalau gagal alihkan ke halaman indek.php dengan status=gagal
header('Location: index.php?status=gagal');
}
} else {
die("Akses dilarang...");
}