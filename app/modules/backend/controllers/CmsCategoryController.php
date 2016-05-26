<?php
namespace App\Modules\Backend\Controllers;

use App\Models\Product;
use App\Models\ProductClone;
use App\Modules\Backend\Models\CmsCategory;
use App\Modules\Backend\Grids\CmsCategoryGrid;
use App\Modules\Backend\Forms\CmsCategoryForm;
use App\Modules\Backend\DetailViews\CmsCategoryDetailView;

class CmsCategoryController extends BaseController {

    /**
     * Index action
     *     list of items
     */
    public function indexAction() {
        $this->pageTitle = $this->_("CmsCategory management");
        $grid = new CmsCategoryGrid("CmsCategory");
        $grid->run();
        $this->view->setVars(array(
                'grid' => $grid
        ));
    }

    /**
     * View detail object
     */
    public function viewAction() {
        $this->pageTitle = $this->_("View CmsCategory");
        $id = (int)$this->request->get('id');
        
        if(empty($id)) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
        
        $model = new CmsCategory();
        $detailview = new CmsCategoryDetailView("CmsCategoryDetailView");
        $detailview->setSource($model->get($id));
        
        $this->view->setVars(array(
            'detailview' => $detailview
        ));
    }
    
    /**
     * Create new object
     */
    public function createAction() {
        $this->pageTitle = $this->_("Create CmsCategory");
        $form = new CmsCategoryForm();
    
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                $model = new CmsCategory();
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Create CmsCategory successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Create CmsCategory error"));
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
        $this->pageTitle = $this->_("Update CmsCategory");
        
        $id = (int)$this->request->get('id');   
        if(empty($id)) {
            $this->flashSession->error($this->_("Invalid CmsCategory parameters"));
            return $this->redirect('index');
        }
    
        $model = CmsCategory::findFirst($id);    
        if(empty($model)) {
            $this->flashSession->error($this->_("CmsCategory not found"));
            return $this->redirect('index');
        }
    
        $form = new CmsCategoryForm($model);
        
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Update CmsCategory successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Update CmsCategory error"));
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
    
        $model = CmsCategory::findFirst($id);
        if(empty($model)) {
            $this->flashSession->error($this->_("CmsCategory not found"));
            return $this->redirect('index');
        }
        
        $model->status = CmsCategory::STATUS_DELETED;
    
        if($model->save()) {
            $products = Product::find(
                array(
                    array(
                        "idcate" => (string)$id
                    )
                )
            );

            foreach ($products as $product) {
                $product->delete();
            }
            $products = ProductClone::find(
                array(
                    array(
                        "idcate" => (string)$id
                    )
                )
            );

            foreach ($products as $product) {
                $product->delete();
            }
            $this->flashSession->success($this->_('Delete successfully'));
        } else {
            $this->flashSession->error($this->_('Delete error'));
        }
    
        return $this->redirect('index');
    }
}