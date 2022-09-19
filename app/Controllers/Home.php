<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ProductModel;
use App\Models\OrdersModel;

class Home extends BaseController
{
    protected $CategoriesModel, $ProductModel, $db, $builder, $OrdersModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('product');
        $this->CategoriesModel = new CategoriesModel();
        $this->ProductModel = new ProductModel();
        $this->OrdersModel = new OrdersModel();
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
        // $this->builder->join('auth_logins', 'auth_logins.user_id = users.id');
        // $this->builder->join('users', 'users.id = users.id');
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

    public function save()
    {

        //pick image
        $fileImg = $this->request->getFile('img_proof');
        //move image
        $fileImg->move('img/payment');
        //changed name image
        $picCat = $fileImg->getName();

        $this->OrdersModel->save([
            'nm_orders' => $this->request->getVar('fullname'),
            'adress' => $this->request->getVar('adress'),
            'no_hp' => $this->request->getVar('no_handphone'),
            'product_id' => $this->request->getVar('product_id'),
            'qty' => $this->request->getVar('qty'),
            'total_price' => $this->request->getVar('total_price'),
            'payment' => $this->request->getVar('payment'),
            'img_proof' => $picCat
        ]);

        session()->setFlashdata('pesan', 'Product has been order.');

        return redirect()->to('/product');
    }
}
