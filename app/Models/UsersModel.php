<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'username', 'fullname', 'user_img'];

    public function getUsers($id = false)
    {
        if ($id == false) {
            // return $this->findAll();
            return $this->paginate(5, 'users');
        }

        return $this->where(['id' => $id])->first();
    }
}
