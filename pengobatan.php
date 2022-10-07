<?php 
include 'koneksi.php';
session_start();
$id = $_SESSION['id'];
$query = mysqli_query($koneksi,"SELECT * FROM pengobatan JOIN pasien ON pengobatan.id_pasien = pasien.id_pasien JOIN dokter ON pengobatan.id_dokter = dokter.id_dokter WHERE pasien.id_pasien = '$id'");
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

	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">kamar</th>
					<th scope="col">Tgl</th>
					<th scope="col">Penyakit</th>
					<th scope="col">Dokter</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php while ($data = mysqli_fetch_assoc($query)) { ?>		
					<tr>
						<th scope="row"><?php echo $no ?></th>
						<td><?php echo $data['nama_pasien'] ?></td>
						<?php if ($data['id_rawat'] == 0): ?>
							<td>tidak ada data</td>
						<?php endif ?>
						<?php if ($data['id_rawat'] > 0): ?>
							<td><?php echo $data['id_rawat'] ?></td>
						<?php endif ?>

						<td><?php echo $data['tanggal'] ?></td>
						<td><?php echo $data['penyakit'] ?></td>
						<td><?php echo $data['nama_dokter'] ?></td>
						<td><a href="detail.php?id=<?php echo $data['id_pengobatan'] ?>"><button class=" btn btn-success ">Lihat</button></a></td>
					</tr>
					<?php $no++ ?>
				<?php } ?>
			</tbody>
		</table>
	</div>




	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>