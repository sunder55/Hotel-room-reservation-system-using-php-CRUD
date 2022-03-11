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
    <style>
      body{
        background-color:darkseagreen;
      }
   
    button{
      font-weight: bold;
      background-color:blue;
      height:2em;
      color: white;
      border-radius:5px ;
    }
    button:hover{
      background-color: burlywood;
    }

    h5{
      text-align:center;
      font-size:50px;
    }
    ul{
      font-size:2em;
     
      text-align:center;
      align-items:center;
      justify-content:center;
      display:grid; 
    }
    li{
      padding:20px;
     display:table-cell;
    }
    #mdlNewRoom{
      text-align:center;
    }
    </style>
    
</head>
<body>
 <div class="container">
<div class="col-12 p-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Room Detail</h5>
                        <table class="table">
                            <thead>
                                 <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col"> Room id</th>
                                    <th scope="col">Room No</th>
                                    <th scope="col">Room Catagory</th>
                                    <th scope="col">Room price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn=mysqli_connect('localhost','root','','hms');
                                if($conn->connect_errno!=0){
                                  die("connection failed");
                                }
                                    $sql= "SELECT * FROM room where status='available'" ;

                                    $result= $conn->query($sql);
                                    $i=1;
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr><td>".$i++."</td>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['room_no']."</td>";
                                        echo "<td>".$row['room_catagory']."</td>";
                                        echo "<td>".$row['room_price']."</td>";
                                        echo "<td><button id='".$row['id']."'class=' book btn btn-primary'>Book</button>&nbsp";
                                        echo "<button id='".$row['id']."'class=' view btn btn-danger'>view</button></td></tr>";
                                        
                                    }
                            ?>
                            </tbody>
                        </table>
                 </div>
            </div>
        </div>
    </div>
</div>
</div>
   <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
<script>
  $(document).ready(function(){
    $('.res').click(function(){
      var id=this.id;
      $(location).attr('href','reserve.php?id='+id);
  
    })
    $('.book').click(function(){
      $('#hidden_id').val(this.id);
    $('#mdlNewRoom').modal('show');

    });
    $('#reserve').click(function(){
           var frm=document.getElementById('Room');
           $.ajax({
                        url:"phpFile/reservation.php",
                        method:"POST",
                        data: new FormData(frm),
                
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            
                        }
                  });
        })

  });
  </script>
 
</body>
</html>
<div class="modal fade"  tabindex="-1" id="mdlNewRoom">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="Room" name="Room"  >
            <div class="modal-header">
                <h5 class="modal-title">Reservation Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         <div class="modal-body">
       
            <label>Full Name</label><br>
                <input type="text" id="name" name="name" placeholder="Enter your full name"  > <br>
                <span id="nam"></span>
                <label>Check In Date</label><br>
                <input type="date" name="checkin" min="<?php echo date("Y-m-d"); ?>"><br>
                <span id="in"></span>
            <label>Check Out Date</label><br>
            <input type="date" name="checkout" min="<?php echo date("Y-m-d"); ?>"><br>
                <label>Phone number</label><br>
                <input type="number" id="num" name="num"><br>
                <label>No of people</label><br>
                <input type="number" id="people" name="people"><br>
            <label>Country</label><br>
                <input type="text" id="address" name="address"><br>
            <label>Email</label><br>
                <input type="text" id="email" name="email"><br><br>
              

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="reserve" class="btn btn-primary" >Book Now</button>
                <input type="hidden" id="hidden_id" name="hidden_id" />
            </div>
        </form>
    </div>
  </div>
</div>
