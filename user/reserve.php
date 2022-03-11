<?php 
$roomid=$_GET['id'];
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align:center;
        }
        .reserve{
            font-weight: bold;
            margin-top:5em;
            font-size:20px;
            padding:15px;
            background-color:cadetblue;
            box-shadow: 0px 0px 5px 5px cadetblue;
            height:25em;
            width:20em;
            margin-left:auto;
            margin-right:auto;
        }
        label{
            padding:5px;
        }
        input{
            margin-bottom:10px;
            width:15em;
        }
        input:hover{
            font-size:15px;
        }
        .button{
            color:white;
            background-color:blue;
            height:2em;
            width:6em;
            border-radius: 5px;
        }
        .button:hover{
            font-size: 15px;
        }
    </style>
</head>
<body >
    <form id="frm_book">
        <div class="reserve">
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
                <input type="hidden" name="hidden_id" id="hidden_id" value=<?php echo $roomid ?>>
                <input type="button" id="book" name="book" value="Book now" class="button" >
                
        </div>
    </form>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
    $(document).ready(function(){
        $('#book').click(function(){
           var frm=document.getElementById('frm_book');
         
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
