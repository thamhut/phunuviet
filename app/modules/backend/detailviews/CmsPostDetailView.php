<?php
        		
namespace App\Modules\Backend\DetailViews;

use OE\Widget\DetailView;
use App\Modules\Backend\Models\CmsPost;

class CmsPostDetailView extends DetailView {

    public function init() {
		$this->setCaption($this->_('CmsPost Detail'));
		$this->setColumns($this->getColumns());
	}

    public function getColumns() {
		return array(
	        	array(
					'name' => 'id',	
					'header' => $this->_('id'),
					'value' => 'id',
        			'sort' => false 		
				),
	        	array(
					'name' => 'id_category',	
					'header' => $this->_('id_category'),
					'value' => 'id_category',
        			'sort' => false 		
				),
	        	array(
					'name' => 'title',	
					'header' => $this->_('title'),
					'value' => 'title',
        			'sort' => false 		
				),
	        	array(
					'name' => 'slug',	
					'header' => $this->_('slug'),
					'value' => 'slug',
        			'sort' => false 		
				),
	        	array(
					'name' => 'quote',	
					'header' => $this->_('quote'),
					'value' => 'quote',
        			'sort' => false 		
				),
	        	array(
					'name' => 'content',	
					'header' => $this->_('content'),
					'value' => 'content',
        			'sort' => false 		
				),
	        	array(
					'name' => 'thumbnail',	
					'header' => $this->_('thumbnail'),
					'value' => 'thumbnail',
        			'sort' => false 		
				),
	        	array(
					'name' => 'uri',	
					'header' => $this->_('uri'),
					'value' => 'uri',
        			'sort' => false 		
				),
	        	array(
					'name' => 'position',	
					'header' => $this->_('position'),
					'value' => 'position',
        			'sort' => false 		
				),
	        	array(
					'name' => 'decscription',	
					'header' => $this->_('decscription'),
					'value' => 'decscription',
        			'sort' => false 		
				),
	        	array(
					'name' => 'created_date',	
					'header' => $this->_('created_date'),
					'value' => 'created_date',
        			'sort' => false 		
				),
	        	array(
					'name' => 'updated_date',	
					'header' => $this->_('updated_date'),
					'value' => 'updated_date',
        			'sort' => false 		
				),
	        	array(
					'name' => 'meta_title',	
					'header' => $this->_('meta_title'),
					'value' => 'meta_title',
        			'sort' => false 		
				),
	        	array(
					'name' => 'meta_description',	
					'header' => $this->_('meta_description'),
					'value' => 'meta_description',
        			'sort' => false 		
				),
	        	array(
					'name' => 'meta_keywords',	
					'header' => $this->_('meta_keywords'),
					'value' => 'meta_keywords',
        			'sort' => false 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return CmsPost::getStatusLabel($data->status);
        			},
        			'sort' => false 		
				),
		);
	}

}
