<html>

	<?php 

	//  la fonction test_entree teste la ville mise en entrée est vérifie son existence sur l'api
	function test_entree($ville){

		if((@file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$ville.'&units=metric&APPID=cb796822d404a4f04149d8db4b414f9b') == NULL)){		
			throw new Exception('ville incorrecte');
		}
	}

	try {

		test_entree($_POST['ville']);// test ville en entrée

		$json_source = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$_POST['ville'].'&units=metric&APPID=cb796822d404a4f04149d8db4b414f9b');

		// on recupere les données du json correspondant à la ville

		$json_data = json_decode($json_source,true); //mise sous forme de tableau

		$main = $json_data['main'];	//contient la temperature
		$weather =  $json_data['weather']; // contient tableau weather
		$climat = $weather[0]; // contient l'icone correspondant au temps de la ville

		$sys = $json_data['sys'];// contient code pays

		//affiche la temperature actuelle dans la ville donnée
		echo '<br>Il fait actuellement '.$main['temp'].'&deg;C &agrave; '.$json_data['name'].' , ' .$sys['country'];

		// petite condition pour ne pas attraper froid
		if(($main['temp']) < 10)
		{
			echo "<br> Couvrez vous bien !<br>";
		}

		//affiche l'icone du climat actuel
		echo '<br><img src="http://openweathermap.org/img/w/'.$climat['icon'].'.png" alt="Temps meteo" /><br>';
		//description du temps actuel
		echo '>>  '.$climat['description'];

	} catch (Exception $e) {
		//pour le cas où l'on ne retrouve pas le nom de la ville
		echo '<br>Exception reçue : ',  $e->getMessage(), "\n";
		echo "<br>Le nom de la ville est introuvable ou incorrect";
	}

	?>
</html>