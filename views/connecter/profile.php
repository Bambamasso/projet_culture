

 <?php 
 $profile='./css/profile.css';
 require_once ('./include/navbare.php');
 ?> 


 <section class="profile-info">

 <!-- <h2>Informations personnelles</h2>
    <p>Nom: Nom de l'utilisateur</p>
    <p>Email: email@utilisateur.com</p> -->

  <div class="profile">
    <div class="cardre">

      <div class="gauche">
        <div> <img src="./image/téléchargement.png" alt="cgn"></div>
      </div>
      <div  class="droite">
        <h1>Mes information</h1>
        <div>
        <p class="p">Nom : </p>
        <p> <?php  echo $affiche['full_name']; ?></p>
        </div>
        <div>
          <p class="p">Email : </p>
          <p><?php echo $affiche['email']; ?></p>
      </div>
        

      </div>
      </div>
    <div class="bouton">
     <button><a href="">Modifier mes information</a></button>
     <button><a href="./deconnexion.php">Deconnexion</a></button>
    </div>
  </div>
 
</section>

<!-- Ajoutez d'autres sections selon vos besoins -->

<?php require_once ('./include/footer.php'); ?>