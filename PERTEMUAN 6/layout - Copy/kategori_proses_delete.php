<?php 
// koneksi database
include 'kategori.php';
 
// menangkap data yang di kirim dari form
$id = $_GET['idk'];

// menhapus
mysqli_query($db_koneksi,"delete from category where category_id='$id'");
echo '<script>window.location="kategori.php"</script>';
?>