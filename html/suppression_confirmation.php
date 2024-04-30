<?php
//suppression
if(isset($_POST['supprimer']))
{
        $patient=$_POST['patient'];
    try{
        $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
        $reponse=$bdd->query("DELETE FROM `patients` WHERE `nom_complet`= '$patient'");
    }
    catch(exception $e)
        {
            die('erreur: '.$e->getMessage());
        } 

}

if(isset($_POST['confirmer']))
{
        $patient=$_POST['patient'];
        $rendez_vous=$_POST['rendez_vous'];
    try{
      $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
      $reponse=$bdd->exec(" UPDATE `patients` SET `rendez_vous`='$rendez_vous', `RDV`='confirmer' WHERE `nom_complet` ='$patient'");
      header("location:secretaire.php");
    }
    catch(exception $e)
        {
            die('erreur: '.$e->getMessage());
        } 

}

?>