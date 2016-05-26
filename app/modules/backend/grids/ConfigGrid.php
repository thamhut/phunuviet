<?php
        		
namespace App\Modules\Backend\Grids;

use OE\Widget\Grid;
use App\Modules\Backend\Models\Config;
use App\Grids\Elements\ActionLink;
use OE\Widget\Grid\Filter\DateRange;

class ConfigGrid extends Grid {

    public function init() {
		$model = new Config();
		$this->setSource($model->search());
		$this->setColumns($this->getColumns());
	}

    public function getColumns() {
		return array(
	        	array(
					'name' => 'id',	
					'header' => $this->_('id'),
					'value' => 'id',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'name',	
					'header' => $this->_('name'),
					'value' => 'name',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'value',	
					'header' => $this->_('value'),
					'value' => 'value',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return Config::getStatusLabel($data->status);
        			},
        			'filter' => Config::listStatus(),	
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'updated_at',	
					'header' => $this->_('updated_at'),
					'value' => 'updated_at',
					'operator' => 'like',
	       			'filter' => new DateRange(array('format' => 'yy-mm-dd')),
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
						$actionLinks = new ActionLink($data, array('baseUri' => '/backend/config'));
						return $actionLinks->getLinks();
					},					
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				)
		);
	}

}
