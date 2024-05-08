<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
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
   <div class='form-container'>
   <?php
   
     $conn = mysqli_connect('localhost','root','','canteen_db');
     if(isset($_POST['items'])){
        $itemss = $_POST['items'];
        $Username =$_POST['username'];
        $password=$_POST['password'];
        
        echo "<center><h2>cart ".$Username."<br></h2></center>";
        foreach($itemss as $item)
        {   
            $select='SELECT * FROM `items` WHERE `item_name` = "'.$item.'"';
            $result = mysqli_query($conn,$select);
            while($row = $result->fetch_assoc()){
                if($row['item_name']==$item){
                    $v_nv=$row['veg_non_veg'];
                    $price=$row['price'];
                    $select4='SELECT * FROM `order` WHERE `item_name` = "'.$item.'" and `username` = "'.$Username.'"';
                    $result4 = mysqli_query($conn,$select4);
                    if($result4->num_rows == 0){
                        $insert="INSERT INTO `order` (`username`, `item_name`, `price`, `veg_non_veg`, `quantity`) VALUES ('$Username', '$item', '$price', '$v_nv', '1');";
                        mysqli_query($conn,$insert);
                        
                        $quantity=$row['quantity']-1;
                        $select3='UPDATE `items` SET `quantity`="'.$quantity.'" WHERE `item_name` = "'.$item.'"';
                        $result3 = $conn->query($select3);
                    }
                }
            }       
        } 
    

        echo "<center><h3> ORDER PLACED<br></h3></center>";
        echo "<table style='width:100%'>
        <colgroup>
        <col span='6' style='background-color:rgb(234,221,202)'>
        </colgroup>
        <tr><th>item</th><th>price</th><th>  v_nv  </th><th>  quantity  </th></tr>";
                   
        $select2='SELECT * FROM `order` WHERE `username` = "'.$Username.'"';
        $result2 = $conn->query($select2);
        while($row2 = $result2->fetch_assoc()){
            if($row2['username']==$Username){
                echo "<tr><td>".$row2['item_name']."</td><td>".$row2['price']."</td><td>".$row2['veg_non_veg']."</td><td>".$row2['quantity']."</td></tr>";
            }       
        }
         
        $select3='SELECT * FROM `canteen_admin`';
        $result3 = $conn->query($select3);
        while($row3 = $result3->fetch_assoc()){
            if(1){
                echo "<center>".$row3['username']." upi is ".$row3['upi']."<br></center>";
            }       
        }

        echo "<form action='main.php' method='post'>
        <center>
        <input type='hidden' name='username' value='".$Username."'>
        <input type='hidden' name='password' value='".$_POST['password']."'>
        <input type='submit' name='submit' value='Back to menu' class='form-btn'></form>
        </center>";
       
    }
    
    ?>
    
</body> 
</html>