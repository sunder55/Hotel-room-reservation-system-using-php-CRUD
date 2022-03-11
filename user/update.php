<?php 
session_start();
$email=$_SESSION['user'];
 if(isset($_POST['email'])){
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $emails=$_POST['email'];
    $err="";
    if($email==""){
        $err.="email address is empty <br>";
        
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err.="Email address isnot valid<br>";
      }
      if($emails!=$email){
          $err.="Email address doesnot match";
      }
    if($password==""){
        $err.="password is empty<br>";
    }
    if($confirm==""){
        $err.="confirm is empty<br>";
    }
    if($password!=$confirm){
        $err.="password doesnot match<br>";
    }
    if($err==""){
     $conn=mysqli_connect('localhost','root','','hms');
         if($conn->connect_errno!=0){
           die("connection failed");
         }
             $sql= "UPDATE  users set password='".$password."',confirm='".$confirm."' WHERE email='".$email."'"; 
             if($conn->query($sql)){
                echo "successfully updated";
             }
             else{
                 echo "something went wrong";
             }
            }
             else{
                 
                echo $err;
             
            }
            }
        
?>