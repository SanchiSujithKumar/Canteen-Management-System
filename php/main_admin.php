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
        <link rel="stylesheet" href="style2.css">
    </head>
   <body style="background-color:#D6EEEE;">
   <?php
 echo "<div class='form-container'>";
    $conn = mysqli_connect('localhost','root','','canteen_db');
     if(isset($_POST['submit'])){
        $Username = mysqli_real_escape_string($conn,$_POST['username']);
        $pass = md5($_POST['password']);
        $select = 'SELECT * FROM canteen_admin WHERE username = "'.$_POST["username"].'"';
        $result = $conn->query($select);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["password"]=== md5($_POST["password"])) {
                  $Phone_No=$row['phone'];
                  $Upi=$row['upi'];
                  echo "<h2>ADMIN welcome ".$Username."<br></h2>";
                    echo "<form action='add_item.php' method='post'><h3>add item to menu<br></h3>
                    <input type='hidden' name='username' value='".$Username."'>
                    <input type='hidden' name='password' value='".$_POST['password']."'>
                    <input type='submit' name='submit' value='add item' class='form-btn'></form><br>";

                    echo "<center><table><tr><th>item</th><th>price</th><th>quantity</th></tr>";
                    $select3 = 'SELECT * FROM `items` ';
                    $result3 = $conn->query($select3);
                    if ($result3->num_rows > 0){
                      echo "<h3>MENU<br></h3>";
                      while($row3 = $result3->fetch_assoc()){
                          $price = $row3["price"];
                          echo "<tr><td>".$row3["item_name"]."</td><td>".$row3["price"]."</td><td>".$row3["quantity"]."</td></tr>";
                      }
                      echo "</table></center>";
                      echo "<form action='change_item.php' method='post'><h3>change menu items<br></h3>
                      <input type='hidden' name='username' value='".$Username."'>
                      <input type='hidden' name='password' value='".$_POST['password']."'>
                      <input type='submit' name='submit' value='change item' class='form-btn'></form><br>";
                  $select2='SELECT * FROM `ordered`';
                  $result2 = $conn->query($select2);
                  echo "<center><h3>orders placed by users</h3></center>
                   <table style='width:100%'><tr><th>user</th><th>item</th><th>price</th><th>veg or non-veg</th><th>quantity</th><th>upi</th><th>deliver</th></tr>";
                  while($row2 = $result2->fetch_assoc()){
                      if(1){
                          echo "<tr><td>".$row2['username']." </td><td>".$row2['item_name']." </td><td> ".$row2['price']." </td><td> ".$row2['veg_non_veg']."</td><td> ".$row2['quantity']."</td><td> ".$row2['upi']."</td><td><a href='deliver.php?item_name=".$row2['item_name']."&username=".$Username."&cusername=".$row2['username']."&password=".$_POST['password']."'><button name='deliver'>deliver</button></a></td></tr>";
                      }       
                  }
                  echo "</table>";
                  
                  

                    $select4='SELECT * FROM `delivered`';
                    $result4 = $conn->query($select4);
                    echo "<center><h3>Orders Delivered</h3></center> 
                    <table style='width:100%'><tr><th>user</th><th>item</th><th>price</th><th>veg or non-veg</th><th>quantity</th><th>upi</th></tr>";
                    while($row4 = $result4->fetch_assoc()){
                        if(1){
                            echo "<tr><td>".$row4['username']." </td><td>".$row4['item_name']." </td><td> ".$row4['price']." </td><td> ".$row4['veg_non_veg']."</td><td> ".$row4['quantity']."</td><td> ".$row4['upi']."</td></tr>";
                        }       
                    }
                    echo "</table>";


                     
                  
                  }
                 
                }
                else  if ($row["password"]!== md5($_POST["password"])){
                  echo "<h2>incorrect password ".$Username."<br></h2>";
                }
                // else{
                //   echo "<h2>incorrect password ".$Username."<br></h2>";
                // }
            }
      }
        else {
            $error[]='incorrect password';
            echo "incorrect username '".$Username."'<br>";
        }
        $conn->close();
        echo "</div>";
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