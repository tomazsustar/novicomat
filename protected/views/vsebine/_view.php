<div class="view" id="povzetek_<?php echo  $data->id;?>">

	<div>
	<b><?php echo date('d. m. Y', strtotime($data->created));  ?></b>,&nbsp;
	<?php echo CHtml::encode($data->getAttributeLabel('stran')); ?>:
	<?php echo $data->virLink; ?>	
	<?php echo CHtml::link('Uredi', array('update', 'id'=>$data->id)); ?>
	<?php echo CHtml::hiddenField('Vsebine_id', $data->id); ?>
	<?php echo CHtml::link('Zavrzi', 'javascript;', array(
			'onclick' => 'zavrzi(this);return false;',
			/*'ajax' => array(
							'type'=>'POST', //request type
							'url'=>CController::createUrl('Vsebine/zavrzi', array('id'=>$data->id)), //url to call.
							//Style: CController::createUrl('currentController/methodToCall')
							//'update'=>'#Vsebine_catid', //selector to update
							'success'=> "function( data )
				                  {
				                    // handle return data
				                    alert(data);
				                    alert($(this).html())
				                    alert(".$data->id.");
				                    if (data>0 ){
				                     if (zavrziKlikov > 2){
				                     	zavrziKlikov = 0;
				                     	$.fn.yiiListView.update('vsebine-list-view');
				                     }else{
				                     	zavrziKlikov+=1;
				                      	$('#povzetek_".$data->id."').hide('fast');
				                      }
				                    }
				                  }",
							//'data'=>'js:javascript statement' 
							//leave out the data key to pass all form values through
							),*/
										
	)); ?>	
</div>
	<h3 class="view-naslov"><?php echo CHtml::encode($data->title); ?></h3>
	

	
	<?php //echo CHtml::encode($data->introtext);
			
			echo CHTML::image($data->slika, "ni slike", array('style'=>'width:150px;margin:5px;float:left;'));
			echo ZString::truncate(strip_tags($data->text, '<strong><ul><li>'), 400); ?>
	
	
			

	<?php /*
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fulltext')); ?>:</b>
	<?php echo CHtml::encode($data->fulltext); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sectionid')); ?>:</b>
	<?php echo CHtml::encode($data->sectionid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catid')); ?>:</b>
	<?php echo CHtml::encode($data->catid); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imported')); ?>:</b>
	<?php echo CHtml::encode($data->imported); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checked_out')); ?>:</b>
	<?php echo CHtml::encode($data->checked_out); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checked_out_time')); ?>:</b>
	<?php echo CHtml::encode($data->checked_out_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edited')); ?>:</b>
	<?php echo CHtml::encode($data->edited); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edited_by')); ?>:</b>
	<?php echo CHtml::encode($data->edited_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publish_up')); ?>:</b>
	<?php echo CHtml::encode($data->publish_up); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publish_down')); ?>:</b>
	<?php echo CHtml::encode($data->publish_down); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($data->tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_id')); ?>:</b>
	<?php echo CHtml::encode($data->site_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('import_checksum')); ?>:</b>
	<?php echo CHtml::encode($data->import_checksum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('original_changed')); ?>:</b>
	<?php echo CHtml::encode($data->original_changed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('export_checksum')); ?>:</b>
	<?php echo CHtml::encode($data->export_checksum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('global_id')); ?>:</b>
	<?php echo CHtml::encode($data->global_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('params')); ?>:</b>
	<?php echo CHtml::encode($data->params); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_url')); ?>:</b>
	<?php echo CHtml::encode($data->vir_url); ?>
	<br />

	*/ ?>

</div>