import { comprobacionUser } from "./funciones.js";

$(document).ready(function () {
  const urlParams = new URLSearchParams(window.location.search);
  const product = urlParams.get("id");
  const recagarWeb = (id) => {
    $.ajax({
      type: "get",
      url: "../../server/crud/searchById.php",
      data: { id: id },
      dataType: "json",
      success: function (response) {
        $("#datos").empty();
        $(".imgPrincipal")
          .attr({
            alt: response.nombre,
            src: "../../server/img/" + response.imagen,
          })
          .css({ width: "400px", border: "1px solid red" });
        $(
          `<h1>${response.nombre}</h1><h3>${response.grupo}</h3><p>Creada en ${response.fecha_creacion} en ${response.pais}</p><p>Cantidad disponible : ${response.cantidad}</p>`
        ).appendTo("#datos");
      },
    });
  };
  recagarWeb(product);

  $(".reservar").click(function () {
    $.ajax({
      type: "post",
      url: "../../server/crud/controlSesion.php",
      dataType: "text",
      success: function (res) {
        comprobacionUser(res);
        if (resultado != "0") {
          $.ajax({
            type: "post",
            url: "../../server/crud/reservar.php",
            data: { id: product },
            success: function (response) {
              recagarWeb(product);
            },
          });
        }
      },
    });
  });
});
