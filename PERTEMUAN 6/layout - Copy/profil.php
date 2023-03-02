<?php
    include 'koneksi.php';
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($db_koneksi, "SELECT * FROM customer WHERE id_costumer='".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query);
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
            <h3>PROFIL</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="Id" placeholder="ID User" class="input-control" value="<?php echo $d->id_costumer?>" required>
                    <input type="text" name="Nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->costumer_name?>" required>
                    <input type="text" name="username" placeholder="Username" class="input-control" value="<?php echo $d->username?>" required>
                    <input type="text" name="password" placeholder="password" class="input-control" value="<?php echo $d->password?>" required>
                    <!-- <input type="date" name="Ttl" placeholder="Tempat Tanggal Lahir" class="input-control" value="<?php //echo $d->ttl?>" required> -->
                    <input type="text" name="Jenis_kelamin" placeholder="Jenis Kelamin" class="input-control" value="<?php echo $d->jenis_kelamin?>" required>
                    <input type="text" name="Alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->alamat?>" required>
                    <input type="text" name="Contact" placeholder="Contact" class="input-control" value="<?php echo $d->contact?>" required>
                    <input type="text" name="Pekerjaan" placeholder="Pekerjaan" class="input-control" value="<?php echo $d->pekerjaan?>" required>
                    <input type="submit" name="submit" value="Ubah Profile" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $_nama      = ucwords($_POST['Nama']);
                        $_user      = $_POST['username'];
                        $_password  = $_POST['password'];
                        // $_ttl       = $_POST['Ttl'];
                        $_jk        = $_POST['Jenis_kelamin'];
                        $_alamat    = ucwords($_POST['Alamat']);
                        $_contact   = $_POST['Contact'];
                        $_pekerjaan = $_POST['Pekerjaan'];

                        $update = mysqli_query($db_koneksi," UPDATE customer SET 
                                    costumer_name='".$_nama."',
                                    username='".$_user."',
                                    password='".$_password."', 
                                    jenis_kelamin='".$_jk."',
                                    alamat='".$_alamat."', 
                                    contact='".$_contact."',
                                    pekerjaan='".$_pekerjaan."' 
                                    WHERE id_costumer='".$_SESSION['id']."'");
                        if($update){
                            echo '<script>alert("Update Berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else
                            echo "Update Gagal". mysqli_error($db_koneksi);
                    }
                ?>
            </div>

            <!-- Ubah Password -->
            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control"  required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control"  required>
                    <td><input type="submit" name="submit2" value="Ubah Password" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit2'])){

                        $_pass1      = $_POST['pass1'];
                        $_pass2      = $_POST['pass2'];
                        
                        if($_pass2 != $_pass1){
                            echo '<script>alert("Password Baru Tidak Sesuai")</script>';
                        }else {
                            $pass = mysqli_query($db_koneksi," UPDATE costumer SET 
                                    password='".MD5($_pass2)."'
                                    WHERE id_costumer='".$_SESSION['id']."'");
                                    if($pass){
                                        echo '<script>alert("Ubah Password Berhasil")</script>';
                                        echo '<script>window.location="profil.php"</script>';
                                    }else{
                                        echo 'gagal'.mysqli_error($db_koneksi);
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