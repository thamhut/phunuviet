<?php
/**
 * Created by PhpStorm.
 * User: thamhut
 * Date: 3/26/2016
 * Time: 7:06 PM
 */

namespace App\Modules\Backend\Controllers;


use App\Modules\Backend\Forms\MapcateForm;
use App\Modules\Backend\Grids\MapcateGrid;
use App\Modules\Backend\Models\Mapcate;

class MapcateController extends BaseController
{
    public function indexAction(){
        $this->pageTitle = $this->_("Map link category management");
        $grid = new MapcateGrid("Mapcate");
        $grid->run();
        $this->view->setVars(array(
            'grid' => $grid
        ));
    }

    public function viewAction(){
        return $this->redirect('add?id='.$this->request->get('id'));
    }

    public function addAction(){
        $this->pageTitle = $this->_("Map link");
        $form = new MapcateForm();
        $model = new \App\Models\Mapcate();
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Create error"));
                }
            }
        }

        $this->view->setVars(array(
            'form' => $form
        ));
    }

    public function updateAction(){
        $this->pageTitle = $this->_("Map link");
        $model = Mapcate::findFirst('id='.$this->request->get('id'));
        $form = new MapcateForm($model);
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Create error"));
                }
            }
        }

        $this->view->setVars(array(
            'form' => $form
        ));
    }

    public function deleteAction(){
        if($this->request->get('id')){
            if(Mapcate::findFirst('id='.$this->request->get('id'))->delete()){
                $this->flashSession->success($this->_("Successfully"));
            }
            return $this->redirect('index');
        }
    }
}