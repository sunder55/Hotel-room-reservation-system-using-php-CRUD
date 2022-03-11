// echo "<td>".'<img src="data:image;base64,'.base64_encode($row['room_image']).'" alt="Image" style="width:100px; height:100px;" >'."</td>";
//  $rImage=addslashes(file_get_contents($_FILES["rImage"]["tmp_name"]));

<!-- <?php 
        $conn=mysqli_connect('localhost','root','','hms');

        if(isset($_POST["submit"])){
          $str=$_POST["search"];
          $sth=$con->prepare("SELECT * from room where Name ='$str'");

          $sth->setFetchMode(PDO:: FETCH_OBJ);
          $sth->execute();
          if($row=$sth->fetch()){
            ?>
            <br><br><br>
            <table>
              <!-- <tr> -->
              <!-- <th>Name </th>
              <th>Des</th>
            </tr> -->
          <tr>
            <td><?php echo $row->type; ?></td>
            <td><?php echo $row->price;?></td>

          </tr>
          </table>
          <?php
          }
          else{
            echo "Name Does not exist";
          }
        }
        
      ?> -->