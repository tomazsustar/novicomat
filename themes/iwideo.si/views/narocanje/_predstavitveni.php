<h2>NAROČNIK</h2>
Ime in priimek / naziv podjetja <input type="text" name="narocnik" id="narocnik" size="20" maxlength="100" /><br />
e-mail <input type="text" name="email_narocnik" id="email_narocnik" size="30" maxlength="100" /> <br /><br />
<h2>1. IDEJA in DOLŽINA</h2>
<?php echo CHtml::checkBox("Vaša ideja"); ?><strong>Vaša ideja</strong> <input value="+ 0 EUR" type="block" name="ideja" id="ideja" size="10"  readonly="readonly" />
<br />Opišite vašo idejo.<br /><textarea  type="text" name="ideja" id="ideja" size="200" maxlength="500" ></textarea>
<br />Upoštevajte omejitve glede lokacije snemanja, najema igralcev in uporabe rekvizitov.
