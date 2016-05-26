<?php
        		
namespace App\Modules\Backend\Forms;

use OE\Widget\Form;
use OE\Widget\Form\Group;
use OE\Widget\Form\Element\Text;
use OE\Widget\Form\Element\Email;
use OE\Widget\Form\Element\Password;
use OE\Widget\Form\Element\Select;
use OE\Widget\Form\Element\Textarea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email as EmailValidator;
use App\Forms\Groups\BoxFooter;
use App\Modules\Backend\Models\CmsPost;

class CmsPostForm extends Form {

    public function init() {
		
        $id_category = new Text('id_category');
		$id_category->setLabel($this->_('id_category'));
        $id_category->addValidator(new StringLength(array(
        		'max' => 11, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'id_category', 'm' => 11)))
        ));
						

        $title = new Textarea('title');
		$title->setLabel($this->_('title'));
        $title->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'title'))
        )));
		$title->addValidator(new StringLength(array(
        		'max' => 200, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'title', 'm' => 200)))
        ));
						

        $slug = new Textarea('slug');
		$slug->setLabel($this->_('slug'));
        $slug->addValidator(new PresenceOf(array(
        		'message' => $this->_('%n% is required', array('n' => 'slug'))
        )));
		$slug->addValidator(new StringLength(array(
        		'max' => 200, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'slug', 'm' => 200)))
        ));
						

        $quote = new Textarea('quote');
		$quote->setLabel($this->_('quote'));
        $quote->addValidator(new StringLength(array(
        		'max' => 500, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'quote', 'm' => 500)))
        ));
						

        $content = new Text('content');
		$content->setLabel($this->_('content'));
        $content->addValidator(new StringLength(array(
        		'max' => 0, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'content', 'm' => 0)))
        ));
						

        $thumbnail = new Textarea('thumbnail');
		$thumbnail->setLabel($this->_('thumbnail'));
        $thumbnail->addValidator(new StringLength(array(
        		'max' => 200, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'thumbnail', 'm' => 200)))
        ));
						

        $uri = new Textarea('uri');
		$uri->setLabel($this->_('uri'));
        $uri->addValidator(new StringLength(array(
        		'max' => 200, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'uri', 'm' => 200)))
        ));
						

        $position = new Text('position');
		$position->setLabel($this->_('position'));
        $position->addValidator(new StringLength(array(
        		'max' => 11, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'position', 'm' => 11)))
        ));
						

        $decscription = new Textarea('decscription');
		$decscription->setLabel($this->_('decscription'));
        $decscription->addValidator(new StringLength(array(
        		'max' => 200, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'decscription', 'm' => 200)))
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
						

        $meta_keywords = new Textarea('meta_keywords');
		$meta_keywords->setLabel($this->_('meta_keywords'));
        $meta_keywords->addValidator(new StringLength(array(
        		'max' => 255, 
        		'messageMaximum' => $this->_('%n% is too long. Maximum %m% characters', array('n' => 'meta_keywords', 'm' => 255)))
        ));
						

        $status = new Select('status');
		$status->setLabel($this->_('status'));
        $status->setOptions(CmsPost::listStatus());				

		
        $groupBody = new Group('box-body', array(
		$id_category, $title, $slug, $quote, $content, $thumbnail, $uri, $position, $decscription, $created_date, $updated_date, $meta_title, $meta_description, $meta_keywords, $status			
		), array('class' => 'box-body'));
		
		$this->addGroup($groupBody);
		$this->addGroup(new BoxFooter());
	}

}
