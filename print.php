<?php 

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'php';
    $conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);
    mysqli_select_db($conn,$dbname);
   
        if(isset($_GET['class'])){
            $id=$_GET['class'];
            $sql="SELECT * FROM `users_details` WHERE `users_details`.`ID` = '$id'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            while($row = mysqli_fetch_assoc($result)) {
                echo $row['Name'] ;
            }
        }
   
   
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
</head>
<body>
<form action="<?php $_PHP_SELF ?>" method="post">
<div><label>Name</label>
<br>
<input type="text" name="name" value="<?php echo $row['Name']; ?>">
</div><br>
<div><label>Email</label>
<br>
<input type="email" name="email" value="<?php echo $row['Email']; ?>">
</div><br>
<div><label>Gender</label>
<br>
<input type="radio" name="gender" value="F" <?php echo ($row['Gender'] =="F" )?"checked":"";?>>Female
<br>
<input type="radio" name="gender" value="M" <?php echo ($row['Gender'] =="M" )?"checked":""; ?>>Male

</div><br>
<div>
    <?php 
        if (!empty($row['Mail_status']=="Yes" )){
            echo "you will receive email from us";
        }
        else{
            echo"<p style='color:red'>you won't receive email from us</p>";
        }
    ?>

</div>
<br>
<div><button><a href="index.php" >Back</button></div>
<input type="button" value="Go back!" onclick="history.back()" style="background:blueviolet;">
</form>
    

</body>
</html>