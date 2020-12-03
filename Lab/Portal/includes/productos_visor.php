<?php
function productos(){
    echo "<h1> Productos </h1>";
    ?>
    <label for="producto">Elige un producto:</label>
    <input list="productos" name="producto" id="producto" onchange=buscaProducto()>
    <datalist id="productos">
    </datalist>
    <p><label>Precio Mínimo: <input type="number" id="precioMin"></input></label></p>
    <p><label>Precio Máximo: <input type="number" id="precioMax"></input></label></p>
    <input type='button' id='botonFiltro' class='botonFiltro' onclick='filtrarProductos()'></input>

    <div class="visor">
        <!-- <div id="1" class="item">
            <img src="img/V&G.png"
            width="100"
            height="100">
            <p>Chaqueta 50€</p>
            <button>Comprar</button>
        </div> -->
    </div>
<?php
}
?>