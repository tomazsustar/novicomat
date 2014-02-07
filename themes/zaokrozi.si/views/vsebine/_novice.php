	 <div class="grid_4 <?php if(!(($index+1)%3))echo "omega";?>">
         <a class="news" href="<?php echo $this->createUrl("Vsebine/View", array('id'=>$data->id));?>">
             <p><?php echo CHtml::encode($data->title); ?></p>
             <div class="date"><?php echo $data->publish_up->format('j. n. Y'); ?></div>
              <div class="text"><?php echo $data->introtext; ?></div>
        </a>
        <div id="readmore">
			<a href="<?php echo $this->createUrl("Vsebine/View", array('id'=>$data->id));?>"><span class="readmore">VEČ</span></a>
		</div>
     </div>
	
	