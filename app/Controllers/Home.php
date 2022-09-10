<?php

namespace App\Controllers;

use App\Models\CategoriesModel;

class Home extends BaseController
{
    protected $CategoriesModel;

    public function __construct()
    {
        $this->CategoriesModel = new CategoriesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'categories' => $this->CategoriesModel->getCategories()
        ];
        
        return view('pages/index', $data);
    }

    public function product()
    {
        $data['title'] = 'All Product';
        return view('pages/product', $data);
    }
}
