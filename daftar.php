<?php 
include 'koneksi.php';
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
	$tlp = $_POST['tlp'];
	$query = mysqli_query($koneksi,"INSERT INTO pasien VALUES('','$nama','$username','$password','0','0','$alamat','$tlp','','')");
	if ($query) {
		echo "<script>alert('berhasil');
		document.location.href = 'login.php';
		</script>";
	}else{
		echo "<script>alert('gagal');
		</script>";
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
	<div class="jumbotron jumbotron-fluid">
		<div class="container" align="center">
			<h4>login</h4>
			<form method="POST">
				<label for="nama">Nama Lengkap :</label>
				<input type="text" name="nama" placeholder="masukan nama anda">
				<br>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username" placeholder="masukan username anda">
				<br>
				<label for="ps">Password :</label>
				<input type="password" name="password" id="ps" placeholder="masukan password anda">
				<br>
				<label for="lama">alamat :</label>
				<input type="text" name="alamat" id="lama" placeholder="masukan alamat anda">
				<br>
				<label for="tlp">Nomor tlp :</label>
				<input type="text" name="tlp" id="tlp" placeholder="masukan nomor anda">
				<hr>
				
				<button class="btn btn-primary" name="submit">LOGIN</button>
			</form>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>