<?php
include_once("Model.php");
include_once("ModelObject.php");

class Disco extends ModelObject{
    public $id;
    public $titulo;
    public $anho;
    public $banda;

    function __construct($titulo, $anho, $banda, $id = null){
        $this->titulo = $titulo;
        $this->anho = $anho;
        $this->banda = $banda;
        $this->id = $id;
    }

    public static function fromJson($json): ModelObject
    {
        $data = json_decode($json);
        return new Disco($data->titulo, $data->anho, $data->banda, $data->id);
    }

    public function toJson(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT);
    } 
}

class DiscoModel extends Model{
    public function getAll(){
        $sql = "SELECT * FROM disco";
        $pdo = self::getConnection();
        $resultado = [];
        try {
            $statement = $pdo->query($sql);
            foreach ($statement as $disco) {
                $new = new Disco($disco['titulo'], 
                                    $disco['anho'], 
                                    $disco['banda'], 
                                    $disco['id']);
                $resultado[] = $new;
            }
        } catch (PDOException $th) {
            error_log("Erroe DiscoModel->getAll()");
            error_log($th->getMessage());
        }finally{
            $pdo = null;
            $statement = null;
        }

        return $resultado;
    }

    public function get($discoId):Disco|null{
        $sql = "SELECT * FROM disco WHERE id=?";
        $pdo = self::getConnection();
        $resultado = null;
        try {
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1,$discoId, PDO::PARAM_INT);
            $statement->execute();
            if ($d = $statement->fetch()) {
                $resultado = new Disco($d['titulo'], $d['anho'], $d['banda'], $d['id']);
            }
        } catch (PDOException $th) {
            error_log("Error DiscoModel->get($discoId)");
            error_log($th->getMessage());
        }finally{
            $pdo = null;
            $statement = null;
        }

        return $resultado;
    }

    public function insert($disco){
        $sql = "INSERT INTO disco(titulo,anho,banda) VALUES (:titulo,:anho,:banda)";
        $pdo = self::getConnection();
        $resultado = false;
        try {
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":titulo", $disco->titulo, PDO::PARAM_STR);
            $statement->bindValue(":anho", $disco->anho, PDO::PARAM_INT);
            $statement->bindValue(":banda", $disco->banda, PDO::PARAM_INT);
            $resultado = $statement->execute();
        } catch (PDOException $th) {
            error_log("Error DiscoModel->insert(".$disco->toJson.")");
            error_log($th->getMessage());
        }finally{
            $pdo = null;
            $statement = null;
        }

        return $resultado;
    }

    public function update($disco, $id){
        $sql = "UPDATE disco SET titulo=:titulo,anho=:anho,banda=:banda WHERE id=:id";
        $pdo = self::getConnection();
        $resultado = false;
        try {
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":titulo",$disco->titulo, PDO::PARAM_STR);
            $statement->bindValue(":anho",$disco->anho, PDO::PARAM_INT);
            $statement->bindValue(":banda",$disco->banda, PDO::PARAM_INT);
            $statement->bindValue(":id",$id, PDO::PARAM_INT);
            $resultado = $statement->execute();
            $resultado = $statement->rowCount()==1;
        } catch (PDOException $th) {
            error_log("Error DiscoModel->update(".implode(",",$disco)."$id)");
            error_log($th->getMessage());
        }finally{
            $pdo = null;
            $statement = null;
        }

        return $resultado;
    }

    public function delete($id){
        $sql = "DELETE FROM disco WHERE id=?";
        $pdo =self::getConnection();
        $resultado = false;
        try {
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $id, PDO::PARAM_INT);
            $resultado = $statement->execute();
        } catch (PDOException $th) {
            error_log("Error DiscoModel->delete($id)");
            error_log($th->getMessage());
        }finally{
            $statement = null;
            $pdo = null;
        }

        return $resultado;
    }
}
