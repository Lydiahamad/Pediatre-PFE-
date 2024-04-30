<html>
    <head>
        <title>Gestion des rendez-vous</title>
        <link rel="stylesheet" type="text/css" href="connexion.css"/>
    </head>
    
    <body>
    <div class="header">
           <h1>P&eacute;diatre<span>_Online</span></h1>
           
            <div class="nav">
                <ol>
                        <li><a href="../reactive.html">Accueil</a></li>
						<li><a href="#">Connexion</a></li>
						<li><a href="./register.php">Inscription</a></li>
                        <li><a href="./administrateur.php">Administrateur</a></li>
                        <li><a href="../reactive.html#contact">Contact</a></li>
                </ol>
            </div>
        </div>

        <div class="container">
           <div class="img-container">
            <img src="../images/2.jpeg"  >
           
        </div>

		<!-- <div class="header">
			<img id="header_img_blue" src="../images/blue.jpg"/>
			<img id="header_img" src="../images/rendez_vous.svg"/>
				<div class="nav">
					<ol>
						<li><a href="../reactive.html">Accueil</a></li>
						<li><a href="#">Connexion</a></li>
						<li><a href="./register.php">Inscription</a></li>
                        <li><a href="./administrateur.php">Administrateur</a></li>
                        <li><a href="../accueil.html#contact">Contact</a></li>
					</ol>
				</div>
                <p id="logo" >   <img src="../images/log.jpg" width="70px"  height="60px"> MedLife </p>
				<p id="header_txt">Prendre un rendez-vous en ligne chez MedLife </p>
		</div> -->
        		
        <form action="inscription_connexion.php" method="POST">
                <div id="login" >
                <p id="erreur">
                    <?php
                    if(isset($_GET['recherche']))
                            {
                                 $error_en=`username_database.php`;
                                 $error_en= $_GET['recherche'] ;
                                 print $error_en;
                            }
                    ?>
                </p>
                <input id="utilisateur" name="utilisateur" type="text" size= 40px  maxlength=40 placeholder="Nom d'utilisateur" required>
                <br><br>
                <input id="email" name="email" type="text" size= 40px maxlength=40 placeholder="Email" required>
                <br><br>
                <input id="mot_de_passe" name="mot_de_passe" type="password" size= 40px maxlength=40 placeholder="Mot de passe" required>
                <br><br>
                <input id="connexion" name="connexion" type="submit" size= 40px maxlength=40 value="Connexion" required>
            </div>
        </form>
    </body>
    
</html>