<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAD Hotel (Booking)</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/book_hotel.css">
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
                <li class="nav-item">
                    <a class="nav-link" href="home_hotel.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">Booking <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- PHP Section -->
    <?php
        $method_selected = '';
        $image_selected = '';
        $standard_bk = isset($_POST['standard_book']);
        $superior_bk = isset($_POST['superior_book']);
        $luxury_bk = isset($_POST['luxury_book']);
        $img_src = [
            "https://images.unsplash.com/photo-1424847262089-18a6858bd7e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80", 
            "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80",
            "https://images.unsplash.com/photo-1594560913095-8cf34bab82ad?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80"
        ];

        // Booking from Book Now buttons
        if ($standard_bk) {
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled><br>
                <option value="standard">Standard</option><br>
                <input type="hidden" name="roomtype" value="standard"><br>
                </select>';
            $image_selected = $img_src[0];
        } else if ($superior_bk){
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled><br>
                <option value="superior">Superior</option><br>
                <input type="hidden" name="roomtype" value="superior"><br>
                </select>';
            $image_selected = $img_src[1];
        }else if ($luxury_bk){
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled><br>
                <option value="luxury">Luxury</option><br>
                <input type="hidden" name="roomtype" value="luxury"><br>
                </select>';
            $image_selected = $img_src[2];
        //The other method
        }else {
            $method_selected = '
                <select class="custom-select" name="roomtype"><br>
                <option value="standard">Standard</option><br>
                <option value="superior">Superior</option><br>
                <option value="luxury">Luxury</option><br>
                </select>';
            $image_selected = $img_src[0];
        }
    ?>

    <!-- Content -->
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <!-- Left -->
            <div class="col-md-auto">
                <form action="my_book.php" method="post">
                    <div class="form-group">
                        Name
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        Check-in
                        <input type="date" class="form-control" name="checkin">
                    </div>
                    <div class="form-group">
                        Duration
                        <input type="number" class="form-control" name="duration" aria-describedby="durationHelp">
                        <small id="durationHelp" class="form-text text-muted">Day(s)</small>
                    </div>
                    <div class="form-group">
                        Room Type
                        <?=$method_selected?>
                    </div>
                    <div class="form-group">
                        Add Service(s)
                        <small id="durationHelp" class="form-text text-muted">$20/Service</small>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="service[]" value="Room Services"
                                id="service_check1">
                            Room Service
                            <br />
                            <input class="form-check-input" type="checkbox" name="service[]" value="Breakfast"
                                id="service_check2">
                            Breakfast
                        </div>
                    </div>
                    <div class="form-group">
                        Phone Number
                        <input type="text" class="form-control" name="number">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Book"></input>
                    </div>
                </form>
            </div>

            <!-- Right -->
            <div class="col-md-auto">
                <img src=<?=$image_selected?> alt="Preview Bedroom" class="image-preview">
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