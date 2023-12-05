<?php
  session_start();
  require_once './connexionBd.php';
  if(!empty ($_SESSION['user_id']) && isset($_SESSION['user_id'])){
  $utilisateur=$_SESSION['user_id'];
  $requete='SELECT * FROM users WHERE id = :id';
 $prepareSelect=$connexion->prepare($requete);
 $prepareSelect->execute([':id'=>$utilisateur]);
 $affiche=$prepareSelect->fetch(PDO::FETCH_ASSOC);

  }else{
    header('LOCATION:../pageConnexion.php');
  }
?>
<?php require('views/connecter/profile.php');?>