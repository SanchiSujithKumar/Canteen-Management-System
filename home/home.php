<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            h2{text-align:center;}
            p{text-align:center;}
            div{text-align:center;}
        </style>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../css/style7.css">
    </head>
   <body>
    <div class="form-container">
       <center> <h2>HOME PAGE</h2> </center>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
        ?>
        <h2><p>Users login/register: <a href='login.php'><b>Log in user</b></a></p></h2><br>
       <h2> <p>admin login/register:<a href="login_admin.php"><b>Log in admin</b></a></p></h2><br>
</div>
   </body> 
</html>