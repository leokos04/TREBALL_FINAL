$(document).ready(function () {
  $.ajax({
    type: "post",
    url: "../../server/crud/controlSesion.php",
    dataType: "text",
    success: function (res) {
      estadoSession(res)
    },
  });

  function estadoSession(response) {
    //Validacion de tipo de usuario para el apartado del menu
    switch (response) {
      case "0":
        window.location.href = "../"
        break;
      case "1":
        $(".user").show();
        $(".admin").hide();
        $(".btnlogin").hide();
        $(".btnlogout").show();
        break;
      case "2":
        $(".user").show();
        $(".admin").show();
        $(".btnlogin").hide();
        $(".btnlogout").show();
        break;
    }
  }

})