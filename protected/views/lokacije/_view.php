<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naziv')); ?>:</b>
	<?php echo CHtml::encode($data->naziv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ulica')); ?>:</b>
	<?php echo CHtml::encode($data->ulica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('h_st')); ?>:</b>
	<?php echo CHtml::encode($data->h_st); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postna_st')); ?>:</b>
	<?php echo CHtml::encode($data->postna_st); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posta')); ?>:</b>
	<?php echo CHtml::encode($data->posta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dod_naslov')); ?>:</b>
	<?php echo CHtml::encode($data->dod_naslov); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('drzava')); ?>:</b>
	<?php echo CHtml::encode($data->drzava); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vsebine')); ?>:</b>
	<?php echo CHtml::encode($data->id_vsebine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontakt')); ?>:</b>
	<?php echo CHtml::encode($data->kontakt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_stars')); ?>:</b>
	<?php echo CHtml::encode($data->id_stars); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rezervacije')); ?>:</b>
	<?php echo CHtml::encode($data->rezervacije); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('izbira')); ?>:</b>
	<?php echo CHtml::encode($data->izbira); ?>
	<br />

	*/ ?>

</div>