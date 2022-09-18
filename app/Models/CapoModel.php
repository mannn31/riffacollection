<?php

namespace App\Models;

use CodeIgniter\Model;

class CapoModel extends Model
{
    protected $table = 'categories_product';
    protected $useTimestamps = false;
    protected $allowedFields = ['categories_id', 'product_id'];

    public function getCapo($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
