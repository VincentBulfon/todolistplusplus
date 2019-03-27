<?php
function view($name, $data=[])
{
    extract($data); //récupères les données d'un array et les met dans des variables
    return require "./app/views/{$name}.views.php";
}
