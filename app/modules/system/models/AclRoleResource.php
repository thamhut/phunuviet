<?php
        		        		
namespace App\Modules\System\Models;

use App\Models\AclRoleResource as AclRoleResourceBase;
use App\Helpers\Translate;

class AclRoleResource extends AclRoleResourceBase {
    
    const STATUS_ACTIVE   = 1;
	const STATUS_INACTIVE = -1;
	const STATUS_DELETED  = -2;
        		
    public static function listStatus() {
		return array(
			self::STATUS_ACTIVE => Translate::t('Active'),
			self::STATUS_INACTIVE => Translate::t('Inactive'),
			self::STATUS_DELETED => Translate::t('Deleted'),
		);
	}
	
	public static function getStatusLabel($status) {
		$listStatus = self::listStatus();
		return isset($listStatus[$status]) ? $listStatus[$status] : null;
	}    		

    /**
     * @return 
     */
    public function search($idRole=null) { 
		$builder = $this->getModelsManager()
		->createBuilder()
		->columns(array('t.id', 't.id_acl_role', 't.id_acl_resource', 't.status', 't.created_at', 't.updated_at', 'r.name as r_name', 'r.action as r_action', 'rl.name as rl_name'))
		->addFrom(__CLASS__, 't')
		->join('App\\Models\\AclResource', 'r.id = t.id_acl_resource', 'r')
		->join('App\\Models\\AclRole', 'rl.id = t.id_acl_role', 'rl')
		->where('t.status > :status:', array('status' => self::STATUS_DELETED));
		
		if($idRole) {
			$builder->andWhere('t.id_acl_role = :idRole:', array('idRole' => $idRole));
		}
		
		return $builder;
	}

    /**
     * @return 
     */
    public function get($id) { 
		$builder = $this->getModelsManager()
		->createBuilder()
		->columns(array('t.id', 't.id_acl_role', 't.id_acl_resource', 't.status', 't.created_at', 't.updated_at'))
		->addFrom(__CLASS__, 't')
		->where('t.id = :id:', array('id' => $id));
		
		return $builder;
	}
}