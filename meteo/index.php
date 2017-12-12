<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="qqc.css" />
		<title>METEO</title>
	</head>

	<body>
		<font face="verdana">

			<div id="haut">

				<h3> La m&eacute;t&eacute;o de la ville que vous souhaitez </h3>

			<!-- On recueille le nom de la ville souhaitée -->
				<form action="" method="post">

					Ville: <input type="text" name="ville"><br>
					<br>
					<!-- Valider permet d'accéder aux données meteo via l'api -->
					<input type="submit" value="Afficher m&eacute;t&eacute;o" name="valider">
					<!-- Réinitialiser -->
					<input type="submit" value=" R&eacute;initialiser " name="reinitialiser">
				</form>
				<br>
			</div>

			<br>
			
			<div id="bas">

				<?php

				if (isset($_POST['valider']))
				{		
						//si le champs 'ville' est vide ce message s'affichera
					if(empty($_POST['ville']))
					{
						echo "<br>Veuillez entrer une ville et valider, s'il vous plait.";
					}
					// sinon on recherche le contenu du champs 'ville'
					else
					{
						include('action_page.php');
					}
				}
				elseif (isset($_POST['reinitialiser'])) {}
				?>

			</div>
		</font>
	</body>
</html>
