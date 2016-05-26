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
use App\Modules\System\Models\AclUser;
use App\Modules\System\Models\AclRole;
use Phalcon\Validation\Validator\Uniqueness;

class AclUserForm extends Form {

    public function init() {
        $id_acl_role = new Select('id_acl_role');
		$id_acl_role->setLabel($this->_('Role'));
		$id_acl_role->setOptions(AclRole::find(array('id != 1')));
		$id_acl_role->setAttributes(array(
				'using' => array('id', 'name'),
				'useEmpty' => false
		));
						

        $username = new Text('username');
		$username->setLabel($this->_('username'));
        $username->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'username'))
        )));
		$username->addValidator(new StringLength(array(
        		'max' => 32, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'username', 'm' => 32)))
        ));
		if(!$this->getEntity()) {
			$username->addValidator(new Uniqueness(array(
				'model' => 'App\Models\AclUser',
				'message' => ':field must be unique'
			)));
		}

        $password = new Password('password');
		$password->setLabel($this->_('password'));
        $password->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'password'))
        )));
		$password->addValidator(new StringLength(array(
        		'max' => 32, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'password', 'm' => 32)))
        ));
						

        $fullname = new Text('fullname');
		$fullname->setLabel($this->_('fullname'));
        $fullname->addValidator(new StringLength(array(
        		'max' => 50, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'fullname', 'm' => 50)))
        ));
						

        $email = new Email('email');
		$email->setLabel($this->_('email'));
        $email->addValidator(new StringLength(array(
        		'max' => 50, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'email', 'm' => 50)))
        ));
						

        $phone = new Text('phone');
		$phone->setLabel($this->_('phone'));
        $phone->addValidator(new StringLength(array(
        		'max' => 50, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'phone', 'm' => 50)))
        ));
						

        $address = new Text('address');
		$address->setLabel($this->_('address'));
        $address->addValidator(new StringLength(array(
        		'max' => 50, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'address', 'm' => 50)))
        ));
						

        $note = new TextArea('note');
		$note->setLabel($this->_('note'));
        $note->addValidator(new StringLength(array(
        		'max' => 200, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'note', 'm' => 200)))
        ));
						

        $status = new Select('status');
		$status->setLabel($this->_('status'));
        $status->setOptions(AclUser::listStatus());				

		
        $groupBody = new Group('box-body', array(
		$id_acl_role, $username, $password, $fullname, $email, $phone, $address, $note, $status			
		), array('class' => 'box-body'));
		
		$this->addGroup($groupBody);
		$this->addGroup(new BoxFooter());
	}

}
