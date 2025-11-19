<?php
include("koneksi.php");
// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list-siswa.php');
}
//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_siswa WHERE id=$id";
$query = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($query);
// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSISWA - Edit Pendaftar</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Siswa</h3>
    </header>
    <form action="proses-edit.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="Nama lengkap"
                    value="<?php echo $siswa['nama'] ?>" />
            </p>
            <p>
                <label for="email">Email: </label>
                <input type="email" name="email" placeholder="Email"
                    value="<?php echo $siswa['email'] ?>" />
            </p>
            <p>
                <label for="telepon">Telepon: </label>
                <input type="number" name="telepon" placeholder="Nomor
Telepon" value="<?php echo $siswa['telepon'] ?>" />
            </p>
            <p>
                <label for="kelamin">Jenis Kelamin: </label>
                <?php $jk = $siswa['kelamin']; ?>
                <label><input type="radio" name="kelamin" value="Laki_Laki"
                        <?php echo ($jk == 'Laki_Laki') ? "checked" : "" ?>> Laki-laki</label>
                <label><input type="radio" name="kelamin" value="Perempuan"
                        <?php echo ($jk == 'Perempuan') ? "checked" : "" ?>> Perempuan</label>
            </p>
            <p>
                <label for="jurusan">Jurusan: </label>
                <?php $jurusan = $siswa['jurusan']; ?>
                <label>
                    <select name="jurusan" id="jurusan">
                        <option value="RPL" <?php echo ($jurusan == 'RPL') ? "selected" : "" ?>>RPL</option>
                        <option value="TKJ" <?php echo ($jurusan == 'TKJ') ? "selected" : "" ?>>TKJ</option>
                        <option value="TSM" <?php echo ($jurusan == 'TSM') ? "selected" : "" ?>>TSM</option>
                        <option value="TEI" <?php echo ($jurusan == 'TEI') ? "selected" : "" ?>>TEI</option>
                        <option value="TKR" <?php echo ($jurusan == 'TKR') ? "selected" : "" ?>>TKR</option>
                </select>
                </label>
            </p>
            <label for="hobi">Hobi: </label>
            <input type="text" name="hobi" placeholder="Hobi"
                value="<?php echo $siswa['hobi'] ?>" />
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p>
        </fieldset>
    </form>
</body>

</html>