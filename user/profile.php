<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:logins.php');
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="CSSs/style.css">
    <style>
     .card-body{
         margin-left:auto;
         margin-right:auto;
         margin-top:3em;
         border:2px solid black;
         width:15em;
       
     }

    </style>
</head>
<body>
<div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <h5 class="card-title">User Details</h5>
                    <form method="POST" action="update.php">
                            <?php
                             
                                $conn=mysqli_connect('localhost','root','','hms');
                                if($conn->connect_errno!=0){
                                  die("connection failed");
                                }
                                    $id=$_SESSION['user'] ;
                                    $sql= "SELECT * FROM users WHERE email='".$id."'" ;
                                    $result= $conn->query($sql);
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo '<lable>email</lable> <br>';
                                        echo '<input type="text" name="email" value='.$row['email'].'>';
                                        echo '<br><br>';
                                        echo '<lable>Password</lable> <br>';
                                        echo '<input type="password" name="password" value='.$row['password'].'>';
                                        echo '<br><br>';
                                        echo '<lable>confirm Password</lable> <br>';
                                        echo '<input type="password" name="confirm" value='.$row['confirm'].'>';
                                        echo '<br><br>';
                                      
                                        echo '<button type="submit" class="btn btn-primary">update </button>';

                                    
                                  
                                    }
                            ?>
                        </div>
                 </div>
         
            </div> 
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    
</body>
</html>

