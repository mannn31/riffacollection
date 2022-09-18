<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ProductModel;
use App\Models\CapoModel;
use Config\Validation;
use PHPUnit\Util\Xml\Validator;

class Categories extends BaseController
{
    protected $CategoriesModel, $db, $builder, $ProductModel, $CapoModel;

    public function __construct()
    {
        $this->CategoriesModel = new CategoriesModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('categories');
        $this->ProductModel = new ProductModel();
        $this->CapoModel = new CapoModel();
    }

    public function index()
    {
        // $categories = $this->CategoriesModel->findAll();
        $data = [
            'title' => 'Manage Categories',
            'categories' => $this->CategoriesModel->getCategories()
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
            'pic_cat' => [
                'rules' => 'uploaded[pic_cat]|max_size[pic_cat,1024]|is_image[pic_cat]|ext_in[pic_cat,png,jpg,gif]',
                'errors' => [
                    'uploaded' => 'Select an image first',
                    'max_size' => 'The file should not exceed 1MB',
                    'is_image' => 'The file must be JPG/JPEG/PNG',
                    'ext_in' => 'The file must be JPG/JPEG/PNG'
                ]
            ]
        ])) {
            return redirect()->to('/admin/categories/add')->withInput();
        }

        //pick image
        $fileImg = $this->request->getFile('pic_cat');
        //move image
        $fileImg->move('img/category');
        //changed name image
        $picCat = $fileImg->getName();

        $this->CategoriesModel->save([
            'nm_cat' => $this->request->getVar('nm_cat'),
            'pic_cat' => $picCat
        ]);

        session()->setFlashdata('pesan', 'Categories has been added.');

        return redirect()->to('/admin/categories');
    }

    public function delete($id)
    {
        $this->CategoriesModel->delete($id);

        session()->setFlashdata('pesan', 'Categories has been deleted.');

        return redirect()->to('/admin/categories');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Categories',
            'validation' => \Config\Services::validation(),
            'categories' => $this->CategoriesModel->getCategories($id)
        ];

        return view('pages/admin/edit-categories', $data);
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
        $fileImg = $this->request->getFile('pic_cat');
        //move image
        $fileImg->move('img/category');
        //changed name image
        $picCat = $fileImg->getName();

        $this->CategoriesModel->save([
            'id' => $id,
            'nm_cat' => $this->request->getVar('nm_cat'),
            'pic_cat' => $picCat
        ]);

        session()->setFlashdata('pesan', 'Categories has been updated.');

        return redirect()->to('/admin/categories');
    }

    public function detail($id = 0)
    {
        $data['title'] = 'Detail Categories';

        $this->builder->select('categories.id as catid, nm_cat, product.id as proid, nm_product, desc_product, stock, price, img_product');
        $this->builder->join('categories_product', 'categories_product.categories_id = categories.id');
        $this->builder->join('product', 'product.id = categories_product.product_id');
        $this->builder->where('categories.id', $id);
        $query = $this->builder->get();

        $data['capo'] = $query->getRow();

        // if (empty($data['capo'])) {
        //     return redirect()->to('pages/categories');
        // }

        return view('pages/admin/detail-categories', $data);
    }

    public function addCapo()
    {
        $data = [
            'title' => 'Edit Product',
            'validation' => \Config\Services::validation(),
            'product' => $this->ProductModel->getProduct(),
            'categories' => $this->CategoriesModel->getCategories()
        ];
        $data['title'] = 'Add Categories Of Product';

        $this->builder->select('categories.id as catid, nm_cat, product.id as proid, nm_product, desc_product, stock, price, img_product');
        $this->builder->join('categories_product', 'categories_product.categories_id = categories.id');
        $this->builder->join('product', 'product.id = categories_product.product_id');
        // $this->builder->where('categories.id', $id);
        $query = $this->builder->get();

        $data['capo'] = $query->getRow();

        return view('pages/admin/add-capo', $data);
    }

    public function saveCapo()
    {
        $this->CapoModel->save([
            'categories_id' => $this->request->getVar('cat_id'),
            'product_id' => $this->request->getVar('pro_id'),
        ]);

        session()->setFlashdata('pesan', 'Product has been added.');

        return redirect()->to('/admin/categories');
    }

    public function product($id = 0)
    {
        $data['title'] = 'Catagories Of Product';

        $this->builder->select('categories.id as catid, nm_cat, product.id as proid, nm_product, desc_product, stock, price, img_product');
        $this->builder->join('categories_product', 'categories_product.categories_id = categories.id');
        $this->builder->join('product', 'product.id = categories_product.product_id');
        $this->builder->where('categories.id', $id);
        $query = $this->builder->get();

        $data['capo'] = $query->getRow();

        // if (empty($data['capo'])) {
        //     return redirect()->to('pages/categories');
        // }

        return view('pages/admin/capo', $data);
    }
}
