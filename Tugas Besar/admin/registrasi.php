<?php 
session_start();
require '../helper/functions.php';

if (isset($_SESSION["register"])) {
	header("Location: login.php");
	exit;
}

if (isset($_POST["register"])) {
	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
				document.location.href = 'login.php';
			  </script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>
	<!-- <h1>Form Registrasi</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username" autofocus>
			</li>
			<li>
				<label for="password1">Password :</label>
				<input type="password" name="password1" id="password1" required="">
			</li>
			<li>
				<label for="password2">Konfirmasi Password :</label>
				<input type="password" name="password2" id="password2" required="">
			</li>
			<li>
				<button type="submit" name="register">Register</button>
			</li>
		</ul>
	</form> -->

	<div class="outter-form-login">
            <form action="" method="POST" class="inner-login">
            <h2 class="text-center title-login">Registrasi Admin</h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Konformasi Password" required>
                </div>
                <input type="submit" name="register" class="btn btn-block btn-custom-green" value="Register">
            </form>
        </div>
    </div>

</body>
</html>