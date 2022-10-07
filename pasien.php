<?php 
include 'koneksi.php';
session_start();
$id = $_SESSION['id'];
$query = mysqli_query($koneksi,"SELECT * FROM antrian")->fetch_assoc();
$jancok = mysqli_query($koneksi,"SELECT * FROM antrian WHERE status = '1'")->fetch_assoc();
$jancok1 = mysqli_query($koneksi,"SELECT * FROM antrian WHERE status = '0'");
$dokter = mysqli_query($koneksi,"SELECT * FROM dokter WHERE id_dokter = '$id'")->fetch_assoc();
$kamar = mysqli_query($koneksi,"SELECT * FROM kamar")->fetch_assoc();
$kamar1 = mysqli_query($koneksi,"SELECT * FROM kamar");
$kamar2 = mysqli_num_rows($kamar1);
$klok1 = mysqli_num_rows($jancok1);
$jancok2 = mysqli_query($koneksi,"SELECT * FROM antrian WHERE status > '0'");
$klok2 = mysqli_num_rows($jancok2);
$hai = mysqli_query($koneksi,"SELECT * FROM antrian JOIN pasien ON antrian.id_pasien = pasien.id_pasien WHERE antrian.status = '1'")->fetch_assoc();
$mis = $hai['id_pasien'];
$antri = $jancok['antrian'];
if (isset($_POST['submit'])) {
	$him = $jancok['antrian'] + 1;
	$coba = mysqli_query($koneksi,"UPDATE antrian SET status = '2' WHERE status = '1'");
	$klik = mysqli_query($koneksi,"UPDATE antrian SET status = '1' WHERE antrian = '$him'");
	$penyakit = $_POST['penyakit'];
	$nama = $_POST['nama'];
	$obat = $_POST['obat'];
	date_default_timezone_set('Asia/Jakarta');
	$tgl = date('Y-m-d');
	$harga = 50000;
	$sakit = mysqli_query($koneksi,"UPDATE pasien SET penyakit = '$nama', status = '0',obat = '$obat' WHERE id_pasien = '$mis'");
	$selesai = mysqli_query($koneksi,"INSERT INTO pengobatan VALUES('','$mis','0','$id','$tgl','$harga')");
	echo "<script>alert('pasien akan di pulangkan');
	document.location.href = 'pasien.php';
	</script>";
}
if (isset($_POST['rawat'])) {
	$him = $jancok['antrian'] + 1;
	$coba = mysqli_query($koneksi,"UPDATE antrian SET status = '0' WHERE status = '1'");
	$klik = mysqli_query($koneksi,"UPDATE antrian SET status = '1' WHERE antrian = '$him'");
	if ($kamar['status'] > 0) {
		$pim = $kamar['status'] - 1;
		$kamar3 = $kamar2 + 1;
		$ribet = "room" . $kamar3;
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$nama = $_POST['nama'];
		$ramp = mysqli_query($koneksi,"UPDATE pasien SET status = '3', penyakit = '$nama' WHERE id_pasien = '$mis'");
		$nim = mysqli_query($koneksi,"UPDATE kamar SET status = '$pim'");
		$rawat = mysqli_query($koneksi,"INSERT INTO rawat VALUES('','$mis','$ribet','$tgl','','$id','1')");
		if ($rawat) {
			echo "<script>alert('pasien akan di rawat inap');
			document.location.href = 'pasien.php';
			</script>";
		}
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
				<li class="nav-item active">
					<a class="nav-link" href="pasien.php">Pasien</a>
				</li>
				<li class="nav-item">
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
		<div class="container-fluid">
			<form method="POST">
				<div class="row">
					<div class="col-sm-3"><center><h5>Pengobatan</h5></center><hr>
						<h6>Penjelasan</h6>
						<p>Nama Penyakit</p>
						<input type="text" required="" name="nama">
						<br><br>
						<p>Obat</p>
						<textarea name="obat" id="" cols="30" rows="5"></textarea>

					</div>
					<div class="col-sm-6">
						<div class="jumbotron jumbotron-fluid">
							<div class="container" align="center">
								<img src="assets/img/hospital.png" style=" width: 100px;">

								<table border="1"> 
									<tr>
										<td colspan="3"><center><h1>Antrian saat ini</h1><h1><?php echo $antri ?></h1></center></td>
									</tr>
									<tr>
										<td>Banyak pasien <br> <center>asas</center></td>
										<td>pasien belum <br> <center><?php echo $klok1 ?></center></td>
										<td>Pasien sudah <br> <center><?php echo $klok2 ?></center></td>
									</tr>
								</table>
								<br>
								<button class="btn btn-primary" name="submit">Pasien Berikutnya</button>
								<button class="btn btn-primary" name="rawat">Rawat</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3"><center><h5>Data Pasien</h5></center><hr>
						<Table>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><?php echo $hai['nama_pasien'] ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><?php echo $hai['alamat'] ?></td>
							</tr>
						</Table>
						<hr>
						<h6>Kamar tersedia : <?php echo $kamar['status'] ?></h6>
					</div>
				</div>
			</form>
		</div>
	</main>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>