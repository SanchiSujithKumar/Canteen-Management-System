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
        $select = 'SELECT * FROM canteen WHERE username = "'.$_POST["username"].'"';
        $result = $conn->query($select);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["password"]=== md5($_POST["password"])) {
                  $Phone_No=$row['phone'];
                  $Roll=$row['roll'];
                  
                  echo "<h2> welcome ".$Username."<br></h2>";
                  $select2 = 'SELECT * FROM items ';
                  $result2 = $conn->query($select2);
                  if ($result2->num_rows > 0){
                    echo "<center><h3>place orders <br></h3></center>";
                    echo "<br><form action='order.php' method='post'>
                    <center>
                    <p style='background-color:#D6EEEE'>
                    <select style='width:50%' name=\"items[]\" size=$result2->num_rows multiple>";
                    while($row2 = $result2->fetch_assoc()){
                      if($row2['quantity']!=0){
                        $price = $row2["price"];
                        echo "<option type='number' value=".$row2["item_name"].">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                        .$row2["item_name"]."&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;".$row2["price"]."
                      |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row2["veg_non_veg"]."<br>";
                      }
                    }
                      echo "</select><br></center></p>";

                      echo "<center>
                      <input type='hidden' name='username' value='".$Username."'>                      
                      <input type='hidden' name='price' value='".$price."'>
                      <input type='hidden' name='password' value='".$_POST['password']."'>
                      <input type='submit' name='submit' value='order' class='form-btn'></form><br>
                      </center>";

                      echo "<center><h3> $Username Selected Items<br></h3></center>";
                      echo "<br><table style='width:100%'>
                      <colgroup>
                      <col span='6' style='background-color:rgb(234,221,202)'>
                      </colgroup>
                      <tr><th>item</th><th>price</th><th>  v_nv  </th><th>  quantity  </th><th>  edit  </th><th>  delete  </th></tr>";
                   
                      $select3='SELECT * FROM `order` WHERE `username` = "'.$Username.'"';
                      $result3 = $conn->query($select3);
                      while($row3 = $result3->fetch_assoc()){
                          if($row3['username']==$Username){
                            echo "<tr><td>".$row3["item_name"]."</td><td>".$row3["price"]."</td><td>".$row3["veg_non_veg"]."</td><td>".$row3["quantity"]."</td><td><a href='edit.php?item_name=".$row3['item_name']."&username=".$Username."&password=".$_POST["password"]."'><button name='edit'>edit</button></a></td><td><a href='delete.php?item_name=".$row3['item_name']."&username=".$Username."&password=".$_POST["password"]."'><button name='delete'>delete</button></a></td></tr>";
                          }       
                      }
                      echo "</table>"; 
                      echo "<form action='pay.php' method='post'>
                      <input type='hidden' name='username' value='".$Username."'>
                      <input type='hidden' name='password' value='".$_POST['password']."'>
                      <input type='submit' name='submit' value='PAY' class='form-btn'></form>";
                      echo "<center><h3> $Username delivered items<br></h3></center>";
                      echo "<br><table style='width:100%'>
                      <colgroup>
                      <col span='6' style='background-color:rgb(234,221,202)'>
                      </colgroup>
                      <tr><th>item</th><th>price</th><th>  v_nv  </th><th>  quantity  </th><th>  upi  </th></tr>";
                      $select4='SELECT * FROM `delivered` WHERE `username` = "'.$Username.'"';
                      $result4 = $conn->query($select4);
                      while($row4 = $result4->fetch_assoc()){
                          if($row4['username']==$Username){
                            echo "<tr><td>".$row4["item_name"]."</td><td>".$row4["price"]."</td><td>".$row4["veg_non_veg"]."</td><td>".$row4["quantity"]."</td><td>".$row4["upi"]."</td></tr>";
                          }       
                      }
                      echo "</table>";

                      echo "</div>";
                  }
                  // else{
                  //   echo "<div class='form-container'>";
                  //     echo "incorrect password ".$Username."<br>";
                  //     echo "</div>";
                  // }
                }
                else  if ($row["password"]!== md5($_POST["password"])){
                  echo "<h2>incorrect password ".$Username."<br></h2>";
                }
            }
      }
      else {echo "<div class='form-container'>";
          $error[]='incorrect password';
          echo "incorrect username '".$Username."'<br>";
          echo "</div>";
      }
      $conn->close();
    }
    echo "</div>";
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