<?php
if(isset($_POST['inscription'])){
   $nomPatient= $_POST['utilisateur_ins'];
   $sexe=$_POST['sexe'];
   $num=$_POST['num'];
   $date_naissance=$_POST['date_naissance'];
   $adresse=$_POST['adresse'];
   $ville=$_POST['ville'];
   $code_postal=$_POST['code_postal'];
   $rendez_vous=$_POST['rendez_vous'];
   $password_sgn=$_POST['mot_de_passe_ins'];
   $password_check=$_POST['mot_de_passe_v_ins'];
   $email_sgn=$_POST['email_ins'];

   $RDV_check="";
   $error_cc_sgn="";

   try{
      $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
      $reponse=$bdd->exec(" UPDATE `patients` SET `sexe`='$sexe',`numéro_téléphone`='$num',
      `email`='$email_sgn',`date_de_naissance`='$date_naissance',`adresse`='$adresse',`ville`='$ville',`code_postal`='$code_postal',
      `rendez_vous`='$rendez_vous',`mot_de_passe`='$password_sgn' WHERE nom_complet ='$nomPatient'");
      echo"<script>alert(\"Votre formulaire d\'inscription a \u00e9t\u00e9 bien modifi\u00e9.Nous vous contacterons pour de plus amples informations.\")</script>";
   }
   catch(exception $e)
   {
      die('erreur: '.$e->getMessage());
   } 
}

//suppression
if(isset($_POST['supprimer']))
{
   $patient=$_POST['utilisateur_ins'];
    try{
        $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
        $reponse=$bdd->query("DELETE FROM `patients` WHERE `nom_complet`= '$patient'");
        echo"<script>alert(\"Votre formulaire d\'inscription a \u00e9t\u00e9 supprim\u00e9\")</script>";

    }
    catch(exception $e)
        {
            die('erreur: '.$e->getMessage());
        } 

}
?>