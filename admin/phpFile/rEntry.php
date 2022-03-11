<?php 
if(isset($_POST['rPrice']))
{
  $rNo=$_POST['rNo'];
  $rPrice=$_POST['rPrice'];
  $rCatagory=$_POST['rCatagory'];
  $errr="";
if($rNo=="")
{
  $errr.="room no  is empty";
}
if($rPrice=="")
{
  $errr.="room price is empty";
}
if($errr=="")
{
         $conn=mysqli_connect('localhost','root','','hms');
             if($conn->connect_errno!=0){
               die("connection failed");
             }
                 $sql= "INSERT into room (room_no,room_catagory,room_price) values('".$rNo."','".$rCatagory."','".$rPrice."')" ;

                 if($conn->query($sql)){
                    echo "successfully ";
                 }
                 else{
                     echo "something went wrong";
                 }
            }   
      else{
        echo $errr;
    }
 }
              
?>