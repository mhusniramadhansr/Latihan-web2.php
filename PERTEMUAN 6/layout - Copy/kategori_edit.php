<?php
    include 'koneksi.php';
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $kategori = mysqli_query($db_koneksi, "SELECT *FROM category WHERE 
                            category_id='".$_GET['id']."'");
    if(mysqli_num_rows($kategori) == 0){
        echo '<script>window.location="kategori.php "</script>';
    }
    $k = mysqli_fetch_object($kategori);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | E-Catalog</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
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
            <h3>Tambah Data</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="Nama" placeholder="Nama Kategori" class="input-control" 
                    value="<?php echo $k->category_name?>" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php

					if(isset($_POST['submit'])){
						$nama = ucwords($_POST['Nama']);

						$update = mysqli_query($db_koneksi, "UPDATE category SET 
                                                category_name='".$Nama."' WHERE 
                                                category_id='".$k->category_id."'");
						if($update){
							echo '<script>alert("Edit Kategori Berhasil")</script>';
							echo '<script>window.location="kategori.php"</script>';
						}else {
							echo 'Gagal'. mysqli_error($db_koneksi);
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