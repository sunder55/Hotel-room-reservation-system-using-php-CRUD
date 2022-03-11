<?php 
$id=$_POST['hidden_id'];
$rNo=$_POST['rNo'];
$rPrice=$_POST['rPrice'];
$rCatagory=$_POST['rCatagory'];
// $rImage=$_POST['rImage'];
// $rDescription=$_POST['rDescription'];


     $conn=mysqli_connect('localhost','root','','hms');
         if($conn->connect_errno!=0){
           die("connection failed");
         }
            //  $sql= "INSERT into room (room_no,room_catagory,room_price,room_description) values('".$rNo."','".$rCatagory."','".$rPrice."','".$rDescription."')" ;
             $sql= "UPDATE  room set room_no='".$rNo."',room_catagory='".$rCatagory."',room_price='".$rPrice."' WHERE id='".$id."'"; 
             if($conn->query($sql)){
                echo "successfully updated";
             }
             else{
                 echo "something went wrong";
             }

?>