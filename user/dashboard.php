<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:logins.php');
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
    <link rel="stylesheet" href="CSSs/style.css">
    <style>
      #mdlNewRoom{
        text-align:center;
      }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="room.php">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="profile.php" id="profile"> Profile </a>   
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="logout.php">logout</a>
        </li>
      </ul>
      
      <!-- <form class="d-flex" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="search" type="submit" name="search">Search</button>
      </form> -->
    
    </div>
  </div>
</nav>
</nav>

<h1 class="p-3 text-center fw-bold fst-italic "id="h1" style="font-size:5em;">HOTEL MANDU</h1>
<img src="img/hotel.jpg"id="img" class="img-fluid " alt=""> 
<h2 class="h2">Reserve suitable room for you!!!</h2>


<div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <h5 class="card-title">Your Reservation Detail</h5>
                        <table class="table">
                            <thead>
                                 <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">full Name</th>
                                    <th scope="col">Checkin</th>
                                    <th scope="col">checkout</th>
                                  
                                    <th scope="col">number</th>
                                 
                                    <th scope="col">country</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn=mysqli_connect('localhost','root','','hms');
                                if($conn->connect_errno!=0){
                                  die("connection failed");
                                }
                                   $user_id=$_SESSION['user'];
                                    $sql= "SELECT * FROM reservation WHERE user_id='".$user_id."' " ;
                                    $result= $conn->query($sql);
                                    $i=1;
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr><td>".$i++."</td>";
                                        echo "<td>".$row['fullname']."</td>";
                                        echo "<td>".$row['checkin']."</td>";
                                        echo "<td>".$row['checkout']."</td>";
                                        echo "<td>".$row['numbers']."</td>";
                                        echo "<td>".$row['addresss']."</td>";
                                        echo "<td>".$row['status']."</td>";
                                      
                                    
                                  
                                    }
                            ?>
                            </tbody>
                        </table>
                 </div>
         
            </div> 
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    
</body>
</html>

