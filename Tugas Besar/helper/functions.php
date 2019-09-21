<?php 
function koneksi() {
	$conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB gagal");
	mysqli_select_db($conn, "pw_173040165") or die("Database salah!");

	return $conn;
}

function query($sql) {
	$conn = koneksi();
	$results = mysqli_query($conn, "$sql");

	$rows = [];
	while ( $row = mysqli_fetch_assoc($results) ) {
		$rows[] = $row;
	};
	return $rows;
}

function tambah($data) {
	$conn = koneksi();

	$id = $data['id'];
	$nama = htmlspecialchars($data['nama']);
	$penghasilan = htmlspecialchars($data['penghasilan']);
	$laba = htmlspecialchars($data['laba']);
	$asset = htmlspecialchars($data['asset']);
	$karyawan = htmlspecialchars($data['karyawan']);
	$kantor = htmlspecialchars($data['kantor']);
	$ceo = htmlspecialchars($data['ceo']);
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	$querytambah = "INSERT INTO perusahaan_teknologi
						VALUES ('', '$nama', '$penghasilan', '$laba', '$asset', '$karyawan', '$kantor', '$ceo', '$gambar')";

	mysqli_query($conn, $querytambah);

	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error =  $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	if ($error === 4) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu');
			  </script>";
		return false;
	}

	$ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('Yang anda upload bukan gambar!');
			</script>";
		return false;
	}

	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
			</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
	return $namaFileBaru;
}

function hapus($id) {
	$conn = koneksi();
	mysqli_query($conn, "DELETE FROM perusahaan_teknologi WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	$conn = koneksi();

	$id =$data['id'];
	$nama = htmlspecialchars($data['nama']);
	$penghasilan = htmlspecialchars($data['penghasilan']);
	$laba = htmlspecialchars($data['laba']);
	$asset = htmlspecialchars($data['asset']);
	$karyawan = htmlspecialchars($data['karyawan']);
	$kantor = htmlspecialchars($data['kantor']);
	$ceo = htmlspecialchars($data['ceo']);
	$gambarLama = htmlspecialchars($data['gambarLama']);

	if ($_FILES['gambar']['error'] ===4) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	

	$queryubah = "UPDATE perusahaan_teknologi
						SET
						nama = '$nama',
						penghasilan = '$penghasilan',
						laba = '$laba',
						asset = '$asset',
						karyawan = '$karyawan',
						kantor = '$kantor',
						ceo = '$ceo',
						gambar = '$gambar'
					WHERE id = $id
						";

	mysqli_query($conn, $queryubah);

	return mysqli_affected_rows($conn);
}

function registrasi($data) {
	$conn = Koneksi();
	$username = strtolower(trim($data["username"]));
	$password1 = mysqli_real_escape_string($conn, $data["password1"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek apakah password1 != password2
	if ($password1 != $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
				document.location.href = 'registrasi.php';
			  </script>";
		return false;
	}


	// cek jika sudah ada username yang sama
	$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if (mysqli_num_rows($cek_user) == 1) {
		echo "<script>
				alert('username sudah terpakai!');
				document.location.href = 'registrasi.php';
			  </script>";
		return false;
	}

	// enksripsi password 
	$password_baru = password_hash($password1, PASSWORD_DEFAULT);

	// masukan data user baru ke DB

	$query = "INSERT INTO user VALUES('', '$username', '$password_baru')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

 ?>