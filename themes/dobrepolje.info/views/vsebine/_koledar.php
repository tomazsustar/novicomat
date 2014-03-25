		<?php 
			foreach ($this->items as $datum => $dogodki) : 
				list($leto, $mesec, $dan) = explode('-', $datum);
				?>
<div id="calendar"><div id="text"><?php echo $dan; ?><br><?php echo ZDate::MESECI_KRATKO($mesec); ?></div></div>
                                                            <?php foreach ($dogodki as $dogodek):?>	
															<a href="<?php echo $dogodek->url?>"><?php echo $dogodek->naslov?></a><br>
                                                            <span class="light"><?php echo $dogodek->lokacija; ?><br/>
							<?php echo $dogodek->zacetek->ura(); ?>
							<?php if($dogodek->konec){
								if($datum == $dogodek->konec->datumDB()){
									echo " do ". $dogodek->konec->ura();
								}else{
									echo " do ". $dogodek->konec->datum()." ".$dogodek->konec->ura();
								}
									
							}?></span>
							<?php endforeach;?>
							<?php endforeach;?>
							<?php //endif; ?>