<?php

//les pages statiques
$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');

//les tâches
$router->get('tasks', 'TasksController@index');