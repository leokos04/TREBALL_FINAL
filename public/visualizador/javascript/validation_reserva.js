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
          .css({ width: "300px" });
        $(
        `<h1>Musica : ${response.nombre}</h1>
        <h3>Grupo : ${response.grupo}</h3>
        <p>Creada en ${response.fecha_creacion} en ${response.pais}</p>
        <p>Cantidad disponible : ${response.cantidad}</p>
        <p></p>
        <audio controls>
          <source id='${response.mp3}' class='audio-ed' src="../../server/music/${response.mp3}" type="audio/mpeg">
        </audio>
        `
        ).appendTo("#datos");
        if(response.cantidad == 0){
          $(".reservar").unbind().addClass("disabled")
        }
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
        if (res != "0") {
          $.ajax({
            type: "post",
            url: "../../server/crud/reservar.php",
            data: { id: product },
            success: function (response) {
              recagarWeb(product);
              Swal.fire({
                icon: 'success',
                title: 'Se ha reservado correctamente!!',
                showConfirmButton: false,
                timer: 1000
              })
            },
          });
        
        }
      },
    });
  });
});
