<?php
namespace App\Helpers;

use OE\Object;
class View extends Object {
    public  static function next_prev($count, $page, $url, $limit){
        $html = '<ul class="pager">';
        if($page > 1) {
            $html .= '<li class="previous" data-current=""><a href="'.$url.'&p='.($page-1).'">Previous</a></li>';
        }
        if($count >= $limit){
            $html .= '<li class="next" data-current=""><a href="'.$url.'&p='.($page+1).'">Next</a></li>';
        }
        $html .= '</ul>';
        return $html;
    }
}