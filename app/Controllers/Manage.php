<?php

namespace App\Controllers;

class Manage extends BaseController
{
    public function addUser()
    {
        $data['title'] = 'Home';
        return view('pages/index', $data);
    }
}
