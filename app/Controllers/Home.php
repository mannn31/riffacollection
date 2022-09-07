<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Home';
        return view('pages/index', $data);
    }

    public function product()
    {
        $data['title'] = 'All Product';
        return view('pages/product', $data);
    }
}
