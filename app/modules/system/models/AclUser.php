<?php
        		        		
namespace App\Modules\System\Models;

use App\Models\AclUser as AclUserBase;
use App\Helpers\Translate;

class AclUser extends AclUserBase {
    
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
    public function search() { 
		$builder = $this->getModelsManager()
		->createBuilder()
		->columns(array('t.id', 't.id_acl_role', 't.username', 't.password', 't.fullname', 't.email', 't.phone', 't.address', 't.note', 't.status', 't.created_at', 't.updated_at', 'r.name as r_name'))
		->addFrom(__CLASS__, 't')
		->join('App\\Models\\AclRole', 'r.id = t.id_acl_role', 'r')
		->where('t.status > :status:', array('status' => self::STATUS_DELETED))
		->andWhere('t.id != 1');
		
		return $builder;
	}

    /**
     * @return 
     */
    public function get($id) { 
		$builder = $this->getModelsManager()
		->createBuilder()
		->columns(array('t.id', 't.id_acl_role', 't.username', 't.password', 't.fullname', 't.email', 't.phone', 't.address', 't.note', 't.status', 't.created_at', 't.updated_at'))
		->addFrom(__CLASS__, 't')
		->where('t.id = :id:', array('id' => $id))
		->andWhere('t.id != 1');
		
		return $builder;
	}

}
