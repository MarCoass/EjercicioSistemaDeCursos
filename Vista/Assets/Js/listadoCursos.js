let cursosGrupales = $("h6")
  .filter(function() {
    return $(this).text() === "Modalidad: Grupal";
  })
  .parent()
  .parent();

let cursosIndividuales = $("h6")
  .filter(function() {
    return $(this).text() === "Modalidad: Individual";
  })
  .parent()
  .parent();

$(function() {
  $(".individuales").click(function() {
    cursosGrupales.hide();
    cursosIndividuales.show();
  });

  $(".grupales").click(function() {
    cursosGrupales.show();
    cursosIndividuales.hide();
  });

  $(".todos").click(function() {
    cursosGrupales.show();
    cursosIndividuales.show();
  });
});





