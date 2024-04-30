<?php
//Connexion à la base de données du site de commerce
if(isset($_POST['connexion']))
{
     $username=$_POST['utilisateur'];
     $password=$_POST['mot_de_passe'];
     $email=$_POST['email'];
     $error_cc="";
     
     try{ //connexion à la base de données 
          $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
          $reponse=$bdd->query('SELECT * FROM `patients`');
        while( $donnees= $reponse->fetch())
        { if($username==$donnees['nom_complet'] && $email==$donnees['email'])
              {
                if($password==$donnees['mot_de_passe'])
                {
                      header("location:patient.php?recherche=$username")  ;
                      break;
                }
                else
                {
                    $error_cc='Votre mot de passe est incorrect!';
                    header("location:connexion.php?recherche=$error_cc")  ;
                    break;  
                }
                break;
              }
          else{
            $error_cc='Votre nom d\'utilisateur ou votre email est incorrect!';            
            header("location:connexion.php?recherche=$error_cc")  ;
            
          }
     }
       $reponse->closeCursor();
  
     }
     catch(exception $e)
     {
        die('erreur: '.$e->getMessage());
     }     
}
//-----------------------------------------------------page inscription---------------------------------------------------------
if (isset($_POST['inscription']))
{
     
$username_sgn=$_POST['utilisateur_ins'];
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
$error_cc_sgn="";
     //connexion à la base de données baby

     try
     { //connexion à la base de donnée Utilisateur
      $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
       if($password_sgn==$password_check)
        {
          $requete=$bdd->exec("INSERT INTO `patients`(`nom_complet`, `sexe`, `numéro_téléphone`, `email`, `date_de_naissance`, `adresse`, `ville`, `code_postal`, `rendez_vous`, `mot_de_passe`,`RDV` )
                                             VALUES ('$username_sgn','$sexe','$num','$email_sgn','$date_naissance','$adresse','$ville','$code_postal','$rendez_vous','$password_sgn','en attente')");
          header("location:patient.php?recherche=$username_sgn");
        }
      else
        {
          $error_cc='Votre mot de passe est incorrect!';
          header("location:register.php?recherche=$error_cc");
        }
     }
     catch(exception $e)
     {
        die('erreur: '.$e->getMessage());
     } 
     
}
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
if(isset($_POST['connexion_admin']))
{
     $username=$_POST['admin'];
     $password=$_POST['mot_de_passe_admin'];
     $email=$_POST['email_admin'];
     $error_cc="";
     
     try{ //connexion à la base de données 
          $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
          $reponse=$bdd->query('SELECT * FROM `administrateur`');
        while( $donnees= $reponse->fetch())
        {
                if($password==$donnees['mot_de_passe'] && $email==$donnees['email'])
                {
                      header("location:secretaire.php")  ;
                      break;
                }
                else
                {
                    $error_cc='Votre mot de passe est incorrect!';
                    header("location:connexion.php?recherche=$error_cc")  ;
                    break;  
                }
     }
       $reponse->closeCursor();
  
     }
     catch(exception $e)
     {
        die('erreur: '.$e->getMessage());
     }     
}

?>