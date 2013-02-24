<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url2')); ?>:</b>
	<?php echo CHtml::encode($data->url2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('opis')); ?>:</b>
	<?php echo CHtml::encode($data->opis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avtor')); ?>:</b>
	<?php echo CHtml::encode($data->avtor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datum')); ?>:</b>
	<?php echo CHtml::encode($data->datum); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($data->tags); ?>
	<br />

	*/ ?>

</div>