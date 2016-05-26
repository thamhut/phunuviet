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
use App\Modules\System\Models\AclResource;

class AclResourceForm extends Form {

    public function init() {
		
        $id_parent = new Text('id_parent');
		$id_parent->setLabel($this->_('id_parent'));
        $id_parent->addValidator(new StringLength(array(
        		'max' => 11, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'id_parent', 'm' => 11)))
        ));
						

        $name = new TextArea('name');
		$name->setLabel($this->_('name'));
        $name->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'name'))
        )));
		$name->addValidator(new StringLength(array(
        		'max' => 200, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'name', 'm' => 200)))
        ));
						

        $action = new Text('action');
		$action->setLabel($this->_('action'));
        $action->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'action'))
        )));
		$action->addValidator(new StringLength(array(
        		'max' => 50, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'action', 'm' => 50)))
        ));
						

        $title = new TextArea('title');
		$title->setLabel($this->_('title'));
        $title->addValidator(new StringLength(array(
        		'max' => 100, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'title', 'm' => 100)))
        ));
						

        $note = new TextArea('note');
		$note->setLabel($this->_('note'));
        $note->addValidator(new StringLength(array(
        		'max' => 100, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'note', 'm' => 100)))
        ));
						

        $status = new Select('status');
		$status->setLabel($this->_('status'));
        $status->setOptions(AclResource::listStatus());				

		
        $groupBody = new Group('box-body', array(
		$id_parent, $name, $action, $title, $note, $status			
		), array('class' => 'box-body'));
		
		$this->addGroup($groupBody);
		$this->addGroup(new BoxFooter());
	}

}
