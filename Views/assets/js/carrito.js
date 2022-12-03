

const btnAddcarrito = document.querySelectorAll('.btnAddCarrito');
const btnCarrito = document.querySelector('#btnCantidadCarrito');
const verCarrito = document.querySelector('#verCarrito');
const tableListaCarrito = document.querySelector('#tableListaCarrito tbody');
//Ver carrito
const myModal = new bootstrap.Modal(document.getElementById('myModal'))

let listaCarrito;
document.addEventListener('DOMContentLoaded', function() { 
    if (localStorage.getItem('listaCarrito') != null) {
        listaCarrito = JSON.parse(localStorage.getItem('listaCarrito'));
    }
    
    for (let i = 0; i < btnAddcarrito.length; i++) {
        btnAddcarrito[i].addEventListener('click', function (){
            let idProducto = btnAddcarrito[i].getAttribute('prod');
            agregarCarrito(idProducto, 1);
        })
        
    }
    cantidadCarrito();

    
    verCarrito.addEventListener('click', function(){
        getlistaCarrito();
        myModal.show();
    })

});

//agregar productos al carrito
function agregarCarrito(idProducto, cantidad) {
    if (localStorage.getItem('listaCarrito') == null) {
        listaCarrito = [];
    } else {
        let listaExiste = JSON.parse(localStorage.getItem('listaCarrito'));
        for (let i = 0; i < listaExiste.length; i++) {
            if (listaExiste[i]['idProducto'] == idProducto) {
            }
            
        }
        listaCarrito.concat(localStorage.getItem('listaCarrito'));
    }
    listaCarrito.push({
        idProducto:idProducto,
        cantidad: cantidad,
    });
    localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito));
    Swal.fire(
        'Aviso',
        'PRODUCTO AGREGADO AL CARRITO',
        'success'
      )
      cantidadCarrito();
}
function cantidadCarrito() {
    let listas = JSON.parse(localStorage.getItem('listaCarrito'));
    if (listas != null) {
        btnCarrito.textContent = listas.length;
    }else{
        btnCarrito.textContent = 0;
    }
}

//ver carrito
function getlistaCarrito() {
    const url = base_url + 'principal/listaProductos';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaCarrito));
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html ='';
            res.productos.forEach(producto => {
                html +=`<tr>
                <td>
                <img class="img-fluid rounded-circle" src="${producto.imagen}" alt="" width="150">
                </td>
                <td>${producto.nombre}</td>
                <td><span class="badge bg-warning">${res.moneda + ' ' + producto.precio}</span></td>
                <td><span class="badge bg-info">${producto.cantidad}</span></td>
                <td>${producto.SubTotal}</td>
                <td>
                <button class="btn btn-danger btnDeletecart" type="button" prod="${producto.id}"><i class="fas fa-times-circle"></i></button>
                </td>
            </tr>`;
            });
            tableListaCarrito.innerHTML = html;
            document.querySelector('#totalGeneral').textContent = res.total;
            btnEliminarCarrito();
        }
    }
}
function btnEliminarCarrito() {
    let listaEliminar = document.querySelectorAll('.btnDeletecart');
    for (let i = 0; i < listaEliminar.length; i++) {    //recorrer toda la lista
        listaEliminar[i].addEventListener('click', function(){   //a cada lista en su indice se agrega el click
            let idProducto = listaEliminar[i].getAttribute('prod'); //producto igual a la lista indice, accede al atributo get producto
            eliminarListaCarrito(idProducto); //llamar la otra funcion
        })
        
    }
}
function eliminarListaCarrito(idProducto) {
    //console.log(listaCarrito);
    for (let i = 0; i < listaCarrito.length; i++) {     //recorrer todas los productos
        if (listaCarrito[i]['idProducto'] == idProducto) {      //si la lista deseo en su indice I accede al producto lo compara con el parametro y sea igual al parametro idproducto
            listaCarrito.splice(i, 1);      //accedemos a lista carrito para quitar esa lista del indice, segundo parametro para saber cuanto se va aeliminar
        }
    }
    //console.log(listaCarrito);
    localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito)); //eliminar del localStorage
    getlistaCarrito();  //actualizar la lista
    cantidadCarrito();  //actualizar icono del carrito
    Swal.fire(
        'Aviso',
        'PRODUCTO ELIMINADO DEL CARRITO',
        'success'
      )
}

//paypal
//sb-58fzz20815158@personal.example.com
//0CNUv9y+
