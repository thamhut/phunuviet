<?php
        		
namespace App\Modules\System\Forms;

use OE\Widget\Form;
use OE\Widget\Form\Group;
use OE\Widget\Form\Element\Text;
use OE\Widget\Form\Element\Email;
use OE\Widget\Form\Element\Password;
use OE\Widget\Form\Element\Select;
use OE\Widget\Form\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email as EmailValidator;
use App\Forms\Groups\BoxFooter;
use App\Modules\System\Models\AclRoleResource;

class AclRoleResourceForm extends Form {

    public function init() {
		
        $id_acl_role = new Text('id_acl_role');
		$id_acl_role->setLabel($this->_('id_acl_role'));
        $id_acl_role->addValidator(new StringLength(array(
        		'max' => 11, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'id_acl_role', 'm' => 11)))
        ));
						

        $id_acl_resource = new Text('id_acl_resource');
		$id_acl_resource->setLabel($this->_('id_acl_resource'));
        $id_acl_resource->addValidator(new StringLength(array(
        		'max' => 11, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'id_acl_resource', 'm' => 11)))
        ));
						

        $status = new Select('status');
		$status->setLabel($this->_('status'));
        $status->setOptions(AclRoleResource::listStatus());				

		
        $groupBody = new Group('box-body', array(
		$id_acl_role, $id_acl_resource, $status			
		), array('class' => 'box-body'));
		
		$this->addGroup($groupBody);
		$this->addGroup(new BoxFooter());
	}

}
