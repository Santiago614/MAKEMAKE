const carro = document.getElementById("carrito");
const checkout = document.getElementById("checkout");

let datos = { id: null };

// e.preventDefault();

$.ajax({
  url: "../../Controllers/php/users/compras.php", //Ruta de la clase
  type: "POST", //Tipo de request,
  data: { getCarrito: true }, //Datos a recibir en el script .php a traves de $_POST
  success: function (respuesta) {
    renderCarrito(respuesta);
  },
});

function renderCarrito(carrito) {
  carrito = JSON.parse(carrito);
  let elementosCarrito = "";
  carrito.forEach((elemento) => {
    elementosCarrito += `
    <tr>
      <td>
        <div class="img">
          <a href="#"><img src="../assets/img/product-1.jpg" alt="Image"></a>
          <p>${elemento.nombre}</p>
        </div>
      </td>
      <td>${elemento.precio}</td>
      <td>
        <div class="qty">
          <button class="btn-minus" id="sumar"><i class="fa fa-minus"></i></button>
          <input type="text" id="cantidad-carrito" value="${elemento.cantidad}" min="2">
          <button class="btn-plus" id="restar"><i class="fa fa-plus"></i></button>
        </div>
      </td>
      <td>$${elemento.Total}</td>
      <td><button><i class="fa fa-trash"></i></button></td>
    </tr>
    `;
    carro.innerHTML = elementosCarrito;
  });
}

const cantidadCarrito = document.getElementById("cantidad-carrito");
cantidadCarrito.addEventListener("keyup", (e) => {
  if (e.keyCode >= 48 && e.keyCode <= 57) {
    cantidadCarrito.value = e.target.value;
  } else {
    cantidadCarrito.value = "1";
  }
});
