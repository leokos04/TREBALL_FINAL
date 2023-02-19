$(document).ready(function () {
  /* Ajax recoge la pagina principal los datos del servidor. Al pulsar click pasara el id al apartado visualizador
     para hacer la reserva.
   */
  $.ajax({
    type: "get",
    url: "../server/crud/showCancion.php",
    dataType: "json",
    success: function (response) {
      Array.from(response).forEach((ele) => {
        if (ele.cantidad > 0) {
          $(
            `<div class='col-md-3 carta' style='width:300px;border-radius: 30px;'><img src='../server/img/${ele.imagen}' style='height:200px;width:200px'><p>Nombre : ${ele.nombre}</p><h4>Grupo : </h4><h4>${ele.grupo}</h4><button value='${ele.id}' class='btn previsualizar text-light' style='background-color:#b7094c;'>Previsualizar</button></div>`
          ).appendTo(".listaMusica");
        }
      });

      //Modo oscuro en cada apartado del prototipo
      const darkmode = localStorage.getItem('darkmode');
      if (darkmode === 'true') {
        $(".carta").addClass("carta-dark");
      }

      //Al hacer click a la carta recoge el id que este contenga y lo redirecciona al apartado de visualizar de cada cancion
      $(`.carta`).on("click", ".previsualizar", function () {
        window.location.href = "./visualizador/index.html?id=" + $(this).val()
      })
    },
  });
});