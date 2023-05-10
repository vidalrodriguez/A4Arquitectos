<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{

    protected $table = "clientes";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "nombre",
        "telefono",
        "password"

    ];
    protected $validationRules = [
        'nombre' => 'required',
        'password' => 'required|min_length[8]',
        'telefono' => 'required|numeric|min_length[10]|max_length[10]|is_unique[clientes.telefono]',

    ];
    protected $validationMessages = [
        'password' => [
            'required' => 'El campo password es obligatorio',
            'min_length' => 'El campo password debe tener al menos 8 caracteres'
        ],
        'nombre' => [
            'required' => 'El campo nombre es obligatorio'
        ],
        'telefono' => [
            'required' => 'El campo telefono es obligatorio',
            'numeric' => 'El campo telefono debe ser numerico',
            'min_length' => 'El campo telefono debe tener 10 caracteres',
            'max_length' => 'El campo telefono debe tener 10 caracteres',
            'is_unique' => 'El telefono ya esta registrado'
        ]
    ];
    
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

}