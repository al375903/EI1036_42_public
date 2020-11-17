<body>
<main>
	<h1>Datos de registro: </h1>
	<form class="form_usuario" action="?action=insertar_producto" method="POST">
		<!-- form_producto? -->
		<legend>Datos básicos</legend>
		<label for="name">Nombre</label>
		<br/>
		<input type="text" name="name" id="name" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="Nombre"/>
		 <span class="error" id="nameErr">Insertar Nombre</span>
		<br/>
		<label for="price">Precio</label>
		<br/>
		<input type="number" name="price" id="price" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="0.00" step=".01"/>
		 <span class="error" id="priceErr">Insertar Precio superior a 0</span>
		<br/>
		<label for="foto_url">Foto</label>
		<br/>
		<input type="text" id="foto_url" name="foto_url" size="20" maxlength="50"/>
		<span class="error" id="fotoErr">Insertar Foto</span>
		<br/>
		<br>

		<input type="button" id="anyadeFoto" onclick="anyadirFoto()" value="Añadir Foto"> </input>
		
		

		<p><input type="submit" id="enviarProducto" value="Enviar" disabled="true">
		<input type="reset" value="Deshacer">
		</p>
	</form>
	<div id="abrirFoto">
		<form action="?action=upload" method="post" enctype="multipart/form-data">
			Selecciona	una	imagen:</br>
			<input type="file" accept="image/*" name="tmp_file" id="upload" onchange="handleFiles(event)"></br>
			<canvas id="canvas"></canvas></br>
			<input type="submit" id="subirFoto" value="SUBIR" onclick="enviarFoto(event)"></input> <!--onclick="enviarFoto(event)"-->
		</form>
	</div>
</main>
<script src="scripts/main.js"></script>
</body>