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
                        Selamat Datang, <span class="text-primary">nama</span>
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

    <!-- Content -->
    <div class="container-fluid">
        <form action="" method="post">
            <div class="row justify-content-center align-content-center">
                <div class="col-md-auto card-temp">
                    <div class="card">
                        <div class="card-header text-center h3">
                            Profile
                        </div>
                        <div class="card-body">
                            <div class="form-group row-md-4">
                                E-mail
                                <input type="email" class="form-control" name="emaill" value="asaksk@gmail.com"
                                    disabled>
                            </div>

                            <div class="form-group row-md-4">
                                Nama
                                <input type="text" class="form-control" name="namaa" value="Heed Skk">
                            </div>

                            <div class="form-group row-md-4">
                                Nomor Handphone
                                <input type="text" class="form-control" name="hp_no" value="03839933">
                            </div>
                        </div>

                        <div class="card-footer pass-nav">
                            <div class="form-group row-md-4">
                                Password
                                <input type="password" class="form-control" name="sandi1" required="required">
                            </div>

                            <div class="form-group row-md-4">
                                Confirm Password
                                <input type="password" class="form-control" name="sandi2" required="required">
                            </div>

                            <div class="form-group">
                                Warna Navbar
                                <select class="custom-select" name="nav_colr">
                                    <option value="lb_colour">Light</option>
                                    <option value="dark_colour">Dark</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit" name="profile_form">
                            <input type="reset" class="btn btn-light btn-block" value="Cancel"
                                onmouseover="this.style.color='red';" onmouseout="this.style.color='';">
                            </a>
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
</body>

</html>