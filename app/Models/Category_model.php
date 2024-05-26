<?php

namespace App\Models;

use CodeIgniter\Model;

class Category_model extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nombre', 'descripcion', 'activo'
    ];
    protected $returnType = 'array';
    
}
