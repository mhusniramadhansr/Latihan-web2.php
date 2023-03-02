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
            <h3>Dashboard</h3>
            <div class="box">
                <h4>WELCOME TO OUR WEB <?php echo $_SESSION['global']->costumer_name?>. 
                ENJOY SEEK OUR PRODUCT</h4>
            </div>
            <table border="1" cellspacing="0" class="tabel">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th width="150px">Action</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            $produk = mysqli_query($db_koneksi, "SELECT * FROM product ORDER BY product_id");
                            if(mysqli_num_rows($produk) > 0){
                            while($row = mysqli_fetch_array($produk)){
                        ?>
                            <tr>
                                
                                <td><img width="100px" src="produk/<?php echo $row['product_image']?>"></td>
                                <td>
                                    <a href="produk_edit.php?id=<?php echo $row['product_id']?>">EDIT</a> || 
                                    <a href="produk_proses_delete.php?idp=<?php echo $row['product_id']?>" 
                                            onclick="return confirm('Yakin Hapus Data ?')">HAPUS</a>
                                </td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td><?php echo $row['product_price'] ?></td>
                                <td><?php echo $row['product_description'] ?></td>
                            </tr>
                        <?php }} 
                        else{ ?>
                            <tr>
                                <td colspan="8">Tidak Ada Data</td>
                            </tr>
                        <?php ;}?> 
                    </tbody>
                </table>
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