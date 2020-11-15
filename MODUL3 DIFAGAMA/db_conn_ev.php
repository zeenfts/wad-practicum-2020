<?php 
    $conn = mysqli_connect("localhost", "root", "", "wad_modul3_difagama");

    if(!$conn) {
		die("Can't connect bruh : ".mysql_connect_error());
    }
    
    function query($query){
        global $conn;

        $res = mysqli_query($conn, $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($res)){
            $rows [] = $row;
        }
        return $rows;
    }

    function add_data($data){
        global $conn;
        $id_num = rand(10000,9999999999);
        $nama = $data['namaa'];
        $deskripsi = $data['deskripsi'];
        $gambar = $_FILES['upload_img']['name'];
        // $ukuran = $_FILES['upload_img']['size'];
        // $ext = pathinfo($gambar, PATHINFO_EXTENSION);
        $kategori = $data['cats'];
        $tgll = $data['tgll'];
        $tanggal = date("Y-m-d", strtotime($tgll));
        $mulai = date("H:i", strtotime($data['timest']));
        $berakhir = date("H:i", strtotime($data['timend']));
        $tempat = $data['place'];
        $bnft = $_POST['benefits'];
        if($bnft==0){
            $benefit='-';
        }else{
            $benefit = implode(", ", $bnft);
        }
        $harga = $data['price'];
        move_uploaded_file($_FILES["upload_img"]["tmp_name"], "./assets/img/".$gambar);
        // $query = "INSERT INTO events_tb (`name`, `deskripsi`, `gambar`, `kategori`, `tanggal`, `mulai`, `berakhir`, `tempat`, `benefit`, `harga`) \
        //             VALUES ('$nama', '$deskripsi', '$gambar', '$kategori', '$tanggal', '$mulai', '$berakhir', '$tempat', '$benefit', '$harga')";
        $query = "INSERT INTO events_tb VALUES ('$id_num', '$nama', '$deskripsi', '$gambar', '$kategori', 
        '$tanggal', '$mulai', '$berakhir', '$tempat', '$benefit', '$harga')";
        
        mysqli_query($conn, $query);
        $eff_rw = mysqli_affected_rows($conn);
        
        if($eff_rw>0) {
            echo "
            <script>
                alert('Success ad an event');
                document.location.href = 'home_event.php';
            </script>
        ";
        } else {
            echo "
            <script>
                alert('Event not added!!');
                document.location.href = 'home_event.php';
            </script>
        ";
        }
    }

    function del_data($key_item){
        global $conn;
        query("DELETE FROM events_tb WHERE id = '$key_item'");
        $eff_rw = mysqli_affected_rows($conn);
        
        if($eff_rw>0) {
            echo "
            <script>
                alert('Event deleted!!');
                document.location.href = 'home_event.php';
            </script>
        ";
        } else {
            echo "
            <script>
                alert('Event not deleted');
                document.location.href = 'home_event.php';
            </script>
        ";
        }
    }

    function edit_data($key_item){
        global $conn;
        $rs_row = query("SELECT * FROM events_tb WHERE id = '$key_item'");

        $nama = $_POST['namaa'];
        $deskripsi = $_POST['deskripsi'];
        $gambar = $_FILES['upload_img']['name'];
        $kategori = $_POST['cats'];
        $tgll = $_POST['tgll'];
        $tanggal = date("Y-m-d", strtotime($tgll));
        $mulai = date("H:i", strtotime($_POST['timest']));
        $berakhir = date("H:i", strtotime($_POST['timend']));
        $tempat = $_POST['place'];
        $bnft = $_POST['benefits'];
        if($bnft==0){
            $benefit='Nothing';
        }else{
            $benefit = implode(", ", $bnft);
        }
        $harga = $_POST['price'];
        move_uploaded_file($_FILES["upload_img"]["tmp_name"], "./assets/img/".$gambar);
        $query = "UPDATE events_tb set 
            `name`='$nama', 
            `deskripsi`='$deskripsi', 
            `gambar`='$gambar', 
            `kategori`='$kategori', 
            `tanggal`='$tanggal', 
            `mulai`='$mulai', 
            `berakhir`='$berakhir', 
            `tempat`='$tempat', `benefit`='$benefit', `harga`='$harga' WHERE `id`='$key_item'";
        
        mysqli_query($conn, $query);
        $eff_rw = mysqli_affected_rows($conn);

        if($eff_rw>0) {
            echo "
            <script>
                alert('Event has been updated');
                document.location.href = 'home_event.php';
            </script>
        ";
        } else {
            echo "
            <script>
                alert('Event has not updated');
                document.location.href = 'home_event.php';
            </script>
        ";
        }
        
    }
?>