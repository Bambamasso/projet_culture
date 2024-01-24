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

        require_once './connexionBd.php';

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
           header("LOCATION:pageConnexion.php?message=l'inscription est un succès");
           }
        }
     }

 }else{
    $alerte= "veillez remplir tout les champs svp";
 }
?>
<?php require('./views/pageInscription.php'); ?>