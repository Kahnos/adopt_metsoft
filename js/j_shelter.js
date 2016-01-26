$(document).ready(function(){
    //Funcion cuando se hace clic sobre un thumbnail
    $(".openModal").click(function(){
        
        //--Asignar la misma foto de la ventana
        
        
        //--Asignar texto al modal box basado en el click
        
        //Nombre de la mascota
        $("#openModal").find("#mod_nombre").text($(this).parent().children(".nombre").text());
        
        //Raza de la mascota
        $("#openModal").find("#mod_raza").text($(this).parent().children(".raza").text());
    });
});