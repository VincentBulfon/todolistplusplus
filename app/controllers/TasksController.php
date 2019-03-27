<?php

namespace App\Controllers;


class TasksController
{
 public function index(){
     //recupérer les tâches que l'on veut

     return view('tasks/index');
 }
}