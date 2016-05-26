<?php
        		
namespace App\Modules\System\DetailViews;

use OE\Widget\DetailView;
use App\Modules\System\Models\AclRoleResource;

class AclRoleResourceDetailView extends DetailView {

    public function init() {
		$this->setCaption($this->_('AclRoleResource Detail'));
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
					'name' => 'id_acl_role',	
					'header' => $this->_('id_acl_role'),
					'value' => 'id_acl_role',
        			'sort' => false 		
				),
	        	array(
					'name' => 'id_acl_resource',	
					'header' => $this->_('id_acl_resource'),
					'value' => 'id_acl_resource',
        			'sort' => false 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return AclRoleResource::getStatusLabel($data->status);
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
