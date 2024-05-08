<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../css/style6.css">
    </head>
   <body>
    <div class="form-container">
    <form action="../php/main.php" method="post">
        <h2>LOGIN  FORM</h2>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
        ?>
        &nbsp; USERNAME :<input type="text" name="username"  required placeholder="your name"><br>
        &nbsp;PASSWORD :<input type="password" name="password" required placeholder="valid password type"><br>
        <input type="submit" name="submit" value="login" class="form-btn">
        <p>Don't have an account?<a href="register.php"><b>Register</b></a></p>
        <p>To homepage<a href="home.php"><b>HOME</b></a></p>
    
    </form>
</div>
   </body> 
</html>