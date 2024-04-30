<html>
    <head>
        <title>Vente des apareils &eacute;lectronique</title>
        <link rel="stylesheet" type="text/css" href="register.css"/>
    </head>
    
    <body>

	<div class="header">
    <h1>P&eacute;diatre<span>_Online</span></h1>

<!-- 			<img id="header_img" src="../images/rendez_vous.svg"/>
 -->				<div class="nav">
					<ol>
						<li><a href="../reactive.html">Accueil</a></li>
						<li><a href="./connexion.php">Connexion</a></li>
						<li><a href="#">Inscription</a></li>
                        <li><a href="./administrateur.php">Administrateur</a></li>
                        <li><a href="../reactive.html#contact">Contact</a></li>
					</ol>
				</div>
<!-- 				<p id="header_txt">Prendre un rendez-vous en ligne chez votre p&eacute;diatre  ! </p>   
 -->                 
    </div>	

    <div class="container">
           <div class="img-container">
            <img src="../images/1.jpg"  >
          
                  <!-- <img src="../images/2.jpeg"  > -->
 
           
        </div>

 
    <div class="formulaire">
        <h1 style="text-align: center;">Formulaire de prise de rendez-vous <br/> m&eacute;decin traitant</h1>
        <p style="text-align:justify; padding:20px;">
        Remplissez le formulaire ci-dessous en indiquant le type de rendez-vous dont vous avez besoin. 
        Nous vous recontacterons bient&ocirc;t pour de plus amples informations.
        </p> 

        <form action="inscription_connexion.php" method="POST">
                
                <ul class="wrapper" >
                    <li class="form-row">
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
                    </li>
                    <li class="form-row">
                        <label>Nom Complet <span style="color:red;">*</span></label>
                        <input id="utilisateur" name="utilisateur_ins" type="text" size= 40px  maxlength=40  required>
                    </li>
                    <li class="form-row">
                        <label>Sexe <span style="color:red;">*</span></label>
                        <input id="sexe" name="sexe" type="text" size= 40px  maxlength=40  required>
                    </li>
                    <li class="form-row">     
                        <label>Num&eacute;ro de t&eacute;l&eacute;phone</label>
                        <input id="num" name="num" type="text" size= 40px  maxlength=40  required>
                    </li>
                    <li class="form-row">
                        <label>Email</label>
                        <input id="email" name="email_ins" type="text" size= 40px maxlength=40  required>
                    </li>
                    <li class="form-row">
                        <label>Date de naissance</label>
                        <input id="date_naissance" name="date_naissance" type="text" placeholder="1996-01-01"  size= 40px maxlength=40  required>
                    </li>
                    <li class="form-row">
                        <label>Adresse <span style="color:red;">*</span></label>
                        <ul class="adress_column">
                            <li class="adress-row"><label>Adresse</label><input id="adresse" name="adresse" type="text" size= 40px maxlength=40  required></li>
                            <li class="adress-row"><label>Ville</label><input id="ville" name="ville" type="text" size= 40px maxlength=40  required></li>
                            <li class="adress-row"><label>Code postal</label><input id="code_postal" name="code_postal" type="text" size= 40px maxlength=40  required></li>
                        </ul>
                    </li>
                    <li class="form-row">
                        <label>Rendez-vous <span style="color:red;">*</span></label>
                        <input id="rendez_vous" name="rendez_vous" type="datetime-local" size= 40px>            
                    </li>
                    <li class="form-row">
                        <label>Mot de passe <span style="color:red;">*</span></label>
                        <input id="mot_de_passe" name="mot_de_passe_ins" type="password" size= 40px maxlength=40  required>
                    </li>
                    <li class="form-row">
                        <label>V&eacute;rifier votre mot de passe<span style="color:red;">*</span></label>
                        <input id="mot_de_passe_v" name="mot_de_passe_v_ins" type="password" size= 40px maxlength=40 required>
                    </li>
                    <li class="form-row">                        
                        <input id="inscription" name="inscription" type="submit" size=40px maxlength=40 value="Inscription" required>
                    </li>
                </ul>
                
        </form>
    </div>	  
        
    </body>
    <script src="script.js">

    </script>
    
</html>