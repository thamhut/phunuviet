<?php
namespace App\Modules\System\Controllers;

use App\Modules\System\Models\AclUser;
use App\Modules\System\Grids\AclUserGrid;
use App\Modules\System\Forms\AclUserForm;
use App\Modules\System\DetailViews\AclUserDetailView;
use App\Components\Common;

class AclUserController extends BaseController {

    /**
     * Index action
     *     list of items
     */
    public function indexAction() {
        $this->pageTitle = $this->_("AclUser management");
        $grid = new AclUserGrid("AclUser");
        $grid->run();
        $this->view->setVars(array(
                'grid' => $grid
        ));
    }

    /**
     * View detail object
     */
    public function viewAction() {
        $this->pageTitle = $this->_("View AclUser");
        $id = (int)$this->request->get('id');
        
        if(empty($id) || $id == 1) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
        
        $model = new AclUser();
        $detailview = new AclUserDetailView("AclUserDetailView");
        $detailview->setSource($model->get($id));
        
        $this->view->setVars(array(
            'detailview' => $detailview
        ));
    }
    
    /**
     * Create new object
     */
    public function createAction() {
        $this->pageTitle = $this->_("Create AclUser");
        $form = new AclUserForm();
    
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                $model = new AclUser();
                $data = $form->getValues();
                $data['password'] = Common::hash($data['password']);
                if($data['id_acl_role'] > 1) {
	                if($model->save($data)) {
	                    $this->flashSession->success($this->_("Create AclUser successfully"));
	                    return $this->redirect('index');
	                }
                }
				$this->flashSession->error($this->_("Create AclUser error"));
            }
        }
            
        $this->view->setVars(array(
                'form' => $form
        ));
    }

    /**
     * Update object
     */
    public function updateAction() {
        $this->pageTitle = $this->_("Update AclUser");
        
        $id = (int)$this->request->get('id');   
        if(empty($id)) {
            $this->flashSession->error($this->_("Invalid AclUser parameters"));
            return $this->redirect('index');
        }
    
        $model = AclUser::findFirst($id);    
        if(empty($model)) {
            $this->flashSession->error($this->_("AclUser not found"));
            return $this->redirect('index');
        }
        $oldPassword = $model->password;
    
        $form = new AclUserForm($model);
        
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
            	$data = $form->getValues();
            	if($oldPassword != $data['password']) {
	            	$data['password'] = Common::hash($data['password']);
            	}
            	if($data['id_acl_role'] > 1) {
	                if($model->save($data)) {
	                    $this->flashSession->success($this->_("Update AclUser successfully"));
	                    return $this->redirect('index');
	                }
            	}
                $this->flashSession->error($this->_("Update AclUser error"));
            }
        }
    
        $this->view->setVars(array(
                'form' => $form
        ));
    }

    /**
     * Delete object
     */
    public function deleteAction() {
        $id = (int)$this->request->get('id');
    
        if(empty($id) || $id == 1) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
    
        $model = AclUser::findFirst($id);
        if(empty($model)) {
            $this->flashSession->error($this->_("AclUser not found"));
            return $this->redirect('index');
        }
        
        $model->status = AclUser::STATUS_DELETED;
    
        if($model->save()) {
            $this->flashSession->success($this->_('Delete successfully'));
        } else {
            $this->flashSession->error($this->_('Delete error'));
        }
    
        return $this->redirect('index');
    }
}