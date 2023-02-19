$(document).ready(function () {

  /*Inputs en la pagina principal de filtros donde recojo los h4 y p de las cartas que serian para la busqueda, en caso de los 2 input esten vacios mostraran todos,
  en caso contrario hace un forEach a cada carta buscando el que "CONTENGA" (no especifico que empieze) */
  $("#grupo, #musica").on("input", function () {
  
    let musicaGrupo = $("#grupo").val().toLowerCase();
    let musicaName = $("#musica").val().toLowerCase();
    if (!musicaGrupo && !musicaName) {
      $(".carta").show();
    } else {
      $(".carta").each(function () {
        let grupoH4 = $(this).find("h4").text().toLowerCase();
        let nameP = $(this).find("p").text().toLowerCase();
        if (grupoH4.includes(musicaGrupo) && nameP.includes(musicaName)) {
          $(this).show()
        } else {
          $(this).hide();
        }
      });
    }
  });
})