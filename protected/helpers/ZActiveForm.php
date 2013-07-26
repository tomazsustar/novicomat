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
	
	public function slike($slvss, $mesto_prikaza, $sirina='265px', $allowDelete=true){
		  	$i=0;
			foreach($slvss as $slvs){
					if($mesto_prikaza==$slvs->mesto_prikaza){
						echo CHtml::openTag('div', array('id'=>'slika_'.$this->img_count, 'style'=>'width:'.$sirina.';float:left;'));
//							echo CHtml::ajaxLink(Yii::t('slike','uredi slikco'),Yii::app()->createUrl('slike/popup', array('id'=>$slvs->slika->id)),
//								array(
//						        'onclick'=>'$("#popup").dialog("open"); return false;',
//						        'update'=>'#popup'
//						        ),array('id'=>'popup-link-'.$slvs->slika->id));
							if($allowDelete){
								
								echo CHtml::openTag('a', array('href'=>'#', 'class'=>'delete_img'));
									echo CHtml::image(
										Yii::app()->baseUrl."/slike/delete_16.gif",     //src
										"izbrisi", //alt
										array('title'=>'izbriši', 'style'=>'width:16px;float:right;')
									);
								echo CHtml::closeTag('a');
								
							}
							echo CHtml::openTag('a', array('href'=>'#', 'class'=>'crop_img'));
									echo CHtml::image(
										Yii::app()->baseUrl."/slike/image-crop.png",     //src
										"obreži", //alt
										array('title'=>'obreži','style'=>'width:16px;float:right;')
									);
							echo CHtml::closeTag('a');
							//img
							echo CHtml::image(
									$slvs->slika->url2,     //src
									$slvs->slika->ime_slike,  //alt
									array(
										'style'=>'width:'.$sirina.';', 
										'class'=>'slikca-'.$slvs->slika->id
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
						$i++;
					}
			}
			if($i==0 && $mesto_prikaza==1){
				echo CHtml::openTag('a', array('href'=>'#'));
				echo CHtml::image(
						Yii::app()->baseUrl."/slike/upload_photo.png",     //src
						"Naloži sliko",  //alt
						array(
							'title'=>'Naloži sliko',
							'style'=>'width:'.$sirina.';', 
							'class'=>'nalozi_sliko',
							'id'=>"ikona_nalozi_sliko"
						)
				);
				echo CHtml::closeTag('a');
			}
	}
	
public function priponke($slvss){
		  	$i=0;
			foreach($slvss as $slvs){
					if($slvs->mesto_prikaza == 4){
						echo CHtml::openTag('div', array('id'=>'slika_'.$this->img_count));
//							echo CHtml::ajaxLink(Yii::t('slike','uredi slikco'),Yii::app()->createUrl('slike/popup', array('id'=>$slvs->slika->id)),
//								array(
//						        'onclick'=>'$("#popup").dialog("open"); return false;',
//						        'update'=>'#popup'
//						        ),array('id'=>'popup-link-'.$slvs->slika->id));
							
							echo CHtml::link(
									$slvs->slika->ime_slike,     // text
									$slvs->slika->url,  //url
									array(
										'class'=>'slikca-'.$slvs->slika->id,	
										'target'=>'_blank'
									)
							);
								
							echo CHtml::openTag('a', array('href'=>'#', 'class'=>'delete_img'));
								echo CHtml::image(
									Yii::app()->baseUrl."/slike/delete_16.gif",     //src
									"izbrisi", //alt
									array('title'=>'izbriši', 'style'=>'width:16px;')
								);
							echo CHtml::closeTag('a');
								
							
		
							//img
							
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
						$i++;
					}
			}

	}
}
