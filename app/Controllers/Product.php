<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Config\Validation;
use PHPUnit\Util\Xml\Validator;

class Product extends BaseController
{
    protected $ProductModel, $db, $builder;

    public function __construct()
    {
        $this->ProductModel = new ProductModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('product');
    }

    public function index()
    {
        // $categories = $this->CategoriesModel->findAll();
        $data = [
            'title' => 'Manage Product',
            // 'product' => $this->ProductModel->getProduct()
        ];

        $this->builder->select('product.id as productid, nm_product, desc_product, stock, price, img_product, nm_cat');
        $this->builder->join('categories_product', 'categories_product.product_id = product.id');
        $this->builder->join('categories', 'categories.id = categories_product.categories_id');
        $query = $this->builder->get();

        $data['product'] = $query->getResult();

        return view('pages/admin/product', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Product',
            'validation' => \Config\Services::validation()
        ];

        return view('pages/admin/add-product', $data);
    }

    public function save()
    {
        //validate
        if (!$this->validate([
            'nm_product' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The name must be filled in first'
                ]
            ],
            'desc_product' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The description must be filled in first'
                ]
            ],
            'stock' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The stock must be filled in first'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The price must be filled in first'
                ]
            ],
            'img_product' => [
                'rules' => 'uploaded[img_product]|max_size[img_product,1024]|is_image[img_product]|ext_in[img_product,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => 'Select an image first',
                    'max_size' => 'The file should not exceed 1MB',
                    'is_image' => 'The file must be JPG/JPEG/PNG',
                    'ext_in' => 'The file must be JPG/JPEG/PNG'
                ]
            ]
        ])) {
            return redirect()->to('/admin/product/add')->withInput();
        }

        //pick image
        $fileImg = $this->request->getFile('img_product');
        //move image
        $fileImg->move('img/product');
        //changed name image
        $picCat = $fileImg->getName();

        $this->ProductModel->save([
            'nm_product' => $this->request->getVar('nm_product'),
            'desc_product' => $this->request->getVar('desc_product'),
            'stock' => $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
            'img_product' => $picCat
        ]);

        session()->setFlashdata('pesan', 'Product has been added.');

        return redirect()->to('/admin/product');
    }

    public function delete($id)
    {
        $this->ProductModel->delete($id);

        session()->setFlashdata('pesan', 'Product has been deleted.');

        return redirect()->to('/admin/product');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product',
            'validation' => \Config\Services::validation(),
            'product' => $this->ProductModel->getProduct($id)
        ];

        return view('pages/admin/edit-product', $data);
    }

    public function update($id)
    {
        // //validate
        // if (!$this->validate([
        //     'nm_product' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'The name must be filled in first'
        //         ]
        //     ],
        //     'desc_product' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'The description must be filled in first'
        //         ]
        //     ],
        //     'stock' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'The stock must be filled in first'
        //         ]
        //     ],
        //     'price' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'The price must be filled in first'
        //         ]
        //     ],
        //     'img_product' => [
        //         'rules' => 'uploaded[img_product]|max_size[img_product,1024]|is_image[img_product]|ext_in[img_product,png,jpg,jpeg]',
        //         'errors' => [
        //             'uploaded' => 'Select an image first',
        //             'max_size' => 'The file should not exceed 1MB',
        //             'is_image' => 'The file must be JPG/JPEG/PNG',
        //             'ext_in' => 'The file must be JPG/JPEG/PNG'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('/admin/product/edit')->withInput();
        // }

        //pick image
        $fileImg = $this->request->getFile('img_product');
        //move image
        $fileImg->move('img/product');
        //changed name image
        $picCat = $fileImg->getName();

        $this->ProductModel->save([
            'id' => $id,
            'nm_product' => $this->request->getVar('nm_product'),
            'desc_product' => $this->request->getVar('desc_product'),
            'stock' => $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
            'img_product' => $picCat
        ]);

        session()->setFlashdata('pesan', 'Product has been updated.');

        return redirect()->to('/admin/product');
    }
}
