<?php 

namespace App\Controllers;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function index(): string
    {
        $model = new UserModel();
        $data = [
            'title' => 'Home',
        ];
        $data['user'] = $model->getData();
        return view('pages/home', $data);
    }

    public function about (): string {
        helper('url');
        $model = new UserModel();
        $data = [
            'title' => 'About Me',
        ];
        $data['user'] = $model->getData();
        return view('pages/about', $data);
    }
}