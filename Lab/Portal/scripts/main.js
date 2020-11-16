function anyadirFoto(){
    //guardarContenido();
    let divCaja = document.getElementById("insertaFoto");
    divCaja.style.display="block";
}

function cerrarFoto(){
    let divCaja = document.getElementById("insertaFoto");
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
    localStorage.setItem("nombreProducto", document.getElementsByName("name")[0]);
    localStorage.setItem("pecioProducto", document.getElementsByName("price")[0]);
}

function asignarContenido(){
    document.getElementsByName("name")[0].setAttribute("value", localStorage.getItem("nombreProducto"));
    document.getElementsByName("price")[0].setAttribute("value", localStorage.getItem("precioProducto"));
}



function abrirCesta(){
    let divCaja = document.getElementById("abrirCesta");
    divCaja.style.display="block";
}