<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WEBSISWA - List Pendaftar Baru</title>
</head>
<body>
    <header>
<h3>List Pendaftar Baru</h3>
</header>
<nav>
<a href="form-daftar.php">[+] Daftarkan Siswa Baru</a>
</nav>
<br>
<table border="1">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Telepon</th>
<th>Jenis Kelamin</th>
<th>Jurusan</th>
<th>Hobi</th>
<th>Tindakan</th>
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM tb_siswa";
$query = mysqli_query($conn, $sql);
$i = 1;
?>
<?php while ($siswa = mysqli_fetch_array($query)) : ?>
<tr>
    <td><?php echo $i ?></td>
<td><?php echo $siswa['nama'] ?></td>
<td><?php echo $siswa['email'] ?></td>
<td><?php echo $siswa['telepon'] ?></td>
<td><?php echo $siswa['kelamin'] ?></td>
<td><?php echo $siswa['jurusan'] ?></td>
<td><?php echo $siswa['hobi'] ?></td>
<td>
<a href="form-edit.php?id=<?php echo $siswa['id']
?>">Edit</a> |
<a href="hapus.php?id=<?php echo $siswa['id']
?>">Hapus</a></td>
</tr>
<?php $i++ ?>
<?php endwhile; ?>
</tbody>
</table>
<p>Total Pendaftar Baru: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>