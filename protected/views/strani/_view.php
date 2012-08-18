<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tip_id')); ?>:</b>
	<?php echo CHtml::encode($data->tip_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_update')); ?>:</b>
	<?php echo CHtml::encode($data->last_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urnik')); ?>:</b>
	<?php echo CHtml::encode($data->urnik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porocilo')); ?>:</b>
	<?php echo CHtml::encode($data->porocilo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naslov')); ?>:</b>
	<?php echo CHtml::encode($data->naslov); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_text')); ?>:</b>
	<?php echo CHtml::encode($data->vir_text); ?>
	<br />

	*/ ?>

</div>