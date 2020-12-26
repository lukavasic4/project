<?php


namespace App\Models\Admin;


use Illuminate\Support\Facades\DB;

class User
{
private $table = "user";
    public function getAllUser(){
        return DB::table('user AS u')
            ->select('u.id_user','u.username','u.password','u.employee_id','u.status','u.login_number','r.name as uloga')
            ->join('role AS r','u.id_role', '=','r.id')
            ->get();
    }
    public function updateLoginNumber($id,$number){
        return DB::table($this->table)
            ->where('id_user',$id)
            ->update(['login_number' => $number]);
    }
    public function statusActive($id){
        return DB::table($this->table)
            ->where('id_user',$id)
            ->update(['status' => 1]);
    }
    public function statusInactive($id){
        return DB::table($this->table)
            ->where('id_user',$id)
            ->update(['status' => 0]);
    }
}
