function suscribirse(id_evento, id_usuario){
    
    jQuery.ajax({
        type: "POST",
        url: 'AjaxConsulta.php',
        data: {idEvento: id_evento, idUsuario: id_usuario},
        success: function (response) {
            switch (response){
                case "se borro":
                    alert ("Se ha dado de baja del evento correctamente");
                    console.log("numeroInscritos"+id_evento)
                    document.getElementById("suscribirse"+id_evento).innerHTML = "Suscribirse";
                    inscritos = document.getElementById("numeroInscritos"+id_evento).innerHTML;
                    // obtener el primer numero antes del la barra y restarle 1
                    inscritos = inscritos.substring(0, inscritos.indexOf("/")) - 1;
                    inscritos = inscritos + "/" + document.getElementById("numeroInscritos"+id_evento).innerHTML.substring(document.getElementById("numeroInscritos"+id_evento).innerHTML.indexOf("/")+1);
                    document.getElementById("numeroInscritos"+id_evento).innerHTML = inscritos;
                    break;
                case "se inserto":
                    alert ("Se ha suscrito al evento correctamente");
                    console.log("suscribirse"+id_evento)
                    document.getElementById("suscribirse"+id_evento).innerHTML = "Darse de baja";
                    inscritos = document.getElementById("numeroInscritos"+id_evento).innerHTML;
                    // obtener el primer numero antes del la barra y sumarle 1
                    inscritos = parseInt(inscritos.substring(0, inscritos.indexOf("/"))) + 1;
                    inscritos = inscritos + "/" + document.getElementById("numeroInscritos"+id_evento).innerHTML.substring(document.getElementById("numeroInscritos"+id_evento).innerHTML.indexOf("/")+1);
                    document.getElementById("numeroInscritos"+id_evento).innerHTML = inscritos;
                    break;
                case "no se inserto":
                    alert ("No se ha podido suscribir al evento");
                    break;
                case "no se borro":
                    alert ("No se ha podido dar de baja del evento");
                    break;
                default:
                    alert (response);
                    break;
            }

        }
    });
}




