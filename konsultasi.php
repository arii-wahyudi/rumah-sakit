<?php 
include 'koneksi.php';
session_start();
$id = $_SESSION['id'];
$query = mysqli_query($koneksi,"SELECT * FROM antrian ORDER BY antrian DESC ")->fetch_assoc();
$ribet = mysqli_query($koneksi,"SELECT * FROM antrian WHERE status = '1'")->fetch_assoc();
$sip = $ribet['antrian'];
$jancok = mysqli_query($koneksi,"SELECT * FROM antrian");
$klok = $query['antrian'];
$bim = mysqli_num_rows($jancok);
$jancok1 = mysqli_query($koneksi,"SELECT * FROM antrian WHERE status = '0'");
$klok1 = mysqli_num_rows($jancok1);
$jancok2 = mysqli_query($koneksi,"SELECT * FROM antrian WHERE status > '0'");
$klok2 = mysqli_num_rows($jancok2);
$query1 = mysqli_query($koneksi,"SELECT * FROM pasien WHERE id_pasien = '$id'")->fetch_assoc();
$antri = $query['antrian'];
if (isset($_POST['submit'])) {
	$kos = $klok + 1;
	$fuck = mysqli_query($koneksi,"INSERT INTO antrian VALUES('','$kos','$id','0')");
	$masuk = mysqli_query($koneksi,"UPDATE pasien SET antrian = '$kos' WHERE id_pasien = '$id'");
	if ($masuk) {
		echo "<script>alert('berhasil');
		document.location.href = 'konsultasi.php';
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
	<?php include 'navbar.php'; ?>
	<main>
		<div class="jumbotron jumbotron-fluid">
			<div class="container" align="center">
				<img src="assets/img/hospital.png" style=" width: 100px;">
				
				<table border="1"> 
					<tr>
						<td colspan="3"><center><h1>Antrian saat ini</h1><h1><?php echo $sip ?></h1></center></td>
					</tr>
					<tr>
						<td>Banyak pasien <br> <center><?php echo $bim ?></center></td>
						<td>pasien belum <br> <center><?php echo $klok1 ?></center></td>
						<td>Pasien sudah <br> <center><?php echo $klok2 ?></center></td>
					</tr>
				</table>
				<p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
				<?php if ($query1['antrian'] == 0): ?>
					<?php echo "anda belum terdaftar antrian"; ?>
				<?php endif ?>
				<?php if ($query1['antrian'] > 0): ?>
					<?php echo "Nomor antrian anda adalah : ";
					echo $query1['antrian'];
					?>
					<?php endif ?><br><br>
					
					<?php if ($query1['antrian'] == 0): ?>
						<form method="POST">
							<button class="btn btn-primary" name="submit">Daftar antrian</button>
						</form>
					<?php endif ?>
					<?php if ($query1['antrian'] > 0): ?>
						<button class="btn btn-primary">Print antrian</button>
					<?php endif ?>
					<?php if ($query1['status'] == 1): ?>
						<a href="pengobatan.php"><button class="btn btn-primary">Hasil Dokter</button></a>
					<?php endif ?>

				</div>
			</div>
		</main>




		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	</body>
	</html>