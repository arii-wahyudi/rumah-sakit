<?php 
include 'koneksi.php';
session_start();
$id = $_SESSION['id'];
function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
$query = mysqli_query($koneksi,"SELECT * FROM pengobatan JOIN pasien ON pengobatan.id_pasien = pasien.id_pasien JOIN dokter ON pengobatan.id_dokter = dokter.id_dokter WHERE pasien.id_pasien = '$id'")->fetch_assoc();
$pajak = 5000;
if ($query['id_rawat'] > 0) {
	$query = mysqli_query($koneksi,"SELECT * FROM pengobatan JOIN pasien ON pengobatan.id_pasien = pasien.id_pasien JOIN dokter ON pengobatan.id_dokter = dokter.id_dokter JOIN rawat ON pengobatan.id_rawat = rawat.id_rawat WHERE pasien.id_pasien = '$id'")->fetch_assoc();

	$hitung = $query['harga'];
	
	$total = $hitung + $pajak;
}else{

	$total = $pajak + 50000;
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
	<br>
	<main>
		<div class="container">
			<div class="row">
				<div class="col-sm-6" id="mas">
					<div class="card">
						<div class="card-body">
							<h6>NO PENGOBATAN</h6>
							<h3 style=" color:#17a2b8; "><?php echo $query['id_pengobatan'] ?></h3>
							<h6>telah di data di HOSPITAL.COM</h6>
							<hr>
							Nama Pasien : <?php echo $query['nama_pasien'] ?>
							<br>
							Penyakit : <?php echo $query['penyakit'] ?>
							<br>
							Alamat : <?php echo $query['alamat'] ?>
							<br>


						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<h6>PENGOBATAN</h6>
							<hr>
							<b>Dokter yang menangani</b> <br>
							<?php echo $query['nama_dokter'] ?>
							<br>
							<b>penyakit</b>
							<br>
							<?php echo $query['penyakit'] ?>
							<br>
							<b>Tanggal berobat :</b>
							<br>
							<?php echo $query['tanggal'] ?>
							<br>
							<b>Obat : </b>
							<br>
							<?php echo $query['obat'] ?>
							<hr>
							<h6>Biaya:</h6>
							<?php if ($query['id_rawat'] > 0): ?>
								Rawat = <?php echo rupiah($hitung) ?>
							<?php endif ?>
							<?php if ($query['id_rawat'] == 0): ?>
								Konsultasi : Rp50.000
							<?php endif ?>
							<br>
							ppn : Rp.5000
							<hr>
							<b>TOTAL : <?php echo rupiah($total) ?></b>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
	</main>




	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>