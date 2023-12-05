
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/pageInscription.css">
</head>
<body>
    <div class="login-wrap">
        <div class="login-html">
           <div class="login">
             <p class="active"><a href="./pageConnexion.php">Connexion</a></p>
             <p class=""><a href="./pageInscription.php">Inscription</a></p>
          </div>
            <div class="login-form">
               <form action="" method="post">
                    <div class="sign-in-htm">
                    <?php  if(!empty($message)){
                             echo"<p style='color:red'; > $message</p>";
                        } ?>
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="text" class="input" name="email">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Mot de passe</label>
                            <input id="pass" type="password" class="input" name="password">
                        </div>
                       
                        <div class="group">
                            <input type="submit" class="button" value="Connexion">
                        </div>

                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#forgot">Mot de passe oublié?</a>
                        </div>
                    </div>
                    
                </form>
             

            </div> 
         
      </div>
              
    </div>
    
</body> 
</html>