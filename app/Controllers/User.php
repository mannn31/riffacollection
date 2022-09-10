<?php

namespace App\Controllers;

use App\Models\UsersModel;

class User extends BaseController
{
    protected $db, $builder, $UsersModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->UsersModel = new UsersModel();
    }

    public function index()
    {
        return view('user/index');
    }

    public function profile($id = 0)
    {
        $data['title'] = 'My Profil';
        $this->builder->select('users.id as userid, username, email, fullname, user_img, created_at, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        return view('pages/profile', $data);
    }

    public function edit($id = 0)
    {
        $data = [
            'title' => 'Edit Profile',
            'validation' => \Config\Services::validation(),
            'users' => $this->UsersModel->getUsers($id)
        ];

        return view('pages/edit-profile', $data);
    }

    public function update($id)
    {
        // //validate
        // if (!$this->validate([
        //     'nm_cat' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'The name must be filled in first'
        //         ]
        //     ],
        //     'pic_cat' => [
        //         'rules' => 'uploaded[pic_cat]|max_size[pic_cat,1024]|is_image[pic_cat]|ext_in[pic_cat,png,jpg,gif]',
        //         'errors' => [
        //             'uploaded' => 'Select an image first',
        //             'max_size' => 'The file should not exceed 1MB',
        //             'is_image' => 'The file must be JPG/JPEG/PNG',
        //             'ext_in' => 'The file must be JPG/JPEG/PNG'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('/admin/categories/edit/' . $this->request->getVar('id'))->withInput();
        // }

        //pick image
        $fileImg = $this->request->getFile('user_img');
        //move image
        $fileImg->move('img/user');
        //changed name image
        $pp = $fileImg->getName();

        $this->UsersModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            'user_img' => $pp
        ]);

        session()->setFlashdata('pesan', 'Profiles has been updated.');

        return redirect()->to('profile/' . user()->id);
    }
}
