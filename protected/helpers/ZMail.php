<?php

Yii::import('application.extensions.phpmailer.JPhpMailer');

class ZMail {

    public function poslimejl($portal, $model) {
    	Yii::trace("zacetekMejli");
        // vsak mejl se shrani v svoje polje
        $mejli = explode(",", str_replace(" ", "", $portal->mejli));
        $naslov = $model->title;

        $slika = new Slike();
        $potdoslike = $slika->potDoSlike($model->id);

        $mail = new JPhpMailer;
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        list($mail->Host, $mail->Port) = explode(':',Yii::app()->params['mailHost']);
        $mail->Username = Yii::app()->params['mailUser'];
        $mail->Password = Yii::app()->params['mailPass'];
        $mail->SetFrom(Yii::app()->params['mailSetFrom'], 'Novicomat');

        // pripenjanje slik in/ali priponk 
        foreach ($potdoslike as $pott) {
            $mail->AddAttachment($pott['pot'] . $pott['ime_slike']);
        }

        $mail->Subject = 'Naslov: '  . $naslov;
        $mail->MsgHTML('<p><strong>Naslov: </strong>' .$model->title . '</p><p><strong>Avtor: </strong>' . $model->author . '</p><br />' . '<strong>Vsebina: </strong>' . $model->fulltext . '<br /><br /><p>---<p><p>To vsebino je uredil uporabnik (email) v sistemu novicomat.si. Za morebitna vprašanja se obrnite na ekipa@zelnik.net</p> <br />' );
        
        // dodajanje vsakega mejla posebej
        foreach ($mejli as $mejll) {
            $mail->AddCC($mejll);
        }

        if($mail->Send()){      
       	 	Yii::trace("Poslano ... OK");
       	 	Yii::trace(CVarDumper::dumpAsString($mejli));
        }else{
        	Yii::trace(CVarDumper::dumpAsString($portal));
        	Yii::trace(CVarDumper::dumpAsString($mail));
        }
    }
}

?>
