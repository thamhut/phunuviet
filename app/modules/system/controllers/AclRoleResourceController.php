<?php
namespace App\Modules\System\Controllers;

use App\Modules\System\Models\AclRoleResource;
use App\Modules\System\Grids\AclRoleResourceGrid;
use App\Modules\System\Forms\AclRoleResourceForm;
use App\Modules\System\DetailViews\AclRoleResourceDetailView;

class AclRoleResourceController extends BaseController {

    /**
     * Index action
     *     list of items
     */
    public function indexAction() {
        $this->pageTitle = $this->_("AclRoleResource management");
        $grid = new AclRoleResourceGrid("AclRoleResource");
        $grid->run();
        $this->view->setVars(array(
                'grid' => $grid
        ));
    }

    /**
     * View detail object
     */
    public function viewAction() {
        $this->pageTitle = $this->_("View AclRoleResource");
        $id = (int)$this->request->get('id');
        
        if(empty($id)) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
        
        $model = new AclRoleResource();
        $detailview = new AclRoleResourceDetailView("AclRoleResourceDetailView");
        $detailview->setSource($model->get($id));
        
        $this->view->setVars(array(
            'detailview' => $detailview
        ));
    }
    
    /**
     * Create new object
     */
    public function createAction() {
        $this->pageTitle = $this->_("Create AclRoleResource");
        $form = new AclRoleResourceForm();
    
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                $model = new AclRoleResource();
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Create AclRoleResource successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Create AclRoleResource error"));
                }
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
        $this->pageTitle = $this->_("Update AclRoleResource");
        
        $id = (int)$this->request->get('id');   
        if(empty($id)) {
            $this->flashSession->error($this->_("Invalid AclRoleResource parameters"));
            return $this->redirect('index');
        }
    
        $model = AclRoleResource::findFirst($id);    
        if(empty($model)) {
            $this->flashSession->error($this->_("AclRoleResource not found"));
            return $this->redirect('index');
        }
    
        $form = new AclRoleResourceForm($model);
        
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Update AclRoleResource successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Update AclRoleResource error"));
                }
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
    
        if(empty($id)) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
    
        $model = AclRoleResource::findFirst($id);
        if(empty($model)) {
            $this->flashSession->error($this->_("AclRoleResource not found"));
            return $this->redirect('index');
        }
        
        $model->status = AclRoleResource::STATUS_DELETED;
    
        if($model->save()) {
            $this->flashSession->success($this->_('Delete successfully'));
        } else {
            $this->flashSession->error($this->_('Delete error'));
        }
    
        return $this->redirect('index');
    }
}