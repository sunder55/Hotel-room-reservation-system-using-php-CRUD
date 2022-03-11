<?php  
$id=$_POST['hidden_id'];
$checkout=$_POST['checkout'];
     $conn=mysqli_connect('localhost','root','','hms');
         if($conn->connect_errno!=0){
           die("connection failed");
         }
             $sql= "UPDATE  reservation set checkout='".$checkout."' WHERE id='".$id."'"; 
             if($conn->query($sql)){
                echo "successfully updated";
             }
             else{
                 echo "something went wrong";
             }



?>