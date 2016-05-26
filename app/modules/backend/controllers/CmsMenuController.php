<?php
namespace App\Modules\Backend\Controllers;

use App\Modules\Backend\Models\CmsMenu;
use App\Modules\Backend\Grids\CmsMenuGrid;
use App\Modules\Backend\Forms\CmsMenuForm;
use App\Modules\Backend\DetailViews\CmsMenuDetailView;

class CmsMenuController extends BaseController {

    /**
     * Index action
     *     list of items
     */
    public function indexAction() {
        $this->pageTitle = $this->_("CmsMenu management");
        $grid = new CmsMenuGrid("CmsMenu");
        $grid->run();
        $this->view->setVars(array(
                'grid' => $grid
        ));
    }

    /**
     * View detail object
     */
    public function viewAction() {
        $this->pageTitle = $this->_("View CmsMenu");
        $id = (int)$this->request->get('id');
        
        if(empty($id)) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
        
        $model = new CmsMenu();
        $detailview = new CmsMenuDetailView("CmsMenuDetailView");
        $detailview->setSource($model->get($id));
        
        $this->view->setVars(array(
            'detailview' => $detailview
        ));
    }
    
    /**
     * Create new object
     */
    public function createAction() {
        $this->pageTitle = $this->_("Create CmsMenu");
        $form = new CmsMenuForm();
    
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                $model = new CmsMenu();
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Create CmsMenu successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Create CmsMenu error"));
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
        $this->pageTitle = $this->_("Update CmsMenu");
        
        $id = (int)$this->request->get('id');   
        if(empty($id)) {
            $this->flashSession->error($this->_("Invalid CmsMenu parameters"));
            return $this->redirect('index');
        }
    
        $model = CmsMenu::findFirst($id);    
        if(empty($model)) {
            $this->flashSession->error($this->_("CmsMenu not found"));
            return $this->redirect('index');
        }
    
        $form = new CmsMenuForm($model);
        
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Update CmsMenu successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Update CmsMenu error"));
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
    
        $model = CmsMenu::findFirst($id);
        if(empty($model)) {
            $this->flashSession->error($this->_("CmsMenu not found"));
            return $this->redirect('index');
        }
        
        $model->status = CmsMenu::STATUS_DELETED;
    
        if($model->save()) {
            $this->flashSession->success($this->_('Delete successfully'));
        } else {
            $this->flashSession->error($this->_('Delete error'));
        }
    
        return $this->redirect('index');
    }
}