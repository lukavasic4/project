<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends FrontController
{
    public function adminPage(){
        return view('admin_page',$this->data);
    }
}
