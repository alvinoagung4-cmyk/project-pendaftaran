<?php
include("koneksi.php");
// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['simpan'])) {
// ambil data dari formulir
$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$jk = $_POST['kelamin'];
$jurusan = $_POST['jurusan'];
$hobi = $_POST['hobi'];
// buat query update
$sql = "UPDATE tb_siswa SET nama='$nama', email='$email',
telepon='$telepon', kelamin='$jk', jurusan='$jurusan',hobi='$hobi' WHERE id=$id";
$query = mysqli_query($conn, $sql);
// apakah query update berhasil?
if ($query) {
// kalau berhasil alihkan ke halaman list-siswa.php
header('Location: list-siswa.php');
} else {
// kalau gagal tampilkan pesan
die("Gagal menyimpan perubahan...");
}
} else {
die("Akses dilarang...");
}