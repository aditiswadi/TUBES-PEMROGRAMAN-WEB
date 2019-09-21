<?php 
session_start();
require '../helper/functions.php';

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$results = mysqli_query(koneksi(), "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($results);
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
	}

if (isset($_POST['login'])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");

	if (mysqli_num_rows($cek_user) == 1) {
		$row = mysqli_fetch_assoc($cek_user);
		if (password_verify($password, $row["password"])) {
			$_SESSION['login'] = true;
			if (isset($_POST['remember'])) {
				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}
			header("Location: index.php");
			exit;
		}

		
	} 
		$error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/login.css">
	
</head>
<body>

	<div class="outter-form-login">
            <form action="" method="POST" class="inner-login">
            <h2 class="text-center title-login">Login Admin</h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="checkbox" class="form-control" name="remember" id="remember">
                    <label style="margin-left: 140px; " for="remember">Ingat Saya</label>
                </div>
                <input type="submit" name="login" class="btn btn-block btn-custom-green" value="LOGIN">
            </form>
            
            <?php if(isset($error)): ?>
				<p style="color: red; font-style: italic;">username / password salah</p>
			<?php endif; ?>
        </div>
    </div>

	
</body>
</html>


