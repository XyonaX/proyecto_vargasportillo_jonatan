<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleVenta_model extends Model
{
    protected $table = 'detalle_venta';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_venta','id_producto','detalle_cantidad','detalle_precio'
    ];
    protected $returnType = 'array';
    
}
