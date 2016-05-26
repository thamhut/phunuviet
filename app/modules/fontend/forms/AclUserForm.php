<?php
        		
namespace App\Modules\Fontend\Forms;

use App\Models\AclRole;
use OE\Widget\Form;
use OE\Widget\Form\Group;
use OE\Widget\Form\Element\Text;
use OE\Widget\Form\Element\Email;
use OE\Widget\Form\Element\Password;
use OE\Widget\Form\Element\Select;
use OE\Widget\Form\Element\TextArea;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email as EmailValidator;
use App\Forms\Groups\BoxFooter;
use Phalcon\Validation\Validator\Uniqueness;

class AclUserForm extends Form {

    public function init() {
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

		$repassword = new Password('repassword');
		$repassword->setLabel($this->_('repassword'));
		$repassword->addValidator(new Confirmation(array(
			'message' => 'Password doesn\'t match confirmation',
			'with' => 'password'
		)));
						

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
						

		
        $groupBody = new Group('box-body', array(
		$username, $password, $repassword, $fullname, $email
		), array('class' => 'box-body'));
		
		$this->addGroup($groupBody);
		$this->addGroup(new BoxFooter());
	}

}
