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
        $Username=$_POST['username'];
        $password=$_POST['password'];
        echo "
        <form action='changed_item.php' method='post'>
          <h2>Change Item  FORM</h2>
        &nbsp; item name :<input type='text' name='item_name'  required placeholder='your item name'><br>
        &nbsp;&nbsp; price :<input type='text' name='price' required placeholder='your price'><br>
        &nbsp; veg/non-veg:<input type='text' name='veg_non_veg'  required placeholder='veg/non-veg'><br>
        &nbsp; quantity :<input type='text' name='quantity' required placeholder='your quantity'><br>
        <input type='hidden' name='username' value='".$Username."'>
        <input type='hidden' name='password' value='".$password."'>
        <input type='submit' name='submit' value='change item' class='form-btn'>
        ";        
    };
    echo "</div>";
    ?>
    
   </body> 
</html>