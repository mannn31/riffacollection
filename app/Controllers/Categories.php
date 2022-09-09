<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use Config\Validation;
use PHPUnit\Util\Xml\Validator;

class Categories extends BaseController
{
    protected $CategoriesModel;

    public function __construct()
    {
        $this->CategoriesModel = new CategoriesModel();
    }

    public function index()
    {
        $categories = $this->CategoriesModel->findAll();
        $data = [
            'title' => 'Manage Categories',
            'categories' => $categories
        ];



        return view('pages/admin/categories', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Categories',
            'validation' => \Config\Services::validation()
        ];

        return view('pages/admin/add-categories', $data);
    }

    public function save()
    {
        //validate
        if (!$this->validate([
            'nm_cat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The name must be filled in first'
                ]
            ],
            // 'pic_cat' => [
            //     'rules' => 'uploaded[pic_cat]|max_size[pic_cat,1024]|is_image[pic_cat]|ext_in[pic_cat,png,jpg,gif]',
            //     'errors' => [
            //         'uploaded' => 'Select an image first',
            //         'max_size' => 'The file should not exceed 1MB',
            //         'is_image' => 'The file must be JPG/JPEG/PNG',
            //         'ext_in' => 'The file must be JPG/JPEG/PNG'
            //     ]
            // ]
        ])) {
            return redirect()->to('/admin/categories/add')->withInput();
        }
        // //pick image
        // $fileImg = $this->request->getFile('pic_cat');
        // //move image
        // $fileImg->move('img/category');
        // //changed name image
        // $picCat = $fileImg->getName();

        $this->CategoriesModel->save([
            'nm_cat' => $this->request->getVar('nm_cat'),
            // 'pic_cat' => $picCat
        ]);

        session()->setFlashdata('pesan', 'Categories has been added.');

        return redirect()->to('/admin/categories');
    }
}
