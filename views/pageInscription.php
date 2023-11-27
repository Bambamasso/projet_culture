<?php
 if(!empty($_POST['full_name'])&& !empty($_POST['email'])&& !empty($_POST['password']) && !empty($_POST['c_password'])){
    $full_name=trim(strip_tags($_POST['full_name'])) ;
    $email= trim(strip_tags($_POST['email']));
    $password= trim(strip_tags($_POST['password']));
    $c_password= trim(strip_tags($_POST['c_password']));

    if(empty( $full_name)|| strlen($full_name)<=3 ){
        $erreur_fullName="Veillez revoire votre nom";
    }

    if(empty( $email)|| strlen($email)<=3 ){
        $erreur_email="Veillez revoire l'email";
    }
    if(empty( $password)|| strlen($password )<=3 ){
        $erreur_password="Le mot de passe doit être superieur à 3";
    }
    if(empty($c_password) ){
        $erreur_cPassword ="Erreur sur le mot de passe de confirmation";
     }
     if($c_password  != $password){
        $erreur_cPassword="le mot de passe de confirmation est different du mot de passe";
     }
     if(!isset( $erreur_fullName) && !isset( $erreur_email) && !isset( $erreur_password)&& !isset( $erreur_cPassword) ){

        require_once '../connexionBd.php';

        $requet="SELECT * FROM users WHERE email=:email";
        $prepareSelect=$connexion->prepare($requet);
        $prepareSelect->execute([':email'=>$email]);

         $affiche=$prepareSelect->fetchAll();

        if($affiche){
           $message="Ce compte existe déjà";
        }else{
           $requet="INSERT INTO users(full_name,email,password)VALUES (:full_name,:email,:password)";
           $prepareInsert=$connexion->prepare($requet);
           $prepareInsert->execute([':full_name'=>$full_name, ':email'=>$email, ':password'=>$password]);
           if($prepareInsert){
           header('LOCATION:pageConnexion.php');
           }
        }
     }

 }else{
    $alerte= "veillez remplir tout les champs svp";
 }
?>
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
                <p class="active"><a href="./pageInscription.php">Inscription</a></p>
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