function even(name){
    switch (name) {
        case 1:
            var newWin = window.open("evento.html", "_")
            newWin.onload = function(){
                //var ident =newWin.document.body.style.
                //ident.backgroundImage='url("../../complements/portadaFutbol.jpeg")';
                var ident =newWin.document.getElementById(titulo)
                ident.setAttribute("Eventos Deportivos")
                newWin.document.getElementById(subtitulo).setAttribute("Organizamos torneos de futbol exterior")
                newWin.document,getElementById(miniDes).setAttribute("Competiciones de fulbol")
                newWin.document.getElementById(nombreEven1).setAttribute("Mini torneo de futbol")
              };
        
            break;
        case 2:
            window.open("evento.html", "_")
            
            break;
        case 3:
            window.open("evento.html", "_self")
            break;
        case 4:
            window.open("evento.html", "_")
            
            break;
        case 5:
            window.open("evento.html", "_")
            
        break;
        case 6:
            window.open("evento.html", "_")
            
            break;
        default:
            window.open("evento.html", "_self")
          break;
      }
};
