<!DOCTYPE html>
<html lang="es">

<head>
	<title>Campeones League of Legends</title>
	<style>
		@import url("estilo.css");
	</style>
</head>


<body>
<header>
	<section>
		<img src="Riot_Games_logo.png" />
	</section>
	<section>
		<h1>Análisis de campeones</h1>
	</section>
	
</header>
	<section class="principal">
	<nav>
		<ul>
			<li><a href="index.php">Lista de campeones</a></li>
			<li><a href="pruebas.php">Pruebas de la API</a></li>
		</ul>
	</nav>
	<hr>
		<h2>LISTA DE CAMPEONES</h2>
		<p class="centro">Aquí se detallan todos los campeones de League of Legends, incluyendo sus descripciones.</p>
		<section class="campeones">

			<?php
			/**
			 * Obtiene la lista de campeones de League of Legends
			 *
			 * Esta función usa la API de Riot Games para obtener los datos de los campeones
			 * en formato JSON.
			 * @return array Array asociativo con los campeones
			 */
			function obtenerCampeones()
			{

				$lista_campeones = file_get_contents("https://ddragon.leagueoflegends.com/cdn/14.3.1/data/en_US/champion.json");

				$arrayCampeones = json_decode($lista_campeones);

				$campeones = $arrayCampeones->data;

				return $campeones;
			}

			foreach (obtenerCampeones() as $campeon) {
				echo "<article class='campeones'>";

				echo '<img src="https://ddragon.leagueoflegends.com/cdn/14.3.1/img/champion/' . $campeon->image->full . '">' . "<br/>";
				echo "<b><p>" . $campeon->name . "\n" . "</p></b>";
				echo $campeon->title;

				echo "</article>";
			}

			?>

		</section>
	</section>
</body>

</html>