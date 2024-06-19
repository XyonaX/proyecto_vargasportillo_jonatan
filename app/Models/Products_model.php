<?php

namespace App\Models;

use CodeIgniter\Model;

class Products_model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_categoria', 'nombre_producto', 'desc_producto', 'precio_producto', 'cantidad_producto', 'nombre_imagen', 'activo'
    ];
    protected $returnType = 'array';

    public function getProductosActivosConStockPaginados($perPage)
    {
        return $this->where('activo', 1)
            ->where('cantidad_producto >', 0)
            ->paginate($perPage, 'default');
    }

    public function findFeaturedProducts($limit)
    {
        return $this->where('activo', 1)
                    ->orderBy('id_producto', 'DESC') 
                    ->limit($limit)
                    ->find();
                    
    }
}
