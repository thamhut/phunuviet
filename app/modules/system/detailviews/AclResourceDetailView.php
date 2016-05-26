<?php
        		
namespace App\Modules\System\DetailViews;

use OE\Widget\DetailView;
use App\Modules\System\Models\AclResource;

class AclResourceDetailView extends DetailView {

    public function init() {
		$this->setCaption($this->_('AclResource Detail'));
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
					'name' => 'name',	
					'header' => $this->_('name'),
					'value' => 'name',
        			'sort' => false 		
				),
	        	array(
					'name' => 'action',	
					'header' => $this->_('action'),
					'value' => 'action',
        			'sort' => false 		
				),
	        	array(
					'name' => 'title',	
					'header' => $this->_('title'),
					'value' => 'title',
        			'sort' => false 		
				),
	        	array(
					'name' => 'note',	
					'header' => $this->_('note'),
					'value' => 'note',
        			'sort' => false 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return AclResource::getStatusLabel($data->status);
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
