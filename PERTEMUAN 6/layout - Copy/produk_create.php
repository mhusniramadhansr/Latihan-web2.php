<?php
    include 'koneksi.php';
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | e-Catalog</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">e-CATALOG</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboar</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </div>
    </header>

    <!-- content -->

    <div class="section">
        <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori">
                        <option value="">Choose Categories</option>
                        <?php
                            $kategori = mysqli_query($db_koneksi, "SELECT * FROM category ORDER BY category_id DESC");
                            while($k = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $k['category_id']?>"> <?php echo $k['product_name']?> </option>
                        <?php }?>
                    </select>
                    <input type="text" name="id" class="input-control" placeholder="ID Produk" required>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea name="deskripsi" placeholder="deskripsi" class="input-control"></textarea>
                    <script>
                        CKEDITOR.replace( 'deskripsi' );
                    </script>
                    <select name="status_produk" class="input-control">
                            <option value="">--Choose--</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                
				<?php

					if(isset($_POST['submit'])){
                        
                        //menampung input form produk
                        $id         = $_POST['id'];
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status_produk'];

                        //menampung data file yang diupload
                        $filename   = $_FILES['gambar']['name'];
                        $tmp_name   = $_FILES['gambar']['tmp_name'];

                        $type1      = explode('.', $filename);
                        $type2      = $type1[1];

                        //membatasi file yang diupload
                        $permit = array('jpg','jpeg','png','gif');

                        //validasi file
                        if(!in_array($type2, $permit)){
                            echo '<script>alert("Format File Tidak Diizinkan")</script>';
                        }
                        else{
                            //insert dan proses upload file
                            move_uploaded_file($tmp_name, './produk/'.$filename);

                            $insert = mysqli_query($db_koneksi, "INSERT INTO product VALUES (
                                '".$id."',
                                '".$kategori."',
                                '".$nama."',
                                '".$harga."',
                                '".$deskripsi."',
                                '".$filename."',
                                '".$status."',
                                null
                            )");

                            if($insert){
                                echo '<script>alert("Data Berhasil Di Upload")</script>';
                                echo '<script>window.location="produk.php"</script>';
                            }else{
                                echo 'Gagal Di Insert', mysqli_error($db_koneksi);
                            }
                        }
					}
				?>
				
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - e-Catalog Lintas Prodi</small>
        </div>
    </footer>
</body>
</html>