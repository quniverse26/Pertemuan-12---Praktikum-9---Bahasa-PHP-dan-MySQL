<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pertemuan12";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());

mysqli_close($conn);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//mengecek username yang dimasukkan oleh user sudah ada atau belum
	$hasil = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
	if (mysqli_fetch_assoc($hasil)) {
		echo "<script>
			alert('Username yang Anda masukkan sudah terdaftar!');
		</script>";
	
	return false;

	}

	//mengecek apakah konfirmasi password sama dengan password awal
	if($password !== $password2) {
		echo "<script>
			alert('Konfirmasi Password yang Anda masukkan tidak sesuai!');
		</script>";
	
	return false;
	}

	//enkripsi password yang dimasukkan oleh user
	$password = password_hash($password, PASSWORD_DEFAULT);

	//menambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

?>