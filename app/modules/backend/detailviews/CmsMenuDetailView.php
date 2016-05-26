<?php
        		
namespace App\Modules\Backend\DetailViews;

use OE\Widget\DetailView;
use App\Modules\Backend\Models\CmsMenu;

class CmsMenuDetailView extends DetailView {

    public function init() {
		$this->setCaption($this->_('CmsMenu Detail'));
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
					'name' => 'id_parent',	
					'header' => $this->_('id_parent'),
					'value' => 'id_parent',
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
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return CmsMenu::getStatusLabel($data->status);
        			},
        			'sort' => false 		
				),
	        	array(
					'name' => 'updated_at',	
					'header' => $this->_('updated_at'),
					'value'  => function ($data) {
						return \App\Helpers\Date::getByLang($data->updated_at);
					},
        			'sort' => false,		
				),
		);
	}

}
