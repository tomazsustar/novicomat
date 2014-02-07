	 <div class="uvodne_vsebine <?php if(!(($index+1)%3))echo "omega";?>">
            <?php 
			if(!(($index)%2))
			{?> 
			 <div><center><h3><?php echo CHtml::encode($data->title); ?></h3></center>
              <?php echo $data->fulltext; ?></div>
			  <div><center><img width="250px" src="<?php echo $data->slika ?>" ><center></div>
			<?php }
			if(!(($index+1)%2))
				{?> 
				<div><center><img width="250px" src="<?php echo $data->slika ?>" ><center></div>
			 <div><center><h3><?php echo CHtml::encode($data->title); ?></h3></center>
              <?php echo $data->fulltext; ?></div>
			  <?php } ?>
	 </div>
	 <hr />
	
	