<?php 
$id=$_POST['hidden_id'];
$name=$_POST['name'];
$checkin=$_POST['checkin'];
$checkout=$_POST['checkout'];
$num=$_POST['num'];
$people=$_POST['people'];
$address=$_POST['address'];
$email=$_POST['email'];

// $rImage=$_POST['rImage'];
// $rDescription=$_POST['rDescription'];


     $conn=mysqli_connect('localhost','root','','hms');
         if($conn->connect_errno!=0){
           die("connection failed");
         }
            //  $sql= "INSERT into room (room_no,room_catagory,room_price,room_description) values('".$rNo."','".$rCatagory."','".$rPrice."','".$rDescription."')" ;
             $sql= "UPDATE  reservation set fullname='".$name."',checkin='".$checkin."',checkout='".$checkout."'
             ,numbers='".$num."',people='".$people."',addresss='".$address."',email='".$email."' WHERE id='".$id."'"; 
             if($conn->query($sql)){
                echo "successfully updated";
             }
             else{
                 echo "something went wrong";
             }

?>