<?php
    session_start();
    include 'koneksi.php';
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
    <title>Kategori | E-Catalog</title>
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
            <h3>Kategori</h3>
            <div class="box">
                <p><a href="kategori_create.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="tabel">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            $kategori = mysqli_query($db_koneksi, "SELECT category_id FROM product GROUP BY category_id");
                            while($row = mysqli_fetch_array($kategori)){
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['category_id'] ?></td>
                                <td>
                                    <a href="kategori_edit.php?id=<?php echo $row['category_id']?>">EDIT</a> || 
                                    <a href="kategori_proses_delete.php?idk=<?php echo $row['category_id']?>" 
                                            onclick="return confirm('Yakin Hapus Data ?')">HAPUS</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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