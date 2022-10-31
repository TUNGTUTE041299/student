<?php
    $get_id="";
    if (isset($_GET['id'])) {
        $db = new SQLite3("student.db");
        // $result = $db->exec($query);
        $get_id=$_GET['id'];
        $update = "delete from meibo WHERE gakuseki_no = '$get_id'";
        // $update = "update meibo set gender='".$ud_gender ."' where gakuseki_no = '".$get_id."'";
        echo ($update) ;
        $result2=$db->exec($update);
        var_dump($result2);
         header('location:result1025.php?delete=取り消した');
    }
?>