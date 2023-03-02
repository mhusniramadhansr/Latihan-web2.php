<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | E-Catalog</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login User</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="username" class="input-control">
            <input type="password" name="password" placeholder="password" class="input-control">
            <input type="submit" name="submit" placeholder="submit" class="btn">
        </form>

        <?php

            if (isset($_POST['submit'])){
                session_start();
                include 'koneksi.php';

                $user   = mysqli_real_escape_string($db_koneksi, $_POST['username']);
                $pass   = mysqli_real_escape_string($db_koneksi, $_POST['password']);

                $query  = "SELECT * FROM customer WHERE username='".$user."' AND password='".$pass."'";
                $cek    = mysqli_query($db_koneksi, $query);

                if (mysqli_num_rows($cek) > 0) {
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = 'true';
                    $_SESSION['global'] = $d;
                    $_SESSION['id'] = $d->id_costumer;
                    

                    echo '<script>window.location="dashboard.php"</script>';
                }
                else {
                    echo '<script>alert("Username Atau Password Anda Salah")</script>';
                }
            }
        ?>
    </div>
</body>
</html>