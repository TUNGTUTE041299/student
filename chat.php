<?php 
session_start(); 
if (!isset($_SESSION['id'])) {
    header('location:index.html');
}
$id= $_SESSION['id'];
var_dump($id);
$timestamp = time();
$time=date("F d, Y h:i:s", $timestamp);
$db = new SQLite3("student.db");

if(!empty($_POST['new_contents'])){
    $contents=$_POST['new_contents'];
   $query = "INSERT INTO chat(id,created,contents)VALUES('$id','$time','$contents')";
   echo $query;
   var_dump($query);
   $result = $db->query($query);   
}
 
//select
$query = "select * from chat order by created";
var_dump($query);
$result = $db->query($query);
 
//$result -> $rows[]
while($row=$result->fetchArray(SQLITE3_ASSOC)){
   $rows[] = $row;
}
 
//Database disconnected
$db->close();
 
?>
 
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css"/>
</head>
 
<body>
<h1>chat.php</h1>
<h2> K217035 LETHANHTUNG</h2>
 
<table border='1'>
   <tr>
       <th>gakuseki_no</th>
       <th>created</th>
       <th>contents</th>
   </tr>
 
<?php foreach($rows as $row){ ?>
   <tr>
       <td><?=$row['id']?></td>
       <td><?=$row['created']?></td>
       <td><?=$row['contents']?></td>
   </tr>
<?php }?>
</table>
 
<!--FORM-->
<form action='chat.php' method='post'>
<table border='1'>
<tr>
   <td><input type="text" name="new_contents"></td>
   <td><input type="submit" value="soushin"></td>
</tr>
 
</table>   
</form>
<p><a href='index.html'>TOP</a></p>
</body>
</html>