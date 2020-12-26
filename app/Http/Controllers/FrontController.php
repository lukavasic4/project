<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\User;

class FrontController extends Controller
{
    protected $data = [];
    public function __construct(){
        $model = new User();
        $users = $model->getAllUser();
        $this->data['users'] = $users;
    }
}
