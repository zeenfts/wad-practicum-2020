<?php 
    $conn = mysqli_connect("localhost", "root", "", "wad_modul4"); 

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

    function add_data($data, $user_id){
        global $conn;
        $rs_row = query("SELECT * FROM events_tb");

        $id_num = 0;
        $nama = '';
        $email = '';
        $password = '';
        $nama_barang = '';
        $harga = 0;
        $query = '';

        if(isset($data['regis_form'])){
            $id_num = date("d").strval(rand(100,999)).date("H").date("i");
            $nama = $data['namaa'];
            $email = $data['emaill'];
            $handphone = $data['hp_no'];
            $password = $data['sandi1'];
            $hash_pass = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO `user` VALUES ('$id_num', '$nama', '$email', '$handphone', '$hash_pass')";

        }else if(isset($data['add_cart1']) or isset($data['add_cart2']) or isset($data['add_cart3'])){
            $id_num = date("d").date("H").date("i").strval(rand(100,999));
            $nama_barang = $data['brg_name'];
            $harga = $data['brg_price'];
            $query = "INSERT INTO `cart` VALUES ('$id_num', '$user_id', '$nama', '$email', '$handphone', '$hash_pass')";

        }else{

        }
        mysqli_query($conn, $query);
        $eff_rw = mysqli_affected_rows($conn);
        
        return $eff_rw;
    }

    function del_data($key_item){
        global $conn;
        query("DELETE FROM `cart` WHERE id = '$key_item'");
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

    function edit_data($key_item, $user_id){
        global $conn;
        $rs_row = query("SELECT * FROM `user` WHERE id = '$key_item'");

        $id_num = $user_id;
        $nama = $_POST['namaa'];
        $email = $_POST['emaill'];
        $handphone = $_POST['hp_no'];
        $password = $_POST['sandi1'];
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);
        $query = '';

        if(password_verify($password, $rs_row['password'])){
            $query = "UPDATE `user` set 
            `id`='$id_num', 
            `nama`='$nama', 
            `email`='$email', 
            `handphone`='$handphone' WHERE `id`='$key_item'";
        }else{
            echo "
                <script>
                    alert('Wrong password');
                    document.location.href = 'profile_beauty.php';
                </script>
            ";
        }
        
        mysqli_query($conn, $query);
        $eff_rw = mysqli_affected_rows($conn);

        return $eff_rw;
    }
?>