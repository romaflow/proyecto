<?php
class UserController
{
    public function __construct()
    {
        //echo 'Ejecutando ' . __CLASS__;
    }

    public function ver($id = null, $nombre_usuario = null)
    {
        printf('<br> ver el usuario con id %d con nombre %s', $id, $nombre_usuario);

    }
    public function agregar()
    {
        echo '<br>agregar Usuarios';
    }
    public function actualizar()
    {
        echo '<br>actualizar Usuarios';
    }

    public function borrar()
    {
        echo '<br>borrando Usuarios';
    }
}


?>