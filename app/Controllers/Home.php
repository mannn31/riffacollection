<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $CategoriesModel, $ProductModel;

    public function __construct()
    {
        $this->CategoriesModel = new CategoriesModel();
        $this->ProductModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'categories' => $this->CategoriesModel->getCategories(),
            'product' => $this->ProductModel->getProduct()
        ];

        return view('pages/index', $data);
    }

    public function product()
    {
        $data = [
            'title' => 'All Product',
            'categories' => $this->CategoriesModel->getCategories(),
            'product' => $this->ProductModel->getProduct()
        ];

        return view('pages/product', $data);
    }
}
