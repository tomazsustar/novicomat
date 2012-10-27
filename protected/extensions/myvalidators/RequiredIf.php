<?php
/**
* Zahtevaj če je vnešen (isset) ali če ni vnešen (notset)
*
**/
class RequiredIf extends CValidator
{
	public $isset = false;
	public $notset = false;

	protected function validateAttribute($object,$attribute){
		if($this->isset){
			$isset=$this->isset;
			if(trim($object->$isset)!="" && $object->$isset!=0){ //če je prazen, ali če je 0
				$val = CValidator::createValidator('required', $object, $attribute);
				$val->validate($object);
			}
		}
		if($this->notset){
			$notset=$this->notset;
			if(trim($this->$notset)==""){
				$message = 'Vsaj en izmed '.$object->getAttributeLabel($attribute).' ali '.$object->getAttributeLabel($notset). ' mora biti vnešen.';
				$val = CValidator::createValidator('required', $object, $attribute, array('message'=>$message));
				$val = CValidator::createValidator('required', $object, $notset, array('message'=>$message));
				$val->validate($object);
			}
		}
		
	}
}
