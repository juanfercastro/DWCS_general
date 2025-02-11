<?php
include_once("controller.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/ejercicios/tienda/model/ClienteModel.php");

class ClienteController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function listar(){
        $data = [];
        $data['clientes'] = ClienteModel::getClientes();
        $this->view->show('lista-clientes', $data);
    }

    public function altaForm(){
        $this->view->show('alta-cliente');
    }

    public function addCliente(){
        $nombre = $_POST['nombre']??null;
        $apellidos = $_POST['apel']??null;
        $telefono = $_POST['tel']??null;
        $mail = $_POST['mail']??null;

        $error = '';
        if (!isset($nombre)  || strlen($nombre)>40) {
            $error = 'El nombre es obligatorio y no puede ser mayor a 40 caracteres.<br>';
        }
        if (!isset($apellidos) || strlen($apellidos)>80) {
            $error.='Los apellidos son obligatorios y no pueden ser mayores a 80 caracteres.<br>';
        }
        if (!isset($telefono) || !filter_var($telefono, FILTER_SANITIZE_NUMBER_INT) || strlen($telefono)!=9) {
            $error.='Formato de telefono incorrecto.<br>';
        }
        if (!isset($mail) || !filter_var($mail,FILTER_VALIDATE_EMAIL)) {
            $error.= 'Formato del email incorrecto.<br>';
        }

        $data = [];
        if (empty($error)) {
            if (ClienteModel::addCliente(new Cliente($nombre, $apellidos, $telefono, $mail))) {
                $this->listar();
            }else{
                $error.= 'Error en la subida del cliente';
            }
        }

        if (!empty($error)) {
           $data['errores'] = $error;
           $this->view->show('alta-cliente', $data); 
        }

    }
}