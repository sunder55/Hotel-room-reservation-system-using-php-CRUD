<?php
 $id=$_POST['id'];

 $conn=new mysqli('localhost','root','','hms');
 if($conn->connect_errno!=0){
  die("connection failed");
 } 
 $sql = "DELETE FROM reservation WHERE id='".$id."'";
 if($conn->query($sql)){
    echo "successfully Deleted ";
 }
 else{
     echo "something went wrong";
 }

?>
