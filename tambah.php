<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) 
{
	$nama = $_POST['nama'];
	$kagetori = $_POST['kagetori'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];
	$stok = $_POST['stok'];
	$file_gambar = $_POST['file_gambar'];
	$gambar = null;
	if ($file_gambar['error'] == 0 ) 
	{
		$filename = str_replace(' ', '_', $file_gambar['name']);
		$destination = dirname(__FILE__).'/gambar/'.$filename;
		if (move_uploaded_file($file_gambar['tmp_name'], $destination)) 
		{
			$gambar = '/gambar'.$filename;;
		}
	}
	$sql = 'INSERT INTO data_barang (nama, kategori, harga_beli, harga_jual, stok, gambar )';
	$sql = "VALUE ('{$nama}', '{$kategori}', '{$harga_beli}', '{$harga_jual}', '{$stok}', '{$gambar}' )";
	$result = mysqli_query($conn, $sql);
	header('location : index.php');
}
?>

	<style type="text/css">
		* {
			font-family: "Trebuchet MS"
		}
		h1 {
			text-transform: uppercase;
        	color: salmon;
		}
		button {
			background-color: salmon;
	        color: #fff;
	        padding: 10px;
	        text-decoration: none;
	        font-size: 12px;
	        border: 0px;
	        margin-top: 20px;
		}
		label {
			margin-top: 10px;
		    float: left;
		    text-align: left;
		    width: 100%;
		}
		input {
			padding: 6px;
		    width: 20%;
		    box-sizing: border-box;
		    background: #f8f8f8;
		    border: 2px solid #ccc;
		    outline-color: salmon;
		}
		select {
			padding: 6px;
			width: 20%;
		    box-sizing: border-box;
		    background: #f8f8f8;
		    border: 2px solid #ccc;
		    outline-color: salmon;
		}
		div {
			width: 100%;
    		height: auto;
		}
		.base {
			width: 400px;
		    height: auto;
		    padding: 20px;
		    margin-left: auto;
		    margin-right: auto;
		    background: #ededed;
		}
	</style>

	<?php require('header.php'); ?>

	<div class="container">
		<h1>Tambah Barang</h1>
		<div class="main">
			<form method="post" action="tambah.php" enctype="multipart/form-data">
				<div class="input">
					<label>Nama Barang</label>
					<input type="text" name="nama" />
				</div>
				<div class="input">
					<label>Kategori</label>
					<select name="kategori">
					<option value="Komputer">Komputer</option>
					<option value="Elektronik">Elektronik</option>
					<option value="Hand Phone">Hand Phone</option>
				</select>
				</div>
				<div class="input">
					<label>Harga Jual</label>
					<input type="text" name="harga_jual" />
				</div>
				<div class="input">
					<label>Harga Beli</label>
					<input type="text" name="harga_beli" />
				</div>
				<div class="input">
					<label>Stok</label>
					<input type="text" name="stok" />
				</div>
				<div class="input">
					<label>File Gambar</label>
					<input type="file" name="file_gambar" />
				</div>
				<div class="submit">
					<button type="submit" name="submit" value="Simpan">Simpan</button> 
				</div>
			</form>
		</div>
	</div>

<?php require('footer.php'); ?>