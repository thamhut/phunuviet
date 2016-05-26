<?php

namespace App\Modules\Backend\Controllers;

use OE\Application;
use Phalcon;
use App\Plugins\SecurityPlugin;
use Phalcon\Events\Event;
use Phalcon\Mvc\View;

class BaseController extends Application\Controller {
	
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
    	Phalcon\Tag::setTitle('Kiss Movies CPanel');
    	
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

	function file_get_contents_curl($url)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		$data = curl_exec($ch);
		curl_close($ch);

		return $data;
	}
}