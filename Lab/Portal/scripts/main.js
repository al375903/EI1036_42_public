function anyadirFoto(){
    //guardarContenido();
    let divCaja = document.getElementById("abrirFoto");
    divCaja.style.display="block";
}

function cerrarFoto(){
    let divCaja = document.getElementById("abrirFoto");
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
    localStorage.clear();
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
    let divCaja = document.getElementById("abrirCesta");
    divCaja.style.display="block";
}




//Cesta
(function(){
    let lista = JSON.parse(localStorage.getItem('cesta'))
    if(lista && lista.length>0)
      lista.forEach(tarea => anyadir(tarea))
})()

function anyadir(tarea){
  let nodo = document.createElement('li')
  
  let span = document.createElement('span')
  span.classList.add('data-tarea') // añadimos una nueva clase al atributo 'class'

  if (tarea) 
     span.textContent = tarea
  else /*si el contenido es vacio return */
     span.textContent = document.getElementById('tarea').value
  
  nodo.appendChild(span)

  let boton = document.createElement('button')
  boton.textContent = 'Hecho'
  nodo.appendChild(boton)
  boton.onclick = eliminar
  boton.classList.add('boton')

  document.getElementById('list').appendChild(nodo)
}

function eliminar(){
  this.parentNode.remove()
}

function guardar(){
  let lista = document.querySelectorAll('.data-tarea')
  //hay que conseguir que no guarde el contenido del boton
  lista = Array.from(lista).map(n => n.textContent)
  localStorage.setItem('cesta', JSON.stringify(lista))
}

if(window.location.href == "http://localhost:3000/Lab/Portal/portal.php?action=upload")
    document.onload = asignarContenido();

window.oninput = function(){
    document.getElementById("name").onchange = checkValores;
    document.getElementById("price").onchange = checkValores;
    document.getElementById("foto_url").onchange = checkValores;
}