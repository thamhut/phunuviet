<?php
        		
namespace App\Modules\System\Grids;

use OE\Widget\Grid;
use App\Modules\System\Models\AclUser;
use App\Grids\Elements\ActionLink;
use OE\Widget\Grid\Filter\DateRange;
use OE\Widget\Grid\Filter\Select;
use App\Modules\System\Models\AclRole;

class AclUserGrid extends Grid {

    public function init() {
		$model = new AclUser();
		$this->setSource($model->search());
		$this->setColumns($this->getColumns());
	}

    public function getColumns() {
		return array(
	        	array(
					'name' => 'username',	
					'header' => $this->_('username'),
					'value' => 'username',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'fullname',	
					'header' => $this->_('fullname'),
					'value' => 'fullname',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
				array(
					'name' => 'id_acl_role',
					'header' => $this->_('Role'),
					'value' => 'r_name',
					'filter' => new Select(array(AclRole::find(array('status = 1')), 'using' => array('id', 'name'))),
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'),
					'headerHtmlOptions' => array('class' => 'text-center'),
				),
	        	array(
					'name' => 'email',	
					'header' => $this->_('email'),
					'value' => 'email',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-left'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'phone',	
					'header' => $this->_('phone'),
					'value' => 'phone',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-right'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),
	        	array(
					'name' => 'status',	
					'header' => $this->_('status'),
					'value' => function($data) {
        				return AclUser::getStatusLabel($data->status);
        			},
        			'filter' => AclUser::listStatus(),	
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
						$actionLinks = new ActionLink($data, array('baseUri' => '/system/acl-user'));
						return $actionLinks->getLinks();
					},					
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				)
		);
	}

}
