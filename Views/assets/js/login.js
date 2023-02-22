const formlogin = document.getElementById("form-login");

// Creando objeto
let datos = {
  id: null,
  contrasena: null,
};

formlogin.addEventListener("submit", function (e) {
  e.preventDefault();
  // Recogiendo datos ingresados por el usuario
  let id = document.getElementById("id").value;
  let contrasena = document.getElementById("contrasena").value;

  datos.id = id;
  datos.contrasena = contrasena;
  $.ajax({
    url: "../../Controllers/php/users/acceso.php",
    type: "post",
    data: {
      login: JSON.stringify(datos),
    },
    success: function (resp) {
      $("#respuesta").html(resp);
      if (resp == 1) {
        Swal.fire({
          type: "success",
          html: "<strong>¡BIENVENIDO (A)!</strong>",
        });
        document.location.href = "../dashboard/dist/index.php";
      } else if (resp == 2) {
        Swal.fire({
          type: "warning",
          html: "<strong>¡Hola! te informamos que su cuenta se encuentra en estado <strong>INACTIVO</strong> si crees que se trate de un error por favor comunícate con nosotros... <a href='soporte'>aquí</a><br><br>¡Muchas gracias!</strong>",
        });
      } else if (resp == 3) {
        Swal.fire({
          type: "error",
          html: "<strong>¡Hola! tu cuenta no existe la puedes crear... <a href='registro'>aquí</a><br><br>¡Muchas gracias!</strong>",
        });
      } else {
        Swal.fire({
          type: "error",
          html: resp,
        });
      }
    },
  });
  return false;
});
