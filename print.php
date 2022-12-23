<?php 
 
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'php';
     $conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);
       mysqli_select_db($conn,$dbname);
    
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $sql="SELECT * FROM `users_details` WHERE `users_details`.`ID` = '$id'";
           $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
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
<form action="print.php" method="POST">
<div><label>Name : </label>
<br>
<label>- <?php echo $row['Name']; ?></label>
</div><br>
<div><label>Email : </label>
<br>
<label>- <?php echo $row['Email']; ?></label></div><br>
<div><label>Gender : </label>
<br>
<label>- <?php if($row['Gender'] =="female" ){echo"Female";}else{echo"Male";}?></label><br>
</div><br>
<div>
    <?php 
        if (!empty($row['mail_status']=="yes" )){
            echo "you will receive email from us";
        }
        else{
            echo"<p style='color:red'>you won't receive email from us</p>";
        }
    ?>

</div>
<br>
<input type="button" value="Go back!" onclick="history.back()" style="background:blueviolet;">
</form>
    

</body>
</html>