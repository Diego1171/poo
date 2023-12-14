<?php
require_once ('./conexion.php');
class invitado{
    private $Id_invitado;
    private $Correo;
    private $Nombres;
    private $Apellidos;
    private $Documento;
    private $Numero;

    const TABLA = 'invitado';

    public function getId_invitado(){
        return $this->Id_invitado;
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
    public function setNumero($Numero){
        $this->Numero = $Numero;
    }

    public function __construct(  $Correo,$Nombres,$Apellidos,$Documento,$Numero, $Id_invitado=null){
      $this ->Id_invitado = $Id_invitado;
      $this ->Correo= $Correo;
      $this ->Nombres = $Nombres;
      $this ->Apellidos = $Apellidos;
      $this ->Documento = $Documento;
      $this ->Numero = $Numero;
      $this ->Id_invitado = $Id_invitado;
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
            $this->Id_invitado = $conexion->lastInsertid();
        }
        $conexion = null;
    }

    public static function mostrar(){
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT  Id_invitado, Correo, Nombres, Apellidos, Documento, Numero  FROM 
            ' . self::TABLA . ' ORDER BY Id_invitado');
            $consulta -> execute();
            $registros = $consulta->fetchAll();
            return $registros;

    }

public function editarinvitado($id){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET  Correo= :Correo,  Nombres = :Nombres, Apellidos=:Apellidos, Documento=:Documento, Numero=:Numero WHERE Id_invitado = :id');
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

public static function mostrarinvitado($Id_invitado){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT *  FROM ' . self::TABLA . ' WHERE Id_invitado = :Id_invitado');
    $consulta->bindParam(':Id_invitado', $Id_invitado);
    $consulta -> execute();
    $registros = $consulta->fetch();
    return $registros;
}

public function eliminarinvitado($id){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA .' WHERE Id_invitado = :id');
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

