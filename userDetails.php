<html lang="en">
<head>
</head>
<body>
    <h1><?php
    session_start();
    $currentUser=$_SESSION['username'];
    echo $currentUser;
    ?>'s Data</h1>
    <table border="">
        <tr>
            <th>BMI</th>
            <th>Height</th>
            <th>WEight</th>
        </tr>
    <p>
        <?php
        include 'dbconnect.php';
        $sql="SELECT * FROM user_data WHERE user='$currentUser'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num>0){
            while($row=mysqli_fetch_assoc($result)){
                $oldBmi=$row['bmi'];
                $oldHeight=$row['height'];
                $oldWeight=$row['weight'];
                }
                }
                ?>
        <?php
        
        $sql1="SELECT * FROM history WHERE user = '$currentUser'";
        $result1=mysqli_query($conn,$sql1);
        $num=mysqli_num_rows($result1);
        if($num>0) {
            while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <td><?php echo $row['bmi']; ?></td>
                <td><?php echo $row['height']; ?></td>
                <td><?php echo $row['weight']; ?></td>
                </tr>
                <?php
                $sql = "insert into history(user,bmi,height,weight) values('$currentUser','$oldBmi','$oldHeight','$oldWeight')";
                $result=mysqli_query($conn,$sql);
            }
        }
      
        ?>
        </table>
    </p>
</body>
</html>