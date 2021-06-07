<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
	 $id = $_POST['id_barang'];
	 $nama = $_POST['nama'];
	 $kategori = $_POST['kategori'];
	 $harga_beli = $_POST['harga_beli'];
	 $harga_jual = $_POST['harga_jual'];
	 $stok = $_POST['stok'];
	 $file_gambar = $_FILES['file_gambar'];
	 $gambar = null;

	 if ($file_gambar['error'] == 0)
	 {
		 $filename = str_replace(' ', '_', $file_gambar['name']);
		 $destination = dirname(__FILE__) . '/gambar/' . $filename;
		 if (move_uploaded_file($file_gambar['tmp_name'], $destination))
	 {
	 		$gambar = 'gambar/' . $filename;;
	 }
	 }
	 $sql = 'UPDATE data_barang SET ';
	 $sql .= "nama = '{$nama}', kategori = '{$kategori}', ";
	 $sql .= "harga_beli = '{$harga_beli}', harga_jual = '{$harga_jual}', stok = '{$stok}' ";
	 if (!empty($gambar))
		 $sql .= ", gambar = '{$gambar}' ";
		 $sql .= "WHERE id = '{$id_barang}'";
		 $result = mysqli_query($conn, $sql);

		 header('location: home.php');
	}
	$id = $_GET['id'];
	$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
	$result = mysqli_query($conn, $sql);
	if (!$result) die('Error: Data tidak tersedia');
	$data = mysqli_fetch_array($result);

	function is_select($var, $val) {
	 if ($var == $val) return 'selected="selected"';
	 return false;
	}
?>

	<?php require('header.php'); ?>

	 <style type="text/css">
	 	* {
	 		font-family: "Trebuchet MS";
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

	<div class="container">
		 <h1>Ubah Barang</h1>
		 <div class="main">
			 <form method="post" action="ubah.php" enctype="multipart/form-data">
 				<div class="input">
				 <label>Nama Barang</label>
				 <input type="text" name="nama" value="<?php echo $data['nama'];?>" />
				</div>
			 <div class="input">
				 <label>Kategori</label>
				 <select name="kategori">
				 	<option <?php echo is_select('Komputer', $data['kategori']);?> value="Komputer">Komputer</option>
 					<option <?php echo is_select('Komputer', $data['kategori']);?> value="Elektronik">Elektronik</option>
 					<option <?php echo is_select('Komputer', $data['kategori']);?> value="Hand Phone">Hand Phone</option>
				 </select>
 			</div>
			 <div class="input">
				 <label>Harga Beli</label>
				 <input type="text" name="harga_beli" value="<?php echo $data['harga_beli'];?>" />
			 </div>
			 <div class="input">
				 <label>Harga Jual</label>
				 <input type="text" name="harga_jual" value="<?php echo $data['harga_jual'];?>" />
			 </div>
			 <div class="input">
				 <label>Stok</label>
				 <input type="text" name="stok" value="<?php echo $data['stok'];?>" />
			 </div>
			 <div class="input">
				 <label>File Gambar</label>
				 <img src="gambar/<?= $data['gambar'];?>">
				 <input type="file" name="file_gambar" />
			 </div>
			 <div class="submit">
				<input type="hidden" name="id" value="<?php echo $data['id_barang'];?>" />
				<button type="submit" name="submit" value="Simpan">Simpan</button>
			 </div>
 		</form>
 	</div>
</div>

<?php require('footer.php'); ?>