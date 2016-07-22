<?php

function __autoload($class_name){

    $array_path = [
        '/models/',
        '/components/',
        '/category/',
    ];
    
    foreach ($array_path as $path){
        $path = ROOT. $path . $class_name. '.php';

        if (is_file($path)){
            include $path;
        }
    }

}

?>