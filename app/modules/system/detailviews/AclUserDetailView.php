<?php
        		
namespace App\Modules\System\DetailViews;

use OE\Widget\DetailView;
use App\Modules\System\Models\AclUser;

class AclUserDetailView extends DetailView {

    public function init() {
		$this->setCaption($this->_('AclUser Detail'));
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
					'name' => 'username',	
					'header' => $this->_('username'),
					'value' => 'username',
        			'sort' => false 		
				),
	        	array(
					'name' => 'fullname',	
					'header' => $this->_('fullname'),
					'value' => 'fullname',
        			'sort' => false 		
				),
	        	array(
					'name' => 'email',	
					'header' => $this->_('email'),
					'value' => 'email',
        			'sort' => false 		
				),
	        	array(
					'name' => 'phone',	
					'header' => $this->_('phone'),
					'value' => 'phone',
        			'sort' => false 		
				),
	        	array(
					'name' => 'address',	
					'header' => $this->_('address'),
					'value' => 'address',
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
        				return AclUser::getStatusLabel($data->status);
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
