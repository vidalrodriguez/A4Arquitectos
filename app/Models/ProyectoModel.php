<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyectoModel extends Model
{

    protected $table = "proyectos";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "nombre",
        "descripcion",
        "ubicacion",
        "id_cliente"
    ];
    protected $validationRules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'ubicacion' => 'required',
        'id_cliente' => 'required',
    ];
    protected $validationMessages = [
        'descripcion' => [
            'required' => 'El campo descripcion es obligatorio',
           
        ],
        'ubicacion' => [
            'required' => 'El campo ubicacion es obligatorio'
        ],
        'nombre' => [
            'required' => 'El campo nombre es obligatorio'
        ],
        'id_cliente' => [
            'required' => 'Seleccione un cliente es obligatorio',
            
        ]
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

}