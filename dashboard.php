<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
    
        <header>
                <div class="wlc">Welcome <?php
                include 'insertFirst.php';
                session_start();
                echo $_SESSION['username'];
                ?></div>
            <div class="user">
               
                <form action="" method="POST">
                    <input type="submit" name="logout" id="" value="Logout" style="border:0 solid;">
                    <?php
                    if(isset($_POST['logout'])){
                        session_destroy();
                        
                        header('Location:login.php');
                    }
                    ?>                
                </form>
            </div>
            <h1>
                BMI Calculator
            </h1>
        </header>
    <main>
    <form method="post" action="">
        <label for="height">Height</label>
        <input name="height" type="number" step="0.01">
        <select name="heightUnit">
            <option value="centimeter">Centimeter</option>
            <option value="inch">Inch</option>
            <option value="foot">Foot</option>
            <option value="meter">Meter
            </option>
        </select><br>
        <label for="weight">Weight</label>
        <input name="weight" type="number" step="0.01">
        <select name="weightUnit">
            <option value="kilogram">Kilogram</option>
            <option value="pound">Pound</option>
        </select><br>
        <input class="submit" type="submit" name="submit" id="" value="calculate">
    </form>
    </main>
    </section>
</body>
<?php
include 'dbconnect.php';
require_once 'insertFirst.php';
$currentUser=$_SESSION['username'];
if(!$currentUser){
    header('Location:login.php');
}
if($status){
    $sql="INSERT INTO user_data(user,bmi,message,height,height_unit,weight,weight_unit) values('$currentUser',0,'',0,'',0,'');";
    $result=mysqli_query($conn,$sql);
    $cookie_name="user";
    $cookie_value=$currentUser;
    setcookie($cookie_name,$cookie_value, time() + (86400), "/");
    if($currentUser==$cookie_value){
        file_put_contents('insertFirst.php', '<?php $status = false;?>');
    }
}
if (isset($_POST['submit'])){
        $Height=$_POST['height'];
        $HeightUnit=$_POST['heightUnit'];
        $Weight=$_POST['weight'];
        $WeightUnit=$_POST['weightUnit'];
        if($Height == '' || $Weight == '' || $HeightUnit == '' || $WeightUnit == ''){
                echo "The input values are required.";
                
        }
        else{
                /*Calculation begins from here.*/
                /*Convert cm to inch -> foot to inch -> meter to inch */
                $HInches = ($HeightUnit=='centimeter')?$Height*0.393701:(($HeightUnit=='foot')?$Height*12:(($HeightUnit=='meter')?$Height*39.3700787:$Height));
                /*Convert kg to pound*/
                $WPound = ($WeightUnit=='kilogram')?$Weight*2.2:$Weight;
                $BMIIndex = round($WPound/($HInches*$HInches)* 703,2);
                if ($BMIIndex < 18.5) {
                        $Message="Underweight";
                } else if ($BMIIndex <= 24.9) {
                        $Message="Normal";
                } else if ($BMIIndex <= 29.9) {
                        $Message="Overweight";
                } else {
                        $Message="Obese";
                }

                $sql="UPDATE user_data SET bmi=$BMIIndex, message='$Message', height=$Height,height_unit='$HeightUnit',weight=$Weight,weight_unit='$WeightUnit' WHERE user='$currentUser';";
                $result=mysqli_query($conn,$sql);
                echo "<h3 style='text-align:center;'>$currentUser's Result</h3>";
                echo"<fieldset style='width:42%;margin-left:30%;'>";
                echo "Your BMI = ".$BMIIndex;
                echo "<br>";
                echo "You are ".$Message;
                echo "<br>";
                echo "Height: $Height $HeightUnit";
                echo "<br>";
                echo "Width: $Weight $WeightUnit";
                echo "</fieldset>";
                $cookie_name="bmi";
                $cookie_value=$BMIIndex;
                setcookie($cookie_name,$cookie_value, time() + (86400), "/");

        }
       
}?>
</html>