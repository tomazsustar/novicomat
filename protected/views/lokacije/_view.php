<?php
/* @var $this LokacijeController */
/* @var $data Lokacije */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ime_lokacije')); ?>:</b>
	<?php echo CHtml::encode($data->ime_lokacije); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ime_prostora')); ?>:</b>
	<?php echo CHtml::encode($data->ime_prostora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ime_stavbe')); ?>:</b>
	<?php echo CHtml::encode($data->ime_stavbe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ulica_vas')); ?>:</b>
	<?php echo CHtml::encode($data->ulica_vas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('h_st')); ?>:</b>
	<?php echo CHtml::encode($data->h_st); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postna_st')); ?>:</b>
	<?php echo CHtml::encode($data->postna_st); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kraj')); ?>:</b>
	<?php echo CHtml::encode($data->kraj); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obcina')); ?>:</b>
	<?php echo CHtml::encode($data->obcina); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('drzava')); ?>:</b>
	<?php echo CHtml::encode($data->drzava); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geolat')); ?>:</b>
	<?php echo CHtml::encode($data->geolat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geolng')); ?>:</b>
	<?php echo CHtml::encode($data->geolng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vsebina_id')); ?>:</b>
	<?php echo CHtml::encode($data->vsebina_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uporabnik_id')); ?>:</b>
	<?php echo CHtml::encode($data->uporabnik_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gln')); ?>:</b>
	<?php echo CHtml::encode($data->gln); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	*/ ?>

</div>