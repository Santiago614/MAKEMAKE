const formCrearProducto = document.getElementById("form-crear-producto");

console.log(formCrearProducto);
// Creando objeto
let datos = {
  nombre: null,
  descripcion: null,
  cantidad: null,
  stock: null,
  precio: null,
  categoria: null,
};

// Evento de submit
formCrearProducto.addEventListener("submit", (e) => {
  e.preventDefault();

  let nombre = document.getElementById("nombre").value;
  let descripcion = document.getElementById("descripcion").value;
  let cantidad = document.getElementById("cantidad").value;
  let stock = document.getElementById("stock").value;
  let precio = document.getElementById("precio").value;
  let categoria = document.getElementById("categoria").value;

  datos.nombre = nombre;
  datos.descripcion = descripcion;
  datos.cantidad = cantidad;
  datos.stock = stock;
  datos.precio = precio;
  datos.categoria = categoria;

  $.ajax({
    url: "../../Controllers/php/users/productos.php",
    type: "post",
    data: {
      crearProducto: JSON.stringify(datos),
    },
    success: function (resp) {
      $("#respuesta").html(resp);
      if (resp == 1) {
        Swal.fire({
          type: "success",
          html: "<strong>¡Registro guardado correctamente!</strong>",
        });
        //Dejar campos en blanco cuando se guarde un registro
        document.getElementById("nombre").value = "";
        document.getElementById("descripcion").value = "";
        document.getElementById("cantidad").value = "";
        document.getElementById("stock").value = "";
        document.getElementById("precio").value = "";
        document.getElementById("categoria").value = "";
      } else if (resp == 2) {
        Swal.fire({
          type: "warning",
          html: "¡Ocurrió un error, no se pudo guardar el producto!",
        });
      } else {
        Swal.fire({
          type: "error",
          html: resp,
        });
      }
    },
  });
});
