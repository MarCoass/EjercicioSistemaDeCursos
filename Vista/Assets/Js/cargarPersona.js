$(document).on("click", ".cargarPersona", function () {
  $.ajax({
    type: "POST",
    url: "Accion/accionRegistrarPersona.php",
    success: function (response) {},
  });
});
