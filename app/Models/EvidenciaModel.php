<?php

namespace App\Models;

use CodeIgniter\Model;

class EvidenciaModel extends Model
{

    protected $table = "evidencias";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "id_proyecto",
        "ruta",

    ];
    protected $validationRules = [
        'id_proyecto' => 'required',
        'ruta' => 'required',


    ];
    protected $validationMessages = [
        'id_proyecto' => [
            'required' => 'El campo descripcion es obligatorio',

        ],
        'ruta' => [
            'required' => 'El campo ubicacion es obligatorio'
        ],


    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

}