<nav>
	<ul>
		<li>
			<a href="./portal.php?action=home">Home</a>
		</li>
		<li>
			<a href="?action=listar_productos">Productos</a>
		</li>
		<?php 
		
		if (1>0/*!isset($_SESSION['usuario'])*/){
			echo '<li><a href="?action=login">Autentificar</a></li>';
			echo '<li><a href="?action=registrar_usuario">Registrarme</a></li>';
			// Trampita
			echo '<li><a href="?action=registrar_producto">Registrar Producto</a></li>';
			echo '<li><a href="?action=ver_cesta">Cesta de Compra</a></li>';
			echo '<li><a href="?action=ver_usuarios">Usuarios</a></li>';
		 }
		elseif (isset($_SESSION['usuario']) and $_SESSION['usuario'] == 'admin')
			echo '<li><a href="?action=registrar_producto">Registrar Producto</a></li>';
		elseif (isset($_SESSION['usuario']))
		    echo '<li><a href="?action=ver_cesta">Cesta de Compra</a></li>';
        ?>
	</ul>
</nav>