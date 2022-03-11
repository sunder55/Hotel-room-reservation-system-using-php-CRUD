<?php

 $id=$_POST['id'];

 $conn=new mysqli('localhost','root','','hms');
 if($conn->connect_errno!=0){
  die("connection failed");
 }
 $sql = "SELECT * FROM reservation WHERE id='".$id."'";
 
 if($result=$conn->query($sql)){
    $data= array();
    while($row = $result->fetch_assoc())
    {
        array_push($data,$row);   
    }
    
    echo json_encode($data);
}
else{
    echo"error";
}
?>
