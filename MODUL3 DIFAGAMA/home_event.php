<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAD Events</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        require 'conn_ev.php';
        $submit_selected = isset($_POST["submit_form"]);
        $delete_selected = isset($_POST["del_event"]);
        $edit_selected = isset($_POST["save_edit"]);

        if($submit_selected) {
            add_data($_POST);
        }

        session_start();
        $id_num = $_SESSION['id_no'];

        if($delete_selected) {
            del_data($id_num);
        }

        if($edit_selected) {
            edit_data($id_num);
        }

        $res_row = query("SELECT * FROM events_tb");
        // echo $res_row;
        $content_hm = '';
        
        if(empty($res_row)){
            $content_hm = '<h6 style="padding-top:10em">No Events Found</h6>';
        }else{
            foreach ($res_row as $row) {
                $content_hm .= '
                <div class="col-md-2">
                    <div class="card" style="height: 33rem; width: 14.3em; box-shadow: rgba(0, 0, 0, 0.8) 0px 7px 10px, inset rgba(0, 0, 0, 0.15) 0px 0px 3px;">
                        <img src="./assets/img/'.$row['gambar'].'" class="card-img-top" alt="..." style="width: 100%;height: 10rem">
                        <div class="card-body">
                            <h4>'.$row['name'].'</h4>
                        </div>
                        <div class="card-text text-left" style="padding-left:25px">
                            <p><i class="fa" style="font-size:15px; color: rgb(236, 150, 67); padding-right:1em">&#xf073;</i>'.$row['tanggal'].'</p>
                            <p><i class="fa" style="font-size:18px; color: rgb(236, 150, 67); padding-right:1em">&#xf041;</i>'.$row['tempat'].'</p>
                            <p style="font-size:15.5px;">Kategori : Event '.$row['kategori'].'</p>
                        </div>
                        <div class="card-footer text-right">
                            <a type="button" class="btn btn-primary" href="event_details.php?id='.$row['id'].'" style="width:6em;">Detail</a>
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