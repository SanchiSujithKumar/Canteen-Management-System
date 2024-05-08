<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="style3.css">
    </head>
   <body style="background-color:#D6EEEE;">
   <?php
    $conn = mysqli_connect('localhost','root','','canteen_db'); 
    echo "<div class='form-container'>";
    if(isset($_POST['submit'])){
        $Username =$_POST['username'];
        $password=$_POST['password'];
        $item=$_POST['item_name'];
        $quantity=$_POST['quantity'];
            $select='SELECT * FROM `items` WHERE `item_name` = "'.$item.'"';
            $result = mysqli_query($conn,$select);
            while($row = $result->fetch_assoc()){
                if($row['item_name']==$item){
                    $v_nv=$row['veg_non_veg'];
                    $price=$row['price'];
                    
                    $rquantity=$row['quantity']-$quantity;
                    $select3='UPDATE `items` SET `quantity`="'.$rquantity.'" WHERE `item_name` = "'.$item.'"';
                    $result3 = $conn->query($select3);
                    
                    }
            } 
            echo " <center><h2>$Username order is updated<br></h2></center>";
            $select2='SELECT * FROM `order` WHERE `username` = "'.$Username.'" AND `item_name` = "'.$item.'" ';
            $result2 = $conn->query($select2);
            while($row2 = $result2->fetch_assoc()){
                if($row2['item_name']==$item){
                    $rquantity=$row2['quantity']+$quantity;
                    $select4='UPDATE `order` SET `quantity`="'.$rquantity.'" WHERE `username` = "'.$Username.'" AND `item_name` = "'.$item.'"';
                    $result4 = $conn->query($select4);
                }       
            }
        

        echo "<form action='main.php' method='post'>
        <input type='hidden' name='username' value='".$Username."'>
        <input type='hidden' name='password' value='".$_POST['password']."'>
        <input type='submit' name='submit' value='Back to menu' class='form-btn'></form>";
        echo "</div>";
    }
    ?>
</body> 
</html>