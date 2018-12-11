<!DOCTYPE html>
<html>
<head>
<?php
require_once __DIR__ . "/vendor/autoload.php";

$connection = new MongoDB\Driver\Manager();
$db = (new MongoDB\Client)->dbweb;

$collection = (new MongoDB\Client)->dbweb->twarga;

$result = $collection->find();

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
.button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.avatar{
	width:60px;
	height:120px
}
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2>Daftar Pengunjung Perpustakaan</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Tambah</button>
 <a class ="button"style="width:auto; style="width:auto; href="lihat.php" class="lihat">Lihat</a>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="open.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Nama</b></label>
      <input type="text" placeholder="Masukan Nama Anda" name="nama" required>

      <label for="kelas"><b>Kelas</b></label>
      <input type="text" placeholder="XII RPL 1" name="kelas" required>

	  <label for="tanggal"><b>Tanggal</b></label>
      <input type="text" placeholder="DD-MM-YYYY" name="tanggal" required>

	   <label for="keterangan"><b>Ketrangan</b></label>
      <input type="text" placeholder="Membaca | Menulis " name="keterangan" required>
        
	  <button name="Submit" class="tambahi" value="Add">TAMBAH</button>
	  <?php
if(isset($_POST['Submit'])){
$insertOneResult = $collection->insertOne([
    'nama' => $_POST['nama'],
    'kelas' => $_POST['kelas'],
    'tanggal' => $_POST['tanggal'],
    'keterangan' => $_POST['keterangan'],
]);}

?>
      
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>

