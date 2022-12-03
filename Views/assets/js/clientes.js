const tableLista = document.querySelector("#tableListaProductos tbody");
document.addEventListener("DOMContentLoaded", function () {
    getlistaProductos()

    
});


function getlistaProductos() {
    let html = '';
    const url = base_url + 'principal/listaProductos';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaCarrito));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res.totalPaypal > 0) {
                res.productos.forEach(producto => {
                    html += `<tr>
                    <td>
                    <img class="img-fluid rounded-circle" src="${producto.imagen}" alt="" width="150">
                    </td>
                    <td>${producto.nombre}</td>
                    <td><span class="badge bg-warning">${res.moneda + ' ' + producto.precio}</span></td>
                    <td><span class="badge bg-info">${producto.cantidad}</span></td>
                    <td>${producto.SubTotal}</td>
                </tr>`;
                });
                tableLista.innerHTML = html;
                document.querySelector('#totalProductos').textContent = 'TOTAL A PAGAR:' + ' ' + res.total;
                botonPaypal(res.totalPaypal);
            }else{
                tableLista.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center">Carrito vacio</td>
                </tr>
                `;
            }
        }
    }
}

function botonPaypal(total) {
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total // Can also reference a variable or function
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function (orderData) {
                registrarPedido(orderData)
            });
        }
    }).render('#paypal-button-container');
}
function registrarPedido(datos) {
    const url = base_url + 'clientes/registrarPedido';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify({
        pedidos: datos,
        productos: listaCarrito
    }));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Swal.fire(
                'Aviso',
                res.msg,
                res.icono
              );
            if (res.icono == 'success') {
                localStorage.removeItem('listaCarrito');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        }
    }
}


function abrirModalLogin() {
    myModal.hide();
    window.location.reload();
}


//paypal
//sb-58fzz20815158@personal.example.com
//0CNUv9y+