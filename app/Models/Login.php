<?php
namespace app\Models;
use Illuminate\Support\Facades\DB;

class Login{
    public function getByUsernameAndPassword($username,$password){
        return DB::table('user')->where([
            ['username', '=', $username],
            ['password', '=', $password],
        ])->get()->first();
    }
}
