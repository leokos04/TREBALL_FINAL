$(document).ready(function () {


  const tablasPintar = (arrObj) => {
    //Nota para el futuro regranjero de yo la de quitar todos los eventos para luego añadirlos y no se repitan conocetela ^^
    $("#tablaSQL").off("click");

    $("#tablaSQL tbody").empty().html("");
    for (let i = 0; i < arrObj.length; i++) {
      $("#tablaSQL tbody").append(
        `<tr>
  <td>${arrObj[i].id}</td>
  <td>${arrObj[i].nombre}</td>
  <td>${arrObj[i].grupo}</td>
  <td>${arrObj[i].pais}</td>
  <td>${arrObj[i].fecha_creacion}</td>
  <td>${arrObj[i].cantidad}</td>
  <td>${arrObj[i].imagen}</td>
  <td>${arrObj[i].mp3}</td>
  <td><button class='delete' value='${arrObj[i].id}'>Eliminar</button></td>
  <td><button class='editar' value='${arrObj[i].id}'>Editar</button></td>
  </tr>`
      );
    }

    //DELETE TABLE  ---->

    $("#tablaSQL").on("click", ".delete", function () {
      Swal.fire({
        title: "¿Estas seguro que quieres eliminarlo?",
        text: "No podras revertirlo más adelante",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Borrar",
      }).then((result) => {
        /**
         *  En caso de confirmar el dialog,
         *  realizara un ajax donde en enviara el valor del boton (id).
         **/
        if (result.isConfirmed) {
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
          $.ajax({
            type: "post",
            url: "../../server/crud/deleteById.php",
            data: { id: $(this).val() },
            success: function (response) {
              if (response) {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: response,
                });
              }
              recargaTabla();
            },
            error: function (xhr) {
              console.log(xhr.statusText, xhr.responseText);
            },
          });
        }
      });
    });
    //DELETE TABLE  ---->

    //DIALOG --->
    /* Busqueda al hacer click en editar con el id de la musica cargando los input con los valores que recoge */
    $("#tablaSQL").on("click", ".editar", function () {
      $.ajax({
        type: "get",
        url: "../../server/crud/searchById.php",
        data: { id: $(this).val() },
        dataType: "json",
        success: function (response) {
          $("#id-ed").val(response.id);
          $("#img-name-ed").val(response.imagen);
          $("#mp3-name-ed").val(response.mp3);
          $("#name-ed").val(response.nombre);
          $("#artist-ed").val(response.grupo);
          $("#country-ed").val(response.pais);
          $("#date-ed").val(response.fecha_creacion);
          $("#quantity-ed").val(response.cantidad);

          $(".img-previsualizar").empty().append(`
        <p>Imagen actual :</p>
        <img class='imgDialog' alt='${response.imagen}' src='../../server/img/${response.imagen}' width='100px' style='border:1px solid black;'>
        `);

          $(".audio-add-prueba").empty().append(`
        <p>Audio acutal :</p>
        <audio controls>
          <source id='${response.mp3}' class='audio-ed' src="../../server/music/${response.mp3}" type="audio/mpeg">
        </audio>`);
        },
      });
      setTimeout(() => {
        $("#add-file-dialog").dialog("open");
      }, 10);
    });

    //DIALOGO DE EDITAR
    $("#add-file-dialog").dialog({
      autoOpen: false,
      width: 600,
      modal: true,
      buttons: {
        "Edit music": function () {
          let formData = new FormData($("#form-edit")[0]);
          $.ajax({
            type: "post",
            url: "../../server/crud/editarCancion.php",
            data: formData,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function (response) {
              if (response) {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: response,
                });
              } else {
                Swal.fire({
                  icon: "success",
                  title: "Se ha editado correctamente!!",
                  showConfirmButton: false,
                  timer: 1500,
                });
              }

              $("#form-edit").trigger("reset");
              $("#add-file-dialog").dialog("close");
              recargaTabla();
            },
          });
        },
        Cancel: function () {
          $(".audio-add-prueba").empty();
          $(this).dialog("close");
        },
      },
    });
  };

  // Función donde recargo las tablas sin el uso de recarga de la pagina
  const recargaTabla = () => {
    $.ajax({
      type: "get",
      url: "../../server/crud/showCancion.php",
      dataType: "json",
      success: function (response) {
        tablasPintar(response);
      },
    });
  };
  recargaTabla();

  //Boton de añadir
  $(".btnadd").click(function (e) {
    var formData = new FormData($("#form-add")[0]);
    
    $.ajax({
      type: "post",
      url: "../../server/crud/anadirCancion.php",
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      dataType: "text",
      success: function (response) {
        Swal.fire({
          icon: "success",
          title: "Se ha añadido correctamente!!",
          showConfirmButton: false,
          timer: 1500,
        });
        $("#form-add").trigger("reset");
        recargaTabla();
      },
      error: function (err) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Error al añadir...",
        });
        console.log(`${err.statusText} , ${err.responseText}`);
      },
    });
  });

  //fin ready
});
