<?php
session_start();

require_once('connexionBd.php');

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
            header('LOCATION:./profile.php');
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
<?php
 require('./views/pageConnexion.php');
?>
