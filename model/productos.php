<?php
require_once 'model/conexion.php';
class EquipoModel
{
    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new Conexion();
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public function getProductos()
    {
        $conexion = $this->connection->getConnection();

        $sentence = $conexion->prepare("SELECT * FROM productos");
        $sentence->execute();
        $sentence->setFetchMode(PDO::FETCH_OBJ);
        $productos = $sentence->fetchAll();
        return $productos;
    }

    


    public function getProducto($id){
        $conexion = $this->connection->getConnection();

        $sentence = $conexion->prepare("SELECT * FROM productos
                                        WHERE id_productos=?
                                        ");
        $sentence->execute(array($id));
        $producto = $sentence->fetch(PDO::FETCH_ASSOC);
        return $producto;
    }

}