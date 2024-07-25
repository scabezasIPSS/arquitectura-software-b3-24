<?php

class Controlador
{
    private $lista;

    public function __construct()
    {
        $this->lista = []; //indicamos que es una lista de objetos
    }

    public function getAll()
    {
        include_once '../database/conexion.php';
        include_once './mantenedorModel.php';
        $con = new Conexion();
        $sql = "SELECT id, nombre, activo FROM mantenedor";
        $rs = mysqli_query($con->getConnection(), $sql); //resultSet: resultado de la ejecución de la query
        if ($rs) {
            while ($registro = mysqli_fetch_assoc($rs)) {
                //es una estructura de COLA: FIFO: FirstIn FirstOut 3,4,5,6...
                $nuevo = new Objeto();
                $nuevo->setId($registro['id']);
                $nuevo->setNombre($registro['nombre']);
                $nuevo->setActivo($registro['activo'] == 1 ? true : false);
                //var_dump($nuevo);
                array_push($this->lista, [
                    "id" => $nuevo->getId(),
                    "nombre" => $nuevo->getNombre(),
                    "activo" => $nuevo->isActivo()
                ]);
            }
        }
        $con->closeConnection();
        // return 'Controlador->funcion getAll';
        return $this->lista;
    }
}
