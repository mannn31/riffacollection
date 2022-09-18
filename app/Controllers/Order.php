<?php

namespace App\Controllers;

// use App\Models\UsersModel;
// use App\Models\ProductModel;
use App\Models\OrdersModel;

class Order extends BaseController
{
    protected $db, $builder, $OrdersModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('orders');
        // $this->UsersModel = new UsersModel();
        // $this->ProductModel = new ProductModel();
        $this->OrdersModel = new OrdersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Order',
            // 'users' => $this->CategoriesModel->findAll(),
            // 'product' => $this->ProductModel->findAll(),
            'orders' => $this->OrdersModel->findAll()
        ];

        $this->builder->select('orders.id as orderid, adress, no_hp, qty, total_price, payment, img_proof, product.id as proid, nm_product, users.id as userid, fullname');
        $this->builder->join('users', 'users.id = orders.user_id');
        $this->builder->join('product', 'product.id = orders.product_id');
        $query = $this->builder->get();

        $data['ordr'] = $query->getResult();

        return view('pages/admin/order', $data);
    }

    public function delete($id)
    {
        $this->OrdersModel->delete($id);

        session()->setFlashdata('pesan', 'Orders has been deleted.');

        return redirect()->to('/admin/order');
    }
}
