<?php

class ZActiveForm extends CActiveForm{
	
	public $img_count = 0;
	
	public function datePicker($model, $attribute, $value=false){		
		
		if(!$value)
			$value = $model->$attribute;
			
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
			//$value = ZDate::formDateTime_php($model->$attribute);
			$value = $model->$attribute;
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
	
	public function autocompleteField($model, $attribute, $sourceUrl, $htmlOptions){
		return	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	      'attribute'=>$attribute,
	      'model'=>$model,
//	      'sourceUrl'=>array($sourceUrl),
		  'source'=>"js:function(request, response) {
		  			var tag = extractLast( request.term );
					if ( tag.length < 3 ) {
						return false;
					}
			        $.getJSON('".Yii::app()->createUrl($sourceUrl)."', {
			            term: tag
			        }, response);
			    }",
	
	      'name' => $attribute,
	      'options'=>array(
	          'minLength'=>'3',
			 'delay'=>300,
	        'showAnim'=>'fold',
			'focus' => 'js:function() {
					// prevent value inserted on focus
					return false;
				}',
	        'select'=>"js:function(event, ui) {
		           addTag(this, ui.item.value);
		            return false;
		            }"
		        ),
	        'htmlOptions'=>$htmlOptions
	  	)
	  );
	}
	
	public function slike($slvss, $mesto_prikaza, $sirina='264px', $allowDelete=true){
		
		foreach($slvss as $slvs){
					if($mesto_prikaza==$slvs->mesto_prikaza){
						echo CHtml::openTag('div', array('id'=>'slika_'.$this->img_count, 'style'=>'width:'.$sirina.';float:left;'));
							if($allowDelete){
								echo CHtml::openTag('a', array('href'=>'#', 'class'=>'delete_img'));
									echo CHtml::image(
										Yii::app()->baseUrl."/slike/delete_16.gif",     //src
										"izbrisi", //alt
										array('style'=>'width:16px;float:right;')
									);
								echo CHtml::closeTag('a');
							}
							//img
							echo CHtml::image(
									$slvs->slika->url2,     //src
									$slvs->slika->ime_slike,  //alt
									array(
										'style'=>'width:'.$sirina.';', 
									)
							);
							//hidden inputs
							foreach($slvs->getAttributes() as $name => $value ){
								echo CHtml::hiddenField(
								'Slike['.$this->img_count.']['.$name.']', // name
								$value, //value
								array(
										'id'=>'slika_'.$this->img_count.'_'.$name,
										'class'=>$name
									)
								);
							}
						echo CHtml::closeTag('div');
						$this->img_count++;
					}
			}
	}
}
