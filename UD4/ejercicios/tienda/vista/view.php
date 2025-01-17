<?php
namespace tienda\vista;
class View{
    public function show($nombre, $data = null){
        include($nombre.'-view.php');
    }
}