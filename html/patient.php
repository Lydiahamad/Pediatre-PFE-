<html>
	
    <head>
        <title>Gestion des rendez-vous</title>
        <link rel="stylesheet" type="text/css" href="patient.css"/>
    </head>
    
    <body>
		<div class="header">
		<h1>P&eacute;diatre<span>_Online</span></h1>

			
				<div class="nav">
					<ol>
						<li><a href="../reactive.html">Accueil</a></li>
						<li><a href="./connexion.php">Connexion</a></li>
						<li><a href="./register.php">Inscription</a></li>
					</ol>
				</div>


		</div>

		<div class="container">
           <div class="img-container">
		   <img src="../images/4.webp"  >      
	    </div>


		<div class="formulaire">
			<p id="deconnexion" style="position:absolute; top:5px; right:5px; color:blue;"><a style="text-decoration:none; color:blue; hover:color:red;" href="../accueil.html">D&eacute;connexion</a></p>
			<h1 style="text-align: center;">Formulaire de prise de rendez-vous <br/> m&eacute;decin traitant</h1>
			<h2 style="text-align: center; color:blue;" id="erreur">
				<?php
				$patient="";
				if(isset($_GET['recherche']))
						{
							// $error_en=`username_database.php`;
							$patient= $_GET['recherche'] ;
							print $patient;
						}
				?>
			</h2>
			<p style="text-align:justify; padding:20px;">
			Vous pouvez modifier les informations de votre formulaire d'inscription ainsi que votre rendez-vous.
			Nous vous recontacterons bient&ocirc;t pour de plus amples informations.
			</p> 
			<?php
				$nomPatient= $patient;
				$sexe="";
				$num="";
				$date_naissance="";
				$adresse="";
				$ville="";
				$code_postal="";
				$rendez_vous="";
				$password_sgn="";
				$password_check="";
				$email_sgn="";
				$RDV_check="";


				$error_cc_sgn="";
				try{
					$bdd= new PDO('mysql:host=localhost;port=3307;dbname=gestiondesrendezvous; charset=utf8','root','');
					$reponse=$bdd->query("SELECT * FROM `patients` WHERE `nom_complet` = '$patient'");
					while($donnees= $reponse->fetch()){
						$sexe=$donnees['sexe'];
						$num=$donnees['numéro_téléphone'];
						$date_naissance=$donnees['date_de_naissance'];
						$adresse=$donnees['adresse'];
						$ville=$donnees['ville'];
						$code_postal=$donnees['code_postal'];
						$rendez_vous=$donnees['rendez_vous'];
						$password_sgn=$donnees['mot_de_passe'];
						$password_check=$donnees['mot_de_passe'];
						$email_sgn=$donnees['email'];
						$RDV_check=$donnees['RDV'];
					}

				}
				catch(exception $e)
				{
				die('erreur: '.$e->getMessage());
				} 

			?>
				<?php
				if($RDV_check=="confirmer")
				{
					?>
					<img style="position:absolute; top:5px; left:5px; height: 50px;width:50px;" src="../images/ok.jpg"/>
					<p style="position:absolute; top:50px; left:5px;color:green;">Votre rendez-vous est confirm&eacute;</p>

					<?php
				}
				else
				{
					?>
					<img style="position:absolute; top:5px; left:5px; height: 50px;width:50px;" src="../images/enAttente.jpg"/>
					<p style="position:absolute; top:50px; left:5px;color:blue;">Votre rendez-vous est en attente</p>
					<?php
				}
			?>
			<form action="update_formulaire_patient.php" method="POST">
					
					<ul class="wrapper" >
					
						<li class="form-row">
							<label>Nom Complet <span style="color:red;">*</span></label>
							<input id="utilisateur" name="utilisateur_ins" type="text" size= 40px value="<?php echo $patient;?>" maxlength=40  required>
						</li>
						<li class="form-row">
							<label>Sexe <span style="color:red;">*</span></label>
							<input id="sexe" name="sexe" type="text" size= 40px value="<?php echo $sexe;?>"  maxlength=40  required>
						</li>
						<li class="form-row">     
							<label>Num&eacute;ro de t&eacute;l&eacute;phone</label>
							<input id="num" name="num" type="text" size= 40px  value="<?php echo $num;?>" maxlength=40  required>
						</li>
						<li class="form-row">
							<label>Email</label>
							<input id="email" name="email_ins" type="text" size= 40px  value="<?php echo $email_sgn;?>" maxlength=40  required>
						</li>
						<li class="form-row">
							<label>Date de naissance</label>
							<input id="date_naissance" name="date_naissance" type="text"  value="<?php echo $date_naissance;?>"  size= 40px maxlength=40  required>
						</li>
						<li class="form-row">
							<label>Adresse <span style="color:red;">*</span></label>
							<ul class="adress_column">
								<li class="adress-row"><label>Adresse</label><input id="adresse" name="adresse" type="text" size= 40px  value="<?php echo $adresse;?>" maxlength=40  required></li>
								<li class="adress-row"><label>Ville</label><input id="ville" name="ville" type="text" size= 40px  value="<?php echo $ville;?>" maxlength=40  required></li>
								<li class="adress-row"><label>Code postal</label><input id="code_postal" name="code_postal" type="text" size= 40px  value="<?php echo $code_postal;?>" maxlength=40  required></li>
							</ul>
						</li>
						<li class="form-row">
							<label>Rendez-vous <span style="color:red;">* <?php echo $rendez_vous;?></span></label>
							<input id="rendez_vous" name="rendez_vous" type="datetime-local" size= 40px  value="<?php echo $rendez_vous;?>">            
						</li>
						<li class="form-row">
							<label>Mot de passe <span style="color:red;">*</span></label>
							<input id="mot_de_passe" name="mot_de_passe_ins" type="password"  value="<?php echo $password_sgn;?>" size= 40px maxlength=40  required>
						</li>
						<li class="form-row">
							<label>V&eacute;rifier votre mot de passe<span style="color:red;">*</span></label>
							<input id="mot_de_passe_v" name="mot_de_passe_v_ins" type="password" value="<?php echo $password_sgn;?>" size= 40px maxlength=40 required>
						</li>
						<li class="form-row">                        
							<input id="inscription" name="inscription" type="submit" size=40px maxlength=40 value="Modifier" required>
						</li>
						<li class="form-row">
							<input id="suppression" name="supprimer" type="submit" size=40px maxlength=40 value="supprimer"/>
						</li>

					</ul>
					
			</form>
    </div>	    
    </body>
	<script src="./script.js"></script>
	
    
</html>