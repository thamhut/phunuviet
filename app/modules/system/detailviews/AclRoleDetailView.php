<?php
        		
namespace App\Modules\System\DetailViews;

use OE\Widget\DetailView;
use App\Modules\System\Models\AclRole;

class AclRoleDetailView extends DetailView {

    public function init() {
		$this->setCaption($this->_('AclRole Detail'));
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
					'name' => 'name',	
					'header' => $this->_('name'),
					'value' => 'name',
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
        				return AclRole::getStatusLabel($data->status);
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
