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

$sql = "SELECT * FROM kontak ORDER BY nama";
$qry = mysqli_query($conn, $sql) or die("Proses cetak gagal");

echo "<table width='75%' cellpadding='2' cellspacing='0' border='1'>
	<tr>
		<th> No. </th>
		<th> Nama </th>
		<th> Jenis Kelamin </th>
		<th> Email </th>
		<th> Alamat </th>
		<th> Kota </th>
		<th> Pesan </th>";
$no = 1;
while ($hasil = mysqli_fetch_row($qry)) {
	echo "<tr>
		<td> $hasil[0] </td>
		<td> $hasil[1] </td>
		<td> $hasil[2] </td>
		<td> $hasil[3] </td>
		<td> $hasil[4] </td>
		<td> $hasil[5] </td>
		</tr>";
	$no++;
}
echo "</table>";
?>
<a href="index.php"> Kembali </a>