<?php

namespace App\Models;

use CodeIgniter\Model;

class Ventas_model extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'venta_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_cliente', 'venta_fecha',
    ];
    protected $returnType = 'array';
}
