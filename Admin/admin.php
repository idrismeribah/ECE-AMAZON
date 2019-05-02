<?php

session_start();


?>

<link href="../style/bootstrap.css" type="text/css" rel="stylesheet"/>
<h1> Bienvenue,  <?php echo $_SESSION['username'];  ?> </h1>
<br>

<a href="?action=add">Ajouter un produit</a>


<a href="?action=modifyanddelete">mofifier/supprimer un produit</a>
<br><br>


<?php


if(isset($_SESSION['username'])){
	if(isset($_GET['action'])){
		if($_GET['action']=='add'){


			if(isset($_POST['submit'])){

				$title=$_POST['title'];
				$description=$_POST['description'];
				$price=$_POST['price'];

				if($title&&$description&&$price){


					try{

						$db = new PDO('mysql:host=localhost;dbname=site-e-commerce', 'root', '');
						$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
						$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}

					catch(Exception $e){

						echo 'une erreur est survenue';

						die();

					}

					$insert = $db->prepare("INSERT INTO products VALUES('','$title', '$description', '$price')");
					$insert->execute();



				}else{
					echo'Veuillez remplir tous les champs';
				}
			}



			?>

			<form action="" method="post">
				<h3>Titre du produit : </h3><input type="text" name="title"/>
				<h3>Description du produit : </h3><textarea name="description"></textarea>
				<h3>prix du produit : </h3><input type="text" name="price"/>
				<br><br>

				<input type="submit" name="submit"/>

			</form>

			<?php

		}else if($_GET['action']=='modifyanddelete'){


					$db = new PDO('mysql:host=localhost;dbname=site-e-commerce', 'root', '');
					$select = $db->prepare("SELECT * FROM products");

					$select->execute();

					/* Tant que tu as des donnees à m'afficher 
					{ afficher les articles et les liens pour modifier ou supprimer des articles }
					*/

				while($s=$select->fetch(PDO::FETCH_OBJ)){

					echo $s->title ; 
					echo "<br>";

					?>
					<a href="?action=modify&amp;id=<?php echo $s->id; ?>">Modifier</a>
					<a href="?action=delete&amp;id=<?php echo $s->id; ?>">Supprimer</a><br><br>


						<?php



				}






		}else if($_GET['action']=='modify'){





				$id=$_GET['id'];

				$db = new PDO('mysql:host=localhost;dbname=site-e-commerce', 'root', '');
				$select = $db->prepare("SELECT * FROM products WHERE id=$id");
				$select->execute();

				$data = $select->fetch(PDO::FETCH_OBJ);


				?>
				<form action="" method="post">
				<h3>Titre du produit : </h3><input value="<?php echo $data->title; ?>" type="text" name="title"/>
				<h3>Description du produit : </h3><textarea name="description"><?php echo $data->description; ?></textarea>
				<h3>prix du produit : </h3><input value="<?php echo $data->price; ?>" type="text" name="price"/>
				<br><br>

				<input type="submit" name="submit" value="Modifier" />

			</form>



			<?php


			if(isset($_POST['submit'])){

				$title=$_POST['title'];
				$description=$_POST['description'];
				$price=$_POST['price'];

				$update = $db->prepare("UPDATE products SET title='$title', description='$description',price='$price' WHERE id=$id");
				$update->execute();

				header('Location: admin.php?action=modifyanddelete');;

				

			}

		}else if($_GET['action']=='delete'){

				$db = new PDO('mysql:host=localhost;dbname=site-e-commerce', 'root', '');

				$id=$_GET['id'];
				$delete = $db->prepare("DELETE FROM products WHERE id=$id");
				$delete->execute();
		

		}else{

			die('une erreur s\'est produite');
		}


	}else{


	}


}else {
	
	header('Location: ../index.php');
} 


?>

