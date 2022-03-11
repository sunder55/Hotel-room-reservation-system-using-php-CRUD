<?php 
$id= $_POST['id'];

$conn=mysqli_connect('localhost','root','','hms');
if($conn->connect_errno!=0){
  die("connection failed");
}
    $sql= "UPDATE  reservation set  status='checkedin' WHERE id='".$id."'"; 
    if($conn->query($sql)){
       echo "successfully checkedin";
    }
    else{
        echo "something went wrong";
    }

?>