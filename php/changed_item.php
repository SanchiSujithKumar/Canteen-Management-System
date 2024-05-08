<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="style4.css">
    </head>
   <body style="background-color:#D6EEEE;">
    <?php
    echo "<div class='form-container'>";
    $conn = mysqli_connect('localhost','root','','canteen_db');
    if(isset($_POST['submit'])){
        $Username=$_POST['username'];
        $password=$_POST['password'];
      $item_name = mysqli_real_escape_string($conn,$_POST['item_name']);
      $v_nv = mysqli_real_escape_string($conn,$_POST['veg_non_veg']);
      $quantity = $_POST['quantity'];
      $price= $_POST['price'];
    $select="SELECT * FROM `items`";
    $result = mysqli_query($conn,$select);
    $count=0;
    if(mysqli_num_rows($result)!=0){
        while($row = $result->fetch_assoc()){
            if($row['item_name']==$item_name){
                
                break;
            }
            $count=$count+1;       
        }
        if($count!=mysqli_num_rows($result)){
            $select3='UPDATE `items` SET `quantity`="'.$quantity.'",`price`="'.$price.'" WHERE `item_name` = "'.$item_name.'"';
            $result3 = $conn->query($select3);
         

            echo "<form action='main_admin.php' method='post'>CONFIRMED PAGE OF CHANGED ITEM 
            <input type='hidden' name='username' value='".$Username."'>
            <input type='hidden' name='password' value='".$password."'>
            <input type='submit' name='submit' value='back to menu' class='form-btn'></form>";
        }
        else{
            echo "<center><h2>item is not there</h2>
            <form action='change_item.php' method='post'> 
            <input type='hidden' name='username' value='".$Username."'>
            <input type='hidden' name='password' value='".$password."'>
            <input type='submit' name='submit' value='back to change item' class='form-btn'></form>
           
            </center>";
        }
    }
    echo "</div>";
    };
    ?>
   </body> 
</html>