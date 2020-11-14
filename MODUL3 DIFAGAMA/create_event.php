<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Event</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/create_event.css">
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
                    <a class="nav-link" href="home_event.php">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link btn btn-outline-light" href="">Buat Event <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid">
        <h5>Buat Event</h5>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="col-sm-auto">
                <div class="card">
                    <div class="form-group row-sm-4">
                        Name
                    </div>
                    <div class="form-group row-md-6">
                        <input type="text" class="form-control" name="namaa" required="required">
                    </div>

                    <div class="form-group row-sm-4">
                        Deskripsi
                    </div>
                    <div class="form-group row-md-auto">
                        <textarea class="form-control" name="description" rows="3" required="required"></textarea>
                    </div>

                    <div class="form-group row-sm-4">
                        Upload Gambar
                    </div>
                    <div class="form-group row-md-auto">
                        <input type="file" class="form-control" name="uploads" required="required">
                    </div>

                    <div class="form-group row-sm-4">
                        Kategori
                    </div>
                    <div class="form-group row-md-auto">
                        <div class="col-sm-4">
                            <input class="form-check-input" type="radio" value="Male" name="cats" required="required">
                            Online
                        </div>
                        <div class="col-sm-4">
                            <input class="form-check-input" type="radio" value="Female" name="cats" required="required">
                            Offline
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-auto">
                <div class="card">
                    <div class="form-group row-sm-4">
                        Tanggal
                    </div>
                    <div class="form-group row-md-auto">
                        <input type="date" class="form-control" name="tgll" required="required">
                    </div>

                    <div class="form-group row-sm-4">
                        Jam Mulai
                    </div>
                    <div class="form-group row-md-auto">
                        <input type="time" class="form-control" name="timest" required="required">
                    </div>

                    <div class="form-group row-sm-4">
                        Jam Berakhir
                    </div>
                    <div class="form-group row-md-auto">
                        <input type="time" class="form-control" name="timend" required="required">
                    </div>

                    <div class="form-group row-sm-4">
                        Tempat
                    </div>
                    <div class="form-group row-md-auto">
                        <input type="text" class="form-control" name="place" required="required">
                    </div>

                    <div class="form-group row-sm-4">
                        Harga
                    </div>
                    <div class="form-group row-md-auto">
                        <input type="number" class="form-control" name="price" required="required" value=0>
                    </div>

                    <div class="form-group row-sm-4">
                        Benefit
                        <div class="form-check">
                            <div class="col-md-auto">
                                <input class="form-check-input" type="checkbox" name="benefit[]" value="Snacks"
                                    id="benefit_check1">
                                Snacks
                                <br />
                            </div>
                            <div class="col-md-auto">
                                <input class="form-check-input" type="checkbox" name="benefit[]" value="Certf"
                                    id="benefit_check2">
                                Sertifikat
                                <br />
                            </div>
                            <div class="col-md-auto">
                                <input class="form-check-input" type="checkbox" name="benefit[]" value="Souv"
                                    id="benefit_check3">
                                Souvenir
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-danger" value="Cancel" data-dismiss="form"></input>
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit_form"></input>
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