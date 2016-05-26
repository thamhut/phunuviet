<?php
        		
namespace App\Modules\Backend\Forms;

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
use App\Modules\Backend\Models\Config;

class ConfigForm extends Form {

    public function init() {
		
        $name = new Text('name');
		$name->setLabel($this->_('name'));
        $name->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'name'))
        )));
		$name->addValidator(new StringLength(array(
        		'max' => 50, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'name', 'm' => 50)))
        ));
						

        $value = new TextArea($this->mode == 'create' ? 'data' : 'value');
		$value->setLabel($this->_('value'));
        $value->addValidator(new StringLength(array(
        		'max' => 1000, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'value', 'm' => 1000)))
        ));
						

        $status = new Select('status');
		$status->setLabel($this->_('status'));
        $status->setOptions(Config::listStatus());				

		
        $groupBody = new Group('box-body', array(
		$name, $value, $status			
		), array('class' => 'box-body'));
		
		$this->addGroup($groupBody);
		$this->addGroup(new BoxFooter());
	}

}
