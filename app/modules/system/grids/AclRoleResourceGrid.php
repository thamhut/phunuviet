<?php
        		
namespace App\Modules\System\Grids;

use OE\Widget\Grid;
use App\Modules\System\Models\AclRoleResource;
use App\Grids\Elements\ActionLink;
use OE\Widget\Grid\Filter\DateRange;
use Phalcon\Tag;
use App\Modules\System\Models\AclResource;

class AclRoleResourceGrid extends Grid {

	public $idRole;
	public $isAdd;
	public $roleResource;
	
	public function __construct($name, $idRole=null, $isAdd=false) {
		$this->idRole = $idRole;
		$this->isAdd = $isAdd;
		parent::__construct($name);
	}
	
    public function init() {
		$model = new AclRoleResource();
		$this->roleResource = $model->search($this->idRole);
		
		if($this->isAdd) {
			$model = new AclResource();
			$resource = $model->search();
			$columns = $this->getColumnsToAdd();
			$action = 'add';
			$this->disablePagination = true;
			$this->disableFilter = true;
		} else {
			$resource = $this->roleResource;
			$columns = $this->getColumns();
			$action = 'view';
		}
		$this->setSource($resource);
		$this->setColumns($columns);
		$this->setUri("/system/acl-role/{$action}Resource?idRole={$this->idRole}");
	}

    public function getColumnsToAdd() {
    	$roleResourcesArr = array();
    	$roleResources = $this->roleResource->getQuery()->execute();
    	
    	foreach ($roleResources as $rr) {
    		$roleResourcesArr[] = $rr->id_acl_resource;
    	}
    	
		return array(
				array(
					'header' => function() {
						return Tag::checkField(array('checkall', 'class' => 'checkall simple'));
					},
					'value' => function($data) use($roleResourcesArr) {
						$options = array('roleResource[id][]', 'value' => $data->id, 'class' => 'check-item simple');
						
						if(in_array($data->id, $roleResourcesArr)) {
							$options['checked'] = true;
						}
						
						return Tag::checkField($options);
					},
					'filter' => false,
					'export' => false,
					'sort' => false,
					'htmlOptions' => array('class' => 'text-center'),
					'headerHtmlOptions' => array('class' => 'text-center'),
				),
	        	array(
					'name' => 'name',	
					'header' => $this->_('resource'),
					'value' => 'name',
					'filter' => false,
					'export' => false,
        			'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'action',	
					'header' => $this->_('action'),
					'value' => 'action',
					'filter' => false,
					'export' => false,
        			'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'title',	
					'header' => $this->_('title'),
					'value' => 'title',
					'filter' => false,
					'export' => false,
        			'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
		);
	}
	
    public function getColumns() {
		return array(
	        	array(
					'name' => 'r.name',	
					'header' => $this->_('resource'),
					'value' => 'r_name',
        			'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'r.action',	
					'header' => $this->_('action'),
					'value' => 'r_action',
        			'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return AclRoleResource::getStatusLabel($data->status);
        			},
        			'filter' => AclRoleResource::listStatus(),	
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
						$actionLinks = new ActionLink($data, array(
							'baseUri' => '',
							'view' => false,
							'update' => false,
							'delete' => array(
								'link' => "/system/acl-role/removeResource?id={$data->id}&idRole={$this->idRole}",	
								'label' => 'Remove resource',
								'icon' => 'fa fa-trash-o',
								'classLink' => 'oe-grid-action delete',		
								'confirm' => 'Do you want to continue?'		
						)));
						
						return $actionLinks->getLinks();
					},					
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				)
		);
	}
}