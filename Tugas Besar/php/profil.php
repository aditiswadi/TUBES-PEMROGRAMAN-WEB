<?php 

if (!isset($_GET['id'])) {
	header("Location: ../index.php");
	exit;
}

require '../helper/functions.php';
$id = $_GET['id'];

$company = query("SELECT * FROM perusahaan_teknologi where id = $id")[0];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profil Perusahaan</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/profil-user.css">
</head>
<body>

<div class="header">
    <h1>Profil Perusahaan Teknologi</h1>
  </div>
  
  <div class="container">
      <div class="content">
        <div class="gambar"><img src="../assets/img/<?= $company['gambar']; ?>"></div>
        <div class="isi">
         <div class="row">
           <div class="col-md-4">
            <p>Nama Perusahaan</p>
            <p>Jumlah Penghasilan</p>
            <p>Jumlah Laba</p>
            <p>Jumlah Asset</p>
            <p>Jumlah Karyawan</p>
            <p>Kantor Pusat</p>
            <p>CEO</p>
           </div>
           <div class="col md-1">
             <p>:</p>
             <p>:</p>
             <p>:</p>
             <p>:</p>
             <p>:</p>
             <p>:</p>
             <p>:</p>

           </div>
           <div class="col-md-7">
            <p><?= $company['nama']; ?></p>
            <p><?= $company['penghasilan']; ?></p>
            <p><?= $company['laba']; ?></p>
            <p><?= $company['asset']; ?></p>
            <p><?= $company['karyawan']; ?></p>
            <p><?= $company['kantor']; ?></p>
            <p><?= $company['ceo']; ?></p>
           </div>
         </div>
         <a style="text-decoration: none; font-size: 20px; font-weight: bold;" href="../index.php">Kembali</a>
        </div>
      </div>
  </div>
</body>
</html>