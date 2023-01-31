$(document).ready(function (param) {

  $("#grupo").on("input", function () {
    let searchValue = $(this).val().toLowerCase();
    if (!searchValue ) {
      $(".carta").show();
    } else {
      $(".carta").each(function () {
        let songName = $(this).find("h4").text().toLowerCase();
        if (songName.includes(searchValue)) {
          $(this).show()
        } else {
          $(this).hide();
        }
      });
    }
  });

  $("#musica").on("input", function () {
    let searchValue = $(this).val().toLowerCase();
    if (!searchValue) {
      $(".carta").show();
    } else {
      $(".carta").each(function () {
        let songName = $(this).find("p").text().toLowerCase();
        if (songName.includes(searchValue)) {
          $(this).show()
        } else {
          $(this).hide();
        }
      });
    }
  });
})