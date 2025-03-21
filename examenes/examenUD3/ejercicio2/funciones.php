<?php
// Definicion de constantes de la BD
define('DB_DSN', 'mysql:host=mariadb;dbname=ejercicio2');
define('DB_USER', 'root');
define('DB_PASS', 'bitnami');

/**
 * Devuelve una conexion con la base de datos.
 *
 * @return PDO
 */
function conexion_bd()
{
    try {
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        die('Fallo en la conexión de con la BD. ' . $e->getMessage());
    }
    return $db;
}

/**
 * Realiza un alta de usuario y devuelve true. Si algo falla devuelve un mensaje de error.
 *
 * @param string $nombre Nombre del usuario
 * @param string $ap1 Primer apellido del usuario
 * @param string $ap2 Segundo apellido del usuario
 * @param string $mail Correo del usuario.
 * @param string $nic Nombre del usuario en el sistema. 
 * @param string $pass Contrasenha
 * @param string $pass2 Verificación de contraseanha.
 * @return boolean|string
 */
function alta_usuario(
    string $nombre,
    string $ap1,
    $ap2,
    string $mail,
    string $nic,
    string $pass,
    string $pass2
): bool{


    //Comprobamos que no exista un usuario con ese nic o correo.
    $sql = 'SELECT COUNT(*) AS num_usr FROM USUARIO WHERE nic=? OR mail=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $nic, PDO::PARAM_STR);
    $query->bindParam(2, $mail, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch();

    if (isset($result['num_usr']) && $result['num_usr'] > 0) {
        return 'El nombre de usuario y/o el correo ya existen.';
    }
    //Cerramos el cursor.
    $query->closeCursor();

    //Calculamos el hash de la contraseña
    $pass = sha1($pass);

    //Preparamos la consulta para insertar el nuevo usuario
    $sql = 'INSERT INTO USUARIO(nombre,apellido1,apellido2,mail,pass,nic) VALUES (:nombre, :ap1, :ap2, :mail, :pass, :nic)';
    $query = $conexion->prepare($sql);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':ap1', $ap1);
    $query->bindParam(':ap2', $ap2);
    $query->bindParam(':mail', $mail);
    $query->bindParam(':pass', $pass);
    $query->bindParam(':nic', $nic);
    $toret = false;
    try {
        $toret = $query->execute();
    } catch (PDOException $e) {
        error_log("Error dando de alta al usuario.");
        error_log($e->getMessage());
    } finally {
        $query = null;
        $conexion = null;
    }

    return $toret;
}

function comprobar_usuario(string $nic, string $pass): bool
{
    $sql = 'SELECT COUNT(*) AS num_usr FROM USUARIO WHERE nic=? AND pass=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $nic, PDO::PARAM_STR);
    $query->bindValue(2, sha1($pass), PDO::PARAM_STR);
    try {
        $query->execute();
        $result = $query->fetch();
        $toret = isset($result['num_usr']) && $result['num_usr'] == 1;
    } catch (PDOException $th) {
        error_log("Error comprobando usuario nic = $nic y pass= $pass");
        error_log($th->getMessage());
        $toret = false;
    } finally {
        $query = null;
        $conexion = null;
    }

    return $toret;
}


/*funcion que autentica al usuario*/
function inicioSesion($nombre){
    session_start();
    $_SESSION["nic"] = $nombre;
}

/*funcion que verifica si existe un usuario autenticado */
function comprobarSesion(){
    $flag = false;
    if (isset($_SESSION["nic"])) {
        $flag = true;
    }

    return $flag;
}
