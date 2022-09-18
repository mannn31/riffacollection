<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'auth_groups';
    // protected $useTimestamps = true;
    // protected $allowedFields = ['email', 'username', 'fullname', 'user_img'];

    public function getRole($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
