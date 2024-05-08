<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
   <body style="background-color:#D6EEEE;">
   <?php
   echo "<div class='form-container'>";
    $conn = mysqli_connect('localhost','root','','canteen_db'); 
    // echo $_GET['item_name']." quantity ".$_GET['username'];
    $item=$_GET['item_name'];
    $Username=$_GET['username'];
    $password=$_GET['password'];
    $select3='SELECT * FROM `items` WHERE `item_name` ="'.$item.'" ';
    $result3 = $conn->query($select3);
    while($row3 = $result3->fetch_assoc()){
        if($row3['item_name']==$item){
            $quantity=$row3['quantity'];
        }       
    }
    
    echo "<form action='edited.php' method='post'>ADD Quantity
        <input type='number' name='quantity' value ='0' min='0' max='".$quantity."'>
        <input type='hidden' name='username' value='".$Username."'>
        <input type='hidden' name='password' value='".$password."'>
        <input type='hidden' name='item_name' value='".$item."'>
        <input type='submit' name='submit' value='submit' class='form-btn'></form>";
echo "</div>"
    
    ?>
</body> 
</html>