<?php
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '';
 $dbname = 'php';
 $conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);
error_reporting(0);
$n=$_POST['Uname'];
$email=$_POST['email'];
$gn=$_POST['gender'];
$rec=$_POST['agree'];
if(isset($_POST['submit'])){
    if(! $conn ) {
        die('Could not connect: ');
     }
     if(empty($rec)){
        $rec='No';
     }else{
        $rec='yes';  
     }
     
     mysqli_select_db( $conn, $dbname );
  
     $sql = "INSERT INTO users_details(Name,Email, Gender, mail_status) 
     VALUES ( '$n', '$email', '$gn', '$rec' )";
  
     $retval = mysqli_query( $conn,$sql );
     
     if(! $retval ) {
        die('Could not insert to table: ' . mysqli_error($conn));
     }
      
    // echo "<br>Data inserted to table successfully\n";
     mysqli_close($conn);
     header('location:UserDetails.php');
    }
    
        
        
// }
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
    <form method="POST" action="<?php $_PHP_SELF ?>">
      <h4>Please fill this form and submit to add user record to the database </h4>
      <label>Name</label> <br>
      <input type="text" name="Uname" required><br>
      <label>Email</label><br>
      <input type="email" name="email" required><br>
      <label>Gender</label><br>
      <div class="gender">
          <input type="radio" name="gender"  value="male" required>
          <label for="louie">male</label><br>
          <input type="radio" name="gender" value="female" required> 
          <label for="louie">female</label><br><br>
          <label >Receive E_mails from us </label>
          <input type="checkbox" name="agree"><br><br>
          <input type="submit" class="btn" value="submit" name="submit"  required>
          <button type="reset"  class="btn2" value="cancel" name="cancel">Cancel</button>
    </form>
    
    

</body>
</html>