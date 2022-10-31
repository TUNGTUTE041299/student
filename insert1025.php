<?php
echo "creat OK desu!";
$db = new SQLite3("student.db");
$ud_id=$_POST['id'];
$ud_name=$_POST['name'];
$ud_contry=$_POST['country'];
$ud_gender=$_POST['gender'];
$ud_type=$_POST['type'];
// var_dump($ud_gender,$ud_type);
$ud_year=$_POST['b_year'];
$ud_month=$_POST['b_month'];
$ud_day=$_POST['b_day'];
$ud_pass=$_POST['passs'];        
$update = "INSERT INTO meibo (gakuseki_no ,name,country,gender,b_year,b_month,b_day,bloodtype,password)VALUES('$ud_id','$ud_name','$ud_contry','$ud_gender','$ud_year','$ud_month','$ud_day','$ud_type','$ud_pass')";
// echo ($update) ;
$result2=$db->exec($update);
// var_dump($result2);
echo "</br>";
echo '<a href="index.html">TOP</a>';

?>