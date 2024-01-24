
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="./css/pageInscription.css">
</head>
<body>

    <div class="login-wrap">
        <div class="login-html">
            <div class="login">
                <p class=""><a href="./pageConnexion.php">Connexion</a></p>
                <p class="active"><a href="pageInscription.php">Inscription</a></p>
             </div>
            <div class="login-form">
               <form action="" method="post">
                  
                    <div class="sign-up-htm">
                        <?php  if(!empty($message)){
                             echo"<p style='color:red'; > $message</p>";
                        } ?>
                        <?php if (!empty($alerte)){
                            echo "<p style='color:red';> $alerte</p>";
                        }?>
                        <div class="group">
                            <label for="user" class="label">Nom complet</label>
                            <input id="user" type="text" class="input" name="full_name">
                            <?php if(!empty($erreur_fullName)){
                                 echo"<p style='color:red'; > $erreur_fullName</p>";
                            }?>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email</label>
                            <input id="pass" type="email" class="input"  name="email">
                            <?php if(!empty($erreur_email)){
                                  echo"<p style='color:red'; > $erreur_email</p>";
                            }?>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Mot de passe</label>
                            <input id="pass" type="password" class="input" name="password">
                            <?php if(!empty($erreur_password)){
                                echo"<p style='color:red'; > $erreur_password</p>";
                            }?>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Confirmer votre mot de passe</label>
                            <input id="pass" type="password" class="input" name="c_password">
                            <?php  if(!empty($erreur_cPassword)){
                                 echo"<p style='color:red'; > $erreur_cPassword</p>";
                            }?>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="S'inscrire">
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</body>
</html>