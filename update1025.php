<?php
    $get_id="";
    if (isset($_GET['id'])) {
        $db = new SQLite3("student.db");
        // $result = $db->exec($query);
        $get_id=$_GET['id'];
        $ud_id=$_POST['id'];
        $ud_name=$_POST['name'];
        $ud_contry=$_POST['country'];
        $ud_gender=$_POST['gender'];
        $ud_type=$_POST['type'];
        $ud_year=$_POST['b_year'];
        $ud_month=$_POST['b_month'];
        $ud_day=$_POST['b_day'];
        $ud_pass=trim($_POST['passs']);
        var_dump($ud_pass);        
        $update = "UPDATE meibo SET gakuseki_no = '$ud_id',name='$ud_name',country='$ud_contry',gender='$ud_gender',bloodtype='$ud_type',b_year='$ud_year',b_month='$ud_month',b_day='$ud_day',password='$ud_pass' WHERE gakuseki_no = '$get_id';";
        // $update = "update meibo set gender='".$ud_gender ."' where gakuseki_no = '".$get_id."'";
        echo ($update) ;
        $result2=$db->exec($update);
        var_dump($result2);
         header('location:index.html?tb=もう一度ローソン');
    }
?>
