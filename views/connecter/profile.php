<?php
  session_start();
  require_once '../../connexionBd.php';
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="../css/profile.css">
</head>
<body>
 <?php 
 require_once ('navbare.php');
 ?> 
 <section>
 <div class='profile'>
   <div class='info'>
      <div class="boule"><p><?php echo strtoupper(substr($affiche['full_name'],0,1))?></p></div>
      <p>Bienvenue <?php  echo $affiche['full_name']; ?></p>
     <div class="bouton">
        <button><a href="#">Modifier le profile</a></button>
        <button><a href="deconnexion.php">Deconnexion</a></button>
     </div>
   </div>
 </section>

</div> 
</body>
</html>