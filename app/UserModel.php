<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
    
    
    public static function getUserData(){
        //return DB::table('users')->select('*')->get()->toArray();
        return DB::table('users')->select('*')->paginate(2);
    }
    public static function getUserDetails($id){
        return DB::table('users')->select('*')->where('id',$id)->first();
    }
    public static function addNewUser($data){
        return DB::table('users')->insertGetId($data);
    }
    public static function deleteUser($id){
        return DB::table('users')
        ->where('id', $id)->delete();
    }
    public static function updateUserData($id,$data){
        return DB::table('users')->where('id', $id)->update($data);
    }
}
