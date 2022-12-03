const tableLista = document.querySelector('#tableListaDeseo tbody');
document.addEventListener("DOMContentLoaded", function() { 
    getListaDeseo()
});

function getListaDeseo(){
    const url = base_url + 'principal/listaDeseo';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaDeseo));
    http.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html ='';
            res.productos.forEach(producto => {
                html +=`<tr>
                <td>
                <img class="img-fluid rounded-circle" src="${producto.imagen}" alt="" width="150">
                </td>
                <td>${producto.nombre}</td>
                <td>${producto.precio}</td>
                <td>${producto.cantidad}</td>
                <td><button class="btn btn-danger btnEliminarDeseo" type="button"><i class="fas fa-trash"></i></button>
                <button class="btn btn-danger" type="button"><i class="fas fa-cart-plus"></i></button>
                </td>
            </tr>`;
            });
            tableLista.innerHTML = html;
            let listaEliminar = document.querySelectorAll('.btnEliminarDeseo');
        }
    }
}

