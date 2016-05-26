<?php
namespace App\Models;

use OE\Application\Model;

class Base extends Model {
	
	public function beforeCreate() {
	    if(!isset($this->created_at)) {
	    	$this->created_at = time();    	
	    }
	}
	
	public function beforeUpdate() {
	    if(!isset($this->updated_at)) {
    		$this->updated_at = time();
	    }
	}
	
	public function beforeValidationOnCreate()
	{
		if(isset($this->created_at)) {
			//$this->created_at = time();
		}
	}
	
	public function beforeValidationOnUpdate()
	{
		if(isset($this->updated_at)) {
			//$this->updated_at = time();
		}
	}
}