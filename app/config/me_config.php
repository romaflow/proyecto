<?php

// saber si estamos trabajando en local o en un servidor
define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']) ? true : false);

// definir el timezone del sistema
date_default_timezone_set('America/Bolivia/La_Paz');

// lenguaje
define('LANGUAGE', 'es');

// ruta base del proyecto CAMBIAR ESTO SI SE SUBE A UN SERVIDOR
define('BASE_PATH', IS_LOCAL ? '/romaflow/proyecto/' : '____EL BASEPATH DEL SERVIDOR___');

// Sal del sistema, concadena una cadena aleatoria para mejorar la seguridad de las cookies
define('AUTH_SALT', 'romaflow');

// definir el puerto y la url del sitio con rutas absolutas.
define('PORT', '8848');
define('URL', IS_LOCAL ? 'http://127.0.0.1:' . 'PORT' . 'BASE_PATH' : '___URL DEL SERVIDOR___');

// rutas de nuestro sistema de directorios y archivos
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd() . DS);

define('APP', ROOT . 'app' . DS);
define('CLASSES', APP . 'classes' . DS);
define('CONFIG', APP . 'config' . DS);
define('CONTROLLERS', APP . 'controllers' . DS);
define('FUNCTIONS', APP . 'functions' . DS);
define('MODELS', APP . 'models' . DS);

define('TEMPLATES', ROOT . 'templates' . DS);
define('INCLUDES', TEMPLATES . 'includes' . DS);
define('MODULES', TEMPLATES . 'modules' . DS);
define('VIEWS', TEMPLATES . 'views' . DS);

// rutas de archivos de assets.
define('ASSETS', URL . 'assets/');
define('CSS', ASSETS . 'css/');
define('FAVICON', ASSETS . 'favicon/');
define('FONTS', ASSETS . 'fonts/');
define('IMAGES', ASSETS . 'images/');
define('JS', ASSETS . 'js/');
define('PLUGINS', ASSETS . 'plugins/');
define('UPLOADS', ASSETS . 'uploads/');

// credenciales remoto y local de la base de datos
// set para conexion local o de desarrollo

define('LDB_ENGINE', 'mysql');
define('LDB_HOST', 'localhost');
define('LDB_NAME', 'romaflow');
define('LDB_USER', 'root');
define('LDB_PASS', '');
define('LDB_CHARSET', 'utf8');

// set para conexion en prudccion o servidor real
define('DB_ENGINE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', '___REMOTE_DB___');
define('DB_USER', '___REMOTE_DB___');
define('DB_PASS', '___REMOTE_DB___');
define('DB_CHARSET', '___REMOTE_DB___');



?>