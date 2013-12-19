<?php

Yii::import('application.extensions.phpmailer.JPhpMailer');

class ZMail {

    static public function poslimejl($portal, $model) {
        // vsak mejl se shrani v svoje polje
        $mejli = explode(",", str_replace(" ", "", $portal->mejli));
        $naslov = $model->title;

        $slika = new Slike();
        $potdoslike = $slika->potDoSlike($model->id);

        $mail = new JPhpMailer;
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = Yii::app()->params['mailHost'];
        $mail->Username = Yii::app()->params['mailUser'];
        $mail->Password = Yii::app()->params['mailPass'];
        $mail->SetFrom(Yii::app()->params['mailSetFrom'], 'Novicomat');

        // pripenjanje slik in/ali priponk 
        foreach ($potdoslike as $pott) {
            $mail->AddAttachment($pott['pot'] . $pott['ime_slike']);
        }

        $mail->Subject = 'Naslov: '  . $naslov;
        $mail->MsgHTML('<p><strong>Naslov: </strong>' .$model->title . '</p><p><strong>Avtor: </strong>' . $model->author . '</p><br />' . '<strong>Vsebina: </strong>' . $model->fulltext . '<br /><br /><p>---<p><p>To vsebino je uredil uporabnik (email) v sistemu novicomat.si. Za morebitna vprašanja se obrnite na ekipa@zelnik.net</p> <br />' );


        Yii::trace("zacetekMejli");
        Yii::trace(CVarDumper::dumpAsString($mail));
        // dodajanje vsakega mejla posebej
        foreach ($mejli as $mejll) {
            $mail->AddCC($mejll);
        }

        $mail->Send();
    }
}

?>
