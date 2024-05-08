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
        <link rel="stylesheet" href="style.css">
    </head>
   <body style="background-color:#D6EEEE;">
   <?php
    $conn = mysqli_connect('localhost','root','','canteen_db'); 
    if(isset($_POST['submit'])){
        $Username =$_POST['username'];
        $password=$_POST['password'];
        $upi=$_POST['upi'];
        $select3='SELECT * FROM `order` WHERE `username` = "'.$Username.'"';
        $result3 = $conn->query($select3);
        $total=0;
        while($row3 = $result3->fetch_assoc()){
            if($row3['username']==$Username){
                $total=$total+($row3["price"]*$row3["quantity"]);
                $rUsername=$row3['username'];
                $ritem=$row3['item_name'];
                $rprice=$row3['price'];
                $rveg_non_veg=$row3['veg_non_veg'];
                $rquantity=$row3['quantity'];
                $insert="INSERT INTO `ordered` (`username`, `item_name`, `price`, `veg_non_veg`, `quantity`, `upi`) VALUES ('$Username', '$ritem', '$rprice', '$rveg_non_veg', '$rquantity','$upi');";
                mysqli_query($conn,$insert);
                $delete="DELETE FROM `order` WHERE `username` = '".$Username."' AND `item_name` = '".$row3['item_name']."' ;";
                mysqli_query($conn,$delete);              
            }
        }

        
        echo "<center><h2>PAYMENT CONFIRMED</h2>
        <br><table style='width:50%'><tr><th>admin name</th><th>  upi id  </th></tr>";
        $select3='SELECT * FROM `canteen_admin`';
        $result3 = $conn->query($select3);
        while($row3 = $result3->fetch_assoc()){
            if(1){
                echo "<tr><td> ".$row3['username']."</td><td> ".$row3['upi']."</td><br>";
            }       
        }
        echo "</table>";
        
        echo "<h2>your  total is $total</h2> ";

        echo "<form action='main.php' method='post'><h2>back to menu
        <input type='hidden' name='username' value='".$Username."'>
        <input type='hidden' name='password' value='".$_POST['password']."'>
        <input type='submit' name='submit' value='back to MENU' class='form-btn'></h2></form>
        </center>";
        
    }
    ?>
      <script>
function back()
  {
  location.href = "../home/home.php";  
  }

</script>
<div class=form-container>
<div style="
background-color:'#D6EEEE'"> 
<center>
<button value="login" onclick="back()"  style="background-color:orange;">Go to Home page</button>   
</center>
</div>
</div>
</body> 
</html>