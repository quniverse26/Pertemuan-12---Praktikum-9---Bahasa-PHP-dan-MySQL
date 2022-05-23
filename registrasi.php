<?php

require 'function.php';

if (isset($_POST["signup"])) {
	if (registrasi($_POST) > 0) {
		echo "<script>
			alert('User baru berhasil ditambahkan!');
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Halaman Registrasi </title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>

	<h1> REGISTRASI DI SINI! </h1>

	<form action="" method="POST">
		
		<ul>
			<li>
				<label for="username"> Username: </label>
				<input type="username" name="username" id="username">
			</li>

			<li>
				<label for="password"> Password: </label>
				<input type="password" name="password" id="password">
			</li>

			<li>
				<label for="password2"> Konfirmasi Password: </label>
				<input type="password" name="password2" id="password2">
			</li>

			<li>
				<button type="submit" name="signup"> Sign up </button>
			</li>

		</ul>
	
	</form>

</body>
</html>