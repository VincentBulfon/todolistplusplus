<?php
require 'vendor/autoload.php';
require 'sonata/helpers.php';
//require 'sonata/Request.php';//can be comment because autoload will charge them
//require 'sonata/Router.php';//can be comment because autoload will charge them

use Sonata\{Router,Request};

try{
   Router::load('./app/routes.php')->dispatch(Request::uri(), Request::method());
}catch (Exeption $e){
    die($e->getMessage());
}