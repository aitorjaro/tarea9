<!DOCTYPE html>
<html lang="es">

<head>
	<title>Campeones League of Legends</title>
	<style>
		@import url("estilo.css");
	</style>
</head>
<header>
	<section>
		<img src="Riot_Games_logo.png" />
	</section>
	<section>
		<h1>Análisis de campeones</h1>
	</section>
</header>

<body>
	<section class="principal">
		<h2>LISTA DE CAMPEONES</h2>
		<p class="centro">Aquí se detallan todos los campeones de League of Legends, incluyendo sus descripciones.</p>
		<section class="campeones">
			
				<?php

				$lista_campeones = file_get_contents("https://ddragon.leagueoflegends.com/cdn/14.3.1/data/en_US/champion.json");

				$arrayCampeones = json_decode($lista_campeones);

				$campeones = $arrayCampeones->data;

				foreach ($campeones as $campeon) {
					echo "<article>";

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