<?php
include_once("controller.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/ejercicios/tienda/model/ProductoModel.php");

class ProductoController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function listar(){
        $data = array();
        $data['productos'] = ProductoModel::getProductos();
        $this->view->show('lista-productos', $data);
    }

    public function altaForm(){
        $this->view->show('alta-producto');
    }

    public function addProducto(){
        $nombre = $_POST['denom']??null;
        $descripcion = $_POST['desc']??null;
        $precio = $_POST['precio']??null;
        $cantidad = $_POST['cant']??null;

        $error = '';

        if (!isset($nombre) || strlen($nombre)>50) {
            $error = 'El nombre es obligatorio y no puede ser mayor a 50 caracteres.<br>';
        }
        if (!isset($descripcion) || strlen($descripcion)>250) {
            $error.='La descripcion es opbligatoria y no puede ser mayor a 250.<br>';
        }
        if (!isset($precio) || !filter_var($precio, FILTER_VALIDATE_FLOAT)) {
            $error.='Formato del precio incorrecto.<br>';
        }
        if (!isset($cantidad) || !filter_var($cantidad, FILTER_SANITIZE_NUMBER_INT)) {
            $error.='Formato de la cantidad incorrecto.<br>';
        }

        $data = [];
        if (empty($error)) {
            if (ProductoModel::addProducto( $nombre, $descripcion, $precio, $cantidad)) {
                $this->listar();
            }else{
                $error.= 'Se ha producido un error registrando el propducto';
            }
        }

        if (!empty($error)) {
            $data['errores'] = $error;
            $this->view->show('alta-producto',$data);
        }
    }
}