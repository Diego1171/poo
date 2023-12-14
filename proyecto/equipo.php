<?php
require_once('./conexion.php');

class equipo {
    private $Id_equipo;
    private $Marca;
    private $Descripcion;

    const TABLA = 'equipo';

    public function getId_equipo() {
        return $this->Id_equipo;
    }
 
    public function getMarca() {
        return $this->Marca;
    }

    public function getDescripcion() {
        return $this->Descripcion;
    }
    

    public function setMarca($Marca) {
        $this->Marca = $Marca;
    }
    public function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }


    public function __construct($Marca,$Descripcion, $Id_equipo= null) {
        $this->Id_equipo = $Id_equipo;
        $this->Marca = $Marca;
        $this->Descripcion = $Descripcion;
    }

    public function guardar(){
            
        {
            $conexion = new Conexion();
            
            $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .' ( Marca, Descripcion) VALUES ( :Marca, :Descripcion)');
            $consulta -> bindParam(':Marca', $this->Marca);
            $consulta -> bindParam(':Descripcion', $this->Descripcion);
            $consulta->execute();
            $this->Id_equipo = $conexion->lastInsertid();
        }
        $conexion = null;
    }

    public static function mostrar(){
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT  Id_equipo, Marca, Descripcion  FROM 
            ' . self::TABLA . ' ORDER BY Id_equipo');
            $consulta -> execute();
            $registros = $consulta->fetchAll();
            return $registros;

    }
    public function editarequipo($id){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET  Descripcion=:Descripcion, Marca=:Marca WHERE Id_equipo = :id');
        $consulta -> bindParam(':Marca', $this->Marca);
        $consulta -> bindParam(':Descripcion', $this->Descripcion);
        $consulta -> bindParam(':id', $id); 
        echo "Consulta ok";
        try {
            $consulta->execute();
        } catch (PDOException $e) {
           
            echo "Error al editar la categoría: " . $e->getMessage();
        } finally {
            $conexion = null; 
        }
    }
    
    public static function mostrarequipo($Id_equipo){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT *  FROM ' . self::TABLA . ' WHERE Id_equipo = :Id_equipo');
        $consulta->bindParam(':Id_equipo', $Id_equipo);
        $consulta -> execute();
        $registros = $consulta->fetch();
        return $registros;
    }
    
    public function eliminarequipo($id){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA .' WHERE Id_equipo = :id');
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