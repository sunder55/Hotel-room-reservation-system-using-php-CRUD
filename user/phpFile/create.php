<?php
    if(isset($_POST['email'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $err="";
    if($email==""){
        $err.="email address is empty,";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err.="Email address isnot valid";
    }
    if($password==""){
        $err.="password is empty";
    }
    if($confirm==""){
        $err.="confirm is empty";
    }
    if($password!=$confirm){
        $err.="password doesnot match";
    }
    if($err==""){
    $conn=mysqli_connect('localhost','root','','hms');
    if($conn->connect_errno!=0){
    die("connection failed");
    }
        $sql= "INSERT INTO users(email,password,confirm) VALUES('".$email."','".$password."','".$confirm."')" ;

        if($conn->query($sql)){
        echo "successfully register";
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
