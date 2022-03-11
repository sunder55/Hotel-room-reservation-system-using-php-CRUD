<?php
session_start();
$roomid=$_POST['hidden_id'];
$userid=$_SESSION['user'];
if(isset($_POST['email']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$checkin=$_POST['checkin'];
$checkout=$_POST['checkout'];
$num=$_POST['num'];
$people=$_POST['people'];
$address=$_POST['address'];
$err="";
if($email=="")
{
  $err.="Email address is empty,";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $err.="Email address isnot valid";
}
if($name==""){
  $err.="name is empty,";
}
if($checkin==""){
  $err.="checkin is empty,";
}
if($checkout==""){
  $err.="checkout is empty,";
}
if($num==""){
  $err.="number is empty,";
}
if($people==""){
  $err.="No of people is empty,";
}
if($address==""){
  $err.="country is empty,";
}
if($err=="")
{
 $conn=mysqli_connect('localhost','root','','hms');
if($conn->connect_errno!=0){
  die("connection failed");
}
    $sql= "INSERT into reservation(fullname,checkin,checkout,people,numbers,addresss,email,room_id,user_id) VALUES('".$name."','".$checkin."','".$checkout."','".$people."','".$num."','".$address."','".$email."','".$roomid."','".$userid."')" ;

    if($conn->query($sql)){
       echo "successfully ";
        
    }
    else{
        echo "something went wrong";
    }
  }
  else{
    echo $err;
  }
  }
  

?>