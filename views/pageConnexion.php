<?php
session_start();

require_once '../connexionBd.php';

 if(!empty($_POST['email']) && !empty($_POST['password']) ){
    $email=$_POST['email'];
    $password=$_POST['password'];

     $query="SELECT * FROM users WHERE email=:email AND password=:password";
     $prepareSelect=$connexion->prepare($query);
     $prepareSelect->execute([':email' =>$email, ':password'=>$password]);

      if(!$prepareSelect){
        echo'oupt erreu ';
      }

      $affiche=$prepareSelect->fetch(PDO::FETCH_ASSOC);
    //   var_dump($affiche);

         if($affiche){
             $_SESSION['user_id']= $affiche["id"];
            echo "validé";
         }else{
           $message="Email ou mot de passe incorrect ";
         }
    //  $rowCount = $prepareSelect->rowCount();

    // if ($rowCount > 0) {
    //     // Des résultats ont été trouvés
    //     $affiche = $prepareSelect->fetchAll();
        
    //     var_dump($affiche);
    // } else {
    //     // Aucun résultat trouvé
    //     echo "Aucun utilisateur trouvé avec cet email.";
    // }
    // 
    
    // // var_dump($prepareSelect);
     
    //  var_dump($affiche);

 }

?>
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
    
   
</html>