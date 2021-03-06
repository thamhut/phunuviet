<?php
/**
 * Created by PhpStorm.
 * User: thamhut
 * Date: 4/9/2016
 * Time: 8:55 AM
 */

namespace App\Modules\Backend\Grids;


use App\Grids\MongoGrid;
use App\Models\Product;
use App\Modules\Backend\Models\CmsCategory;
use App\Modules\Backend\Models\User;

class ProductGrid extends MongoGrid
{
    public function set($data, $totalData, $page, $numItems, $action)
    {
        $this->setupFiled();
        parent::set($data, $totalData, $page, $numItems, $action); // TODO: Change the autogenerated stub
    }

    public function setupFiled()
    {
        $filed = array(
            'id' => array(
                'key' => '_id',
                'label' => 'ID',
                'value' => '_id',
            ),
            'uid' => array(
                'key' => 'uid',
                'label' => 'User',
                'value' => function($data){
                    $user = new User();
                    $user = $user->getInfoById($data);
                    return isset($user->username)?$user->username:'';
                },
            ),
            'title' => array(
                'key' => 'title',
                'value' => 'title',
                'label' => 'Title',
            ),
            'oldprice' => array(
                'key' => 'oldprice',
                'value' => 'oldprice',
                'label' => 'Price',
            ),
            'newprice' => array(
                'key' => 'newprice',
                'value' => 'newprice',
                'label' => 'Sale',
            ),
            'category' => array(
                'key' => 'idcate',
                'value' => function($data){
                    $cate = new CmsCategory();
                    $cate = $cate->getTitleById($data);
                    return isset($cate->title)?$cate->title:'';
                },
                'label' => 'Category',
            ),
            'status' => array(
                'key' => 'status',
                'value' => function($data){
                    return Product::getStatusLabel($data);
                },
                'label' => 'Status',
            ),
        );
        $this->setFiled($filed);
    }
}