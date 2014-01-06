	 <div class="grid_4 <?php if(!(($index+1)%3))echo "omega";?>">
         <a class="news" href="novica1.html">
             <p><?php echo CHtml::encode($data->title); ?></p>
             <div class="date">9.12.2013</div>
              <div class="text"><?php echo $data->introtext; ?></div>
        </a>
        <div id="readmore">
			<a href="<?php echo Yii::app()->theme->baseUrl; ?>/novica1.html"><span class="readmore">VEČ</span></a>
		</div>
     </div>
	
	