<?php

namespace App\Modules\Backend\Controllers;

use Phalcon\Session\Adapter\Files as Session;
use App\Modules\Backend\Forms\LoginForm;
use App\Components\Common;
use App\Models\AclRole;
use App\Models\AclUser;

class AuthController extends BaseController {

    public function initialize() {
    	$this->view->setLayout('login');
    }

    public function loginAction() {
    	if($this->session->get('auth')) {
    	    return $this->redirect('index', 'index');
    	}
    	$message = null;
    	$form = new LoginForm();
    	            
        if($this->request->isPost()) {
        	if($form->isValid($_POST)) {
	            $username = $form->getValue('username');
	            $password = $form->getValue('password');
	            $password = Common::hash($password);
	            $language = $form->getValue('language');

	            $aclUser = AclUser::findFirst(array(
	                "username = :username: AND password = :password: AND status = 1",
	                'bind' => array(
	                    'username' => $username,
	                    'password' => $password
	                )
	            ));

	            if($aclUser) {
	                $this->_registerSession($username, $aclUser->getIdAclRole(), $aclUser->getFullName(), $language, $aclUser->id);
	                if($aclUser->getId() != 1) {
	                	$roleModel = AclRole::findFirst($aclUser->getIdAclRole());
	                	if($roleModel && ($uri = $roleModel->getLink())) {
			                return $this->response->redirect($uri);
	                	}
	                }
	                return $this->redirect('index', 'index');
	            }
	            $message = $this->_('Incorrect username or password or the account has been deleted.');
        	} else {
	        	$message = $this->_('Please input valid data to submit.');
        	}
        }
        
        $this->view->setVars(array(
        	'form' => $form,
        	'message' => $message,
        ));
    }

    /**
     * Register an authenticated $aclUser into session data
     *
     * @param $aclUser $aclUser
     */
    private function _registerSession($username, $idAclRole, $fullname, $language, $id) {
        $this->session->set('auth', array(
		    'username' => $username,
        	'id_acl_role' => $idAclRole,	
        	'fullname' => $fullname,	
            'language' => $language,
			'id' => $id,
        ));
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function logoutAction() {
        $this->session->remove('auth');
        session_regenerate_id();
        return $this->redirect('login');
    }
    
    /**
     * Access denied page
     */
    public function deniedAction() {
    	$this->pageTitle = $this->_('Access denied');
    	$this->view->setLayout('main');
    }

    /**
     * Change password page 
     * 
     * @return \Phalcon\Http\ResponseInterface
     */
    public function changePasswordAction() {
        return $this->response->redirect('/backend/index/index');
    }
}