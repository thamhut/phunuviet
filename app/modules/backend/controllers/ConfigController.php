<?php
namespace App\Modules\Backend\Controllers;

use App\Modules\Backend\Models\Config;
use App\Modules\Backend\Grids\ConfigGrid;
use App\Modules\Backend\Forms\ConfigForm;
use App\Modules\Backend\DetailViews\ConfigDetailView;

class ConfigController extends BaseController {

    /**
     * Index action
     *     list of items
     */
    public function indexAction() {
        $this->pageTitle = $this->_("Config management");
        $grid = new ConfigGrid("Config");
        $grid->run();
        $this->view->setVars(array(
                'grid' => $grid
        ));
    }

    /**
     * View detail object
     */
    public function viewAction() {
        $this->pageTitle = $this->_("View Config");
        $id = (int)$this->request->get('id');
        
        if(empty($id)) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
        
        $model = new Config();
        $detailview = new ConfigDetailView("ConfigDetailView");
        $detailview->setSource($model->get($id));
        
        $this->view->setVars(array(
            'detailview' => $detailview
        ));
    }
    
    /**
     * Create new object
     */
    public function createAction() {
        $this->pageTitle = $this->_("Create Config");
        $form = new ConfigForm(null, array('mode' => 'create'));
    
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                $model = new Config();
                $data = $form->getValues();
                $data['value'] = $data['data'];
                unset($data['data']);
                
                if($model->save($data)) {
                    $this->flashSession->success($this->_("Create Config successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Create Config error"));
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
        $this->pageTitle = $this->_("Update Config");
        
        $id = (int)$this->request->get('id');   
        if(empty($id)) {
            $this->flashSession->error($this->_("Invalid Config parameters"));
            return $this->redirect('index');
        }
    
        $model = Config::findFirst($id);    
        if(empty($model)) {
            $this->flashSession->error($this->_("Config not found"));
            return $this->redirect('index');
        }
    
        $form = new ConfigForm($model, array('mode' => 'update'));
        
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Update Config successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Update Config error"));
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
    
        $model = Config::findFirst($id);
        if(empty($model)) {
            $this->flashSession->error($this->_("Config not found"));
            return $this->redirect('index');
        }
        
        $model->status = Config::STATUS_DELETED;
    
        if($model->save()) {
            $this->flashSession->success($this->_('Delete successfully'));
        } else {
            $this->flashSession->error($this->_('Delete error'));
        }
    
        return $this->redirect('index');
    }
}