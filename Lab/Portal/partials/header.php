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
			<section class="head">
				<h1> TAREAS </h1>
			</section>

			<section class="form">
			
				<input type="text" id="tarea" name="tarea" placeholder="introduce una tarea"></input>
				<button id="envia" onclick="anyadir()">+</button>
				
			</section>

			<section class="lista">
				<ul id="list">
				</ul>
			</section>

			<center>
				<button onclick="guardar()">Guardar</button>
			</center>
		</div>

	</header>