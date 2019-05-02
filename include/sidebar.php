<div class="sidebar">
	<h5>Nos derniers articles  </h5>





<?php




					$db = new PDO('mysql:host=localhost;dbname=site-e-commerce', 'root', '');

					$select = $db->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 0,2 ");

					$select->execute();

					/* Tant que tu as des donnees à m'afficher 
					{ afficher les articles et les liens pour modifier ou supprimer des articles }
					*/

				while($s=$select->fetch(PDO::FETCH_OBJ)){


						?>

						<h2 style="color:white"><?php echo $s->title;?></h2>
						<h5 style="color:white"><?php echo $s->description;?></h5>
						<h4 style="color:white"><?php echo $s->price;?>$</h4>
						<br><br>

						<?php

				}

?>






</div>