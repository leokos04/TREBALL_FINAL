$(document).ready(function () {
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