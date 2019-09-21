<?php 
session_start();
require '../helper/functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

$id = $_GET["id"];
$perusahaan_teknologi = query("SELECT * FROM perusahaan_teknologi WHERE id = $id")[0];

if (isset($_POST['ubah'])) {
	if (ubah($_POST) > 0) {
		echo "<script>
				alert('Data Berhasil diubah!');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "<script>
				alert('Data Gagal diubah!');
				document.location.href = 'index.php';
			</script>";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/ubah.css">
</head>
<body>
	<h1>Ubah Data Perusahaan</h1>
	<div class="container">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $perusahaan_teknologi['id'] ?>">
			<input type="hidden" class="form-control" name="gambarLama" value="<?php echo $perusahaan_teknologi['gambar'] ?>">
		  <div class="form-group row">
		    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Perusahaan" value="<?php echo $perusahaan_teknologi['nama'] ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="penghasilan" class="col-sm-2 col-form-label">Penghasilan</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="penghasilan" id="penghasilan" placeholder="Penghasilan" value="<?php echo $perusahaan_teknologi['penghasilan'] ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="laba" class="col-sm-2 col-form-label">Laba</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="laba" id="Laba" placeholder="Laba" value="<?php echo $perusahaan_teknologi['laba'] ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="asset" class="col-sm-2 col-form-label">Asset</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="asset" id="asset" placeholder="Asset" value="<?php echo $perusahaan_teknologi['asset'] ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="karyawan" class="col-sm-2 col-form-label">Karyawan</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="karyawan" id="karyawan" placeholder="Karyawan" value="<?php echo $perusahaan_teknologi['karyawan'] ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="kantor" class="col-sm-2 col-form-label">Kantor</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="kantor" id="kantor" placeholder="Kantor" value="<?php echo $perusahaan_teknologi['kantor'] ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="ceo" class="col-sm-2 col-form-label">CEO</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="ceo" id="ceo" placeholder="CEO" value="<?php echo $perusahaan_teknologi['ceo'] ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
		    <img src="../assets/img/<?= $perusahaan_teknologi['gambar']; ?>">
		    <div class="col-sm-10">
		      <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar">
		    </div>
		  </div>		  
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
		      <button type="submit" class="btn btn-danger"><a href="index.php">kembali</a></button>
		    </div>
		  </div>
		</form>
	</div>
</body>
</html>