<?php 
if(isset($_POST['email']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$checkin=$_POST['checkin'];
$checkout=$_POST['checkout'];
$num=$_POST['num'];
$people=$_POST['people'];
$address=$_POST['address'];
$id=$_POST['roomId'];
$date= date('D/M/Y');
$err="";
if($email=="")
{
  $err.="Email address is empty,";
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
}else 
if(strlen($num)!=10){
  $err.="number must contains 10 digits";
}
if($people==""){
  $err.="No of people is empty,";
}
if($address==""){
  $err.="country is empty,";
}
if($id==""){
  $err.="roomid is empty";
}
if($err=="")
{

$conn=mysqli_connect('localhost','root','','hms');
if($conn->connect_errno!=0){
  die("connection failed");
}
    $sql= "INSERT into reservation(fullname,room_id,checkin,checkout,people,numbers,email,addresss) VALUES('".$name."','".$id."','".$checkin."','".$checkout."','".$people."','".$num."','".$email."','".$address."')" ;

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