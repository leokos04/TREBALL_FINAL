$(document).ready(function () {

  /*
  Apartado del usuario donde hago un query de todas las reservas que ha realizado el usuario y los printo, teniendo en cuenta el modo oscuro del localstorage
  */

  const recagarTabla = () => {
    $.ajax({
      type: "get",
      url: "../../server/crud/getReservasUser.php",
      dataType: "json",
      success: function (response) {
        $("#reservas").empty().off("click");
        $("#datos").empty()
        $(`<h1>${response[0].email}</h1>`).appendTo("#datos")

        Array.from(response).forEach((ele) => {
          $(
            `<div class='col-md-2 carta' style='width:300px;border-radius: 30px;'><img src='../../server/img/${ele.imagen}' style='height:200px;width:200px'><p>Nombre : ${ele.nombre}</p><h4>Grupo : </h4><h4>${ele.grupo}</h4><button value='${ele.id}' data-idreserva='${ele.reservaID}' class='btn cancelReserva text-light' style='background-color:#b7094c;'>Cancelar Reserva</button></div>`
          ).appendTo("#reservas");
        });

    
        const darkmode = localStorage.getItem('darkmode');
        if (darkmode === 'true') {
          $(".carta").addClass("carta-dark");
        }

        $(`.carta`).on("click", ".cancelReserva", function () {
          let id = $(this).val();
          let idReserva = $(this).data("idreserva");
          $.ajax({
            type: "post",
            url: "../../server/crud/deleteReservasUser.php",
            data: { id_musica: id, id_reserva: idReserva },
            success: function (response) {
              Swal.fire({
                icon: 'success',
                title: 'Se ha cancelado la reserva correctamente!',
                showConfirmButton: false,
                timer: 1000
              })
              recagarTabla();
            },
          });
        });
      },
      error: function (err) {
        console.log(err.statusText, err.responseText);
      },
    });
  }
  recagarTabla()




});