var prev = function() {
    var carousel = document.getElementById('carousel');
    carousel.prev();
};

var next = function() {
    var carousel = document.getElementById('carousel');
    carousel.next();
};

/* Función para añadir un elemento al carrusel */
function addItem(row){
    let nodo = document.createElement('ons-carousel-item')
    nodo.style.backgroundColor = 'red'
    nodo.innerHTML = `<div class="textoMovil">${row.name}</div>`
    let img = document.createElement('img');
    if(row.foto_url != null && row.foto_url.includes('img/'))
        img.src = row.foto_url;
    else
        img.src = 'img/notFound.png';
    img.width = '200';
    img.height = '200';
    nodo.appendChild(img);

    let p = document.createElement('div');
    p.innerHTML = `<div class="textoMovil">${row.price} € <button class="botonMovil" onclick="addToCesta('${row.name}');guardarCestaMovil()">Comprar</button></div>`;
    nodo.appendChild(p);

    document.getElementById('carousel').appendChild(nodo);
    Prod2IDMovil[row.name] = row.product_id;
}


//Cesta
function cargarCestaMovil(){
    let lista = JSON.parse(localStorage.getItem('cesta'));
    if(lista && lista.length>0){
        lista.forEach(producto => addToCesta(producto));
    }
}

function addToCesta(producto){
    let nodo = document.createElement('ons-list-item');
    let txt = document.createElement('span');
    txt.classList.add('miItem');
    txt.textContent = producto;
    let boton = document.createElement('button');
    boton.classList.add('elimina');
    boton.onclick=eliminarDeCestaMovil;
    boton.textContent='X';
    
    nodo.appendChild(txt);
    nodo.appendChild(boton);

    let cesta = document.getElementById("cestaMovil");
    cesta.appendChild(nodo);
}

function eliminarDeCestaMovil(){
    this.parentNode.remove();
    guardarCestaMovil();
}

function guardarCestaMovil(){
    let lista = document.querySelectorAll('.miItem');
    //hay que conseguir que no guarde el contenido del boton
    lista = Array.from(lista).map(n => Prod2IDMovil[n.textContent]);
    localStorage.setItem('cesta', JSON.stringify(lista));
}

function borrarCestaMovil(){
    localStorage.removeItem('cesta');
}


function compraMovil(){
    let productos = JSON.parse(localStorage.getItem('cesta'));
    if (productos.length>0){
        var url = 'comprar.php?productos='+productos;
        console.log(url);
        fetch(url)
        .then(response => response.json())
        //.then(json => console.log(json))
        .then(data => resultadoComprar(data))
        .catch(err => console.log('Fetch Error :', err));
    }
    productosCesta = [];
    document.getElementById('carousel').innerHTML='';
}

function resultadoComprar(data){
    if(data.resultado == "OK"){
        alert("Compra realizada!");
        borrarCestaMovil();
        window.location.reload();
    }
    else alert("Compra fallida!");
}

function buscaProductoMovil(){
    var y = document.getElementById('producto').value;
    var x = Prod2IDMovil[y];
    
    var carousel = document.getElementById('carousel');
    carousel.setActiveIndex(x-1);
}

var Prod2IDMovil = {};
/* Añadir elementos al carrusel cuando se carga una página */
document.addEventListener("init", function(event) {
    var page = event.target;
    if( page.matches('#page1') ) {
        fetch("datos.php")
        .then(response => response.json())
        //.then(json => console.log(json))
        .then(data => {
            insertarOpciones(data);
            for(var row of data)
                addItem(row);
        })
        .catch(err => console.log('Fetch Error :', err)); 
    }
    if(page.matches('#page2')){
        cargarCestaMovil();
    }
})
