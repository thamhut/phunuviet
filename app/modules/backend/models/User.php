<?php
/**
 * Created by PhpStorm.
 * User: thamhut
 * Date: 4/9/2016
 * Time: 3:40 PM
 */

namespace App\Modules\Backend\Models;


use App\Models\AclUser;

class User extends AclUser
{
    public function getInfoById($id){
        $builder = self::findFirst(array(array('id='=>$id), 'columns'=>'id, username'));
        return $builder;
    }
}