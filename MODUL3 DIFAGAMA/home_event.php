<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAD Events</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/home_event.css">
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
                <li class="nav-item active">
                    <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light" href="create_event.php">Buat Event</a>
                    <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="link">Search</button> -->
                </li>
            </ul>
        </div>
    </nav>

    <!-- PHP Section -->
    <?php
        require 'db_conn_ev.php';
        $submit_selected = isset($_POST["submit_form"]);

        if($submit_selected) {
            add_data($_POST);
        }

        $res_row = query("SELECT * FROM events_tb");
        // echo $res_row;
        if($res_row==0){
            $content_hm = '<h6>No Event Found</h6>';
        }else{
            foreach ($res_row as $row) {
                $content_hm .= '
                <div class="col-md-2">
                    <div class="card" style="background-color: white;box-shadow: rgba(0, 0, 0, 0.8) 0px 7px 10px, inset rgba(0, 0, 0, 0.15) 0px 0px 3px;height: auto;">
                        <img src="./assets/img/'.$row['gambar'].'" class="card-img-top" alt="..." style="width: 100%;max-height: 10rem">
                        <div class="card-body">
                            <h4>'.$row['name'].'</h4>
                            <p><i style="font-size:24px;color: orange" class="fa">&#xf073;</i>'.$row['tanggal'].'</p>
                            <p><i style="font-size:24px;color: orange" class="fa">&#xf041;</i>'.$row['tempat'].'</p>
                            <p>Kategori : Event '.$row['kategori'].'</p>
                            <a type="button" class="btn btn-primary justify-content-right" href="event_details.php?id='.$row['id'].'">Detail</a>
                        </div>
                    </div>
                </div>
            ';
            }
        }
    ?>

    <!-- Content -->
    <div class="container-fluid">
        <h5>WELCOME TO EAD EVENTS!</h5>
        <div class="row justify-content-center align-content-center">
            <?=$content_hm?>
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