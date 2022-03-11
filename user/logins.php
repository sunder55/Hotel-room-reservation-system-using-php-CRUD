<?php
if(isset($_POST['email']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$err="";
if($email=="")
{
  $err.="Email address is empty</br>";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $err.="Email address isnot valid";
}
if($password=="")
{
  $err.="password is empty</br>";
}
if($err=="")
{
  // databases connection
  $conn=mysqli_connect('localhost','root','','hms');
  if($conn->connect_errno!=0){
    die("connection failed");
  }
      $sql= "SELECT * FROM users WHERE email= '".$email."' AND password= '".$password."'";
    $result= $conn->query($sql);
    if($result->num_rows>0)
    {
      session_start();
      $_SESSION['user'] = $email;
      header('Location:dashboard.php');
}
  else{
    echo "user not found";
  }
    
}
else{
  echo $err;
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="login.css">
    <style>
      #mdlNewRoom{
        text-align:center;
      }

      </style>
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
    <form method="post" action="logins.php"class="form">
      <h1 class="hotelbtn ">Hotel Room Reservation System</h1>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email" type="email" autocomplete class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn-primary">Login</button><br><br>
  <button type="button" class="create btn-primary" id="create">Create New Account</button>
</form>
</div>  
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
    $(document).ready(function(){
        $('.create').click(function(){
          $('#mdlNewRoom').modal ('show');
        });

        $('#register').click(function(){
            var room=document.getElementById('Room');
        

            $.ajax({
                        url:"phpFile/create.php",
                        method:"POST",
                        data: new FormData(room),
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload(true);

                        }
                  });

        });

        //  $('#email').blur(function(){
        //  var email=$(this).val();
        //   $.ajax({
        //     url:"check.php",
        //     method:"POST",
        //     data:{emails:email},
        //     datatype:"text",
        //     sucess:fucntion(html){
        //       $('#available').html(html);
        //       }
                    
        //   });
        //  });
     
    });

</script>
</body>
</html>


<div class="modal fade"  tabindex="-1" id="mdlNewRoom">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="Room" name="Room"  >
            <div class="modal-header">
                <h5 class="modal-title">New Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         <div class="modal-body">

            <label>Email</label><br>
                <input type="text" id="email" name="email"><br><br>
              <span id="available"></span>
                <label>password</label><br>
                <input type="password" id="cofirm" name="password"><br><br>
                <label>confirm password</label><br>
                <input type="password" id="confirm" name="confirm"><br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="register" class="btn btn-primary" >Register</button>
                <input type="hidden" id="hidden_id" name="hidden_id" />
            </div>
        </form>
    </div>
  </div>
</div>
