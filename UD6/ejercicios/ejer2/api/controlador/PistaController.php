<?php
include_once("Controller.php");
include_once(PATH_MODEL."PistaModel.php");
class PistaController extends Controller{
    public function get($id){
        $model = new PistaModel();
        
        if (count($id) != 2) {
            Controller::sendNotFound("Las pistas se identifican por id_disco y número.");
            die();
        }
        
        $pista = $model->get($id[0], $id[1]);
        
        if ($pista == null) {
            Controller::sendNotFound("El id no se corresponde con ninguna pista.");
            die();
        }
        
        echo $pista->toJson();
    }

    public function getAll(){
        $model = new PistaModel();
        $pistas = $model->getAll();
        echo json_encode($pistas, JSON_PRETTY_PRINT);
    }
    
    public function insert($object){
        $model = new PistaModel();
        $pista = Pista::fromJson($object);
        
        if ($model->insert($pista)) {
            echo "Pista insertada.";
        } else {
            Controller::sendNotFound("No se ha podido insertar");
        }    
    }
    
    public function update($id, $object){
        if (count($id) != 2) {
            Controller::sendNotFound("Las pistas se identifican por id_disco y número.");
            die();
        }

        $model = new PistaModel();
        $pista = Pista::fromJson($object);

        if ($model->update($pista, $id[0], $id[1])) {
            echo "Pista modificada";
        } else {
            Controller::sendNotFound("No se ha podido modificar");
        }
    }

    public function delete($id) {
        if (count($id) != 2) {
            Controller::sendNotFound("Las pistas se identifican por id_disco y número.");
            die();
        }

        $model = new PistaModel();
        if ($model->delete($id[0], $id[1])) {
            echo "Pista eliminada";
        } else {
            Controller::sendNotFound("No se ha podido eliminar");
        }
    }
}