<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/event_details.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-light fixed-top">
        <a class="navbar-brand mb-0 h1" href="">EAD EVENTS</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home_event.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light" href="create_event.php">Buat Event</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- PHP section -->
    <?php
        require 'db_conn_ev.php';
        session_start();
        if(isset($_GET['id'])) {
            $id_num = $_GET['id'];
            $row = query("SELECT * FROM events_tb WHERE id=$id_num")[0];
            $_SESSION['id_no'] = $id_num;
        }
    ?>

    <!-- Content -->
    <div class="container-fluid">
        <h5>Detail Event!</h5>
        <div class="row justify-content-center align-content-center">
            <div class="card"
                style="width:50rem; height: auto; box-shadow: rgba(0, 0, 0, 0.8) 0px 7px 10px, inset rgba(0, 0, 0, 0.15) 0px 0px 3px;">
                <img src="./assets/img/<?= $row['gambar']?>" class="card-img-top" alt="..."
                    style="width: 100%;max-height: 20rem">
                <div class="card-body">
                    <h4><?= $row['name']?></h4>
                    <p><i class="fa" style="font-size:25px; color: orange">&#xf073;</i><?= $row['tanggal']?></p>
                    <p><i class="fa" style="font-size:25px; color: orange">&#xf041;</i><?= $row['tempat']?></p>
                    <p><i class="fa" style="font-size:25px; color: orange">&#xf017;</i> <?= $row['mulai']?> -
                        <?= $row['berakhir']?></p>
                    <p><b>Kategori</b>: <?= $row['kategori']?></p>
                    <h5><b>HTM: <?= $row['harga']?></b></h5>
                    <h5><b>Benefit</b></h5>
                    <p>&#x2022; <?= $row['benefit']?></p>
                </div>

                <div class="card-footer align-content-center justify-content-center">
                    <input type="submit" class="btn btn-primary" name="edit_event" value="Edit" data-toggle="modal"
                        data-target="#edit_data_modal"></input>
                </div>

                <form action="home_event.php" method="post">
                    <div class="card-footer align-content-center justify-content-center">
                        <input type="submit" class="btn btn-danger" name="del_event" value="Delete"></input>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Edit event -->
    <div class="modal" id="edit_data_modal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Content Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="home_event.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-center align-content-center">
                            <!-- Left form -->
                            <div class="col-sm-auto card-temp">
                                <div class="card">
                                    <div class="card-header lform"></div>
                                    <div class="card-body">
                                        <div class="form-group row-sm-4">
                                            Name
                                            <input type="text" class="form-control" name="namaa" value=<?= $row['name']?>>
                                        </div>

                                        <div class="form-group row-sm-4">
                                            Deskripsi
                                            <textarea class="form-control" name="deskripsi" rows="8"><?= $row['deskripsi']?></textarea>
                                        </div>

                                        <div class="form-group row-sm-4">
                                            Upload Gambar
                                            <input type="file" class="form-control" name="upload_img">
                                        </div>

                                        <div class="form-group row-sm-4">
                                            Kategori
                                            <div class="col-sm-4">
                                                <input class="form-check-input" type="radio" value="Online" name="cats">
                                                Online
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-check-input" type="radio" value="Offline" name="cats">
                                                Offline
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right form -->
                            <div class="col-sm-auto card-temp">
                                <div class="card">
                                    <div class="card-header rform"></div>
                                    <div class="card-body">
                                        <div class="form-group row-sm-4">
                                            Tanggal
                                            <input type="date" class="form-control" name="tgll" value=<?= $row['tanggal']?>>
                                        </div>

                                        <div class="form-group row-sm-auto">
                                            Jam Mulai
                                            <input type="time" class="form-control col-sm-auto" name="timest" value=<?= $row['mulai']?>>
                                            Jam Berakhir
                                            <input type="time" class="form-control col-sm-auto" name="timend" value=<?= $row['berakhir']?>>
                                        </div>

                                        <div class="form-group row-sm-4">
                                            Tempat
                                            <input type="text" class="form-control" name="place" value=<?= $row['tempat']?>>
                                        </div>

                                        <div class="form-group row-sm-4">
                                            Harga
                                            <input type="number" class="form-control" name="price" value=<?= $row['harga']?>>
                                        </div>

                                        <div class="form-group row-sm-4">
                                            Benefit
                                            <div class="form-check">
                                                <div class="col-md-auto">
                                                    <input class="form-check-input" type="checkbox" name="benefits[]"
                                                        value="Snacks" id="benefit_check1">
                                                    Snacks
                                                    <br />
                                                </div>
                                                <div class="col-md-auto">
                                                    <input class="form-check-input" type="checkbox" name="benefits[]"
                                                        value="Sertifikat" id="benefit_check2">
                                                    Sertifikat
                                                    <br />
                                                </div>
                                                <div class="col-md-auto">
                                                    <input class="form-check-input" type="checkbox" name="benefits[]"
                                                        value="Souvenir" id="benefit_check3">
                                                    Souvenir
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" value="Cancel" data-dismiss="modal"></input>
                        <input type="submit" class="btn btn-primary" value="Save Changes" name="save_edit"></input>
                    </div>
                </form>
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
</body>

</html>