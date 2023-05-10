<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Evidencia extends ResourceController
{
    protected $modelName = 'App\Models\EvidenciaModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null){ 
        $usuario = $this->model->find($id); 
        return $this->respond($usuario); 
    }
    public function create()
    {
        $data = [
            "id_proyecto"=>$this->request->getPost("id_proyecto"),
            "ruta"=>$this->request->getPost("ruta"),
        ];
 
        $respuesta =   $this->model->save($data);

        if($respuesta){
            $respuesta = [ "usuario" => $this->model->find($this->model->getInsertID() )  ];
        }else{
            $respuesta = ["errors" => $this-> model->errors()];
        } 
     
        return $this->respond($respuesta); 

    }
    public function update($id =null)
    {
        $data = [
            "id"=>$id,
            "id_proyecto"=>$this->request->getPost("id_proyecto"),
            "ruta"=>$this->request->getPost("ruta"),
        ];

        $respuesta =   $this->model->save($data);

        if($respuesta){
            $respuesta = [ "usuario" => $this->model->find($this->model->getInsertID() )  ];
        }else{
            $respuesta = ["errors" => $this-> model->errors()];
        } 
     
        return $this->respond($respuesta); 

    }

    function delete ($id = null){ 

        $resultado =  $this->model->delete($id);

        return $this->respond($resultado);

    }


    }

   
