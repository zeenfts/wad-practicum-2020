<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAD Beauty</title>
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
        $res_row = query("SELECT * FROM prod_catalog");
        $usr_id = '';

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
                        Selamat Datang, <span class="text-primary"><?= $usr_name?></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="user_dropdown">
                        <a class="dropdown-item" href="profile_beauty.php">Profile</a>
                        <a class="dropdown-item" href="login_beauty.php?out=hjfeje" onmouseover="this.style.color='red';"
                            onmouseout="this.style.color='';">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            This is a success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you
            like.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- Outer Card -->
        <div class="row justify-content-center align-content-center">
            <div class="card card-outside">
                <div class="card-header text-center card-h-custom">
                    <h3>WAD Beauty</h3>
                    <p>Tersedia Skin Care Korea dengan Brand yang cukup ternama (Korean Haul)</p>
                </div>
                <div class="card-body card-inside-outer">
                    <!-- Inner Card -->
                    <div class="row justify-content-center align-content-center">
                <?php 
                    if(empty($res_row)){
                            
                    }else{
                        foreach ($res_row as $row) {
                ?>
                        <div class="col-md-4 card-inside-outer">
                            <div class="card card-inside text-center">
                                <img src="<?= $row['gambar']?>" class="card-img-top" alt="..."
                                    style="width: 100%;height: 12rem">
                                <div class="card-body h4">
                                    <b><?= $row['nama_brg']?></b>
                                </div>
                                <div class="card-text card-inside-tx">
                                    <p><?= $row['deskripsi']?></p>
                                </div>
                                <div class="card-footer">
                                    <b>Rp <?= $row['harga_brg']?></b>
                                </div>
                                <div class="card-footer">
                                    <a type="button" class="btn btn-primary"
                                        href="event_details.php?id='.$row['id'].'">Tambah ke Keranjang</a>
                                </div>
                            </div>
                        </div>
                <?php
                        }
                    }
                ?>
                    </div>
                </div>
            </div>
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
    <!-- <script>
    $(function() {
        TriggerAlertClose();
    });

    function TriggerAlertClose() {
        window.setTimeout(function() {
            $(".alert-dismissible").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 5000);
    }
    </script> -->
</body>

</html>