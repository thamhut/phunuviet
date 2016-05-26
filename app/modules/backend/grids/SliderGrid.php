<?php
/**
 * Created by PhpStorm.
 * User: thamhut
 * Date: 3/28/2016
 * Time: 11:10 PM
 */

namespace App\Modules\Backend\Grids;


use App\Modules\Backend\Grids\Elements\ActionLink;
use App\Modules\Backend\Models\Slider;
use OE\Widget\Grid;

class SliderGrid extends Grid
{
    public function init() {
        $model = new Slider();
        $this->setSource($model->search());
        $this->setColumns($this->getColumns());
    }

    public function getColumns() {
        return array(
            array(
                'name' => 'id',
                'header' => $this->_('id'),
                'value' => 'id',
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            ),
            array(
                'name' => 'url',
                'header' => $this->_('image'),
                'value' => function($data) {
                    return '<img width="200" src="'.$data->url.'" />';
                },
                'operator' => 'like',
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            ),
            array(
                'name' => 'status',
                'header' => $this->_('status'),
                'value' => function($data) {
                    return Slider::getStatusLabel($data->status);
                },
                'filter' => Slider::listStatus(),
                'operator' => 'like',
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            ),
            array(
                'name' => '',
                'header' => $this->_('Action'),
                'sort' => false,
                'filter' => false,
                'export' => false,
                'value' => function($data) {
                    $actionLinks = new ActionLink($data, array('baseUri' => '/backend/slider'));
                    return $actionLinks->getLinks();
                },
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            )
        );
    }
}