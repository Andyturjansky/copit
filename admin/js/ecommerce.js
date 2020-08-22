$(document).ready(function () {
    $("#agregarCarrito").click(function (e) { 
        e.preventDefault();
        var id=$(this).data('IdProducto');
        var nombre=$(this).data('Nombre');
        var web_path=$(this).data('ImagenProducto');
        var cantidad=$("#cantidadProducto").val();
        $.ajax({
            type: "post",
            url: "ajax/agregarCarrito.php",
            data: {"IdProducto":id,"Nombre":nombre,"ImagenProducto":web_path,"cantidad":cantidad},
            dataType: "json",
            success: function (response) {
                var cantidad=Object.keys(response).length;
                $("#badgeProducto").text(cantidad);
            }
        });
    });
}); 