<?php


if (!defined('BASE_PATH'))
{
    define('BASE_PATH', dirname(__FILE__) . '/');

    require_once BASE_PATH . "config/funcoes.php";
    
    spl_autoload_register(function($class_name) {

        $dirs = array(
            'model/',
            'controller/',
        );

        foreach ($dirs as $dir)
        {
            $class = explode('\\', $class_name);
            $i = count($class) - 1;

            if (file_exists(BASE_PATH . $dir . $class[$i] . '.php'))
            {
                require_once BASE_PATH . $dir . $class[$i] . '.php';
            }
        }
    });
}
