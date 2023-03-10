
let cursosGrupales = $("h6")
  .filter(function () {
    return $(this).text() === "Modalidad: Grupal";
  })
  .parent()
  .parent();

let cursosIndividuales = $("h6")
  .filter(function () {
    return $(this).text() === "Modalidad: Individual";
  })
  .parent()
  .parent();


  $(document).ready(function () {
    $(".individuales").click(function () {
      cursosGrupales.hide();
      cursosIndividuales.show()
    });
  });
  $(document).ready(function () {
    $(".grupales").click(function () {
      cursosGrupales.show();
      cursosIndividuales.hide()
    });
  });
  
  $(document).ready(function () {
    $(".todos").click(function () {
      cursosGrupales.show();
      cursosIndividuales.show()
    });
  });
  