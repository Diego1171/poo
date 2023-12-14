<?php
require_once ('./conexion.php');
class Usuario{
    private $Id_usuario;
    private $Correo;
    private $Nombres;
    private $Apellidos;
    private $Documento;
    private $Numero;

    const TABLA = 'usuario';

    public function getId_usuario(){
        return $this->Id_usuario;
    }
    public function getCorreo(){
        return $this->Correo;
    }
    public function getNombres(){
        return $this->Nombres;
    }
    public function getApellidos(){
        return $this->Apellidos;
    }
    public function getDocumento(){
        return $this->Documento;
    }
    public function getNumero(){
        return $this->Numero;
    }
 
    
    public function setNombres($Nombres){
        $this->Nombres = $Nombres;
    }
    public function setApellidos($Apellidos){
        $this->Apellidos = $Apellidos;
    }
    public function setDocumento($Documento){
        $this->Documento = $Documento;
    }
    public function setNumero($c){
        $this->Numero = $Numero;
    }

    public function __construct(  $Correo,$Nombres,$Apellidos,$Documento,$Numero, $Id_usuario=null){
      $this ->Id_usuario = $Id_usuario;
      $this ->Correo= $Correo;
      $this ->Nombres = $Nombres;
      $this ->Apellidos = $Apellidos;
      $this ->Documento = $Documento;
      $this ->Numero = $Numero;
      $this ->Id_usuario = $Id_usuario;
    }
    public function guardar(){
            
        {
            $conexion = new Conexion();
            
            $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .' ( Correo, Nombres, Apellidos, Documento, Numero ) VALUES ( :Correo, :Nombres, :Apellidos, :Documento, :Numero)');
            $consulta -> bindParam(':Correo', $this->Correo);
            $consulta -> bindParam(':Nombres', $this->Nombres);
            $consulta -> bindParam(':Apellidos', $this->Apellidos);
            $consulta -> bindParam(':Documento', $this->Documento);
            $consulta -> bindParam(':Numero', $this->Numero);
            $consulta->execute();
            $this->Id_usuario = $conexion->lastInsertid();
        }
        $conexion = null;
    }

    public static function mostrar(){
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT  Id_usuario, Correo, Nombres, Apellidos, Documento, Numero  FROM 
            ' . self::TABLA . ' ORDER BY Id_usuario');
            $consulta -> execute();
            $registros = $consulta->fetchAll();
            return $registros;

    }

public function editarusuario($id){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET  Correo= :Correo,  Nombres = :Nombres, Apellidos=:Apellidos, Documento=:Documento, Numero=:Numero WHERE Id_usuario = :id');
    $consulta -> bindParam(':Correo', $this->Correo);
            $consulta -> bindParam(':Nombres', $this->Nombres);
            $consulta -> bindParam(':Apellidos', $this->Apellidos);
            $consulta -> bindParam(':Documento', $this->Documento);
            $consulta -> bindParam(':Numero', $this->Numero);   
    $consulta->bindParam(':id', $id); 
    echo "Consulta ok";
    try {
        $consulta->execute();
    } catch (PDOException $e) {
       
        echo "Error al editar la categoría: " . $e->getMessage();
    } finally {
        $conexion = null; 
    }
}

public static function mostrarusuario($Id_usuario){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT *  FROM ' . self::TABLA . ' WHERE Id_usuario = :Id_usuario');
    $consulta->bindParam(':Id_usuario', $Id_usuario);
    $consulta -> execute();
    $registros = $consulta->fetch();
    return $registros;
}

public function eliminarusuario($id){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA .' WHERE Id_usuario = :id');
    $consulta->bindParam(':id', $id); 
    try {
        $consulta->execute();
    } catch (PDOException $e) {
       
        echo "Error al editar la categoría: " . $e->getMessage();
    } finally {
        $conexion = null; 
    
    }
}
}

?>


    