<?php
/**
* Preveri če je en datum kasnejši od drugega
*
**/
class Later extends CValidator
{
	public $then; 

	protected function validateAttribute($object,$attribute){
		//echo strtotime($this->$params['compareTo']) > strtotime($this->$attribute);
		$then=$this->then;
		if(trim($object->$attribute)!=""){
			if(strtotime($object->$then) > strtotime($object->$attribute)){
				$object->addError($attribute, $object->getAttributeLabel($attribute)." mora biti kasnejši od ".$object->getAttributeLabel($this->then).".");
			}
		}
	}
}
