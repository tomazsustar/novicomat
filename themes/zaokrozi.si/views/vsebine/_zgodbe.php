	<div class="grid_4 zgodbe <?php if(!(($index+1)%3))echo "omega";?>">
			<a href="<?php echo $this->createUrl("Vsebine/View", array('id'=>$data->id));?>" >
			<img width = "320" src="<?php echo $data->slika ?>" >
			<h4><?php echo CHtml::encode($data->title); ?></h4>
			<p><?php echo $data->introtext; ?>
            </p>
            </a>
		</div>
	
	
	
	