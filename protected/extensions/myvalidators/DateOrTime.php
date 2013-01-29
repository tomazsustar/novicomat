<?php
/**
* Preveri če je podatek v skladu z ZDate::FORM_DATE_FORMAT_YII ali ZDate::FORM_DATETIME_FORMAT_YII
*
**/
class DateOrTime extends CValidator
{

	protected function validateAttribute($object,$attribute)
	{
		if(!trim($object->$attribute)==""){ //če je prazen ga ne glej
			$validator = CValidator::createValidator('date', $this, $attribute, array('format'=>ZDate::FORM_DATE_FORMAT_YII));
			$validator->validate($object);
			$validator = CValidator::createValidator('date', $this, $attribute, array('format'=>ZDate::FORM_DATETIME_FORMAT_YII));
			$validator->validate($object);
			if(count($object->getErrors($attribute))!=2){ //če je prišel vsaj skozi en validator
				$object->clearErrors($attribute);
			}
			else{
				$object->clearErrors($attribute);
				$object->addError($attribute, $object->getAttributeLabel($attribute)." je napačnega formata.");
			}
		}
	}
}
