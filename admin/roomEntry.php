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
        
         <div class="col-9">
            <div class="card">
                <div class="card-header"><button id="newRoom" class="btn btn-warning" >New Room</button></div>
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
                                    $sql= "SELECT * FROM room" ;

                                    $result= $conn->query($sql);
                                    $i=1;
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr><td>".$i++."</td>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['room_no']."</td>";
                                        echo "<td>".$row['room_catagory']."</td>";
                                        echo "<td>".$row['room_price']."</td>";
                                        echo "<td><button id='".$row['id']."'class=' edit btn btn-primary'>Edit</button>&nbsp";
                                        echo "<button id='".$row['id']."'class=' delete btn btn-danger'>Delete</button></td></tr>";
                                        
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
                        url:"phpFile/rEntry.php",
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

        $(".edit").click(function(){
          var id=this.id;
          
          $.ajax({
            url:"phpFile/adddate.php",
            method:"POST",
            data:{id:id},
            success:function(data)
            {

                var json=$.parseJSON(data);
                // alert(json[0].room_no);
                
                 $('#rNo').val(json[0].room_no );
                $('#rCatagory').val(json[0].room_catagory);
                $('#rPrice').val(json[0].room_price);
                $('#hidden_id').val(json[0].id);
                $('#mdlNewRoom').modal ('show');
                $('#nRoom').attr('disabled','disabled');
                $('#rEdit').removeAttr('disabled');

            
            }

          });
    
         });
       
         $('#rEdit').click(function(){
            var room=document.getElementById('Room');
             $.ajax({
                        url:"phpFile/roomEdit.php",
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
        
         $('.delete').click(function(){
             var id=this.id;
            $.ajax({
                        url:"phpFile/deleteRoom.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                            alert(data);
                            location.reload(true); //used to Refresh Page
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
                <h5 class="modal-title">New Room Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
     
           
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Room No</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="rNo" name="rNo" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Room Catagory</label>
                    <div class="col-sm-9"> 
                        <select class="form-control" id="rCatagory" name="rCatagory" >
                        <option>Single Bed Room</option>
                        <option>Double Bed Room</option>
                        <option>Triple Bed Room</option>
                        <option>king Room</option>
                        
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Room Price</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="rPrice" name="rPrice" >
                    </div>
                </div>
              

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
