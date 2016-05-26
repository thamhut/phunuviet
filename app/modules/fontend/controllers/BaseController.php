<?php

namespace App\Modules\Fontend\Controllers;

use OE\Application;
use Phalcon;
use App\Plugins\SecurityPlugin;
use Phalcon\Events\Event;
use Phalcon\Mvc\View;

class BaseController extends Application\Controller {
	
	public function initialize(){
		$data['meta_title'] = 'saleworld18 - the site aggregate product deal, sale off of the all shop in usa';
		$data['meta_content'] = 'Website aggregate product deal, sale off of the all shop in usa, include clothes, fashion and Cosmetics, Beauty Products, Fragrances & Tools and shop forever21, levi, sephora, lacoste,...';
		//Add some local CSS resources
		$this->assets->addCss('/public/skin/common/libs/myriad-pro/css/common.css');
		$this->assets->addCss('/public/skin/fontend/css/common.css');
		$this->assets->addCss('/public/skin/fontend/css/common.css');
		$this->assets->addCss('/public/skin/common/libs/bootstrap/dist/css/bootstrap.min.css');
		$this->assets->addCss('/public/skin/common/libs/font-awesome/css/font-awesome.min.css');

		//and some local javascript resources
		$this->assets->addJs('/public/skin/common/libs/jquery/dist/jquery.min.js');
		$this->assets->addJs('/public/skin/common/libs/jquery-ui/jquery-ui.min.js');
		$this->assets->addJs('/public/skin/common/libs/bootstrap/dist/js/bootstrap.min.js');
		$this->assets->addJs('/public/skin/common/libs/common.js');
	}
	
	
	/**
	 * Example before execute route
	 * @param unknown $dispatcher
	 * @return boolean
	 */
	public function beforeExecuteRoute($dispatcher) {}

    /**
     * Example after execute route
     * @param unknown $dispatcher
     */
    public function afterExecuteRoute($dispatcher) {
        $this->view->setVar('pageTitle', $this->pageTitle);
    }
    
    public function onConstruct() {
    	parent::onConstruct();
    	Phalcon\Tag::setTitle('Sale World');
    	
    	if($this->request->isPost() && $this->request->isAjax() && $this->request->getPost('ajaxRenderLevel') == View::LEVEL_NO_RENDER) {
    		$this->view->disable();
    	}
   	}
   	
   	/**
   	 * Add array data to session with index
   	 * @param string $index
   	 * @param array $data
   	 * @param int $key is key in array session data
   	 */
   	public function setSessionUserInfo($index, $data, $key=-1) {
   	    $curData = $this->session->get($index) ? $this->session->get($index) : array();
   	    if ($key > -1)
            $curData[$key] = $data;
   	    else
   	        $curData[] = $data;
   	    
   	    $this->session->set($index, $curData);
   	}
}