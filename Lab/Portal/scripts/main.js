function anyadirFoto(){
    //guardarContenido();
    let divCaja = document.getElementById("abrirFoto");
    divCaja.style.display="block";
}

function cerrarFoto(){
    let divCaja = document.getElementById("abrirFoto");
    divCaja.style.display="none";
}

function cerrarCesta(){
    let botonCesta = document.getElementById("botonCesta");
    botonCesta.disabled = false;
    let divCaja = document.getElementById("abrirCesta");
    divCaja.style.display="none";
}

function	handleFiles(e)	{
    let ctx	=	document.getElementById('canvas').getContext('2d');
    let img	=	new	Image;
    img.src	=	URL.createObjectURL(e.target.files[0]);
    img.onload	=	function()	{
                    ctx.drawImage(img,	20,20);
    }
    validarFoto();
}

function enviarFoto(e){
    //Enviar foto
    var x = document.getElementById("upload");
    let cajaFoto = document.getElementById("foto_url");
    cajaFoto.value = x.files[0].name;
    guardarContenido();
    cerrarFoto();
}

function validarFoto(){
    let fileSize = document.getElementById("upload");
    let x = fileSize.files[0].size;
    if(x > 2000000){
        alert('El archivo no debe superar los 2MB');
        document.getElementById("subirFoto").disabled = true;
    }else{
        document.getElementById("subirFoto").disabled = false;
    }
}

function guardarContenido(){
    localStorage.setItem("nombreProducto", document.getElementById("name").value);
    localStorage.setItem("precioProducto", document.getElementById("price").value);
    localStorage.setItem("fotoProducto", document.getElementById("foto_url").value);
}

function asignarContenido(){
    document.getElementById("name").value = localStorage.getItem("nombreProducto");
    document.getElementById("price").value = localStorage.getItem("precioProducto");
    document.getElementById("foto_url").value = "img/" + localStorage.getItem("fotoProducto");
    localStorage.removeItem("nombreProducto");
    localStorage.removeItem("precioProducto");
    localStorage.removeItem("fotoProducto");
    checkValores();
}


function checkValores(){
    var condiciones = 0;
    var nombre = document.getElementById("name");
    var precio = document.getElementById("price");
    var foto = document.getElementById("foto_url");
    
    if((nombre.value == null) || (nombre.value.length < 1)){//(nombre.value == null) || (nombre.value.length < 1)
        document.getElementById("nameErr").style.display="inline";
        document.getElementById("enviarProducto").disabled = true;
    }else{
        condiciones += 1;
        document.getElementById("nameErr").style.display="none";
    }

    if(precio.value <= 0.00){
        document.getElementById("priceErr").style.display="inline";
        document.getElementById("enviarProducto").disabled = true;
    }else{
        condiciones += 1;
        document.getElementById("priceErr").style.display="none";
    }

    if((foto.value == null) || (foto.value.length < 1)){
        document.getElementById("fotoErr").style.display="inline";
        document.getElementById("enviarProducto").disabled = true;
    }else{
        condiciones += 1;
        document.getElementById("fotoErr").style.display="none";
    }

    if(condiciones == 3) 
        document.getElementById("enviarProducto").disabled = false;
}

function abrirCesta(){
    let botonCesta = document.getElementById("botonCesta");
    botonCesta.disabled = true;
    let divCaja = document.getElementById("abrirCesta");
    divCaja.style.display="block";
}




//Cesta
function cargarCesta(){
    let lista = JSON.parse(localStorage.getItem('cesta'));
    if(lista && lista.length>0){
        lista.forEach(producto => anyadirProducto(producto));
    }
}

function anyadirProducto(producto){
  let nodo = document.createElement('li');
  
  let span = document.createElement('span');
  span.classList.add('data-producto'); // añadimos una nueva clase al atributo 'class'

  span.textContent = producto;
  
  nodo.appendChild(span);

  let boton = document.createElement('button');
  boton.textContent = 'Eliminar';
  nodo.appendChild(boton);
  boton.onclick = eliminarDeCesta;
  boton.classList.add('boton');

  document.getElementById('list').appendChild(nodo);
}

function eliminarDeCesta(){
  this.parentNode.remove();
}

function guardarCesta(){
  let lista = document.querySelectorAll('.data-producto');
  //hay que conseguir que no guarde el contenido del boton
  lista = Array.from(lista).map(n => n.textContent);
  localStorage.setItem('cesta', JSON.stringify(lista));
}

function borrarCesta(){
    let productos = localStorage.getItem('cesta')
    document.getElementById('botonCesta').setAttribute('href','?action=comprar&productos=1'+productos);
    localStorage.removeItem('cesta');
}

function crearLinkCompra(){
    let productos = JSON.parse(localStorage.getItem('cesta'));
    var link = document.getElementById("botonCompra");
    link.innerHTML = "Comprar";
    link.setAttribute('href','?action=comprar&productos='+productos);
    return false;
}

function productoVisor(data){
    insertarOpciones(data);
    if (data.length <1) alert("No se han encontrado resultados.");
    else{
    for(var row of data){
        let nodo = document.createElement('div');
        nodo.id = row.product_id;
        nodo.classList.add('item'); // añadimos una nueva clase al atributo 'class'

        let img = document.createElement('img');
        if(row.foto_url != null && row.foto_url.includes('img/'))
            img.src = row.foto_url;
        else
            img.src = 'img/notFound.png';
        img.width = '200';
        img.height = '200';
        nodo.appendChild(img);

        let p0 = document.createElement('p');
        p0.textContent = row.name;
        nodo.appendChild(p0);

        let p1 = document.createElement('p');
        p1.textContent = row.price+' €';
        nodo.appendChild(p1);

        let a = document.createElement('a');
        a.href = '?action=add&product=' + row.product_id;

        let boton = document.createElement('button');
        boton.textContent = 'Comprar';
        a.appendChild(boton);
        nodo.appendChild(a); 
		
        document.getElementsByClassName("visor")[0].appendChild(nodo);
        Prod2ID[row.name] = row.product_id;
    }}
}


function insertarOpciones(L){
    document.getElementById('productos').innerHTML='';
    L.forEach(x => {
      let n = document.createElement('option')
      n.value = x.name
      document.getElementById('productos').appendChild(n)
    })
 }

function buscaProducto(){
    var y = document.getElementById('producto').value;
    var x = Prod2ID[y];
    document.getElementById(x).scrollIntoView();
}

function filtrarProductos(){
    var min = document.getElementById('precioMin');
    if (min==null || min.value.length<1) min.value=0;
    var max = document.getElementById('precioMax');
    if (max==null || max.value.length<1) max.value="-1";
    let url = 'precios.php?min='+min.value+'&max='+max.value;
    let visor = document.getElementsByClassName("visor")[0];
    visor.innerHTML='';
    
    fetch(url)
	.then(response => response.json())
    //.then(json => console.log(json)))
    .then(data => productoVisor(data))
    .catch(err => console.log('Fetch Error :', err));
}

 

if(window.location.href == "http://localhost:3000/Lab/Portal/portal.php?action=upload")
    document.onload = asignarContenido();

//document.onload = cargarCesta();
if(window.location.href == "http://localhost:3000/Lab/Portal/portal.php?action=upload" || window.location.href == "http://localhost:3000/Lab/Portal/portal.php?action=registrar_producto"){
    window.oninput = function(){
        document.getElementById("name").onchange = checkValores;
        document.getElementById("price").onchange = checkValores;
        document.getElementById("foto_url").onchange = checkValores;
    }
}

var Prod2ID = {};
