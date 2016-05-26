<?php

namespace App\Modules\Backend\Controllers;

use App\Models\Post as Post;
use App\Modules\Backend\Grids;
use App\Modules\Backend\Forms\Contact;
use App\Modules\Backend\DetailViews\PostDetailView;
use App\Components\Constant;
use App\Components\Common;
use App\Modules\Backend\Models\User;
use App\Modules\Backend\Forms\AclUserForm;
use OE\Helper;
use App\Modules\Backend\Grids\UserDashboardGrid;
use App\Modules\Backend\Grids\ContractDashboardGrid;

class IndexController extends BaseController {

	/**
	 * Route action
	 */
	public function indexAction() {
		$data = array();
		$user_ss = $this->session->get('auth');
		if(!isset($user_ss['id'])){
			return $this->response->redirect('/backend/auth/login');
		}
		$data['user'] = User::findFirst('id='.$user_ss['id']);
		$data['form'] = new AclUserForm($data['user']);
		if($this->request->isPost()) {
			if($data['form']->isValid($_POST)) {
				$data_insert = $data['form']->getValues();
				$data_insert['password'] = Common::hash($data_insert['password']);
				if($data['user']->save($data_insert)) {
					$this->flashSession->success($this->_("Update profile successfully"));
					return $this->redirect('index');
				} else {
					$this->flashSession->error($this->_("Update profile error"));
				}
			}
		}
	    $this->pageTitle = $this->_('Dashboard');
		$this->view->setVars($data);
	    
    }
	
    /**
     * Get count column from model in range
     * 
     * @param string $model
     * @param string $column
     * @param string $start
     * @param string $end
     * @return int
     */
    private function _getCount($model, $column=null, $start=null, $end=null) {
    	$phql = "SELECT COUNT(id) AS count FROM \App\Models\\$model";
    	if ($column && $start && $end) {
    		$phql .= " WHERE $column BETWEEN $start AND $end ";
    	}
    	$row  = $this->modelsManager->executeQuery($phql)->getFirst();
    	return $row['count'];
    }
    
	/**
	 * Change language
	 * 
	 * @return \Phalcon\Http\ResponseInterface
	 */
	public function changeLanguageAction() {
		$lang = $this->request->get('lang');
		if(!in_array($lang, array_keys(Constant::listLang()))) {
			$lang = Constant::LANG_EN;
		}
		$this->session->set('language', $lang);
		return $this->response->redirect($this->url->get(Common::backLink()));
	}
	
	/**
	 * Set left bar collapse
	 */
	public function setLeftbarCollapseAction() {
		$this->session->set('collapsed', (int)$this->request->get('collapsed'));
		$this->view->disable();
	}
}