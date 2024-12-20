<?php
include("globals.php");
include(MODEL_PATH."escuela-model.php");
include(VIEW_PATH."View.php");
class EscuelaController{
    
    public function listar_escuelas(){
        $nombre_filter = $_REQUEST['nombre'] ?? '';
        $cod_municipio_filter = ($_REQUEST['municipio'] && $_REQUEST["municipio"]="")?$_REQUEST['municipio']: null;

        $escuelas = EscuelaModel::get_escuelas($cod_municipio_filter,$nombre_filter);
        $municipios = MunicipioModel::get_municipios();

        $view = new View();
        //Cargamos los datos para pasarle a la vista
        $data = [];
        $data['escuelas'] = $escuelas;
        //TODO: Recuperar municipios.
        $data['municipios'] = $municipios;
        $view->show('listar-escuelas',$data);

    }
    public function add_escuelas(){
        
    }
}