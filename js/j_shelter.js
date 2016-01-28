$(document).ready(function(){
    //Funcion cuando se hace clic sobre un thumbnail
    $(".modalOpenBut").click(function(){
        
        $(".modalDialog").toggleClass("modalDialog_display");
        $(".modalDialog").toggleClass("modalDialog_display1");
        
        //--Asignar la misma foto de la ventana
        $(".modal_picture").attr("src",$(this).parent().parent().find(".img").attr("src"));
        
        //--Asignar texto al modal box basado en el click
        $("#openModal").find("#mod_raza").text($(this).parent().children(".raza").text());
        $("#openModal").find("#mod_vacuna").text($(this).parent().children(".vacuna").text());
        $("#openModal").find("#mod_edad").text($(this).parent().children(".edad").text());
        $("#openModal").find("#mod_sexo").text($(this).parent().children(".sexo").text());
        $("#openModal").find("#mod_ubicacion").text($(this).parent().children(".ubicacion").text());
        $("#openModal").find("#mod_castrado").text($(this).parent().children(".castrado").text());        
        $("#enlace").attr("href",$(this).parent().children(".enlace").text());        
        
    });
    
    $(".cancel").click(function(){
        
        $(".modalDialog").toggleClass("modalDialog_display");
        $(".modalDialog").toggleClass("modalDialog_display1");
    });
    
});