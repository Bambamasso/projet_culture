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
  if(isset($affiche['id'])){
   if(!empty($_POST['name']) || !empty($_FILES['img']) || !empty($_POST['password'])){
    $name=$_POST['name'];
    $password =$_POST['password'];
    $img='';
    
    if(!empty($_FILES['img'])){
      $img=$_FILES['img']['name'];
      $tmp_nom=$_FILES['img']['tmp_name'];
      //on récupère l'heure actuelle
      $time=time();
    //on renome l'image en utlisant cette formule:heure+nom de l'image(pour avoir des imges) 
      $nouveau_nom_img=$time.$img;
     //on déplace l'image dans un dossier appellé "image"
     $deplace_img=move_uploaded_file($tmp_nom, "image/".$nouveau_nom_img);
  
     if($deplace_img){
      // echo'bien';
   

     }
    }

    $query='UPDATE users SET ';
    $parametres=[];
  //   if(!empty( $name)){
  //   $query.='full_name=:full_name';

  //   }
  //   if( !empty($password) ){
  //     $query.='password=:password';
  //   }
    
  //   if( !empty($nouveau_nom_img) ){
  //     $query.=' picture=:picture';
  //   }
  //   $query.=' WHERE id=:id';

  //   $prepareUpdate=$connexion->prepare($query);

  //   if(!empty( $name)){
  //     $paramettre=[':full_name'=>$name];
  //   }

  // if(!empty( $password)){
  //     $paramettre=[':password'=>$password];
  //   }
  //   if(!empty( $nouveau_nom_img)){
  //     $paramettre=[':picture'=> $nouveau_nom_img];
  //   }
   
  //   $paramettre=[':id'=> $utilisateur];

  //   $prepareUpdate->execute($paramettre);
  if(!empty($name)){
    $query .= 'full_name = :full_name';
    $parametres[':full_name'] = $name;
}

if(!empty($password)){
    if(!empty($parametres)) $query .= ', '; // Ajouter une virgule si d'autres champs ont été spécifiés
    $query .= 'password = :password';
    $parametres[':password'] = $password;
}

if(!empty($nouveau_nom_img)){
    if(!empty($parametres)) $query .= ', '; // Ajouter une virgule si d'autres champs ont été spécifiés
    $query .= 'picture = :picture';
    $parametres[':picture'] = $nouveau_nom_img;
}

$query .= ' WHERE id = :id';

$parametres[':id'] = $utilisateur;

$prepareUpdate = $connexion->prepare($query);
$prepareUpdate->execute($parametres);
    if($prepareUpdate){
      // echo'pas mal';
      $requete='SELECT * FROM users WHERE id = :id';
      $prepareSelect=$connexion->prepare($requete);
      $prepareSelect->execute([':id'=>$utilisateur]);
      $affiche=$prepareSelect->fetch(PDO::FETCH_ASSOC);
    }

   }
  }else{
    echo'cgh';
  }
?>
<?php require('views/connecter/profile.php');?>