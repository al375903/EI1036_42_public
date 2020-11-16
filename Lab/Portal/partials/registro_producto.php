<main>
	<script src="scripts/main.js"></script>
	<h1>Datos de registro: </h1>
	<form class="form_usuario" action="?action=insertar_producto" method="POST">
		<!-- form_producto? -->
		<legend>Datos básicos</legend>
		<label for="name">Nombre</label>
		<br/>
		<input type="text" name="name" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="Objeto 1" />
		<br/>
		<label for="price">Precio</label>
		<br/>
		<input type="text" name="price" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="10.0" />
		<br/>
		<label for="foto_url">Foto</label>
		<br/>
		<input type="text" id="foto_url" name="foto_url" size="20" maxlength="50"/>
		<br/>
		<br>

		<input type="button" id="anyadeFoto" onclick="anyadirFoto()" value="Añadir Foto"> </input>
		
		<div id="verCesta">
		<form action="?action=upload" method="post" enctype="multipart/form-data">
			Selecciona	una	imagen:</br>
			<input type="file" accept="image/*" name="tmp_file" id="upload" onchange="handleFiles(event)"></br>
			<canvas id="canvas"></canvas></br>
			<input type="button" id="subirFoto" value="SUBIR" onclick="enviarFoto(event)"></input>
		</form>
		</div>

		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>