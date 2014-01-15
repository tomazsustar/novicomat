<?php

Yii::import('application.extensions.phpmailer.JPhpMailer');

class ZMail extends CActiveRecord{

    public function poslimejl($portal, $model) {
    	Yii::trace("zacetekMejli");
        // vsak mejl se shrani v svoje polje
        $mejli = explode(",", str_replace(" ", "", $portal->mejli));
        $naslov = $model->title;

        $slika = new Slike();
        $slike = $slika->najdiSlike($model->id);

        $userId = Yii::app()->user->id;
        $userModel=Users::model()->findByPk($userId);
        $userMejl = $userModel->email;
        $userIme = $userModel->username;
       	 	Yii::trace("UserNameMejl");
       	 	Yii::trace(CVarDumper::dumpAsString($userMejl));
       	 	Yii::trace(CVarDumper::dumpAsString($userIme));

        $mail = new JPhpMailer;
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        list($mail->Host, $mail->Port) = explode(':',Yii::app()->params['mailHost']);
        $mail->Username = Yii::app()->params['mailUser'];
        $mail->Password = Yii::app()->params['mailPass'];
        $mail->AddReplyTo($userMejl, $userIme);
        $mail->SetFrom(Yii::app()->params['mailSetFrom'], 'Novicomat');
        

        // pripenjanje slik in/ali priponk 
        foreach ($slike as $pott) {
            $mail->AddAttachment($pott['pot'] . $pott['ime_slike']);
        }
		
        $avtor= (trim($model->author_alias)=="")?Yii::app()->user->name:$model->author_alias;
        $mail->Subject = 'Naslov: '  . $naslov;
        $mail->MsgHTML('<p><strong>Naslov: </strong>' .$model->title . '</p>
        				<p><strong>Avtor: </strong>' . $avtor . '</p>' . 
        				'<p><strong>Uvodno besedilo: </strong></p><p>' . $model->introtext .'</p>'. 
        				'<p><strong>Vsebina: </strong></p>' . $model->fulltext . 
        				'<br /><br /><p>---<p><p>To sporočilo je bilo avtomatsko generirano v sistemu novicomat.si. 
        				Za morebitna vprašanja se obrnite na ekipa@zelnik.net</p> <br />' . 
        				'<p>---</p><p>Uporabnik: ' . Yii::app()->user->name . '<p>Email: </p>'); 
        
        // dodajanje vsakega mejla posebej
        foreach ($mejli as $mejll) {
            $mail->AddCC($mejll);
        }

        if($mail->Send()){      
       	 	Yii::trace("Poslano ... OK");
       	 	Yii::trace(CVarDumper::dumpAsString($mail));

            // Najprej shranimo listo mejlov v string
            $listamejlov = "";
            foreach ($mejli as $mejlls) {
                $listamejlov.=$mejlls . " ";
            }
            // sestavimo nov mejl
            $mail2 = new JPhpMailer;
            $mail2->CharSet = "UTF-8";
            $mail2->IsSMTP();
            $mail2->SMTPAuth = true;
            list($mail2->Host, $mail2->Port) = explode(':',Yii::app()->params['mailHost']);
            $mail2->Username = Yii::app()->params['mailUser'];
            $mail2->Password = Yii::app()->params['mailPass'];
            $mail2->SetFrom(Yii::app()->params['mailSetFrom'], 'Novicomat - obvestilo');
            $mail2->Subject = 'Obvestilo o poslanem prispevku';
            $msg='<p>Vaš prispevek je bil uspešno poslan na naslednje naslove:</p>' . '<p>'.$listamejlov .'</p>'.'<br />' . 
            				'<p><strong>Naslov: </strong>' . $model->title . '</p>
            				<p><strong>Avtor: </strong>' . $model->author_alias . '</p>' . 
            				'<p><strong>Uvodno besedilo: </strong></p><p>' . $model->introtext . '</p>'.
            				 '<p><strong>Vsebina: </strong></p>' . $model->fulltext;
            foreach ($slike as $slika){
            	$msg.=CHtml::image($slika['url2']);
            }
            $msg.=		 '<br /><br /><p>---</p><p>To sporočilo je bilo avtomatsko generirano v sistemu novicomat.si. 
            				 Za morebitna vprašanja se obrnite na ekipa@zelnik.net</p>';
            $mail2->MsgHTML($msg);
            $mail2->AddAddress($userMejl);

            if($mail2->send()){
            	Yii::trace("Drugi mail poslan");
            }
       	 	Yii::trace(CVarDumper::dumpAsString($mail2));
        }else{
        	Yii::trace(CVarDumper::dumpAsString($portal));
        	Yii::trace(CVarDumper::dumpAsString($mail));
        }
    }
    
    /**
     * 
     * Pošlji mail z uporabo nastavitev v config datotekah...
     * @param $to
     * @param $subject
     * @param $body
     * @param $replyTo
     */
    public static function sendMail($to, $subject, $body, $replyTo=false, $replyToName=""){
    	Yii::trace('zacetek',"ZMail.sendMail()");
    	$mail = new JPhpMailer;
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        list($mail->Host, $mail->Port) = explode(':',Yii::app()->params['mailHost']);
        $mail->Username = Yii::app()->params['mailUser'];
        $mail->Password = Yii::app()->params['mailPass'];
        if($replyTo) // reply to je treba natavit pred SetFrom, sicer sta oba dodana kot ReplyTo
        	$mail->AddReplyTo($replyTo, $replyToName);
        $mail->SetFrom(Yii::app()->params['mailSetFrom'], $replyToName);
        $mail->AddAddress($to);
        $mail->Subject=$subject;
        $mail->MsgHTML($body);        
        	
        if($mail->send()){
        	Yii::trace("Poslano ... za:$to, zadeva:$subject, reply:$replyTo","ZMail.sendMail()");
        	return true;
        }else{
        	Yii::trace(CVarDumper::dumpAsString($mail),"ZMail.sendMail()");
        	return false;
        }
    }
}

?>
