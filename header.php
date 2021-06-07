<?php
include ("koneksi.php");

$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DATA BARANG</title>
	<style type="text/css">
		*{
			font-family: "Trebuchet MS"
		}
		h1 {
			text-transform: uppercase;
			color: salmon;
		}
		table {
			border: solid 1px #DDEEEE;
			border-collapse: collapse;
			border-spacing: 0;
			width: 90%;
		}
		table thead th {
			background-color: #DDEFEF;
	        border: solid 1px #DDEEEE;
	        color: #336B6B;
	        padding: 10px;
	        text-align: center;
	        text-shadow: 1px 1px 1px #fff;
	        text-decoration: none; 
		}
		table tbody td {
			border: solid 1px #DDEEEE;
	        color: #333;
	        text-align: center;
	        padding: 10px;
	        text-shadow: 1px 1px 1px #fff;
		}
		a {
			background-color: #7FFFD4;
	        color: black;
	        padding: 10px;
	        text-decoration: none;
	        font-size: 12px;
		}
	</style>
</head>
<body>
	<div id="container">
		<header>
			<h1>Wellcome to Database Barang</h1>
		</header>
		<nav>
			<a href="home.php">Home</a>
			<a href="tambah.php">Tambah Barang</a>
		</nav>
	</div>
</body>
</html>