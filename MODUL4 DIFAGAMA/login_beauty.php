<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login WAD Beauty</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-light fixed-top">
        <a class="navbar-brand mb-0 h1" href="">EAD Beauty</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-light" href="register_beauty.php">Register</a>
                    <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="link">Search</button> -->
                </li>
            </ul>
        </div>
    </nav>

    <!-- PHP Section -->
    <?php
        require 'db_conn_byu.php';

        $notif_alert='';
        if(isset($_POST["regis_form"])){
            $eml = $_POST["emaill"];
            $eff_rw = add_data($_POST, query("SELECT `id` FROM `user` WHERE `email` = '$eml'"));
            
            if($eff_rw > 0){
                $notif_alert =  '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Berhasil registrasi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }else{
                $notif_alert =  '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Gagal registrasi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                header("Location: register_beauty.php");
            }
        }

        // session_start();
        // $sign = '
        // <li class="nav-item"><br>
        //     <a class="nav-link" data-toggle="modal" data-target="#form_sign_in" href="#">Sign In</a><br>
        // </li><br>
        // <li class="nav-item"><br>
        //     <button class="btn class btn btn-primary" data-toggle="modal" data-target="#exampleModal">Join for Free</button><br>
        // </li>
        // ';
        // $_SESSION['sign'] = $sign;
    ?>

    <!-- Content -->
    <div class="container-fluid">
        <?= $notif_alert?>

        <form action="index_beauty.php" method="post">
            <div class="row justify-content-center align-content-center">
                <div class="col-md-auto card-temp">
                    <div class="card">
                        <div class="card-header text-center h3">
                            Login
                        </div>
                        <div class="card-body">
                            <div class="form-group row-md-4">
                                E-mail
                                <input type="email" class="form-control" name="emaill"
                                    placeholder="Masukkan Alamat E-mail" required="required">
                            </div>

                            <div class="form-group row-md-4">
                                Kata Sandi
                                <input type="password" class="form-control" name="sandi1"
                                    placeholder="Masukkan Kata Sandi" required="required">
                            </div>

                            <div class="form-group row-md-4">
                                <div class="form-check">
                                    <div class="col-md-auto">
                                        <input class="form-check-input" type="checkbox" name="rem_me"
                                            value="Remember Me" id="benefit_check1">
                                        Remember Me
                                        <br />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary" value="Login" name="login_form"
                                style="width:10em;">
                            <!-- <input type="reset" class="btn btn-light" value="Clear"
                                onmouseover="this.style.color='red';" onmouseout="this.style.color='';"> -->
                            <a class="btn hover-t" href="register_beauty.php">
                                Belum punya akun? <span class="text-primary">Registrasi</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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