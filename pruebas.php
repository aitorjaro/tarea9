<!DOCTYPE html>
<html lang="es">

<head>
    <title>Pruebas de la API de RIOT</title>
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
            <h1>Pruebas de la API de RIOT</h1>
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
        <h2>PRUEBAS</h2>
        <p class="centro">Aquí se harán las pruebas para llamar a las diferentes funciones de la API de RIOT.</p>
        <section class="pruebas">

            <?php
            /**
             * Obtiene los datos de la cuenta de League of Legends
             *
             * Esta función usa la API de Riot Games para obtener los datos de la cuenta de lol
             * en formato JSON.
             * @return array Array asociativo con los datos del invocador
             */
            function obtenerDatosInvocador()
            {

                $datos_invocador = file_get_contents("https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/Nekkey?api_key=RGAPI-c01d77e5-317e-4a62-a7f9-9ac83125d2ef");

                $arrayDatosInvocador = json_decode($datos_invocador);

                return $arrayDatosInvocador;
            }


            echo "<article class='pruebas'>";
            echo "<b><p>SUMMONER-V4 (devuelve las estadísticas de mi nombre de invocador)</p></b>";
            echo "<p><b>Nombre: </b>" . obtenerDatosInvocador()->name . "\n" . "</p>";
            echo "<p><b>Nivel de la cuenta: </b>" . obtenerDatosInvocador()->summonerLevel . "\n" . "</p>";


            echo "</article>";

            /**
             * Obtención de las estadísticas con cada campeón (sin crear función)
             * Este código de a continuación obtiene el array con las estadísticas y hace un bucle mostrando las estadísticas para cada campeón
             */

            $estadisticas_campeon = file_get_contents("https://euw1.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-puuid/3d91LeLYq2OOqPLmUIXRuOzxvg1GOJXx5RKWDQQegfwfg8hit_gP3oPgTd9r5_meehbQB54ZN0G4aQ?api_key=RGAPI-c01d77e5-317e-4a62-a7f9-9ac83125d2ef");

            $arrayEstadisticas = json_decode($estadisticas_campeon);



            echo "<br/><article class='pruebas'>";
            echo "<b><p>CHAMPION-MASTERY-V4 (devuelve las estadísticas que tengo con cada campeón)</p></b>";
            foreach ($arrayEstadisticas as $campeon) {
                echo "<p><b>ID del campeón: </b>" . $campeon->championId . "\n" . "</p>";
                echo "<p><b>Nivel del campeón: </b>" . $campeon->championLevel . "\n" . "</p>";
                echo "<p><b>Puntos con el campeón: </b>" . $campeon->championPoints . "\n" . "</p><br/>";

            }

            echo "</article>";

            /**
             * Obtención del ranking de jugadores
             * Este código de a continuación obtiene el array con el ranking de jugadores y hace un bucle mostrando las estadísticas para cada jugador
             */

            $estadisticas_jugadores = file_get_contents("https://euw1.api.riotgames.com/lol/league/v4/challengerleagues/by-queue/RANKED_SOLO_5x5?api_key=RGAPI-c01d77e5-317e-4a62-a7f9-9ac83125d2ef");

            $datosJugadores = json_decode($estadisticas_jugadores);

            $arrayJugadores = $datosJugadores->entries;

            echo "<br/><article class='pruebas'>";
            echo "<b><p>LEAGUE-V4 (devuelve el ranking de jugadores)</p></b>";
            $i=1;
            foreach ($arrayJugadores as $jugador) {
                echo "<p><b>Posición: </b>" . $i . "\n" . "</p>";
                echo "<p><b>Nombre del jugador: </b>" . $jugador->summonerName . "\n" . "</p>";
                echo "<p><b>Puntos: </b>" . $jugador->leaguePoints . "\n" . "</p>";
                echo "<p><b>Partidas ganadas: </b>" . $jugador->wins . "\n" . "</p>";
                echo "<p><b>Partidas perdidas: </b>" . $jugador->losses . "\n" . "</p><br/>";
                $i++;
            }


            echo "</article>";

            ?>



        </section>
    </section>
</body>

</html>