		 
	 <article class="is-post">
											<a href="<?php echo $this->createUrl("Vsebine/View", array('id'=>$data->id));?>" class="image image-right"><img src="<?php echo $data->slika ?>"></a>
											<header>
												<h2><a href="<?php echo $this->createUrl("Vsebine/View", array('id'=>$data->id));?>"><?php echo CHtml::encode($data->title); ?></a></h2>
                                                
												
                                                <!--<div class="tag">članek</div>
                                                <div class="tag">dogodek</div>-->
                                                <div class="author"><?php if (!empty($data->author_alias)) {echo $data->author_alias;} else {echo $data->author;}?> - <?php echo $data->publish_up->format('j. n. Y'); ?></div>
                                                
											</header>
											<p><?php echo $data->introtext; ?></p>
											<ul class="actions">
												<li><a href="<?php echo $this->createUrl("Vsebine/View", array('id'=>$data->id));?>" class="button fa fa-angle-right"></a></li>
											</ul>
										</article>
