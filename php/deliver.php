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
        <link rel="stylesheet" href="style3.css">
    </head>
   <body style="background-color:#D6EEEE;">
   <?php
    echo "<div class='form-container'>";
    $conn = mysqli_connect('localhost','root','','canteen_db'); 
    // echo $_GET['item_name']." quantity ".$_GET['username'];
    $item=$_GET['item_name'];
    $Username=$_GET['username'];
    $cUsername=$_GET['cusername'];
    $password=$_GET['password'];
    $select2='SELECT * FROM `ordered`';
    $result2 = $conn->query($select2);
    echo "<h2>Deliver Page</h2> 
    <table style='width:100%'><tr><th>user</th><th>item</th><th>price</th><th>veg or non-veg</th><th>quantity</th><th>upi</th><th>deliver</th></tr>";
    while($row2 = $result2->fetch_assoc()){
        if($row2['username']==$cUsername){
            echo "<tr><td>".$row2['username']." </td><td>".$row2['item_name']." </td><td> ".$row2['price']." </td><td> ".$row2['veg_non_veg']."</td><td> ".$row2['quantity']."</td><td> ".$row2['upi']."</td><td><a href='deliver.php?item_name=".$row2['item_name']."&username=".$Username."cusername=".$row2['username']."&password=".$password."'><button name='deliver'>deliver</button></a></td></tr>";
        }       
    }
    echo "</table>";
    
    echo "<form action='delivered.php' method='post'>DELIVER<br>
        <input type='hidden' name='username' value='".$Username."'>
        // <input type='hidden' name='cusername' value='".$cUsername."'>
        <input type='hidden' name='password' value='".$password."'>
        <input type='hidden' name='item_name' value='".$item."'>
        <input type='submit' name='submit' value='submit' class='form-btn'></form>";
     echo "</div>";
    
    ?>
</body> 
</html>