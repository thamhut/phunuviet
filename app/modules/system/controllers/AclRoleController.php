<?php
namespace App\Modules\System\Controllers;

use App\Modules\System\Models\AclRole;
use App\Modules\System\Grids\AclRoleGrid;
use App\Modules\System\Forms\AclRoleForm;
use App\Modules\System\DetailViews\AclRoleDetailView;
use App\Modules\System\Grids\AclRoleResourceGrid;
use App\Modules\System\Models\AclRoleResource;

class AclRoleController extends BaseController {

    /**
     * Index action
     *     list of items
     */
    public function indexAction() {
        $this->pageTitle = $this->_("AclRole management");
        $grid = new AclRoleGrid("AclRole");
        $grid->run();
        $this->view->setVars(array(
                'grid' => $grid
        ));
    }

    /**
     * View detail object
     */
    public function viewAction() {
        $this->pageTitle = $this->_("View AclRole");
        $id = (int)$this->request->get('id');
        
        if(empty($id)) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
        
        $model = new AclRole();
        $detailview = new AclRoleDetailView("AclRoleDetailView");
        $detailview->setSource($model->get($id));
        
        $this->view->setVars(array(
            'detailview' => $detailview
        ));
    }
    
    /**
     * Create new object
     */
    public function createAction() {
        $this->pageTitle = $this->_("Create AclRole");
        $form = new AclRoleForm();
    
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                $model = new AclRole();
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Create AclRole successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Create AclRole error"));
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
        $this->pageTitle = $this->_("Update AclRole");
        
        $id = (int)$this->request->get('id');   
        if(empty($id)) {
            $this->flashSession->error($this->_("Invalid AclRole parameters"));
            return $this->redirect('index');
        }
    
        $model = AclRole::findFirst($id);    
        if(empty($model)) {
            $this->flashSession->error($this->_("AclRole not found"));
            return $this->redirect('index');
        }
    
        $form = new AclRoleForm($model);
        
        if($this->request->isPost()) {
            if($form->isValid($_POST)) {
                if($model->save($form->getValues())) {
                    $this->flashSession->success($this->_("Update AclRole successfully"));
                    return $this->redirect('index');
                } else {
                    $this->flashSession->error($this->_("Update AclRole error"));
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
    
        if(empty($id) || $id == 1) {
            $this->flashSession->error($this->_('Invalid parameters'));
            return $this->redirect('index');
        }
    
        $model = AclRole::findFirst($id);
        if(empty($model)) {
            $this->flashSession->error($this->_("AclRole not found"));
            return $this->redirect('index');
        }
        
        $model->status = AclRole::STATUS_DELETED;
    
        if($model->save()) {
            $this->flashSession->success($this->_('Delete successfully'));
        } else {
            $this->flashSession->error($this->_('Delete error'));
        }
    
        return $this->redirect('index');
    }
    
    /**
     * View reources by role
     */
    public function viewResourceAction() {
    	$idRole = intval($this->request->get('idRole'));
    	if(empty($idRole)) {
    		$this->flashSession->error($this->_("idRole is invalid"));
    		return $this->redirect('index');
    	}
    	
    	$role = AclRole::findFirst($idRole);
    	if(empty($role)) {
    		$this->flashSession->error($this->_("Role is null"));
    		return $this->redirect('index');
    	}
    	
    	$this->pageTitle = $this->_("Resources of: ". $role->name);
    	
    	$grid = new AclRoleResourceGrid('RoleResource', $idRole);
    	$grid->run();
    	$this->view->setVars(array(
    			'grid' => $grid,
    			'idRole' => $idRole
    	));
    }
    
    public function addResourceAction() {
    	$idRole = intval($this->request->get('idRole'));
    	
    	if(empty($idRole) || $idRole == 1) {
    		$this->flashSession->error($this->_("idRole is invalid"));
    		return $this->redirect('index');
    	}
    	
    	$role = AclRole::findFirst($idRole);
    	if(empty($role)) {
    		$this->flashSession->error($this->_("Role is null"));
    		return $this->redirect('index');
    	}
    	
    	$this->pageTitle = $this->_("Add resources for: ". $role->name);
    	
    	$grid = new AclRoleResourceGrid('addRoleResource', $idRole, true);
    	$grid->run();
    	$this->view->setVars(array(
    			'grid' => $grid,
    			'idRole' => $idRole
    	));
    }
    
    public function saveResourceAction() {
    	$idRole = intval($this->request->get('idRole'));
    	$roleResource = $this->request->get('roleResource');
    	$idResources = $roleResource['id'];
    	
    	if(empty($idRole) || $idRole == 1) {
    		$this->flashSession->error($this->_("idRole is invalid"));
    		return $this->redirect("addResource?idRole=$idRole");
    	}
    	
    	$role = AclRole::findFirst($idRole);
    	if(empty($role)) {
    		$this->flashSession->error($this->_("Role is null"));
    		return $this->redirect("addResource?idRole=$idRole");
    	}
    	
    	if($idResources) {
    		$idResourcesList = implode(',', $idResources);
    		$sql = "DELETE FROM App\\Models\\AclRoleResource WHERE id_acl_role = $idRole AND id_acl_resource NOT IN($idResourcesList)";
    		$this->modelsManager->executeQuery($sql);
	    	foreach($idResources as $idResource) {
	    		$resourceModel = AclRoleResource::findFirst(array("id_acl_role = $idRole AND id_acl_resource = $idResource"));
	    		if(!$resourceModel) {
	    			$resourceModel = new AclRoleResource();
	    			$resourceModel->id_acl_role = $idRole;
	    			$resourceModel->id_acl_resource = $idResource;
	    			$resourceModel->status = 1;
	    			$resourceModel->created_at = time();
	    			$resourceModel->save();
	    		}
	    	}
    	} else {
    		// Remove all resource
    		$sql = "DELETE FROM App\\Models\\AclRoleResource WHERE id_acl_role = $idRole";
    		$this->modelsManager->executeQuery($sql);
    	}
    	
    	$this->flashSession->success($this->_('Save resource successfully'));
    	$this->session->set('SYSTEM_ACL_UPDATE', true);
    	
    	return $this->redirect("addResource?idRole=$idRole");
    }
    
    public function removeResourceAction() {
    	$idRole = intval($this->request->get('idRole'));
    	$idRoleResource = intval($this->request->get('id'));
    	if(empty($idRoleResource)) {
    		$this->flashSession->error($this->_("idRole is invalid"));
    		return $this->redirect('index');
    	}
    	
    	$roleResource = AclRoleResource::findFirst($idRoleResource);
    	if($roleResource && $roleResource->delete()) {
	    	$this->flashSession->success($this->_("Remove reource successfully"));
    	} else {
	    	$this->flashSession->error($this->_("Remove reource error"));
    	}
    	
    	$this->session->set('SYSTEM_ACL_UPDATE', true);
   		return $this->redirect("viewResource?idRole=$idRole");
    }
}