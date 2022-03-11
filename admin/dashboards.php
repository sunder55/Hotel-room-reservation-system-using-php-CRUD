<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:admin.php');
}

include('layout/header.php')
?> 
<div class="container-fluid mt-2">
     <div class="row">
      <?php 
      include('layout/sidebar.php');
      ?>
        
    <div class="col-9">Main page</div>
    </div>
</div>
<?php 
include('layout/footer.php');
?>
</body>
</html>