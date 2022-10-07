<?php
session_start(); 
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$bagian = $_POST['bagian'];
	include 'koneksi.php';
	if ($bagian == "dokter") {
		$query = mysqli_query($koneksi,"SELECT * FROM dokter WHERE username = '$username'")->fetch_assoc();
		if ($query['password'] == $password) {
			$_SESSION['id'] = $query['id_dokter'];
			echo "<script>alert('berhasil');
			document.location.href = 'dokter.php';
			</script>";
			
		}else{
			echo "<script>alert('Salah data');
			</script>";
			die();
		}
	}else if($bagian == "pasien"){
		$query = mysqli_query($koneksi,"SELECT * FROM pasien WHERE username = '$username'")->fetch_assoc();
		if ($query['password'] == $password) {
			$_SESSION['id'] = $query['id_pasien'];
			echo "<script>alert('berhasil');
			document.location.href = 'index.php';
			</script>";
		}else{
			echo "<script>alert('Salah data');
			</script>";
			die();
		}
	}else if($bagian == "admin"){
		echo $bagian;
	}else{
		echo "gagal";
		dei();
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
				<label for="username">Username :</label>
				<input type="text" name="username" id="username" required="" placeholder="masukan username anda">
				<br>
				<label for="ps">Password :</label>
				<input type="password" name="password" id="ps" required="" placeholder="masukan password anda">
				<hr>
				<br>
				<label>Sebagai :</label>
				<div class="form-group">
					<select class="form-control" name="bagian">
						<option value="pasien">Pasien</option>
						<option value="dokter">Dokter</option>
						<option value="admin">Admin</option>
					</select>
				</div>
				<hr>
				<button class="btn btn-primary" name="submit">LOGIN</button>
			</form>
			<small>Tidak punya akun?<a href="daftar.php">DAFTAR!!!</a></small>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
