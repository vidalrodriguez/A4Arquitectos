<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Proyecto extends ResourceController
{
    protected $modelName = 'App\Models\ProyectoModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $proyecto = $this->model->find($id);
        return $this->respond($proyecto);
    }
    public function create()
    {
        $data = [
            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "ubicacion" => $_POST["ubicacion"],
            "id_cliente" => $_POST["id_cliente"]

        ];

        $respuesta = $this->model->save($data);

        if ($respuesta) {
            $respuesta = ["usuario" => $this->model->find($this->model->getInsertID())];
        } else {
            $respuesta = ["errors" => $this->model->errors()];
        }

        return $this->respond($respuesta);

    }
    public function update($id = null)
    {
        $data = [
            "id" => $id,
            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "ubicacion" => $_POST["ubicacion"],
            "id_cliente" => $_POST["id_cliente"]


        ];

        $respuesta = $this->model->save($data);

        if ($respuesta) {
            $respuesta = ["usuario" => $this->model->find($this->model->getInsertID())];
        } else {
            $respuesta = ["errors" => $this->model->errors()];
        }

        return $this->respond($respuesta);

    }

    function delete($id = null)
    {

        $resultado = $this->model->delete($id);

        return $this->respond($resultado);

    }


}