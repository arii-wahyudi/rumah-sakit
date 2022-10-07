<?php 
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM rawat JOIN pasien ON rawat.id_pasien = pasien.id_pasien JOIN dokter ON rawat.id_dokter = dokter.id_dokter WHERE rawat.id_rawat = '$id'")->fetch_assoc();
$pas = $query['id_pasien'];
$idpasien = $query['id_pasien'];
$dokter = $query['id_dokter'];
date_default_timezone_set('Asia/Jakarta');
$tgl = date('Y-m-d');
$in = $query['masuk'];
$out = $tgl;
$tgl2 = new DateTime($in);
$tgl1 = new DateTime($out);
$jarak = $tgl2->diff($tgl1);
$hangus = $jarak->format("%r%a");
if (isset($_POST['submit'])) {
	
	$duit = 200000 * $hangus;
	$ubah = mysqli_query($koneksi,"UPDATE rawat SET status = '3', Keluar = '$tgl' WHERE id_rawat = '$id'");
	$pasien = mysqli_query($koneksi,"UPDATE pasien SET antrian = '0' WHERE id_pasien = '$pas'");
	$selesai = mysqli_query($koneksi,"INSERT INTO pengobatan VALUES('','$idpasien','$id','$dokter','$tgl','$duit')");
	if ($selesai) {
		echo "<script>alert('berhasil');
		document.location.href = 'rawat.php';
		</script>";
	}else{
		echo "gagal";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<title>Hospital</title>
	<link rel="icon" href="assets/img/hospital.png">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<img src="assets/img/hospital.png" style=" width: 2rem; " alt="">
		<a class="navbar-brand" href="#">Hospital</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="dokter.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="pasien.php">Pasien</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="rawat.php">Rawat inap</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="riwayat.php">Riwayat</a>
				</li>
			</ul>
		</div>
	</nav>
	<br>
	<main>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Data rawat inap</h1>
				<hr>
				<p>Nama Pasien : <?php echo $query['nama_pasien'] ?></p>
				<p>Penyakit : <?php echo $query['penyakit'] ?></p>
				<p>Dokter yang menangani : <?php echo $query['nama_dokter'] ?></p>
				<p>Tanggal masuk kamar : <?php echo $query['masuk'] ?></p>
				<br>
				<form method="POST">
					<button class="btn btn-primary" name="submit">Pulang</button>
				</form>
			</div>
		</div>
	</main>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>