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
use App\Modules\System\Models\AclRole;

class AclRoleForm extends Form {

    public function init() {
		
        $name = new Text('name');
		$name->setLabel($this->_('name'));
        $name->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'name'))
        )));
		$name->addValidator(new StringLength(array(
        		'max' => 32, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'name', 'm' => 32)))
        ));
						

        $note = new TextArea('note');
		$note->setLabel($this->_('note'));
        $note->addValidator(new StringLength(array(
        		'max' => 100, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'note', 'm' => 100)))
        ));

        $link = new Text('link');
		$link->setLabel($this->_('link'));
        $link->addValidator(new StringLength(array(
        		'max' => 100, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'link', 'm' => 100)))
        ));
						

        $status = new Select('status');
		$status->setLabel($this->_('status'));
        $status->setOptions(AclRole::listStatus());				

		
        $groupBody = new Group('box-body', array(
		$name, $note, $link, $status			
		), array('class' => 'box-body'));
		
		$this->addGroup($groupBody);
		$this->addGroup(new BoxFooter());
	}

}
