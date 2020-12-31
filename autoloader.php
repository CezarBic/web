<?php

spl_autoload_register(function($className) {
    $path = "./classes/".$className.".php";
    if (file_exists($path)) {
        include $path;
        
    }else{
        echo "Sorry this file does not exist!";
    }
   
});