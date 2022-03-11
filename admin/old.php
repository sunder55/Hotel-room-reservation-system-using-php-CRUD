<html>
    <head><title></title></head>
    <style>
    .modal-body{
        text-align:center;
   }
   .table {
       border:2px solid black;
   }
    </style>
    <body></body>
    </html>

<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:admin.php');
}
include('layout/header.php');
?> 

 <div class="container-fluid mt-2">
     <div class="row">
      <?php 
      include('layout/sidebar.php');
      ?>
        
         <div class="col-9 mt-5">
            <div class="card">
        
                <div class="card-body">
                    <h5 class="card-title">Old transaction Detail</h5>
                        <table class="table">
                            <thead>
                                 <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Room id</th>
                                    <th scope="col">full Name</th>
                                    <th scope="col">Checkin</th>
                                    <th scope="col">checkout</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn=mysqli_connect('localhost','root','','hms');
                                if($conn->connect_errno!=0){
                                  die("connection failed");
                                }
                                    $sql= "SELECT * FROM reservation where status='checkedout' or status='rejected' or status='NotVisited'" ;

                                    $result= $conn->query($sql);
                                    $i=1;
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr><td>".$i++."</td>";
                                        echo "<td>".$row['room_id']."</td>";
                                        echo "<td>".$row['fullname']."</td>";
                                        echo "<td>".$row['checkin']."</td>";
                                        echo "<td>".$row['checkout']."</td>";
                                        echo "<td>".$row['status']."</td>";
                                        echo "<td><button id='".$row['id']."'class='view  btn btn-primary'>View</button>&nbsp";
                                    
                                     
                                  
                                    }
                            ?>
                            </tbody>
                        </table>
                 </div>
            </div>
        </div>
    </div>
</div>
<?php 
include('layout/footer.php');
?>
<script>
    $(document).ready(function(){
        $('#newRoom').click(function(){
          $('#mdlNewRoom').modal ('show');
          $('#nRoom').removeAttr('disabled');
        });
       
        $('#nRoom').click(function(){
            var room=document.getElementById('Room');
            
            $.ajax({
                        url:"phpFile/checkin.php",
                        method:"POST",
                        data: new FormData(room),
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload(false);

                        }
                  });
        });
        $('.view').click(function(){
           var id=this.id;
                     
          $.ajax({
            url:"phpFile/rview.php",
            method:"POST",
            data:{id:id},
            success:function(data)
            {

                var json=$.parseJSON(data);
                // alert(json[0].room_no);
                
                // $('#mdlname').val(json[0].fullname );
                // $('#mdlroomId').val(json[0].room_id );
                // $('#mdlcheckin').val(json[0].checkin);
                // $('#mdlcheckout').val(json[0].checkout);
                $('#mdlpeople').val(json[0].people );
                $('#mdlnum').val(json[0].numbers );
                $('#mdladdress').val(json[0].addresss );
                $('#mdlemail').val(json[0].email );
                $('#hidden_id').val(json[0].id);
                $('#mdlroom').modal ('show');
                

            
            }

          });

        });

     
       
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
                <input type="date" id="checkin" name="checkin"><br>
                <span id="in"></span>
            <label>Check Out Date</label><br>
                <input type="date" id="checkout" name="checkout" ><br>
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
                <button type="submit" id="nRoom" class="btn btn-primary" disabled>New Room</button>
                <button type="submit" id="rEdit" class="btn btn-primary" disabled>Room Edit</button>
                <input type="hidden" id="hidden_id" name="hidden_id" />
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade"  tabindex="-1" id="mdlroom">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="room" name="room"  >
            <div class="modal-header">
                <h5 class="modal-title">Reservation Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         <div class="modal-body">
       
            <!-- <label>Full Name</label><br>
                <input type="text" id="mdlname" name="name" placeholder="Enter your full name"  > <br>
              <label>Room id</label><br>
                <input type="number" id="mdlroomId" name="roomId" > <br>
                <label>Check In Date</label><br>
                <input type="date" id="mdlcheckin" name="checkin"><br>
            <label>Check Out Date</label><br>
                <input type="date" id="mdlcheckout" name="checkout" ><br> -->
                <label>Phone number</label><br>
                <input type="number" id="mdlnum" name="num"><br>
                <label>No of people</label><br>
                <input type="number" id="mdlpeople" name="people"><br>
            <label>Country</label><br>
                <input type="text" id="mdladdress" name="address"><br>
            <label>Email</label><br>
                <input type="text" id="mdlemail" name="email"><br><br>
              
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="hidden_id" name="hidden_id" />
            </div>
        </form>
    </div>
  </div>
</div>

