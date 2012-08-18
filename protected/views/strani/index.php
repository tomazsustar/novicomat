<?php
$this->breadcrumbs=array(
	'Strani',
);

$this->menu=array(
	array('label'=>'Create Strani', 'url'=>array('create')),
	array('label'=>'Manage Strani', 'url'=>array('admin')),
);
?>

<h1>Strani</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'strani_grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'naslov',
		'home_url',
		'last_update',
		'parser',
		array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
			'template' => '{view}{update}{delete}{uvozi}', 
			'buttons' => array(
				'uvozi' => array //poljuben gumb
				(
				    'label'=>'Uvozi',     //Text label of the button.
					'url'=>'Yii::app()->createUrl("strani/uvozi", array("id"=>$data->id))',       //A PHP expression for generating the URL of the button.
				    //'url'=>'$data->url',       //A PHP expression for generating the URL of the button.
				    //'imageUrl'=>'...',  //Image URL of the button.
				    //'options'=>array(), //HTML options for the button tag.
//				     'click'=>"function() {
//                                $.fn.yiiGridView.update('strani_grid', {
//                                        type:'POST',
//                                        url:$(this).attr('href'),
//                                        success:function(text,status) {
//                                        		$.fn.yiiGridView.update('strani_grid');
//                                               alert(text);    
//                                               //alert(status);                                                                                       
//                                        }
//                                });
//                                return false;
//                        }",     //A JS function to be invoked when the button is clicked.
				   // 'visible'=>'...',   //A PHP expression for determining whether the button is visible.
				   
				)
			)
        ),

		
	)
)); ?>
