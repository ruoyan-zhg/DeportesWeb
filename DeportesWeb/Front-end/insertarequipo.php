<?php
function insertarequipo() {
    $dom = new DOMDocument();
    $sel = $dom->getElementById('JugadoresCuadro');
    $opt = $dom->createElement('option', "Pablo");
    $opt->setAttribute("id", "jugador1");

    $dom->appendChild($opt); //Esto corre bien, pero no lo inserta en el select
    echo $dom->saveHTML();

    //$selopt = $sel->appendChild($opt); //Esto me da error, que es como creía que era
    //$dom->appendChild($selopt);
    //echo $dom->saveHTML();
}
?>