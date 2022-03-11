<?php
   $conn=mysqli_connect('localhost','root','','hms');
   if($conn->connect_errno!=0){
   die("connection failed");
   }
if(isset($_POST['emails'])){
    $query="SELECT * from users where email='".$email."'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
    {
        echo '<span>User name is already exist<span>';
    }
    else {
        echo '<span>Email is avaliable <span>';
    }
}
?>