<?php

namespace App\Modules\Backend\Grids;

use App\Modules\Backend\Models\Website;
use OE\Widget\Grid;
use App\Grids\Elements\ActionLink;

class WebsiteGrid extends Grid{

    public function init() {
        $model = new Website();
        $this->setSource($model->search());
        $this->setColumns($this->getColumns());
    }

    public function getColumns() {
        return array(
            array(
                'name' => 'name',
                'header' => $this->_('name'),
                'value' => 'name',
                'operator' => 'like',
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            ),
            array(
                'name' => 'domain',
                'header' => $this->_('domain'),
                'value' => 'domain',
                'operator' => 'like',
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            ),
            array(
                'name' => 'status',
                'header' => $this->_('status'),
                'value' => function($data) {
                    return Website::getStatusLabel($data->status);
                },
                'filter' => Website::listStatus(),
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
                    $actionLinks = new ActionLink($data, array('baseUri' => '/backend/website'));
                    return $actionLinks->getLinks();
                },
                'htmlOptions' => array('class' => 'text-center'),
                'headerHtmlOptions' => array('class' => 'text-center'),
            )
        );
    }

}
