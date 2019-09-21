<?php 
require '../../helper/functions.php';
$sort = $_GET["sort"];
$query= "SELECT * FROM perusahaan_teknologi ORDER BY $sort";
$perusahaan_teknologi = query($query);

 ?>

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