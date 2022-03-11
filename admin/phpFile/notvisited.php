<?php 
$id= $_POST['id'];

$conn=mysqli_connect('localhost','root','','hms');
if($conn->connect_errno!=0){
  die("connection failed");
}
    $sql= "UPDATE  reservation set  status='NotVisited' WHERE id='".$id."'"; 
    if($conn->query($sql)){
      $sql= "SELECT room_id FROM reservation WHERE id='".$id."'"; 
      if($result=$conn->query($sql)){
        $row=$result->fetch_assoc();
        $roomid=$row['room_id'];
        $sql="UPDATE  room set  status='available' WHERE id='".$roomid."'";
        $conn->query($sql);
      }
       echo "not visited";
    }
    else{
        echo "something went wrong";
    }

?>