<?php 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php';
$conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);


  if($_SERVER['REQUEST_METHOD']=='GET'){
      if(!isset($_GET['id'])){
            header("location:index.php");
              exit;
      }

    $id=$_GET['id'];
    $sql="SELECT * FROM users_details where ID=$id";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);

               if(!$row){
                header("location:index.php");
                exit;
               }

          $name=$row['Name'];
          $email=$row['Email'];
          $gender=$row['Gender'];
          $status=$row['mail_status'];
        }else{
            $id=$_POST['id'];
            $name=$_POST['Uname'];
            $email=$_POST['email'];
            $gender=$_POST['gender'];
            $status=$_POST['agree'];
             if(isset($status)){
              $status='Yes';
           }else{
            $status='No';
           }
           
           
              do{
                   $sql="UPDATE `users_details` SET `Name` = '$name', `Email` = '$email', `Gender` = '$gender', `mail_status` = '$status'
                    WHERE `users_details`.`ID` = $id";

                   $result=mysqli_query($conn,$sql);
                     echo "<script>alert('The Data is Updated')</script>";
                       header('location:UserDetails.php');
              }while(true);
              
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>User Registration Form</h1>
    <form method="POST" >
        <input type="hidden" name="id" value="<?php echo $id;?>">
      <h4>Please update your data and submit to update your changes</h4>
      <label>Name</label> <br>
      <input type="text" name="Uname" value="<?php echo $name;?>"  required><br>
      <label>Email</label><br>
      <input type="email" name="email" value="<?php echo $email;?>" required><br>
      <label>Gender</label><br>
      <div class="gender">
          <input type="radio" name="gender"  value="male" <?php echo $gender=="male"?"checked":"";?> required>
          <label for="louie">male</label><br>
          <input type="radio" name="gender" value="female" <?php echo $gender=="female"?"checked":"";?> required>
          <label for="louie">female</label><br><br>
          <label >Receive E_mails from us </label>
          <input type="checkbox" name="agree" 
      value="<?php echo $status;?>"><br><br>
          <input type="submit" class="btn" value="Update" name="submit"  required>
          <button type="reset"  class="btn2" value="cancel" name="cancel">Cancel</button>
    </form>
    
    

</body>
</html>