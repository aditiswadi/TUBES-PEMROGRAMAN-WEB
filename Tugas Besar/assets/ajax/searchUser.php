<?php 
require '../../helper/functions.php';
$keyword = $_GET["keyword"];
$query= "SELECT * FROM perusahaan_teknologi WHERE
				nama LIKE '%$keyword%'
			  ";
$perusahaan_teknologi = query($query);

 ?>

  <div class="container">
    <?php if(empty($perusahaan_teknologi)): ?>
            <tr>
              <td colspan="12">
                <h1 align="center">Data Tidak Ditemukan!</h1>
              </td>
            </tr>
          <?php else: ?>
    <?php $i = 1; ?>
    <?php foreach ($perusahaan_teknologi as $company): ?>
      <div class="content">
        
        <div class="isi">
         <p class="nama">
           <a href="php/profil.php?id=<?= $company['id']; ?>&nama=<?= $company['nama']; ?>&penghasilan=<?= $company['penghasilan']; ?>&laba=<?= $company['laba']; ?>&asset=<?= $company['asset']; ?>&karyawan= <?= $company['karyawan']; ?>&kantor=<?= $company['kantor']; ?>&ceo=<?= $company['ceo']; ?>"><?= $company['id'] . '. ' . $company['nama']; ?></a>
         </p>
          <div class="gambar"><img src="assets/img/<?= $company['gambar']; ?>"></div>
        </div>
        <div class="clear"></div>
      </div>
    <?php endforeach ; ?>
  <?php endif; ?>
  </div>