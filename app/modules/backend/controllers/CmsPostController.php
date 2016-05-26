<?php
namespace App\Modules\Backend\Controllers;

use App\Modules\Backend\Models\CmsPost;
use App\Modules\Backend\Grids\CmsPostGrid;
use App\Modules\Backend\Forms\CmsPostForm;
use App\Modules\Backend\DetailViews\CmsPostDetailView;

class CmsPostController extends BaseController {

    /**
     * Index action
     *     list of items
     */
    public function indexAction() {
        $this->pageTitle = $this->_("CmsPost management");
        $grid = new CmsPostGrid("CmsPost");
        $grid->run();
        $this->view->setVars(array(
                'grid' => $grid
        ));
    }

    /**
     * View detail object
     */
    public function viewAction() {
        $this->pageTitle = $this->_("View CmsPost");
        $id = (int)$this->request->get('id');
        
        if(empty($id)) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
        
        $model = new CmsPost();
        $detailview = new CmsPostDetailView("CmsPostDetailView");
        $detailview->setSource($model->get($id));
        
        $this->view->setVars(array(
            'detailview' => $detailview
        ));
    }
    
    /**
     * Create new object
     */
    public function createAction() {
        $this->pageTitle = $this->_("Create CmsPost");
        $form = new CmsPostForm();
    
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                $model = new CmsPost();
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Create CmsPost successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Create CmsPost error"));
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
        $this->pageTitle = $this->_("Update CmsPost");
        
        $id = (int)$this->request->get('id');   
        if(empty($id)) {
            $this->flashSession->error($this->_("Invalid CmsPost parameters"));
            return $this->redirect('index');
        }
    
        $model = CmsPost::findFirst($id);    
        if(empty($model)) {
            $this->flashSession->error($this->_("CmsPost not found"));
            return $this->redirect('index');
        }
    
        $form = new CmsPostForm($model);
        
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Update CmsPost successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Update CmsPost error"));
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
    
        $model = CmsPost::findFirst($id);
        if(empty($model)) {
            $this->flashSession->error($this->_("CmsPost not found"));
            return $this->redirect('index');
        }
        
        $model->status = CmsPost::STATUS_DELETED;
    
        if($model->save()) {
            $this->flashSession->success($this->_('Delete successfully'));
        } else {
            $this->flashSession->error($this->_('Delete error'));
        }
    
        return $this->redirect('index');
    }
}