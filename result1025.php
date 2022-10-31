<?php
    session_start();
    

?>

<!DOCTYPE html>
<html lang="ja">
<head>

</head>
 
<body>    
<h2>K217035LETHANHTUNG</h2>
<?php
$id= trim(($_POST['id']));
$pass=trim($_POST['passs']);
var_dump(trim($id)) ;
var_dump(trim($_POST['passs'])) ;

$db = new SQLite3("student.db");

$query = "select*from meibo where gakuseki_no ='$id'";


// echo $query;
$result = $db->query($query);//->fetchArray(SQLITE3_ASSOC);
// print $result;
$data = $result->fetchArray(SQLITE3_ASSOC);
// var_dump($data);
// echo 'pass'.$_POST['passs'];
// echo 'data'.$data['password'];
if ($data===false) {
    echo '<h3 style="color: red;">id 存在しません。</h3>';
    echo '<a href="index.html">TOP</a>';
    
}else if ($pass==$data['password']) {
    $_SESSION['id']=$id;
    ?>
        <table border="1">
        <tr>
            <th>gakuseki_no</th>
            <td> <?php echo $data['gakuseki_no'] ?></td>
        </tr>
        <tr>
            <th>name</th>
            <td> <?php echo $data['name'] ?></td>

        </tr>
        <tr>
            <th>country</th>
            <td> <?php echo $data['country'] ?></td>

        </tr>
        <tr>
            <th>gender</th>
            <td> <?php echo $data['gender'] ?></td>

        </tr>
        <tr>
            <th>type</th>
            <td> <?php echo $data['bloodtype'] ?></td>

        </tr>
        <tr>
            <th>birthday</th>
            <td> <?php echo $data['b_year'],'/', $data['b_month'],'/',$data['b_day'] ?></td>

        </tr>
        <tr>
            <th>password</th>
            <td > <?php echo $data['password']?></td>

        </tr>
      
    </table>
    <a href="result1025.php?top=top">TOP</a> |    
    <a href="edit1025.php?id=<?php echo $id?>">EDIT</a>   
    <a href="delete1025.php?id=<?php echo $id?>" onclick = "if (! confirm('Continue?')) { return false; }">delete</a>   
    <a href="chat.php?id=<?php echo $id?>">CHAT</a>

<?php }else{
    echo '<h3 style="color: red;">暗証番号間違いました。</h3>';
    echo '<a href="index.html">TOP</a>';

}
//public_html
?>
<?php
  if ($_GET['top']=='top') {
     unset($_SESSION['id']);
     header('location:index.html');
    echo $_GET['top'];
  }
?>
<!-- //update -->
<?php $db->close(); ?>

<?php 
    // $db = new SQLite3("student.db");
    // $query = "select gakuseki_no, b_year,b_month,b_day from meibo";
    // $result = $db->query($query);
    // while($info = $result->fetchArray(SQLITE3_ASSOC)){
    //     $gakuseki_no=$info['gakuseki_no'];
    //     // echo $gakuseki_no;
    //     $birthday=  $info['b_year'].$info['b_month'].$info['b_day'];
    //     // echo $birthday;
    //     // echo $birthday;
    //     $db = new SQLite3("student.db");
    //     $update = "UPDATE meibo SET password = '123123' WHERE gakuseki_no = '$gakuseki_no';";
    //     // $result = $db->query($update);
    //     echo $update;
    //     echo '<br>';
    // }
    


?>

</body>
</html>



