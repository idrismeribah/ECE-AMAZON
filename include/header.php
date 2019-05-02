<?php

session_start();

try
		{

			$db = new PDO('mysql:host=localhost;dbname=site-e-commerce', 'root', '');
			$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}	

catch(Exception $e){

			echo 'une erreur est survenue';

			die();

}

?>



<!DOCTYPE html>
<html>


<head>
	
<link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>

</head>



<header>
	<h3>toz</h3><img src="logo.png" align="left"><br><br><br><br><br><br>


	
	<ul class="menu">
			<li> <a href="index.php">Acceuil</a></li>
			<li> <a href="boutique.php">Boutique</a> </li>
			<li> <a href="catégories.php">Categories</a> </li>
		 	<li> <a href="flash.php">Meilleures ventes</a></li>
		 	<li> <a href="vendre.php">Vendez vos articles</a></li>
		 	<li> <a href="compte.php">Votre espace</a></li>
		 	<li> <a href="panier.php">Votre Panier</a></li>
		 	<li> <a href="admin.php">Admin</a></li>
	</ul>



</header>




</body>


</html>