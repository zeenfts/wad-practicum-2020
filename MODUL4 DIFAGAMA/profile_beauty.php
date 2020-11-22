<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile WAD Beauty</title>
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
        $usr_id = '';
        $light_nav = null;
        $dark_nav = null;
        $def_nav = 'selected';
        $nav_font = '';
        $nav_bg = '';

        if(!empty($_SESSION['log_email'])){
            $log_email = $_SESSION['log_email'];
            $row_usr = query("SELECT * FROM `user` WHERE email='$log_email'")[0];
            $usr_name = $row_usr['nama'];
            $usr_id = $row_usr['id'];
        }else{
            header("Location: login_beauty.php");
        }

        if(isset($_POST['profile_form'])) {
            $eff_rw = edit_data($usr_id);
            $val_nav_col = $_POST['nav_colr'];

            if($val_nav_col == 'def_colour'){
                setcookie('prf_navbar', 'navbar-light', time()+ 86400,'/');
                setcookie('prf_navbg', 'custom-bg-nav', time()+ 86400,'/');
            }else if($val_nav_col == 'lgh_colour'){
                setcookie('prf_navbar', 'navbar-light', time()+ 86400,'/');
                setcookie('prf_navbg', 'bg-light', time()+ 86400,'/');
            }else if($val_nav_col == 'dk_colour'){
                setcookie('prf_navbar', 'navbar-dark', time()+ 86400,'/');
                setcookie('prf_navbg', 'bg-dark', time()+ 86400,'/');
            }
        }

        if ($_COOKIE['prf_navbar'] == 'navbar-light' and $_COOKIE['prf_navbg'] == 'custom-bg-nav') {
            $light_nav = null;
            $dark_nav = null;
            $def_nav = 'selected';
        }else if($_COOKIE['prf_navbar'] == 'navbar-light' and $_COOKIE['prf_navbg'] == 'bg-light'){
            $light_nav = 'selected';
            $dark_nav = null;
            $def_nav = null;
        }else{
            $light_nav = null;
            $dark_nav = 'selected';
            $def_nav = null;
        }

        if(!empty($_COOKIE['prf_navbar']) and !empty($_COOKIE['prf_navbg'])){
            $nav_font = $_COOKIE['prf_navbar'];
            $nav_bg = $_COOKIE['prf_navbg'];
        }
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand <?= $nav_font?> fixed-top <?= $nav_bg?>">
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
                        <a class="dropdown-item" href="db_conn_byu.php?out_log=zft" onmouseover="this.style.color='red';"
                            onmouseout="this.style.color='';">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid">
    <?php
        // alert update profile
        if($eff_rw > 0){
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Berhasil mengupdate data diri!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        }else if($eff_rw == 0){
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Profile tidak berhasil diupdate!!! (bisa karena tidak ada update atau hanya sekedar mengubah warna navbar)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  
        }
    ?>
        <form action="" method="post">
            <div class="row justify-content-center align-content-center">
                <div class="col-md-auto card-temp">
                    <div class="card">
                        <div class="card-header text-center h3">
                            Profile
                            <a type="button" class="btn btn-light close" href="index_beauty.php"
                            onmouseover="this.style.color='red';" onmouseout="this.style.color='';">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="form-group row-md-4">
                                E-mail
                                <input type="email" class="form-control" name="prof_email" value="<?= $row_usr['email']?>" disabled>
                            </div>

                            <div class="form-group row-md-4">
                                Nama
                                <input type="text" class="form-control" name="prof_nama" value="<?= $row_usr['nama']?>">
                            </div>

                            <div class="form-group row-md-4">
                                Nomor Handphone
                                <input type="number" class="form-control" name="prof_hp" value=<?= $row_usr['no_hp']?>>
                            </div>
                        </div>

                        <div class="card-footer pass-nav">
                            <div class="form-group row-md-4">
                                New Password
                                <input type="password" class="form-control" name="prof_sandi1" id="sandi1" onkeyup='check();'>
                            </div>

                            <div class="form-group row-md-4">
                                Confirm New Password
                                <input type="password" class="form-control" name="prof_sandi2" id="sandi2" onkeyup='check();'>
                                <span id='message'></span>
                            </div>

                            <div class="form-group">
                                Warna Navbar
                                <select class="custom-select" name="nav_colr">
                                    <option value="def_colour" <?= $def_nav?>>Default</option>
                                    <option value="lgh_colour" <?= $light_nav?>>Light</option>
                                    <option value="dk_colour" <?= $dark_nav?>>Dark</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit" name="profile_form" id="submit">
                            <!-- <input type="submit" class="btn btn-light btn-block" value="Cancel"
                                onmouseover="this.style.color='red';" onmouseout="this.style.color='';"> -->
                            <a type="button" class="btn btn-light btn-block" href="index_beauty.php"
                                onmouseover="this.style.color='red';" onmouseout="this.style.color='';">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row justify-content-center align-content-center">
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
    <script src="./assets/scripts.js"></script>
</body>

</html>