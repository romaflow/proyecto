<?php
class Me
{
    // Propiedades del framework
    private $framework = 'Me Framework';
    private $version = '1.0.0';
    private $uri = [];
    private $current_controller = '';
    private $current_method = '';

    // funcion principal  contructor
    public function __construct()
    {
        $this->init();
        // Parametro _GET
        $this->filter_url();
        //print_r($this->uri);
    }

    /** 
     * inicializa todos los metodos requeridos de forma 
     * subsecuente
     * @return void 
     */
    private function init()
    {
        $this->init_sesion();
        $this->init_load_config();
        $this->init_load_functions();
        $this->init_auto_load();
        $this->dispatch();
    }

    /**
     * Método para iniciar la sesion en el sistema
     * por buenas practicas
     * @return void
     */
    public function init_sesion()
    {
        if (!session_start()) {
            session_start();
        }
        return;
    }

    /**
     * Cargar nuestro archivo de configuracion
     * @return void
     */

    private function init_load_config()
    {
        $file = 'me_config.php';

        // si no existe el archivo
        if (!is_file('app/config/' . $file)) {
            die(sprintf('<br>El archivo %s no se encuentra, es requerido para que la %s funcione.', $file, $this->framework));
        }

        // cargando el archivo de configuración
        require_once('app/config/' . $file);
        return;
    }

    /**
     * Metodo para cargar todas las funciones del sistema 
     * y del usuario
     * @return void
     */
    private function init_load_functions()
    {
        $file = 'me_core_functions.php';
        // si no existe el archivo
        if (!is_file(FUNCTIONS . $file)) {
            die(sprintf('<br>El archivo %s no se encuentra, es requerido para que la %s funcione.', $file, $this->framework));
        }

        // cargando el archivo de funciones core
        require_once(FUNCTIONS . $file);

        $file = 'me_custom_functions.php';

        // si no existe el archivo
        if (!is_file(FUNCTIONS . $file)) {
            die(sprintf('<br>El archivo %s no se encuentra, es requerido para que la %s funcione.', $file, $this->framework));
        }

        // cargando el archivo de funciones custom
        require_once(FUNCTIONS . $file);

        return;
    }

    /**
     * Cargar todas las clases
     * @return void
     */

    private function init_auto_load()
    {
        require_once(CLASSES . 'Db.php');
        require_once(CLASSES . 'Model.php');
        require_once(CLASSES . 'Controller.php');

        // controlador por default
        require_once(CONTROLLERS . DEFAULT_CONTROLLER . 'Controller.php');
        require_once(CONTROLLERS . DEFAULT_ERROR_CONTROLLER . 'Controller.php');
        require_once(CONTROLLERS . 'UserController.php');
        return;
    }



    /**
     * Filtrar y descomponer los elementos de nuestra URL y URI
     * http://localhost:8848/romaflow/proyecto/controller/123
     * URL: controller/123
     * URI: http://localhost:8848/romaflow/proyecto/
     * @return void
     */
    private function filter_url()
    {
        // saber si esta setteado nuestra uri
        if (isset($_GET['uri'])) {
            $this->uri = $_GET['uri'];
            // limpieza el ultimo / de la URi
            $this->uri = rtrim($this->uri, '/');
            // filtrar nuestra URL
            $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
            // separar la uri en un array, toto en minusculas
            $this->uri = explode('/', strtolower($this->uri));
            return $this->uri;
        }
        return;
    }

    /**
     * Ejecucion del me framework
     * metodo para ejecutar y cargar de forma automatica el controlador solicitado por el usuario
     * su metodo y pasar parametros a error
     * @return void
     */
    private function dispatch()
    {
        // filtrar la url y separar la uri
        $this->filter_url();

        //--------------CONTROLADOR----------------
        // nesesitamos saber si se esta pasando el nombre de un controlador en la URI
        // $this->uri[0] es el controlador por defecto
        // print_r($this->uri);
        if (isset($this->uri[0])) {
            // definimos el nombre de controlador
            $this->current_controller = ucfirst($this->uri[0]) . 'Controller'; // UserController
            unset($this->uri[0]); // destroy array [0]          
        } else {
            $this->current_controller = ucfirst(DEFAULT_CONTROLLER) . 'Controller';// HomeController
        }

        // verificamos que el controlador exista y la clase exista   
        $controllerClass = $this->current_controller;
        if (!class_exists($controllerClass)) {
            $this->current_controller = ucfirst(DEFAULT_ERROR_CONTROLLER) . 'Controller';// ErrorController
        }
        // echo $this->current_controller;

        //--------------METODO------------------
        // Ejecutar El Método solicitado
        // $this->uri[1] es el método por defecto
        if (isset($this->uri[1])) {
            // limpiar el método
            $method = str_replace('-', '_', $this->uri[1]);
            // si existe el método
            if (!method_exists($this->current_controller, $method)) {
                $this->current_controller = ucfirst(DEFAULT_ERROR_CONTROLLER) . 'Controller';// ErrorController
                $this->current_method = DEFAULT_METHOD; // index
            } else {
                $this->current_method = $method; // index
            }
            unset($this->uri[1]); // destroy Array[1]
        } else {
            $this->current_method = DEFAULT_METHOD; // index
        }
        // imprimir el controlador y metodo actual
        // echo $this->current_controller . '<br>';
        // echo $this->current_method . '<br>';

        //--------------EJECUTAR------------------
        // Ejecutar el controlador y el metodo según sea haga petición
        $miController = new $this->current_controller; // Creamos el Objeto
        //print_r($miController);
        $params = array_values(empty($this->uri) ? [] : $this->uri); // sacar los parametros del metodo
        // print_r($params);
        // print_r($this->uri);

        if (empty($params)) {
            call_user_func([$miController, $this->current_method]);
        } else {
            call_user_func_array([$miController, $this->current_method], $params);
        }
        return;
    }

}
?>