<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../css/style6.css">
    </head>
   <body>
    <?php
    $conn = mysqli_connect('localhost','root','','canteen_db');
    if(isset($_POST['submit'])){
      $Username = mysqli_real_escape_string($conn,$_POST['username']);
      $Email = mysqli_real_escape_string($conn,$_POST['email']);
      $Phone_No = $_POST['phone'];
      $Roll= $_POST['roll'];
      $pass = md5($_POST['password']);
      $cpass = md5($_POST['cpassword']);
    $select="SELECT * FROM canteen";
    $result = mysqli_query($conn,$select);
    $count=0;
    if(mysqli_num_rows($result)!=0){
        while($row = $result->fetch_assoc()){
            if($row['username']==$Username){
                $error[]='user already exist!';
                break;
            }
            $count=$count+1;       
        }
        if($count==mysqli_num_rows($result)){   
            if($pass!=$cpass){
                $error[]='password not matched!';}
            else{
                $insert="INSERT INTO canteen(username,email,phone,roll,password)
                VALUES('$Username','$Email',$Phone_No,$Roll,'$pass')" ;
                mysqli_query($conn,$insert);
                header('location:login.php'); 
            }
        }
    }

    };
    ?>
    <div class="form-container">
    <form action="" method="post">
        <h2>REGISTER  FORM</h2>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
        ?>
&nbsp; USERNAME :<input type="text" name="username"  required placeholder="name"><br>
&nbsp;&nbsp; ROLL-NO :<input type="text" name="roll"  required placeholder="your rool.no"><br>
&nbsp;PASSWORD :<input type="password" name="password" required placeholder="valid password type" pattern="(?=.*\d)(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain one number, one uppercase and lowercase letter,a symbol, atleast 8 characters" required><br>
      RECONFIRM : <input type="password" name="cpassword"  required placeholder="confirm your password" ><br>
&nbsp;&#160;&nbsp;&nbsp;&nbsp; &#160; &nbsp; EMAIL :<input type="email" name="email"  required placeholder="college email"><br>
&nbsp; PHONE-NO:<input type="phone" name="phone"  required placeholder="9390******"><br>
        <input type="submit" name="submit" value="Register" class="form-btn">
        <p>Already have an account?<a href="login.php"><b>login</b></a></p>
    
    </form>
</div>
   </body> 
</html>