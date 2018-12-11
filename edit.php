<?php
use \MongoDB\BSON\ObjectID as MongoId;
// including the database connection file
include_once("viewedit.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $user = array (
        'nama' => $_POST['nama'],
        'kelas' => $_POST['kelas'],
        'tanggal' => $_POST['tanggal'],
        'keterangan' => $_POST['keterangan'],
            );
    
    // checking empty fields
    $errorMessage = '';
    foreach ($user as $key => $value) {
        if (empty($value)) {
            $errorMessage .= $key . ' field is empty<br />';
        }
    }
            
    if ($errorMessage) {
        // print error message & link to the previous page
        echo '<span style="color:red">'.$errorMessage.'</span>';
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";    
    } else {
        //updating the 'users' table/collection
        $db->twarga->updateOne(
                        array('_id' => new MongoId($id)),
                        array('$set' => $user)
                    );
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: lihat.php");
    }
} // end if $_POST
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = $db->twarga->findOne(array('_id' => new MongoId($id)));
 
$nama = $result['nama'];
$kelas = $result['kelas'];
$tanggal = $result['tanggal'];
$keterangan = $result['keterangan'];

?>
<html>
<head>    
    <title>Edit Data</title>
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
.update{
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
 
<body >
<div id="edit">
<h2>Edit Pengunjung Perpustakaan</h2>

<a  class="button" style="width:auto; style="width:auto; href="index.php" class="lihat">Tambah</a>
<a   class="button" style="width:auto; style="width:auto; href="lihat.php" class="lihat">Lihat</a>
    <form name="form1" method="post" action="edit.php">


        <table border="0" >
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
            </tr>
            <tr> 
                <td>Kelas</td>
                <td><input type="text" name="kelas" value="<?php echo $kelas;?>"></td>
            </tr>
            <tr> 
                <td>Tanggal</td>
                <td><input type="text" name="tanggal" value="<?php echo $tanggal;?>"></td>
            </tr>
            <tr> 
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value="<?php echo $keterangan;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" class="update" name="id" value="<?php echo $_GET['id'];?>"></td>
                <td><input type="submit" class="update" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>