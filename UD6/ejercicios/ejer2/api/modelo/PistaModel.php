<?php
include_once('Model.php');
include_once('ModelObject.php');

class Pista extends ModelObject {
    public $id_disco;
    public $numero;
    public $titulo;
    public $duracion;

    function __construct($id_disco, $numero, $titulo, $duracion) {
        $this->id_disco = $id_disco;
        $this->numero = $numero;
        $this->titulo = $titulo;
        $this->duracion = $duracion;
    }

    public static function fromJson($json): ModelObject {
        $data = json_decode($json);
        return new Pista($data->id_disco, $data->numero, $data->titulo, $data->duracion);
    }

    public function toJson(): string {
        return json_encode($this, JSON_PRETTY_PRINT);
    }
}

class PistaModel extends Model {
    public function getAll() {
        $pdo = self::getConnection();
        $sql = "SELECT * FROM pista";
        $resultado = [];
        try {
            $stm = $pdo->prepare($sql);
            $stm->execute();
            foreach ($stm as $p) {
                $pista = new Pista($p['id_disco'], $p['numero'], $p['titulo'], $p['duracion']);
                $resultado[] = $pista;
            }
        } catch (PDOException $e) {
            error_log('Error al recuperar las pistas de la base de datos: '.$e->getMessage());
        } finally {
            $stm = null;
            $pdo = null;
        }
        return $resultado;
    }

    public function get($id_disco, $numero):Pista|null {
        $pdo = self::getConnection();
        $sql = 'SELECT * FROM pista WHERE id_disco=? AND numero=?';
        $resultado = null;
        try {
            $stm = $pdo->prepare($sql);
            $stm->bindValue(1, $id_disco, PDO::PARAM_INT);
            $stm->bindValue(2, $numero, PDO::PARAM_INT);
            $stm->execute();
            if ($p = $stm->fetch()) {
                $resultado = new Pista($p['id_disco'], $p['numero'], $p['titulo'], $p['duracion']);
            }
        } catch (PDOException $e) {
            error_log('Error al recuperar la pista de la base de datos: '.$e->getMessage());
        } finally {
            $stm = null;
            $pdo = null;
        }
        return $resultado;
    }

    public function insert($pista) {
        $pdo = self::getConnection();
        $sql = 'INSERT INTO pista (id_disco, numero, titulo, duracion) VALUES (:id_disco, :numero, :titulo, :duracion)';
        $resultado = false;
        try {
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':id_disco', $pista->id_disco, PDO::PARAM_INT);
            $stm->bindValue(':numero', $pista->numero, PDO::PARAM_INT);
            $stm->bindValue(':titulo', $pista->titulo, PDO::PARAM_STR);
            $stm->bindValue(':duracion', $pista->duracion, PDO::PARAM_INT);
            $resultado = $stm->execute();
        } catch (PDOException $e) {
            error_log('Error al insertar la pista en la base de datos: '.$e->getMessage());
        } finally {
            $stm = null;
            $pdo = null;
        }
        return $resultado;
    }

    public function update($pista, $id_disco, $numero) {
        $pdo = self::getConnection();
        $sql = 'UPDATE pista SET titulo=:titulo, duracion=:duracion WHERE id_disco=:id_disco AND numero=:numero';
        $resultado = false;
        try {
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':titulo', $pista->titulo, PDO::PARAM_STR);
            $stm->bindValue(':duracion', $pista->duracion, PDO::PARAM_INT);
            $stm->bindValue(':id_disco', $id_disco, PDO::PARAM_INT);
            $stm->bindValue(':numero', $numero, PDO::PARAM_INT);
            $resultado = $stm->execute();
        } catch (PDOException $e) {
            error_log('Error al modificar la pista en la base de datos: '.$e->getMessage());
        } finally {
            $stm = null;
            $pdo = null;
        }
        return $resultado;
    }

    public function delete($id_disco, $numero) {
        $pdo = self::getConnection();
        $sql = 'DELETE FROM pista WHERE id_disco=? AND numero=?';
        $resultado = false;
        try {
            $stm = $pdo->prepare($sql);
            $stm->bindValue(1, $id_disco, PDO::PARAM_INT);
            $stm->bindValue(2, $numero, PDO::PARAM_INT);
            $resultado = $stm->execute();
        } catch (PDOException $e) {
            error_log('Error al eliminar la pista de la base de datos: '.$e->getMessage());
        }
        return $resultado;
    }
}
