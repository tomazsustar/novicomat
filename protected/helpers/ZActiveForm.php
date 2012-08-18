<?php

class ZActiveForm extends CActiveForm{
	
	
	public function datePicker($model, $attribute, $value=false){		
		
		if(!$value)
			$value = ZDate::formDate($model->$attribute);
			
		return $this->widget('zii.widgets.jui.CJuiDatePicker', array(
									   //'model'=>$model,
										//'attribute'=>$attribute,
										'name' => get_class($model)."[$attribute]",
										'value' => $value,
									    // additional javascript options for the date picker plugin
									    'options'=>array(
									        'showAnim'=>'',
											'dateFormat' => 'dd.mm.yy',
									    ),
									    'htmlOptions'=>array(
									        'style'=>'height:20px;width:70px'
									    ), 
									), true);
	}
	
	public function dateTimePicker($model, $attribute, $value=false, $onchange=""){	
		if(!$value)
			$value = ZDate::formDateTime_php($model->$attribute);
		if($onchange!="")
			$onchange.="(dateText, inst)";
		//echo get_class($model)."[$attribute]";
		//echo ZDate::formDateTime($model->$attribute);
		$id = get_class($model)."_".$attribute;
		$name = get_class($model)."[$attribute]";
		return $this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
                            //'model' => $model,
                            //'attribute' =>  $attribute,
                            'name' => $name,
							'value' => $value,
							//'onchange' => $onchange,
                            'options' => array(
                              // 'ampm' => true,
                    			//'stepMinute' => 10,
                    			//'appendText'=>'dd.MM.LLLL UU:mm',
                    			'alwaysSetTime'=> false,
                    			'timeFormat' => 'hh:mm',
                    			'dateFormat' => 'dd.mm.yy',
                    			'showHour' => false,
                    			'showMinute' => false,
                               //'timeOnly' => true,
                               //'onSelect'=>"js:function(dateText, inst){calendarSelect(dateText, inst);}",
     	                         'onClose'=>"js:function(dateText, inst){".$onchange.";}",
                            ),
                        )
                      );
	}
}