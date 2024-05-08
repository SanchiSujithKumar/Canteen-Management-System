<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
            h2{text-align:center;}
            table, th, td{
              border: 1px solid black;
              border-radius: 10px;
              border-color:blueviolet;
              text-align:center;
            }
            
        </style>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="style1.css">
    </head>
   <body style="background-color:#D6EEEE;">
   <?php
    $conn = mysqli_connect('localhost','root','','canteen_db'); 
    if(isset($_POST['submit'])){
        $Username =$_POST['username'];
        $password=$_POST['password'];
        
        echo " <h2>PAYMENT MODE</h2>
        <br><table style='width:100%'>
        <colgroup>
                      <col span='6' style='background-color:rgb(234,221,202)'>
                      </colgroup>
        
        <tr><th>item</th><th>price</th><th>  v_nv  </th><th>  quantity  </th><th>  edit  </th></tr>";
        $select3='SELECT * FROM `order` WHERE `username` = "'.$Username.'"';
        $result3 = $conn->query($select3);
        $total=0;
        while($row3 = $result3->fetch_assoc()){
            if($row3['username']==$Username){
                $total=$total+($row3["price"]*$row3["quantity"]);
                echo "<tr><td>".$row3["item_name"]."</td><td>".$row3["price"]."</td><td>".$row3["veg_non_veg"]."</td><td>".$row3["quantity"]."</td><td><a href='edit.php?item_name=".$row3['item_name']."&username=".$Username."&password=".$_POST["password"]."'><button name='edit'>edit</button></a></td></tr>";
            }       
        }
        echo "</table>"; 

        echo "<center><h2>your  total is $total </h2></center>";

        echo "
        <center>
        <form action='payyed.php' method='post'>Payment mode
        <input type='text' name='upi'  required placeholder='upi or cash'>
        <input type='hidden' name='username' value='".$Username."'>
        <input type='hidden' name='password' value='".$_POST['password']."'>
        <input type='submit' name='submit' value='payyed' class='form-btn'></form>
        </center>";
        
    }
    ?>
</body> 
</html>