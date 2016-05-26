<?php
namespace App\Modules\System\Controllers;

use App\Modules\System\Models\AclResource;
use App\Modules\System\Grids\AclResourceGrid;
use App\Modules\System\Forms\AclResourceForm;
use App\Modules\System\DetailViews\AclResourceDetailView;
use App\Modules\System\Models\AclRoleResource;

class AclResourceController extends BaseController {

    /**
     * Index action
     *     list of items
     */
    public function indexAction() {
        $this->pageTitle = $this->_("AclResource management");
        $grid = new AclResourceGrid("AclResource");
        $grid->run();
        $this->view->setVars(array(
                'grid' => $grid
        ));
    }

    /**
     * View detail object
     */
    public function viewAction() {
        $this->pageTitle = $this->_("View AclResource");
        $id = (int)$this->request->get('id');
        
        if(empty($id)) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
        
        $model = new AclResource();
        $detailview = new AclResourceDetailView("AclResourceDetailView");
        $detailview->setSource($model->get($id));
        
        $this->view->setVars(array(
            'detailview' => $detailview
        ));
    }
    
    /**
     * Create new object
     */
    public function createAction() {
        $this->pageTitle = $this->_("Create AclResource");
        $form = new AclResourceForm();
    
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                $model = new AclResource();
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Create AclResource successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Create AclResource error"));
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
        $this->pageTitle = $this->_("Update AclResource");
        
        $id = (int)$this->request->get('id');   
        if(empty($id)) {
            $this->flashSession->error($this->_("Invalid AclResource parameters"));
            return $this->redirect('index');
        }
    
        $model = AclResource::findFirst($id);    
        if(empty($model)) {
            $this->flashSession->error($this->_("AclResource not found"));
            return $this->redirect('index');
        }
    
        $form = new AclResourceForm($model);
        
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Update AclResource successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Update AclResource error"));
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
    
        $model = AclResource::findFirst($id);
        if(empty($model)) {
            $this->flashSession->error($this->_("AclResource not found"));
            return $this->redirect('index');
        }
        
        $model->status = AclResource::STATUS_DELETED;
    
        if($model->save()) {
            $this->flashSession->success($this->_('Delete successfully'));
        } else {
            $this->flashSession->error($this->_('Delete error'));
        }
    
        return $this->redirect('index');
    }
    
    /**
     * Run to update resources
     */
    public function updateResourceAction()
    {
    	$resources = $this->_getResourceList();
    
    	foreach ($resources as $moduleName => $controller) {
    		foreach ($controller as $controllerName => $actions) {
    			foreach ($actions as $action) {
    				$name = $moduleName.'-'.$controllerName;
    					
    				if(AclResource::findFirst(array("name = '$name' AND action = '$action'"))) {
    					continue;
    				}
    					
    				$aclResourceModel = new AclResource();
    				$aclResourceModel->setName($name);
    				$aclResourceModel->setAction($action);
    				$aclResourceModel->setTitle($moduleName.' '.$controllerName.' '.$action);
    				$aclResourceModel->setStatus(1);
    				$aclResourceModel->setCreatedAt(time());
    					
    				if ($aclResourceModel->save()) {
    					$aclRoleResourceModel = new AclRoleResource();
    					$aclRoleResourceModel->setIdAclRole(1);
    					$aclRoleResourceModel->setIdAclResource($aclResourceModel->getId());
    					$aclRoleResourceModel->setStatus(1);
    					$aclRoleResourceModel->setCreatedAt(time());
    					$aclRoleResourceModel->save();
    				}
    			}
    		}
    	}
    	
    	$this->flashSession->success($this->_("Update AclResource successfully"));
    	$this->session->set('SYSTEM_ACL_UPDATE', true);
    	return $this->redirect('index');
    }
    
    /**
     * Get all reources exclude frontend module
     *
     * @return multitype:multitype:multitype:string
     */
    protected function _getResourceList()
    {
    	$resources = array();
    	$modules = $this->di->get('config')->modules;
    
    	foreach ($modules as $moduleName => $module) {
    		if(strtolower($moduleName) == 'frontend') {
    			continue;
    		}
    
    		$controllers = array();
    		$path = $module['path'];
    		$path = substr($path, 0, -10) . 'controllers';
    
    		foreach (scandir($path) as $file) {
    			if (strstr($file, "Controller.php") !== false) {
    
    				$baseController = $path . DIRECTORY_SEPARATOR . 'BaseController.php';
    
    				if(is_file($baseController)) {
    					include_once $baseController;
    				}
    
    				include_once $path . DIRECTORY_SEPARATOR . $file;
    
    				foreach (get_declared_classes() as $class) {
    					if (is_subclass_of($class, 'OE\Application\Controller')) {
    
    						$actions = array();
    						$className = explode("\\", $class);
    						$className = $className[count($className)-1];
    						$controller = substr($className, 0, strpos($className, "Controller"));
    
    						if(str_replace('Controller.php', '', $file) != $controller) {
    							continue;
    						}
    
    						$controller = strtolower($controller);
    						if(in_array($controller, array('base', 'auth'))) {
    							continue;
    						}
    
    						foreach (get_class_methods($class) as $action) {
    							if (strstr($action, "Action") !== false) {
    								$actions[] = substr($action, 0, strpos($action, "Action"));
    							}
    						}
    
    						$controllers[$controller] = $actions;
    					}
    				}
    			}
    		}
    			
    		$resources[$moduleName] = $controllers;
    	}
    
    	return $resources;
    }
}