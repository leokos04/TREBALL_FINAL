$(document).ready(function () {

  //Control de sesiones para el menu 
  $.ajax({
    type: "post",
    url: "../server/crud/controlSesion.php",
    dataType: "text",
    success: function (res) {
      estadoSession(res)
    },
  });

  function estadoSession(response) {
    switch (response) {
      case "0":
        $(".user").hide();
        $(".admin").hide();
        $(".btnlogout").hide();
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