<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('opis')); ?>:</b>
	<?php echo CHtml::encode($data->opis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parser')); ?>:</b>
	<?php echo CHtml::encode($data->parser); ?>
	<br />


</div>