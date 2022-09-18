<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $useTimestamps = true;
    protected $allowedFields = ['user_id', 'adress', 'product_id', 'qty', 'payment', 'img_proof'];
}
