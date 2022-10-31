<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location:index.html');
    }
    $id= $_GET['id'];
    $db = new SQLite3("student.db");
    $result = $db->exec($query);
    $query = "select*from meibo where gakuseki_no ='$id'";
    echo $query;
    $result = $db->query($query);//->fetchArray(SQLITE3_ASSOC);
    $data = $result->fetchArray(SQLITE3_ASSOC);

    $day = $data['b_year'].'/'. $data['b_month'].'/'.$data['b_day'];
    var_dump($day);
?>
<h1>Hello <?php echo $data['name'] ?> </h1>  
<form action="update1025.php?id=<?php echo $data['gakuseki_no']?>" method="post">
    <table border="1">
        <tr>
            <th>gakuseki_no</th>
            <td> <input type="text" name="id" value="<?php echo $data['gakuseki_no']?>"></td>
        </tr>
        <tr>
            <th>name</th>
            <td><input type="text" name="name" value="<?php echo $data['name'] ?>"></td>

        </tr>
        <tr>
            <th>country</th>
            <td> <input type="text" name="country" value="<?php echo $data['country'] ?> "></td>

        </tr>
        <tr>
            <th>gender</th>
            <td><input type="text" name="gender" value="<?php echo $data['gender'] ?> "></td>

        </tr>
        <tr>
            <th>type</th>
            <td><input type="text" name="type" value="<?php echo $data['bloodtype'] ?> "></td>


        </tr>
        <tr>
            <th>birthday</th>
            <td>
                <input type="text" name="b_year" value="<?php echo $data['b_year'] ?>" >
                /
                <input type="text" name="b_month" value="<?php echo $data['b_month'] ?>" >
                /
                <input type="text" name="b_day" value="<?php echo $data['b_day'] ?>">
            </td>
            

        </tr>
        <tr>
            <th>password</th>
            <td><input type="password" name="passs" value="<?php echo $data['password']?>"></td>

        </tr>
        
      
    </table>
        <input type="submit" value="update">
    </form>
    
       

<?php $db->close(); ?>