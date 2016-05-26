<?php
/**
 * Created by PhpStorm.
 * User: thamhut
 * Date: 3/27/2016
 * Time: 5:38 PM
 */

namespace App\Modules\Backend\Grids;


use App\Modules\Backend\Grids\Elements\ActionLink;
use App\Modules\Backend\Models\Mapcate;
use OE\Widget\Grid;

class MapcateGrid extends Grid
{
    public function init() {
        $model = new Mapcate();
        $this->setSource($model->search());
        $this->setColumns($this->getColumns());
    }

    public function getColumns() {
        return array(
            array(
                'name' => 'link',
                'header' => $this->_('link'),
                'value' => 'link',
                'operator' => 'like',
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            ),
            array(
                'name' => 'domain',
                'header' => $this->_('domain'),
                'value' => function($data) {
                    return Mapcate::getDomain($data->idweb);
                },
                'filter' => Mapcate::listDomain(),
                'operator' => 'like',
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            ),
            array(
                'name' => 'category',
                'header' => $this->_('category'),
                'value' => function($data) {
                    return Mapcate::getCategory($data->idcate);
                },
                'filter' => Mapcate::listCategory(),
                'operator' => 'like',
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            ),
            array(
                'name' => 'status',
                'header' => $this->_('status'),
                'value' => function($data) {
                    return Mapcate::getStatusLabel($data->status);
                },
                'filter' => Mapcate::listStatus(),
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
                    $actionLinks = new ActionLink($data, array('baseUri' => '/backend/mapcate'));
                    return $actionLinks->getLinks();
                },
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            )
        );
    }
}