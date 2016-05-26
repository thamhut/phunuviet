<?php
namespace App\Grids;
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 4/8/2016
 * Time: 10:13 AM
 */
class MongoGrid
{
    private $data;
    private $totalData;
    private $page;
    private $numItems;
    private $action;
    private $fileds;

    public function set($data, $totalData, $page, $numItems, $action){
        $this->data = $data;
        $this->totalData = $totalData;
        $this->page = $page;
        $this->numItems = $numItems;
        $this->action = $action;
    }

    public function setFiled($filed){
        $this->fileds = $filed;
    }

    public function render(){
        $html = '<div class="oe-grid-container grid-style-1"><form method="post" action="'.$this->action.'" class="oe-grid-form oe-grid-form-ajax">';
        $html .= $this->renderHead();
        $html .= $this->renderContent();
        $html .= '</form></div>';
        echo $html;
    }

    public function renderHead(){
        $html = '';
        $html .= '<div class="oe-grid-toptool">'.$this->paginator().'<div class="oe-pagesize"></div>';
        $html .= '<div class="oe-grid-export"></div>';
        $html .= '<div class="oe-summarytext"><p>Displaying '.(($this->page-1) * $this->numItems + 1).'-'.(($this->page-1) * $this->numItems + count($this->data)).' of '.($this->totalData).' results.</p></div></div>';
        return $html;
    }

    public function renderContent(){
        $html = '<div class="oe-grid-content"><div class="oe-grid"><table class="oe-table table table-bordered">';
        $html .= $this->tableHead();
        $html .= $this->table();
        $html .= '</table></div></div>';
        return $html;
    }

    public function tableHead(){
        $html = '<thead><tr>';
        foreach($this->fileds as $filed){
            $html .= '<th class="text-center"><a href="##" class="oe-sortable" data-order="1">'.$filed['label'].'</a></th>';
        }
        $html .= '<th class="text-center">Action</th>';
        $html .= '</tr></thead>';
        return $html;
    }

    public function table(){
        $html = '<tbody>';
        foreach($this->data as $k=>$v){
            $v->_id = (string)$v->_id->__toString();
            $html .= '<tr>';
            foreach($this->fileds as $filed){
                $html .= '<td class="text-center">'.(isset($filed['value'])&&is_object($filed['value'])?$filed['value']((isset($v->$filed['key'])?$v->$filed['key']:'')):(isset($v->$filed['key'])?$v->$filed['key']:'')).'</td>';
            }
            $html .= '<td class="text-center"><a href="'.$this->action.'/add?id='.$v->_id.'" class="oe-grid-action update" title="Update item"><i class="fa fa-pencil-square-o"></i></a><a href="'.$this->action.'/delete?id='.$v->_id.'" class="oe-grid-action delete" title="Delete item" onClick="return confirm(\"Do you want to continue?\")"><i class="fa fa-trash-o"></i></a></td>';
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        return $html;
    }

    public function paginator(){
        $pages = ceil($this->totalData/$this->numItems);
        $html = '';
        if($pages > 1) {
            $html = '<div class="oe-paginator"><ul class="pagination">';
            if ($this->page != 1) {
                $html .= '<li><a href="##" class="first">&laquo;</a></li><li><a href="##" class="prev">Prev</a></li>';
            }
            for ($i = 1; $i <= $pages; ++$i) {
                if ($i == $this->page) {
                    $html .= '<li class="active"><span onclick="change_page(this);" href="##" class="item">' . $i . '</span></li>';
                } else {
                    $html .= '<li><span onclick="change_page(this);" href="##" class="item">' . $i . '</span></li>';
                }
            }
            if ($this->page != $pages) {
                $html .= '<li><a href="##" class="next">Next</a></li>';
                $html .= '<li><a href="##" class="last" data-page="4">&raquo;</a></li>';
            }
            $html .= '</ul></div>';
        }
        return $html;
    }

}