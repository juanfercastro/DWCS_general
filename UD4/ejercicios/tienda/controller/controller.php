<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ejercicios/tienda/view/View.php');
class Controller{
 protected View $view;
 
 public function __construct(){
    $this->view = new View();
 }
}