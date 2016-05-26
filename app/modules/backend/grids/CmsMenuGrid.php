<?php
        		
namespace App\Modules\Backend\Grids;

use OE\Widget\Grid;
use App\Modules\Backend\Models\CmsMenu;
use App\Grids\Elements\ActionLink;
use OE\Widget\Grid\Filter\DateRange;

class CmsMenuGrid extends Grid {

    public function init() {
		$model = new CmsMenu();
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
					'name' => 'id_parent',	
					'header' => $this->_('id_parent'),
					'value' => 'id_parent',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'title',	
					'header' => $this->_('title'),
					'value' => 'title',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'slug',	
					'header' => $this->_('slug'),
					'value' => 'slug',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'uri',	
					'header' => $this->_('uri'),
					'value' => 'uri',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'position',	
					'header' => $this->_('position'),
					'value' => 'position',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return CmsMenu::getStatusLabel($data->status);
        			},
        			'filter' => CmsMenu::listStatus(),	
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
						$actionLinks = new ActionLink($data, array('baseUri' => '/backend/cms-menu'));
						return $actionLinks->getLinks();
					},					
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				)
		);
	}

}
