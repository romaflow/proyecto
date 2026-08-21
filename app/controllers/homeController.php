<?php
class HomeController
{
    public function __construct()
    {
    }

    public function index()
    {
        //require_once(VIEWS . 'testView.php');
        // echo 'BIENVENIDO';
        $data = ['id' => 1, 'titulo' => 'PAGINA PRUEBA'];
        $data = to_object($data);
        // echo $data->id;
        // El array convertirlo en Objeto. y manipularlo de la siguiente manera
        // 
        View::render('test', $data);


    }
}


?>