
const inputbusqueda = document.querySelector('#inputModalSearch');

document.addEventListener('DOMContentLoaded', function() {
    //busqueda de productos
    inputbusqueda.addEventListener('keyup',function (e) {
      const url = base_url + "principal/busqueda/" + e.target.value;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.forEach(producto => {
              html += `<div class="col-12 col-md-4 mb-4">
              <div class="card h-100">
                <a href="${ base_url + 'principal/detail/' + producto.idRepuesto }">
                <img class="card-img rounded-0 img-fluid" src="${ producto.imagen }" alt="Colorlib Template">
                </a>
                <div class="card-body">
                  <ul class="list-unstyled d-flex justify-content-between">
                    <li>
                      <i class="text-warning fa fa-star"></i>
                      <i class="text-warning fa fa-star"></i>
                      <i class="text-warning fa fa-star"></i>
                      <i class="text-muted fa fa-star"></i>
                      <i class="text-muted fa fa-star"></i>
                    </li>
                    <li class="text-muted text-right">$ ${ producto.precioUnidad }</li>
                  </ul>
    						<h3><a href="${ base_url + 'principal/detail/' + producto.idRepuesto }">${ producto.nombreRepuesto }</a></h3>
    						<h5>${ producto.descripcionRepuesto }</h5>
                </div>
              </div>
            </div>`;
            });
            document.querySelector('#resultBusqueda').innerHTML = html;
        }
      }
    })
});

