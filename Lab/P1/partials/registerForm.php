<main>
	<h1>GestiÓn de Usuarios </h1>
	<form class="fom_usuario" action="?action=registrar" method="POST">

		<legend>Datos básicos</legend>
		<!--<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="userName" class="item_requerid" size="20" maxlength="25" value="<php print $userName ?>"
		 placeholder="Miguel Cervantes" />
		<br/>
		<label for="email">Email</label>
		<br/>
		<input type="text" name="email" class="item_requerid" size="20" maxlength="25" value="<php print $email ?>"
		 placeholder="kiko@ic.es" />
		<br/>
		<label for="passwd">Clave</label>
		<br/>
		<input type="password" name="passwd" class="item_requerid" size="8" maxlength="25" value="<php print $passwd ?>"
		/>
		<br/>-->
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="name" class="item_requerid" size="20" maxlength="50"/>
		<br/>
		<label for="apellido">Apellido</label>
		<br/>
		<input type="text" name="surname" class="item_requerid" size="20" maxlength="50"/>
		<br/>
		<label for="direccion">Direccion</label>
		<br/>
		<input type="text" name="address" size="20" maxlength="50"/>
		<br/>
		<label for="ciudad">Ciudad</label>
		<br/>
		<input type="text" name="city" size="20" maxlength="50"/>
		<br/>
		<label for="cp">CP</label>
		<br/>
		<input type="text" name="zip_code" size="20" maxlength="5"/>
		<br/>
		<label for="foto">Foto</label>
		<br/>
		<input type="text" name="foto_file" size="20" maxlength="25"/>
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>