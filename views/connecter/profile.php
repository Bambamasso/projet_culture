

 <?php 
 $profile='./css/profile.css';
 require_once ('./include/navConnect.php');
 ?> 


 <section class="profile-info">

  <main>
    
    <div class="profile">
     <?php if(!empty($affiche['picture'])): ?>
        <h3>Profile</h3>
        
        <img src="./image/<?php echo $affiche['picture']?>" alt="">

        <?php else:?>
          <img src="./image/21104.png" alt="">
     <?php endif; ?>

     <div class="info">
        <h4>Mes information</h4>
          
        <div>
          <p class="p">Nom</p>
          <p><?php echo $affiche['full_name']?></p>
        </div>
        <div>
          <p class="p">Email</p>
          <p><?php echo $affiche['email']?></p>
        </div>
         <!-- <div>
          <p class="p">Email</p>
          <p></p>
        </div> -->
        
      </div>
    <div class="button">
      <button><a href="./deconnexion.php">Deconnexion</a></button>
      <button id="openModalBtn" >Modifier mes information</button>
    </div>


   
    </div>
    </div>

    <div id="myModal" class='modal'>
      <div class="modal-content">
        <span class="close" id="closeModalBtn">&times;</span>
        <form action="" method="post"  enctype="multipart/form-data">
          <h4>Modifier mes informations</h4>
          
          <div class="group">
            <label for="">Full name</label>
            <input type="text" name="name" class="email"value="<?php echo $affiche['full_name']?>" >
          </div>
          <div class="group">
            <label for="">Ajouter une photos</label>
            <input type="file" name="img" class="email" value="Ajouter une photos">
          </div>

          <div class="group">
              <label for="">Mote de passe</label>
              <input type="password" name="password" class="password" value="<?php echo $affiche['password']?>">
          </div>

          <!-- <div class="group">
              <label for="">Confirmer mot de passe</label>
              <input type="password" name="confirmation" class="confirmation">
          </div> -->
          <input type="submit" value="Enregistrer">
        </form>
        
      </div>

    </div>

  </main> 
 
</section>

<!-- Ajoutez d'autres sections selon vos besoins -->

<?php require_once ('./include/footer.php');
 
?>