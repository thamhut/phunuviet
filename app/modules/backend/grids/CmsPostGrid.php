<?php
        		
namespace App\Modules\Backend\Grids;

use OE\Widget\Grid;
use App\Modules\Backend\Models\CmsPost;
use App\Grids\Elements\ActionLink;
use OE\Widget\Grid\Filter\DateRange;

class CmsPostGrid extends Grid {

    public function init() {
		$model = new CmsPost();
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
					'name' => 'id_category',	
					'header' => $this->_('id_category'),
					'value' => 'id_category',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'title',	
					'header' => $this->_('title'),
					'value' => 'title',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'slug',	
					'header' => $this->_('slug'),
					'value' => 'slug',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'quote',	
					'header' => $this->_('quote'),
					'value' => 'quote',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'content',	
					'header' => $this->_('content'),
					'value' => 'content',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'thumbnail',	
					'header' => $this->_('thumbnail'),
					'value' => 'thumbnail',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'uri',	
					'header' => $this->_('uri'),
					'value' => 'uri',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
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
					'name' => 'decscription',	
					'header' => $this->_('decscription'),
					'value' => 'decscription',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'created_date',	
					'header' => $this->_('created_date'),
					'value' => 'created_date',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'updated_date',	
					'header' => $this->_('updated_date'),
					'value' => 'updated_date',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'meta_title',	
					'header' => $this->_('meta_title'),
					'value' => 'meta_title',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'meta_description',	
					'header' => $this->_('meta_description'),
					'value' => 'meta_description',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'meta_keywords',	
					'header' => $this->_('meta_keywords'),
					'value' => 'meta_keywords',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return CmsPost::getStatusLabel($data->status);
        			},
        			'filter' => CmsPost::listStatus(),	
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
						$actionLinks = new ActionLink($data, array('baseUri' => '/backend/cms-post'));
						return $actionLinks->getLinks();
					},					
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				)
		);
	}

}
