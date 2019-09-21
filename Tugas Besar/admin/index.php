<?php 
session_start();
	require '../helper/functions.php';

	if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
	}

	// $jumlahDataPerHalaman = 3;
	// $jumlahData = count(query("SELECT * FROM perusahaan_teknologi"));
	// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	// $halaman = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	// $awalData = ($jumlahDataPerHalaman * $halaman) - $jumlahDataPerHalaman;

	if (isset($_GET['tombolCari'])) {
		$keyword = $_GET['keyword'];
		$perusahaan_teknologi = query("SELECT * FROM perusahaan_teknologi WHERE
				nama LIKE '%$keyword%' OR
				penghasilan LIKE '%$keyword%' OR
				laba LIKE '%$keyword%' OR
				asset LIKE '%$keyword%' OR
				karyawan LIKE '%$keyword%' OR
				kantor LIKE '%$keyword%' OR
				ceo LIKE '%$keyword%'
			");
	} else {
		// $perusahaan_teknologi = query("SELECT * FROM perusahaan_teknologi LIMIT $awalData, $jumlahDataPerHalaman");
		$perusahaan_teknologi = query("SELECT * FROM perusahaan_teknologi");
	}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Halaman Admin</title>
 	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
 	<link rel="stylesheet" href="../assets/css/index-admin.css">

 	<style>
 		@media print {
 			.search, .tambahLogout, .aksi {
 				display: none;
 			}
 		}

 	</style>

 </head>
 <body>
	<div class="container">
	        <div class="table-wrapper">
	            <div class="table-title">
	                <div class="row">
	                    <div class="col-sm-4">
							<h2>Perusahaan <b>Teknologi</b></h2>
						</div>
						
						<div class="urut" style="width: 100px; margin-right: 20px;">
							<form action="" method="get">
						<select name="sort" id="sort" class="form-control">
							<option value="id">Id</option>
							<option value="nama">Nama</option>
							<option value="penghasilan">Penghasilan</option>
							<option value="laba">Laba</option>
							<option value="asset">Asset</option>
							<option value="karyawan">Karyawan</option>
							<option value="kantor">Kantor</option>
							<option value="ceo">CEO</option>
						</select>
						<button id="urut" type="submit" name="urut" class="btn btn-basic" style="display: none;"></button>
					</form>
						</div>
						<div class="search">
							<form class="form-inline my-2 my-lg-0">
      						<input class="form-control mr-sm-2" type="search" name="keyword" id="keyword" placeholder="Cari data...">
      						<button class="btn btn-info my-2 my-sm-0" type="submit" name="tombolCari" id="tombolCari">Search</button>
    					</form>
						</div>
						
						<div class="col-sm-4">
							<div class="tombol">
								<a href="logout.php" class="btn btn-danger">Logout</a>
								<a href="tambah.php" class="btn btn-success"><span>Tambah Data Perusahaan</span></a>
								<a href="cetak.php" class="btn btn-info" target="_blank"><span>Cetak</span></a>
							</div>
						</div>
	                </div>
	            </div>
	            <div id="tempat">
	            <table class="table table-striped table-hover">
	                <thead>
	                    <tr>
	                        <th>#</th>
						     <th class="aksi">Opsi</th>
						     <th>Nama</th>
						     <th>Penghasilan</th>
						     <th>Laba</th>
						     <th>Asset</th>
						     <th>Karyawan</th>
						     <th>Kantor</th>
						     <th>CEO</th>
						     <th>Gambar</th>
	                    </tr>
	                </thead>
	                <?php if(empty($perusahaan_teknologi)): ?>
			 			<tr>
			 				<td colspan="12">
			 					<h1 align="center">Data Tidak Ditemukan!</h1>
			 				</td>
			 			</tr>
		 			<?php else: ?>
		  <?php asort($perusahaan_teknologi); ?>
		  <?php foreach ($perusahaan_teknologi as $company): ?>
	                <tbody>
	                    <tr>
	                        <td><?= $company['id']; ?></td>
					      	<td class="aksi">
					      		<a href="ubah.php?id=<?= $company['id']; ?>" style="color: blue;">Ubah</a>
				 				<a href="hapus.php?id=<?php echo $company['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')" style="color: red;">Hapus</a>
					      	</td>
					      	<td><?= $company['nama']; ?></td>
					      	<td><?= $company['penghasilan']; ?></td>
					      	<td><?= $company['laba']; ?></td>
					      	<td><?= $company['asset']; ?></td>
					      	<td><?= $company['karyawan']; ?></td>
					      	<td><?= $company['kantor']; ?></td>
					      	<td><?= $company['ceo']; ?></td>
					      	<td><img src="../assets/img/<?= $company['gambar']; ?>"></td>
	                    </tr>
	                </tbody>
	      <?php endforeach; ?>
					<?php endif; ?>
	            </table>
	            </div>
	        </div>
	        <!-- <?php if($halaman > 1): ?>
	        	<a href="?halaman=<?= $halaman - 1; ?>">&lt;</a>
	    	<?php endif; ?>
	        <?php for($i = 1; $i <= $jumlahHalaman; $i++): ?>
	        	<?php if($i == $halaman): ?>
					<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
				<?php else: ?>
					<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
				<?php endif; ?>
			<?php endfor; ?>
			<?php if($halaman < $jumlahHalaman): ?>
	        	<a href="?halaman=<?= $halaman + 1; ?>">&gt;</a>
	    	<?php endif; ?> -->
	</div>
	<script src="../assets/js/jquery-3.3.1.min.js"></script>
	<script src="../assets/js/script.js"></script>
 </body>
 </html>