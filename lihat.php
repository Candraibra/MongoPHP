<!DOCTYPE html>
<html>
<?php
require_once __DIR__ . "/vendor/autoload.php";

$connection = new MongoDB\Driver\Manager();
$db = (new MongoDB\Client)->dbweb;

$collection = (new MongoDB\Client)->dbweb->twarga;

$result = $collection->find();

?>
<head>

	<title>Perpustakaan SMK Telkom Purwokerto</title>
	<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Set a style for all buttons */
.button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.button:hover {
    opacity: 0.8;
}
table{
	margin-top:50px
}
</style>
</head>
<body class="bdlihat">



<div id="lihat">
<h2>Daftar Pengunjung Perpustakaan</h2>

 <a class="button" style="width:auto; style="width:auto; href="index.php" class="lihat">Tambah</a>
 <a  class="button" style="width:auto; style="width:auto; href="lihat.php" class="lihat">Lihat</a>
<div class="t-lihat">
	<table border="">
	 
	    <tr>
	        <th>Nama</th>
	        <th>Kelas</th>
			<th>Tanggal</th>
	        <th>Keterangan</th>
			<th>Opsi</th>
	    </tr>
	    <?php     
	    foreach ($result as $res) {
	        echo "<tr>";
	        echo "<td>".$res['nama']."</td>";
	        echo "<td>".$res['kelas']."</td>";    
	        echo "<td>".$res['tanggal']."</td>";  
	        echo "<td>".$res['keterangan']."</td>";
	        echo "<td>
	        <div class='edit'>
	        <a href=\"edit.php?id=$res[_id]\">Edit</a>
	        </div>
	        <div class='delete'>
	        <a href=\"delete.php?id=$res[_id]\" onClick=\"return confirm('Anda yakin untuk menghapus data?')\">Delete</a>
	        </div>
	        </td>";        
	    }
	    ?>
	  </table>
</div>
</div>
	</form>
</body>
</html>