<?php
        		
namespace App\Modules\System\Grids;

use OE\Widget\Grid;
use App\Modules\System\Models\AclRole;
use App\Grids\Elements\ActionLink;
use OE\Widget\Grid\Filter\DateRange;
use Phalcon\Tag;

class AclRoleGrid extends Grid {

    public function init() {
		$model = new AclRole();
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
					'name' => 'name',	
					'header' => $this->_('name'),
					'value' => 'name',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'note',	
					'header' => $this->_('note'),
					'value' => 'note',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'link',	
					'header' => $this->_('first link access'),
					'value' => 'link',
					'sort' => false,
					'filter' => false,
       				'export' => false,
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return AclRole::getStatusLabel($data->status);
        			},
        			'filter' => AclRole::listStatus(),	
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'updated_at',	
					'header' => $this->_('updated_at'),
					'value' => 'updated_at',
					'sort' => false,
					'filter' => false,
       				'export' => false,	
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => '',	
					'header' => 'View',
					'value' => function($data) {
						return Tag::linkTo(array("/system/acl-role/viewResource?idRole={$data['id']}", 'View resources'));
					},
					'sort' => false,
					'filter' => false,
       				'export' => false,	
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => '',	
					'header' => 'Add',
					'value' => function($data) {
						return Tag::linkTo(array("/system/acl-role/addResource?idRole={$data['id']}", 'Add resources'));
					},
					'sort' => false,
					'filter' => false,
       				'export' => false,	
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
						$actionLinks = new ActionLink($data, array('baseUri' => '/system/acl-role'));
						return $actionLinks->getLinks();
					},					
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				)
		);
	}

}
