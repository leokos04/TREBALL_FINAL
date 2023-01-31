  $.ajax({
    type: "post",
    url: "../../server/crud/controlSesion.php",
    dataType: "text",
    success: function (res) {
      estadoSession(res)
    },
  });

  function estadoSession(response) {
    switch (response) {
      case "0":
        window.location.href = "../"
        break;
      case "1":
        window.location.href = "../"
        break;
      case "2":
        $(".user").show();
        $(".admin").show();
        $(".btnlogin").hide();
        $(".btnlogout").show();
        break;
    }
  }
