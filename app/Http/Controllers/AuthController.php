<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Admin\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function doLogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $model = new Login();
        $userModel = new User();
        try{
            $korisnik = $model->getByUsernameAndPassword($username,$password);
            if($korisnik){
                $request->session()->put("user",$korisnik);
                $id = session('user')->id_user;
                $number = session('user')->login_number + 1;
                $userModel->updateLoginNumber($id,$number);
                $userModel->statusActive($id);
                if(session()->has('user') && session('user')->id_role == 1){
                    return \redirect("/admin")->with("message","Success login");
                }
                else{
                return \redirect("/home")->with("message","Success login");
                    }
            }
            else {
                return \redirect("/login")->with("message", "Not success login");
                }
            }
        catch (QueryException $exception){
            return response(['message' => $exception->getMessage()],404);
        }
    }
    public function logout(Request $request){
        $userModel = new User();
        $id = session('user')->id_user;
        $userModel->statusInactive($id);
        $request->session()->forget("user");
        $request->session()->flush();
        return redirect("/login")->with("message", "Izlogovali ste se");
    }
}
