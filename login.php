<?php

require 'function.php';

if (isset($_POST["signin"])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$hasil = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	//mengecek username
	if (mysqli_num_rows($hasil) === 1) {
		
		$row = mysqli_fetch_assoc($hasil);
		if (password_verify($password, $row["password"])) {
			header("Location: index.php");
	exit;
		}

	$error = true;
	}

	//mengecek password
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Halaman Login </title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>

<h1> LOGIN DI SINI! </h1>

<?php
if (isset($error)) : ?>
	<p style="color: red;"> Username atau Password yang Anda Masukkan Salah! </p>
<?php endif; ?>

	<form action="" method="POST">

		<ul>

			<li>
				<label for="username"> Username: </label>
				<input type="text" name="username" id="username">
			</li>

			<li>
				<label for="password"> Password: </label>
				<input type="password" name="password" id="password">
			</li>

			<li>
				<button type="submit" name="signin"> Sign In </button>
			</li>

		</ul>

	</form>

</body>
</html>