<?php
class View
{
    public static function render($view, $data = [])
    {
        // convertir el array asosiativo en objeto
        $miObjeto = to_object($data); // convetir un array en un objeto

        // validamos si existe el archivo
        if (!file_exists(VIEWS . CONTROLLER . DS . $view . 'View.php')) {
            die(printf('No existe, la vista %sView en la carpeta %s', $view, CONTROLLER));
        }
        require_once(VIEWS . CONTROLLER . DS . $view . 'View.php');
        exit();
    }

}
?>