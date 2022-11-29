<?php
namespace App\Helpers;
use App\Models\User;
use App\Models\RoleUsers;
use App\Models\Roles;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class Helper {

    public static function ORM_to_string($object){
        $query = $object->toSql();
        $bindings = $object->getBindings();
        foreach ($bindings as $key => $binding) {
            if (!is_numeric($binding)) {
                $binding = "'" . $binding . "'";
            }
            $regex = is_numeric($key) ? " / \?(?=(?:[^'\\\']*'[^'\\\']*')*[^'\\\']*$)/" : "/:{$key}(?=(?:[^'\\\']*'[^'\\\']*')*[^'\\\']*$)/";
            $query = preg_replace($regex, $binding, $query, 1);
        }
        return $query;
    }

    public static function checkPermission($permissionName=0){
        $role_id = RoleUsers::where('user_id',Auth::user()->id)->first();

        // allow everything for Admin and FEEI Admin
        if (in_array($role_id->role_id, [4,5])) {
            return true;
        }
        $role = RoleUsers::with('permission')->where('role_id',@$role_id->role_id)->first();
        $user_permission=[];
        if(!empty($role)){
            foreach ($role['permission'] as $key=>$value){
                $jsonobj = $value['permissions'];
                $arr = json_decode($jsonobj, true);
                foreach($arr as $key => $value) {
                    if($value == true){
                        if(in_array($key, $permissionName)){
                            $user_permission[]=$key;
                        }
                    }
                  }
            }
        }
        if(empty($user_permission)){
            return false;
        }else{
            return true;
        }
    }
}
