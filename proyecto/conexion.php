<?php
class conexion extends PDO
{
    private $tipo_de_base = "mysql";
    private $host = "localhost";
    private $nombre_de_base = "proyecto";
    private $usuario = "root";
    private $contrasena = "";

    
    public function __construct()
    {
        try {
            parent::__construct(
                "{$this->tipo_de_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8",
                $this->usuario,
                $this->contrasena,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            throw new Exception("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }
}
?>