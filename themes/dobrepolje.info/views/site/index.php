<?php $this->pageTitle=Yii::app()->name; 
$this->layout='//layouts/firstpage';
?>
						
							<!-- Content -->
								<div id="content" class="8u">
										
                                        <!--<div class="filter"><active>najnovejše</active> naj gledano aktualno
                                        </div>-->
                                        
									<!-- Post -->
									
										<?php  $this->widget('ZVsebineListWidget', array(
											'id'=>'dobrepolje',
											'itemView'=>'//vsebine/_naslovka',
											'template'=>'{items}',
											//'limit'=>20,
		// 									//
		//'pages' => $pages,
    //)
										
										)); 
		$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'itemSelector' => '#dobrepolje div.items',
    'itemSelector' => 'article.is-post',
     'loadingText' => 'Nalaga se še več vsebin..',
    'donetext' => 'To je vse.',
));
										?>	
									
								</div>
								
							

		