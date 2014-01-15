<?php
class ZContactFormAction extends CAction
{
    public $model;
    public $attribute;
    private $results = array();
 
    public function run()
    {
        $model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			Yii::trace('isset($_POST[ContactForm])', 'ZContactFormAction.run()');
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				Yii::trace('$model->validate()');
				
				if(ZMail::sendMail(Yii::app()->params['adminEmail'], 
									$model->subject, 
									$model->body, 
									$model->email, 
									$model->name))
					Yii::app()->user->setFlash('contact', Yii::t('contact','success'));
				else Yii::app()->user->setFlash('contact', Yii::t('contact','error'));
				//$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				//mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				//Yii::app()->user->setFlash('contact', Yii::t('contact','success'));
				//$this->getController()->refresh();
			}
			else Yii::trace(CVarDumper::dumpAsString($model->getErrors()), 'ZContactFormAction.run()');
		}
		$this->getController()->renderPartial('//ZContactFormWidget/contactForm',array('model'=>$model));
    }
}
?>