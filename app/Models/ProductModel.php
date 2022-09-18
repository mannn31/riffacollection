<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $useTimestamps = true;
    protected $allowedFields = ['nm_product', 'desc_product', 'stock', 'price', 'img_product'];

    public function getProduct($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
