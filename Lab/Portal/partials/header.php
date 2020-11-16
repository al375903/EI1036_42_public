<!DOCTYPE html>
<!--**
 * * Descripción: Cabecera portal Programa Aprender PHP
 * *
 * * Descripción extensa: Pagina web dividida en 4 ficheros.
 * *
 * * @author  Enrique Gimeno <al375903@uji.es>
 * * @author  Edgar Heredia <al375825@uji.es>
 * * @version 1
 * * @link http://localhost:3000/Lab/Portal/portal.php
 * * -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Bienvenido a la web de MY LACKS</title>
	<META name="Author" content="AlumnoXXX">
	<link rel="stylesheet" href="./css/estilo.css" type="text/css">
	<script src="scripts/main.js"></script>

</head>


<body>
	<header>
		<img src="./img/Dragon_Ball_anime_logo.png" id="logo" alt="logo" />
		<p id="eslogan">MyLacksWeb </p>
		<input type="button" class="botonCesta" onclick="abrirCesta()"></input>

		<div id="abrirCesta">
		<form action="?action=upload" method="post" enctype="multipart/form-data">
			Selecciona	una	imagen:</br>
			<input type="file" accept="image/*" name="tmp_file" id="upload" onchange="handleFiles(event)"></br>
			<canvas id="canvas"></canvas></br>
			<input type="button" id="subirFoto" value="SUBIR" onclick="enviarFoto(event)"></input>
		</form>
		</div>

	</header>