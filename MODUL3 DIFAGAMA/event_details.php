<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="card-header"></div>
                <div class="card-body" style="padding:35px;">
                    <h4><b><?= $row['name']?></b></h4><br>
                    <h6><b>Deskripsi</b></h6>
                    <p><?= $row['deskripsi']?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <h6><b>Informasi Event</b></h6>
                            <p><i class="fa"
                                    style="font-size:18px; color: rgb(236, 150, 67); padding-right:1em">&#xf073;</i><?= $row['tanggal']?>
                            </p>
                            <p><i class="fa"
                                    style="font-size:22px; color: rgb(236, 150, 67); padding-right:1em">&#xf041;</i><?= $row['tempat']?>
                            </p>
                            <p><i class="fa"
                                    style="font-size:18px; color: rgb(236, 150, 67); padding-right:1em">&#xf017;</i><?= $row['mulai']?>
                                -
                                <?= $row['berakhir']?></p>
                        </div>

                        <div class="col-md-6">
                            <h6><b>Benefit</b></h6>
                            <p>&#x2022; <?= $row['benefit']?></p>
                        </div>
                    </div>

                    <p><b>Kategori</b>: <?= $row['kategori']?></p>
                    <?php
                        if($row['harga']==0){
                            echo '<h6 style="color:green;"><b><i>FREE</i></b></h6>';
                        }else{
                            echo '<h6><b>HTM Rp '.$row['harga'].',-</b></h6>';
                        }
                    ?>
                </div>

                <div class="card-footer text-center">
                    <div class="row">
                        <div class="col-md-6 text-right">
                            <input type="submit" class="btn btn-primary" name="edit_event" value="Edit"
                                data-toggle="modal" data-target="#edit_data_modal" style="width:10em;">
                        </div>

                        <div class="col-md-6 text-left">
                            <form action="home_event.php" method="post" onsubmit="return confirm('Are you sure to delete this event?');">
                                <input type="submit" class="btn btn-danger" name="del_event" value="Delete"
                                    style="width:10em;">
                            </form>
                        </div>
                    </div>
                </div>

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
                            <div class="col-md-auto card-temp">
                                <div class="card">
                                    <div class="card-header lform"></div>
                                    <div class="card-body">
                                        <div class="form-group row-md-4">
                                            <b>Name</b>
                                            <input type="text" class="form-control" name="namaa"
                                                value="<?= $row['name']?>">
                                        </div>
                                        <div class="form-group row-md-4">
                                            <b>Deskripsi</b>
                                            <textarea class="form-control" name="deskripsi"
                                                rows="5"><?= $row['deskripsi']?></textarea>
                                        </div>

                                        <div class="form-group row-md-4">
                                            <b>Upload Gambar</b>
                                            <input type="file" class="form-control" name="upload_img"
                                                value="<%=(request.querystring(<?= $row['deskripsi']?>)%>"
                                                accept="image/*">
                                        </div>

                                        <div class="form-group row-md-4">
                                            <b>Kategori</b>
                                            <?php 
                                            if(strcasecmp($row['kategori'], 'online') == 0){
                                            echo '<div class="col-md-4">
                                                <input class="form-check-input" type="radio" value="Online" name="cats" checked>
                                                Online
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-check-input" type="radio" value="Offline" name="cats">
                                                Offline
                                            </div>';}else{
                                            echo '<div class="col-md-4">
                                                <input class="form-check-input" type="radio" value="Online" name="cats">
                                                Online
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-check-input" type="radio" value="Offline" name="cats" checked>
                                                Offline
                                            </div>';}
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right form -->
                            <div class="col-md-auto card-temp">
                                <div class="card">
                                    <div class="card-header rform"></div>
                                    <div class="card-body">
                                        <div class="form-group row-md-4">
                                            <b>Tanggal</b>
                                            <input type="date" class="form-control" name="tgll"
                                                value=<?= $row['tanggal']?>>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <b>Jam Mulai</b>
                                                <input type="time" class="form-control" name="timest"
                                                    value=<?= $row['mulai']?>>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <b>Jam Berakhir</b>
                                                <input type="time" class="form-control" name="timend"
                                                    value=<?= $row['berakhir']?>>
                                            </div>
                                        </div>

                                        <div class="form-group row-md-4">
                                            <b>Tempat</b>
                                            <input type="text" class="form-control" name="place"
                                                value="<?= $row['tempat']?>">
                                        </div>

                                        <div class="form-group row-md-4">
                                            <b>Harga</b>
                                            <input type="number" class="form-control" name="price"
                                                value=<?= $row['harga']?>>
                                        </div>

                                        <div class="form-group row-md-4">
                                            <b>Benefit</b>
                                            <?php
                                            if($row['benefit'] == 'Nothing'){
                                            echo '<div class="form-check">
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
                                            </div>';}else{
                                            echo '<div class="form-check">';
                                            if(in_array("Snacks", explode(', ', $row['benefit']))){
                                                echo '<div class="col-md-auto">
                                                <input class="form-check-input" type="checkbox" name="benefits[]"
                                                    value="Snacks" id="benefit_check1" checked>
                                                Snacks
                                                <br />
                                            </div>';}else{
                                                echo '<div class="col-md-auto">
                                                <input class="form-check-input" type="checkbox" name="benefits[]"
                                                    value="Snacks" id="benefit_check1">
                                                Snacks
                                                <br />
                                            </div>';}
                                            if(in_array("Sertifikat", explode(', ', $row['benefit']))){
                                                echo '<div class="col-md-auto">
                                                <input class="form-check-input" type="checkbox" name="benefits[]"
                                                    value="Sertifikat" id="benefit_check2" checked>
                                                Sertifikat
                                                <br />
                                            </div>';}else{
                                                echo '<div class="col-md-auto">
                                                <input class="form-check-input" type="checkbox" name="benefits[]"
                                                    value="Sertifikat" id="benefit_check2">
                                                Sertifikat
                                                <br />
                                            </div>';}
                                            if(in_array("Souvenir", explode(', ', $row['benefit']))){
                                                echo '<div class="col-md-auto">
                                                <input class="form-check-input" type="checkbox" name="benefits[]"
                                                    value="Souvenir" id="benefit_check3" checked>
                                                Souvenir
                                            </div>';}else{
                                                echo '<div class="col-md-auto">
                                                <input class="form-check-input" type="checkbox" name="benefits[]"
                                                    value="Souvenir" id="benefit_check3">
                                                Souvenir
                                            </div>';}
                                            echo '</div>';}
                                            ?>
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