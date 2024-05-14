<?php

namespace App\Models;

use CodeIgniter\Model;

class Consulta_model extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'consultas_id'; 
    protected $allowedFields = [
        'consultas_name', 'consultas_email', 'consultas_question'
    ];
}
