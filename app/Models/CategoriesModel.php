<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    protected $useTimestamps = true;
    protected $allowedFields = ['nm_cat', 'pic_cat'];
}
