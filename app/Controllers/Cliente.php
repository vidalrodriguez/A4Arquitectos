<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Cliente extends ResourceController
{
    protected $modelName = 'App\Models\ClienteModel';
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
            "password"=>$this->request->getPost("password"),
            "nombre"=>$this->request->getPost("nombre"),
            "telefono"=>$this->request->getPost("telefono"),
        
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
            "password"=>$this->request->getPost("password"),
            "nombre"=>$this->request->getPost("nombre"),
            "telefono"=>$this->request->getPost("telefono"),
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

   
