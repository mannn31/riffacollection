<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\RoleModel;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;


class Admin extends BaseController
{
    protected $db, $builder, $UsersModel, $RoleModel;

    protected $auth;

    /**
     * @var AuthConfig
     */
    protected $config;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->UsersModel = new UsersModel();
        $this->RoleModel = new RoleModel();

        $this->config = config('Auth');
        $this->auth   = service('authentication');
    }

    public function index()
    {
        $data['title'] = 'Admin Page';
        return view('pages/admin/index', $data);
    }

    public function manageUsers()
    {
        $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        // $categories = $this->CategoriesModel->findAll();
        $data = [
            'title' => 'Manage Users',
            'users' => $this->UsersModel->getUsers(),
            'pager' => $this->UsersModel->pager,
            'currentPage' => $currentPage
        ];

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();


        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('pages/admin/manage-users', $data);
    }

    public function detail($id = 0)
    {
        $data['title'] = 'User Detail';

        $this->builder->select('users.id as userid, username, email, fullname, user_img, created_at, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        if (empty($data['user'])) {
            return redirect()->to('pages/admin/manage-users');
        }

        return view('pages/admin/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Users',
            'validation' => \Config\Services::validation(),
            'role' => $this->RoleModel->getRole()
        ];

        return view('pages/admin/add-users', $data);
    }

    public function save()
    {
        // Check if registration is allowed
        if (!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        $users = model(UserModel::class);

        // Validate basics first since some password rules rely on these fields
        $rules = config('Validation')->registrationRules ?? [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user              = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (!empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // if ($this->config->requireActivation !== null) {
        //     $activator = service('activator');
        //     $sent      = $activator->send($user);

        //     if (! $sent) {
        //         return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
        //     }

        //     // Success!
        //     return redirect()->route('login')->with('message', lang('Auth.activationSuccess'));
        // }

        // Success!
        return redirect()->to('admin/manage-users');
    }

    public function edit($id = 0)
    {
        $data = [
            'title' => 'Edit Profile Users',
            'validation' => \Config\Services::validation(),
            'users' => $this->UsersModel->getUsers($id)
        ];

        return view('pages/admin/edit-users', $data);
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

        session()->setFlashdata('pesan', 'Profile User has been updated.');

        return redirect()->to('admin/manage-users');
    }

    public function delete($id)
    {
        $this->UsersModel->delete($id);

        session()->setFlashdata('pesan', 'User has been deleted.');

        return redirect()->to('/admin/manage-users');
    }
}
