<html>
    <head>
        <title>Gestion des rendez-vous</title>
        <link rel="stylesheet" type="text/css" href="secretaire.css"/>
    </head>
    
    <body>
		<!-- <div class="header">
        <h1>P&eacute;diatre<span>_Online</span></h1>

			
				<div class="nav">
					<ol>
						<li><a href="../reactive.html">Accueil</a></li>
						<li><a href="./connexion.php">Connexion</a></li>
						<li><a href="./register.php">Inscription</a></li>
                        <li><a href="./administrateur.php">Administrateur</a></li>
                        <li><a href="../reactive.html#contact">Contact</a></li>
					</ol>
				</div>
				
        </div> -->

        <div class="header">
           <h1>P&eacute;diatre<span>_Online</span></h1>
           
            <div class="nav">
                    <ol>
						<li><a href="../reactive.html">Accueil</a></li>
						<li><a href="./connexion.php">Connexion</a></li>
						<li><a href="./register.php">Inscription</a></li>
                        <li><a href="./administrateur.php">Administrateur</a></li>
<!--                         <li><a href="../reactive.html#contact">Contact</a></li>
 -->					</ol>
            </div>
        </div>

<!--                 <p id="header_txt">La liste des patients</p>
 --> 


                <div class="container">
           <div class="img-container">

		   <img src="../images/infirmiers1.jpg"  >      
	    </div>

             
		<div class="formulaire">
            <form method="POST">
                <ul class="wrapper" >
                    <li class="form-row"><input style="border-radius:10px; background:white; width:250px; height:50px; color:black;" id="rdv" name="rdv" type="text" size=40px maxlength=20 placeholder="Rendez-vous:Y-M-D"/></li>
                    <li class="form-row"><input id="recherche" name="recherche_rdv" type="submit" size=20px value="Recherche >"/></li>
                </ul>
            </form>
          
            <form method="POST">
                <ul class="wrapper" >
                    <li class="form-row"><input style="border-radius:10px; background:white;width:250px; height:50px; color:black;" id="patient" name="patient" type="text" size=40px  maxlength=100 placeholder="Nom de patient"/></li>
                    <li class="form-row"><input  id="recherche" name="recherche_patient" type="submit" size=20px value="Recherche >"/></li>
                </ul>
            </form>	
           		
        </div>
      
        <table>
            <thead>
            <?php
            if(isset($_POST['recherche_rdv']) || isset($_POST['recherche_patient']))
                    {
            ?>
                <th style="border: 2px solid #193963; background:#193963;">Nom complet</th>
                <th style="border: 2px solid #193963; background:#193963;">Sexe</th>
                <th style="border: 2px solid #193963; background:#193963;">Num&eacute;ro de t&eacute;l&eacute;phone</th>
                <th style="border: 2px solid #193963; background:#193963;">Email</th>
                <th style="border: 2px solid #193963; background:#193963;">Date de naissance</th>
                <th style="border: 2px solid #193963; background:#193963;">Adresse</th>
                <th style="border: 2px solid #193963; background:#193963;">Ville</th>
                <th style="border: 2px solid #193963; background:#193963;">Code postal</th>
                <th style="border: 2px solid #193963; background:#193963;">rendez-vous</th>
                <th style="border: 2px solid #193963; background:#193963;">RDV</th>
            <?php
                    }
            ?>
            </thead>
            <tbody>
               <?php
                    if(isset($_POST['recherche_rdv']))
                    {
                        $rdv=$_POST['rdv'];
                        try
                        {
                            $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
                            $reponse=$bdd->query("SELECT * FROM `patients` WHERE `rendez_vous` = '$rdv'");
                            while($donnees_rdv= $reponse->fetch())
                            {
                ?>
                                <tr>  
                            
                                    <form  method="POST">
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><input name="patient" value="<?php echo $donnees_rdv['nom_complet'];?>"/></td>
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_rdv['sexe'];?></td>
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_rdv['numéro_téléphone'];?></td>
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_rdv['email'];?></td>
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_rdv['date_de_naissance'];?></td>
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_rdv['adresse'];?></td>
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_rdv['ville'];?></td>
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_rdv['code_postal'];?></td>
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><input name="rendez_vous" value="<?php echo $donnees_rdv['rendez_vous'];?>"/></td>
                                        <td style="border: 2px solid #193963; background:#3ab7b1;"><input name="RDV" value="<?php echo $donnees_rdv['RDV'];?>"/></td>
                                        <td ><input id="confirmation" name="confirmer" type="submit" size=10px value="confirmer"/></td>
                                        <td ><input id="suppression" name="supprimer" type="submit" size=10px value="supprimer"/></td>
                                    </form>
                                </tr>
                                

                <?php
                            }
                        }
                        catch(exception $e)
                        {
                            die('erreur: '.$e->getMessage());
                        }
                    }
                ?>

                <?php
                    if(isset($_POST['recherche_patient']))
                    {  
                        $patient=$_POST['patient'];
                        try
                        {
                            $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
                            $reponse=$bdd->query("SELECT * FROM `patients` WHERE `nom_complet` = '$patient'");
                            while($donnees_patient= $reponse->fetch())
                            {
                ?>
                        <tr>
                            <form  method="POST">
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><input name="patient" value="<?php echo $donnees_patient['nom_complet'];?>"/></td>
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_patient['sexe'];?></td>
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_patient['numéro_téléphone'];?></td>
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_patient['email'];?></td>
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_patient['date_de_naissance'];?></td>
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_patient['adresse'];?></td>
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_patient['ville'];?></td>
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><?php echo $donnees_patient['code_postal'];?></td>
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><input name="rendez_vous" value="<?php echo $donnees_patient['rendez_vous'];?>"/></td>
                                <td style="border: 2px solid #193963; background:#3ab7b1;"><input name="RDV" value="<?php echo $donnees_patient['RDV'];?>"/></td>
                                <td ><input id="confirmation" name="confirmer" type="submit" size=10px value="confirmer"/></td>
                                <td ><input id="suppression" name="supprimer" type="submit" size=10px value="supprimer"/></td>
                            </form>
                        </tr>
                <?php
                            }
                        }
                        catch(exception $e)
                        {
                            die('erreur: '.$e->getMessage());
                        }
                    }
                ?>
                  
              
            </tbody>
        </table>	  
    </body>

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
//confirmation des rendez vous
if(isset($_POST['confirmer']))
{
        $patient=$_POST['patient'];
        $rendez_vous=$_POST['rendez_vous'];
        $RDV='confirmer';
    try{
      $bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
      $reponse=$bdd->exec(" UPDATE `patients` SET `rendez_vous`='$rendez_vous', `RDV`='$RDV' WHERE `nom_complet` ='$patient'");
      header("location:secretaire.php");
    }
    catch(exception $e)
        {
            die('erreur: '.$e->getMessage());
        } 

}

?>
</html>