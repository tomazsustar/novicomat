<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domena')); ?>:</b>
	<?php echo CHtml::encode($data->domena); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag')); ?>:</b>
	<?php echo CHtml::encode($data->tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tip')); ?>:</b>
	<?php echo CHtml::encode($data->tip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mejli')); ?>:</b>
	<?php echo CHtml::encode($data->mejli); ?>
	<br />
</div>
