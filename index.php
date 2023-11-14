<?php
// Incluimos las librerias de XAJAX
require_once("include/xajax_core/xajax.inc.php");
// Instanciamos el objeto
$xajax = new xajax();
// Declaramos nuestra función
function estadoColor($param){

    // Condicional que evalua el parámetro recibido.
    if($param == 'white'){
        $value = "ENVIAR";
        $disabled = false;
    }else{
        $value = "NO ENVIAR";
        $disabled = true;
    }

    // Creamos el objeto y asignamos las porpiedades de cada elemento.
    $respuesta = new xajaxResponse();
    $respuesta->assign("parrafo","style.background",$param);
    $respuesta->assign("submit","value",$value);
    $respuesta->assign("submit","disabled",$disabled);

    return $respuesta;
}
// Registramos nuestra función al objeto XAJAX
$xajax->register(XAJAX_FUNCTION,"estadoColor");
// Habilitamos el debug.
$xajax->configure('debug',true);
// Indicamos donde se ubica el archivo JS a cargar
$xajax->configure('javascript URI', 'include/');
// Hacemos uso del método que procesará las peticiones
$xajax->processRequest();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 7</title>
    <!-- Cargamos nuestro código PHP en generado en JS -->
  <?php  $xajax->printJavascript(); ?>
</head>
<h1>Realice su selección</h1>
<body>
    <form>
    <label for="color">Color</label>
    <select name="color" id="color">
        <option value="red">Rojo</option>
        <option value="green">Verde</option>
        <option value="blue">Azul</option>
        <option value="white" selected></option>
    </select><br><br>
    <input type="submit" value="ENVIAR" id="submit">
    </form>
    <p id="parrafo">Este es el color a cambiar</p>
</body>
<script>
    document.getElementById("color").addEventListener('change', function(e) {
        xajax_estadoColor(document.getElementById("color").value);
     });
   
                                  
</script>
</html>