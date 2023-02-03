$(document).ready(function () {
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
      $(`.carta`).on("click", ".previsualizar", function () {
        window.location.href = "./visualizador/index.html?id=" + $(this).val()
      })
    },
  });  
});