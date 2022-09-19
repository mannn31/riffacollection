<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $useTimestamps = true;
    protected $allowedFields = ['nm_orders', 'adress', 'no_hp', 'product_id', 'qty', 'total_price', 'payment', 'img_proof'];
}
