<?php 
session_start();
require '../helper/functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

if (isset($_POST['tambah'])) {
	if (tambah($_POST, $_FILES) > 0) {
		echo "<script>
				alert('Data Berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "<script>
				alert('Data Gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Perusahaan</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/tambah.css">
</head>
<body>
	<h1>Tambah Data Perusahaan</h1>
	<div class="container">
		<form action="" method="post" enctype="multipart/form-data">
		  <div class="form-group row">
		    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Perusahaan">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="penghasilan" class="col-sm-2 col-form-label">Penghasilan</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="penghasilan" id="penghasilan" placeholder="Penghasilan">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="laba" class="col-sm-2 col-form-label">Laba</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="laba" id="Laba" placeholder="Laba">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="asset" class="col-sm-2 col-form-label">Asset</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="asset" id="asset" placeholder="Asset">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="karyawan" class="col-sm-2 col-form-label">Karyawan</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="karyawan" id="karyawan" placeholder="Karyawan">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="kantor" class="col-sm-2 col-form-label">Kantor</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="kantor" id="kantor" placeholder="Kantor">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="ceo" class="col-sm-2 col-form-label">CEO</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="ceo" id="ceo" placeholder="CEO">
		    </div>
		  </div><div class="form-group row">
		    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
		    <div class="col-sm-10">
		      <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar">
		    </div>
		  </div>		  
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
		      <button type="submit" class="btn btn-danger"><a href="index.php">kembali</a></button>
		    </div>
		  </div>
		</form>
	</div>
</body>
</html>