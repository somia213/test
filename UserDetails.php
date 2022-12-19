<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .btn1{
            text-align: right;
            margin-right: 50px;
            background: green;
            color: white;
            padding: 5px 10px;
          cursor: pointer;
        }
        .btnAll{
            float: right;
        }
        svg{
          margin: 0 5px;
          cursor: pointer;
        }
        </style>
</head>
<body>
    <h1 style="display: inline;">User Details</h1>
    <div class="btnAll">
    <a href="index.php"><button class="btn1" value="Add" name="add"> Add New User</button></a>
    </div>
    <?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php';
$conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);
    if(isset($_GET['id'])){
       $id=$_GET['id'];
      $delete= mysqli_query($conn,"DELETE FROM `users_details` WHERE `users_details`.`ID` = '$id'");
      header("location:UserDetails.php");
      die();
    }
 //include "print.php";
$sql = 'SELECT ID, Name, Email , Gender , mail_status FROM users_details';
   mysqli_select_db($conn,$dbname);
   $result = mysqli_query($conn,$sql );

   if (mysqli_num_rows($result) > 0) {
      //include 'print.php';
    echo "<div class='container'>
    <table class='table mt-3 table-bordered table-striped' border='1'>";
    echo "<th>ID</th>" , "<th>Name</th>" , "<th>Email</th>" , "<th>Gender</th>" , "<th>Mail status</th>" , "<th>Action</th>" ;
      while($row = mysqli_fetch_assoc($result)) {
        echo "/<tr>
        <td>".$row['ID']."</td>
        <td>".$row['Name']."</td>
        <td>".$row['Email']."</td>
        <td>".$row['Gender']."</td>
        <td>".$row['mail_status']."</td>
        <td>
         <a href='print.php?id=<?php echo $row["ID"] ?'> <i class='fa-solid fa-eye fa-fw' id='eye'></i></a>
         <a href='update.php?' ><i class='fa-solid fa-pen fa-fw'></i><a>
         <a href='UserDetails.php?id= ".$row['ID']."'><i class='fa-solid fa-trash fa-fw'></i></a>
        </td>
      </tr>/";
      }
      echo "</table>
      </div>";
    } else {
      echo "0 results";
    }
   //echo "Fetched data successfully\n";
       
   mysqli_close($conn);
echo"</table>";
 ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="print.js">
  </script>
</body>

</html>