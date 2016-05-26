<?php
        		        		
namespace App\Modules\Backend\Models;

use App\Models\CmsCategory as CmsCategoryBase;
use App\Helpers\Translate;

class CmsCategory extends CmsCategoryBase {
    
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
		->columns(array('t.id', 't.id_parent', 't.title', 't.slug', 't.thumbnail', 't.quote', 't.decscription', 't.created_date', 't.updated_date', 't.meta_title', 't.meta_description', 't.meta_keyword', 't.status'))
		->addFrom(__CLASS__, 't')
		->where('t.status > :status:', array('status' => self::STATUS_DELETED));
		
		return $builder;
	}

    /**
     * @return 
     */
    public function get($id) { 
		$builder = $this->getModelsManager()
		->createBuilder()
		->columns(array('t.id', 't.id_parent', 't.title', 't.slug', 't.thumbnail', 't.quote', 't.decscription', 't.created_date', 't.updated_date', 't.meta_title', 't.meta_description', 't.meta_keyword', 't.status'))
		->addFrom(__CLASS__, 't')
		->where('t.id = :id:', array('id' => $id));

		return $builder;
	}

	public function getTitleById($id){
		$builder = self::findFirst(array(array('id='=>$id), 'columns'=>'id, title'));
		return $builder;
	}

}
