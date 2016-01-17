$(document).ready(function(){
    //Funcion cuando se hace clic sobre un thumbnail
    $(".openModal").click(function(){
        //Asignar texto al modal box basado en el click
        $("#openModal").find("p").text($(this).parent().children("p").text())
    });
});