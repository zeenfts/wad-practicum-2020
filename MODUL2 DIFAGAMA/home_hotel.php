<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAD Hotel</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/home_hotel.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-light fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="book_hotel.php">Booking</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- PHP section -->
    <?php
        $img_src = [
            'https://images.unsplash.com/photo-1424847262089-18a6858bd7e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80', 
            'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
            'https://images.unsplash.com/photo-1594560913095-8cf34bab82ad?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80'
        ];
    ?>

    <!-- Content -->
    <div class="container-fluid">
        <h2>EAD HOTEL</h2>
        <p>Welcome to 5 Star Hotel</p>
        <form action="book_hotel.php" method="post">
            <div class="row justify-content-center align-content-center">
                <div class="col-md-auto">
                    <div class="card">
                        <img src=<?=$img_src[0]?> class="card-img-top" alt="1 Single Bed" height="100%">
                        <div class="card-body">
                            <h4>Standard</h4>
                            <h6>$90/Day</h6>
                            <div class="card-header">
                                Facilities
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">1 Single Bed</li>
                                <li class="list-group-item">1 Bathroom</li>
                            </ul>

                        </div>
                        <div class="card-footer">
                            <button name="standard_book" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-auto">
                    <div class="card">
                        <img src=<?=$img_src[1]?> class="card-img-top" alt="1 Double Bed" height="100%">
                        <div class="card-body">
                            <h4>Superior</h4>
                            <h6>$150/Day</h6>
                            <div class="card-header">
                                Facilities
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">1 Double Bed</li>
                                <li class="list-group-item">1 Television and Wi-Fi</li>
                                <li class="list-group-item">1 Bathroom with hot water</li>
                            </ul>

                        </div>
                        <div class="card-footer">
                            <button name="superior_book" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-auto">
                    <div class="card">
                        <img src=<?=$img_src[2]?> class="card-img-top" alt="2 Double Bed" height="100%">
                        <div class="card-body">
                            <h4>Luxury</h4>
                            <h6>$200/Day</h6>
                            <div class="card-header">
                                Facilities
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">2 Double Bed</li>
                                <li class="list-group-item">2 Bathroom with how water</li>
                                <li class="list-group-item">1 Kitchen</li>
                                <li class="list-group-item">1 Television and Wi-Fi</li>
                                <li class="list-group-item">1 Workroom</li>
                            </ul>

                        </div>
                        <div class="card-footer">
                            <button name="luxury_book" class="btn btn-primary">Book Now</button>
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