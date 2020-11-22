<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "wad_modul4");
    $eff_rw = -1;

    if(!$conn) {
		die("Can't connect bruh : ".mysql_connect_error());
    }

    if(isset($_GET['out_log'])){
        if($_GET['out_log'] == 'zft'){
            // unset($_SESSION['log_email']);
            session_destroy();
            header("Location: login_beauty.php");
        }
    }

    if(isset($_GET['delp'])){
        // header("Location:cart_beauty.php");
        $prod_id = $_GET['delp'];
        $eff_rw = del_data($prod_id);
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

    function add_data($data, $user_id){
        global $conn;
        // $rs_row = query("SELECT * FROM events_tb");

        $id_num = 0;
        $nama = '';
        $email = '';
        $password = '';
        $nama_barang = '';
        $harga = 0;
        $query = "SELECT * FROM `prod_catalog`";

        if(isset($data['regis_form'])){
            $id_num = date("d").strval(rand(100,999)).date("H").date("i");
            $nama = $data['namaa'];
            $email = $data['emaill'];
            $handphone = $data['hp_no'];
            $password = $data['sandi1'];
            $hash_pass = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO `user` VALUES ('$id_num', '$nama', '$email', '$handphone', '$hash_pass')";

        }else if(isset($_GET['id'])){
            $id_brg = $_GET['id'];
            $id_num = date("d").date("H").date("i").strval(rand(100,999));
            $rs_row = query("SELECT * FROM `prod_catalog` WHERE `nama_brg`='$id_brg'")[0];
            $nama_barang = $rs_row['nama_brg'];
            $harga = $rs_row['harga_brg'];
            // $nama_barang = $data['brg_name'];
            // $harga = $data['brg_price'];
            $query = "INSERT INTO `cart` VALUES ('$id_num', '$user_id', '$nama_barang', '$harga')";

        }else{

        }
        mysqli_query($conn, $query);
        $eff_rw = mysqli_affected_rows($conn);
        
        return $eff_rw;
    }

    function del_data($key_item){
        global $conn;
        query("DELETE FROM `cart` WHERE `cart`.`id` = '$key_item'");
        $eff_rw = mysqli_affected_rows($conn);
        
        return $eff_rw;
        // if($eff_rw>0) {
        //     echo "
        //     <script>
        //         alert('Event deleted!!');
        //         document.location.href = 'home_event.php';
        //     </script>
        // ";
        // } else {
        //     echo "
        //     <script>
        //         alert('Event not deleted');
        //         document.location.href = 'home_event.php';
        //     </script>
        // ";
        // }
    }

    function edit_data($key_item){
        global $conn;
        $rs_row = query("SELECT * FROM `user` WHERE `id` = '$key_item'")[0];

        $id_num = $key_item;
        $nama = $_POST['prof_nama'];
        $email = $rs_row['email'];
        $handphone = $_POST['prof_hp'];
        $password = $_POST['prof_sandi1'];
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);
        $query = '';

        if(empty($password)){
            $query = "UPDATE `user` set  
            `nama`='$nama', 
            `no_hp`='$handphone' WHERE `user`.`id`='$key_item' AND `user`.`email`='$email'";
        }else{
            $query = "UPDATE `user` set  
            `nama`='$nama',  
            `no_hp`='$handphone',
            `password` = '$hash_pass' WHERE `user`.`id`='$key_item' AND `user`.`email`='$email'";
        }

        // if(password_verify($password, $rs_row['password'])){
            
        // }else{
        //     echo "
        //         <script>
        //             alert('Wrong password');
        //             document.location.href = 'profile_beauty.php';
        //         </script>
        //     ";
        // }
        
        mysqli_query($conn, $query);
        $eff_rw = mysqli_affected_rows($conn);

        return $eff_rw;
    }
?>