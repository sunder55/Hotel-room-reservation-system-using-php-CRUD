<?php 
$name=$_GET['name'];
$conn=mysqli_connect('localhost','root','','hms');
if($conn->connect_errno!=0){
  die("connection failed");
}
    $sql= "INSERT checkin SELECT * FROM reservation";

    if($conn->query($sql)){
       echo "successfully ";
    }
    else{
        echo "something went wrong";
    }


?>