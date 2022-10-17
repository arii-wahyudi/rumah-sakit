<?php 
$data = mysqli_query($query);
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
				<li class="nav-item active">
					
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
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
		<div class="container">
			<h2>Dashboard</h2>
			<hr>
			<div class="row">
				<div class="col-sm-2 mr-3" style=" background-color: #7383ff; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Pasien</h5> <h5>1</h5></div>
						<div class="col-sm-6"><img src="member.png" style=" width: 4rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-3" style=" background-color: #45ff42; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Kamar</h5> <h5>2</h5></div>
						<div class="col-sm-6"><img src="hadir.png" style=" width: 3rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-3" style=" background-color: #fcff30; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Terpakai</h5> <h5>2</h5></div>
						<div class="col-sm-6"><img src="lembur.png" style=" width: 3rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-3" style=" background-color: #ff4545; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Tersedia</h5> <h5>9</h5></div>
						<div class="col-sm-6"><img src="late.png" style=" width: 3rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-3" style=" background-color: #ff45a5; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>poli</h5> <h5>8</h5></div>
						<div class="col-sm-6"><img src="admin.png" style=" width: 3rem; " alt=""></div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container">
			<h5>Data pasien</h5>
			<div class="row">
				<div class="col-sm-7 mr-4 shadow p-3 mb-5 bg-white rounded"><table class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama</th>
							<th scope="col">Penyakit</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table></div>
				<div class="col-sm-4 shadow p-3 mb-5 bg-white rounded"></div>
			</div>
		</div>
	</main>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
