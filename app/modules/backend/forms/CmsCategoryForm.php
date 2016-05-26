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
use App\Modules\Backend\Models\CmsCategory;

class CmsCategoryForm extends Form {

    public function init() {
		
        $id_parent = new Text('id_parent');
		$id_parent->setLabel($this->_('id_parent'));
        $id_parent->addValidator(new StringLength(array(
        		'max' => 11, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'id_parent', 'm' => 11)))
        ));
						

        $title = new Textarea('title');
		$title->setLabel($this->_('title'));
        $title->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'title'))
        )));
		$title->addValidator(new StringLength(array(
        		'max' => 100, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'title', 'm' => 100)))
        ));
						

        $slug = new Textarea('slug');
		$slug->setLabel($this->_('slug'));
        $slug->addValidator(new StringLength(array(
        		'max' => 200, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'slug', 'm' => 200)))
        ));
						

        $thumbnail = new Textarea('thumbnail');
		$thumbnail->setLabel($this->_('thumbnail'));
        $thumbnail->addValidator(new StringLength(array(
        		'max' => 200, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'thumbnail', 'm' => 200)))
        ));
						

        $quote = new Textarea('quote');
		$quote->setLabel($this->_('quote'));
        $quote->addValidator(new StringLength(array(
        		'max' => 500, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'quote', 'm' => 500)))
        ));
						

        $decscription = new Textarea('decscription');
		$decscription->setLabel($this->_('decscription'));
        $decscription->addValidator(new StringLength(array(
        		'max' => 500, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'decscription', 'm' => 500)))
        ));
						

        $created_date = new Text('created_date');
		$created_date->setLabel($this->_('created_date'));
        $created_date->addValidator(new StringLength(array(
        		'max' => 0, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'created_date', 'm' => 0)))
        ));
						

        $updated_date = new Text('updated_date');
		$updated_date->setLabel($this->_('updated_date'));
        $updated_date->addValidator(new StringLength(array(
        		'max' => 0, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'updated_date', 'm' => 0)))
        ));
						

        $meta_title = new Textarea('meta_title');
		$meta_title->setLabel($this->_('meta_title'));
        $meta_title->addValidator(new StringLength(array(
        		'max' => 255, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'meta_title', 'm' => 255)))
        ));
						

        $meta_description = new Textarea('meta_description');
		$meta_description->setLabel($this->_('meta_description'));
        $meta_description->addValidator(new StringLength(array(
        		'max' => 255, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'meta_description', 'm' => 255)))
        ));
						

        $meta_keyword = new Textarea('meta_keyword');
		$meta_keyword->setLabel($this->_('meta_keyword'));
        $meta_keyword->addValidator(new StringLength(array(
        		'max' => 255, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'meta_keyword', 'm' => 255)))
        ));
						

        $status = new Select('status');
		$status->setLabel($this->_('status'));
        $status->setOptions(CmsCategory::listStatus());				

		
        $groupBody = new Group('box-body', array(
		$id_parent, $title, $slug, $thumbnail, $quote, $decscription, $created_date, $updated_date, $meta_title, $meta_description, $meta_keyword, $status			
		), array('class' => 'box-body'));
		
		$this->addGroup($groupBody);
		$this->addGroup(new BoxFooter());
	}

}
