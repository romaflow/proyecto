<?php
/**
 * funcion para convertir un arreglo en un Objeto
 * llamar de la siguinete manera:
 * miObject->atributo
 * @param mixed $array
 */
function to_object($array)
{
    return json_decode(json_encode($array));
}



?>