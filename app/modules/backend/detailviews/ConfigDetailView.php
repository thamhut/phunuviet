<?php
        		
namespace App\Modules\Backend\DetailViews;

use OE\Widget\DetailView;
use App\Modules\Backend\Models\Config;

class ConfigDetailView extends DetailView {

    public function init() {
		$this->setCaption($this->_('Config Detail'));
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
					'name' => 'value',	
					'header' => $this->_('value'),
					'value' => 'value',
        			'sort' => false 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return Config::getStatusLabel($data->status);
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
