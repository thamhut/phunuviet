<?php
        		
namespace App\Modules\Backend\Grids;

use OE\Widget\Grid;
use App\Modules\Backend\Models\Faq;
use App\Grids\Elements\ActionLink;
use OE\Widget\Grid\Filter\DateRange;

class FaqGrid extends Grid {

    public function init() {
		$model = new Faq();
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
					'name' => 'question',	
					'header' => $this->_('question'),
					'value' => 'question',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'anser',	
					'header' => $this->_('anser'),
					'value' => 'anser',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return Faq::getStatusLabel($data->status);
        			},
        			'filter' => Faq::listStatus(),	
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
						$actionLinks = new ActionLink($data, array('baseUri' => '/backend/faq'));
						return $actionLinks->getLinks();
					},					
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				)
		);
	}

}
