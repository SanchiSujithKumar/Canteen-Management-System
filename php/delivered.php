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
    if(isset($_POST['submit'])){
        $Username =$_POST['username'];
        $cUsername =$_POST['cusername'];
        $password=$_POST['password'];
        $item=$_POST['item_name'];
        $select3='SELECT * FROM `ordered` WHERE `username` = "'.$cUsername.'" AND `item_name` = "'.$item.'"';
        $result3 = $conn->query($select3);
        while($row3 = $result3->fetch_assoc()){
            if($row3['username']==$cUsername){
                $rUsername=$row3['username'];
                $ritem=$row3['item_name'];
                $rprice=$row3['price'];
                $rveg_non_veg=$row3['veg_non_veg'];
                $rquantity=$row3['quantity'];
                $rupi=$row3['upi'];
                $insert="INSERT INTO `delivered` (`username`, `item_name`, `price`, `veg_non_veg`, `quantity`, `upi`) VALUES ('$rUsername', '$ritem', '$rprice', '$rveg_non_veg', '$rquantity','$rupi');";
                mysqli_query($conn,$insert);
                $delete="DELETE FROM `ordered` WHERE `username` = '".$cUsername."' AND `item_name` = '".$row3['item_name']."' ;";
                mysqli_query($conn,$delete);
                break;              
            }
        }
        

        echo "<form action='main_admin.php' method='post'>CONFIRED DELIVERY<br>
        <input type='hidden' name='username' value='".$Username."'>
        <input type='hidden' name='password' value='".$_POST['password']."'>
        <input type='submit' name='submit' value='TO MENU' class='form-btn'></form>";
        echo "</div>";
    }
    ?>
</body> 
</html>