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
use App\Modules\Backend\Models\CmsMenu;

class CmsMenuForm extends Form {

    public function init() {
		
        $id_parent = new Select('id_parent');
		$id_parent->setLabel($this->_('id_parent'));
		$id_parent->setOptions(CmsMenu::find());
		$id_parent->setAttributes(array(
				'using' => array('id', 'title'), 
				'useEmpty' => true, 
				'emptyText' => '...', 
				'emptyValue' => 0
		));
						

        $title = new TextArea('title');
		$title->setLabel($this->_('title'));
        $title->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'title'))
        )));
		$title->addValidator(new StringLength(array(
        		'max' => 100, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'title', 'm' => 100)))
        ));
						

        $slug = new TextArea('slug');
		$slug->setLabel($this->_('slug'));
        $slug->addValidator(new StringLength(array(
        		'max' => 100, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'slug', 'm' => 100)))
        ));
						

        $uri = new TextArea('uri');
		$uri->setLabel($this->_('uri'));
						

        $position = new Text('position');
		$position->setLabel($this->_('position'));
		$position->setDefault('0');
        $position->addValidator(new StringLength(array(
        		'max' => 11, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'position', 'm' => 11)))
        ));
						

        $status = new Select('status');
		$status->setLabel($this->_('status'));
        $status->setOptions(CmsMenu::listStatus());				

		
        $groupBody = new Group('box-body', array(
		$id_parent, $title, $slug, $uri, $position, $status			
		), array('class' => 'box-body'));
		
		$this->addGroup($groupBody);
		$this->addGroup(new BoxFooter());
	}

}
