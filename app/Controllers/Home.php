<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $CategoriesModel, $ProductModel, $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('product');
        $this->CategoriesModel = new CategoriesModel();
        $this->ProductModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'categories' => $this->CategoriesModel->findAll(),
            'product' => $this->ProductModel->paginate(6, 'product')
        ];

        return view('pages/index', $data);
    }

    public function product()
    {
        $data = [
            'title' => 'All Product',
            'categories' => $this->CategoriesModel->findAll(),
            'product' => $this->ProductModel->findAll()
        ];

        return view('pages/product', $data);
    }

    public function detail($id = 0)
    {
        $data['title'] = 'Detail Product';

        $this->builder->select('product.id as proid, nm_product, desc_product, stock, price, img_product');
        // $this->builder->join('categories_product', 'categories_product.product_id = product.id');
        // $this->builder->join('categories', 'categories.id = categories_product.categories_id');
        $this->builder->where('product.id', $id);
        $query = $this->builder->get();

        $data['pro'] = $query->getRow();

        // $data = [
        //     'title' => 'Detail Product',
        //     'categories' => $this->CategoriesModel->getCategories(),
        //     'product' => $this->ProductModel->getProduct()
        // ];

        return view('pages/detail-product', $data);
    }
}
