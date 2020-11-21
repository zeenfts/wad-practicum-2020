<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart WAD Beauty</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>

<body>
    <!-- PHP Section -->
    <?php
        require 'db_conn_byu.php';
        session_start();
        $usr_name = '';

        if(!empty($_SESSION['log_email'])){
            $log_email = $_SESSION['log_email'];
            $row_usr = query("SELECT * FROM `user` WHERE email='$log_email'")[0];
            $usr_name = $row_usr['nama'];
        }
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-light fixed-top">
        <a class="navbar-brand mb-0 h1" href="">EAD Beauty</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-flex align-items-center">
                    <a href="cart_beauty.php">
                        <i class="fa fa-2x" style="color: rgb(180, 10, 67); padding-right:.3em">&#xf07a;</i>
                    </a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="" id="user_dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Selamat Datang, <span class="text-primary"><?= $usr_name ?></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="user_dropdown">
                        <a class="dropdown-item" href="profile_beauty.php">Profile</a>
                        <a class="dropdown-item" href="login_beauty.php" onmouseover="this.style.color='red';"
                            onmouseout="this.style.color='';">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Cart List -->
    <div class="container-fluid cart-table">
        <div class="row justify-content-center align-content-center">
            <!-- <button type="button" class="close" data-dismiss="cart_beauty.php" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> -->
            
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">
                            Aksi 
                            <a type="button" class="btn btn-light close" href="index_beauty.php"
                            onmouseover="this.style.color='red';" onmouseout="this.style.color='';">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </th>
                    </tr>
                </thead>
    <?php
        $row_cart = query("SELECT * FROM `cart`");

        if(empty($row_cart)){

        }else{
            $col_num = 1;
            $price_temp = 0;
            foreach ($row_cart as $row) {
                $price_temp += $row['harga'];
    ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $col_num?></th>
                        <td><?= $row['nama_barang']?></td>
                        <td>Rp <?= $row['harga']?></td>
                        <td>
                            <form action="" method="post"
                                onsubmit="return confirm('Yakin ingin membatalkan pesanan Skincare ini?');">
                                <input type="submit" class="btn btn-danger" name="del_event" value="Hapus"
                                    style="width:10em;">
                            </form>
                        </td>
                    </tr>
                </tbody>
    <?php
                $col_num += 1;
            }
    ?>
                <tbody>
                    <tr>
                        <th scope="row">Total</th>
                        <td></td>
                        <td><b>Rp <?= $price_temp?></b></td>
                        <td></td>
                    </tr>
                </tbody>
    <?php
        }
    ?>
            </table>
        </div>

        <div class="row justify-content-center align-content-center copy-beauty">
            &#169; 2020 Copyright: WAD Beauty
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>