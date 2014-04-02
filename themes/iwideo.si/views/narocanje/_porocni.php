       <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-ui.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.10.2.js"></script>
   
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/narocanje.css" />

    <!-- 1. IDEJA IN DOLŽINA -->
    <section>
        <section> 
            <header>
                <h2>1. Poročni obred</h2>
                <h3><!--opis odseka--></h3>
            </header> 
            
            <input type="radio" name='SteviloPorocnihObredov' id='SteviloPorocnihObredov1' checked value='290'>
            <label for='SteviloPorocnihObredov1'>1 Poročni obred</label>
            
            <input type="radio" name='SteviloPorocnihObredov' id='SteviloPorocnihObredov2' value='350'>
            <label for='SteviloPorocnihObredov2'>2 Poročna obreda +60€ - <br><small>v primeru civilne in cerkvene poroke</small></label>     
        </section>
        <hr>
        <section> 
            <header>
                <h2>2. Poročni dan</h2>
                <h3>+160€ (EUR)</h3>
            </header> 
            
            <input type="checkbox" name='PorocniDan' id='PorocniDan'>
            <label for='PorocniDan'>
                 Snemanje poročnega dneva
            </label>  
            <ol>
                <li>Snemalec na domu ženina
                <li>Snemalec na domu neveste
                <li>Priprave na poročni dan
                <li>Prihod ženina po nevesto
                <li>Poročna povorka
            </ol> 
        </section>
        <hr>
        <section> 
            <header>
                <h2>3. Svatba</h2>
                <h3>+140€ (EUR)</h3>
            </header> 
            
            <input type="checkbox" name='Svatba' id='Svatba'>
            <label for='Svatba'>Da bo poročna zabava nepozabna, jo posnamemo vse do konca.</label>   
        </section>
        <hr>
        <section> 
            <header>
                <h2>4. Termin poroke</h2>
                <h3>&nbsp;</h3>
            </header> 
            
            <label for='Termin'>Izberite termin. (d-m-llll)</label><br><br>
            <input type="text" name='Termin' id='Termin'>

        </section>        
    </section>
    
    <hr>
    <!-- INFORMATIVNI IZRAČUN -->
    <section>
        <header>
            <h2>INFORMATIVNI IZRAČUN</h2>
            <h3><!--opis odseka--></h3>
        </header>
        
        <section>
            <table id='InformativniIzracunTable' style="text-align:center; margin:10px auto 15px auto;">
                <thead>
                    <tr style="height:30px;">
                        <th>Postavka</th>
                        <th width="90" >Cena</th>
                        <th>Valuta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:left; border-bottom:thin solid #999;">Poročni film</td>
                        <td id='PostavkaSteviloPorocnihObredov'>290</td>
                        <td>EUR</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; border-bottom:thin solid #999;">Poročni dan</td>
                        <td id='PostavkaPorocniDan'>0</td>
                        <td>EUR</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; border-bottom:thin solid #999;">Svatba</td>
                        <td id='PostavkaSvatba'>0</td>
                        <td>EUR</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>SKUPAJ</td>
                        <td id='Izracun'></td>
                        <td>EUR</td>
                    </tr>
                </tfoot>
            </table>
        </section>
    
    
        <!-- NAROČITEV IN KONTAKT -->
        <div class="povprasevanje">
            <header>
                <h2>Oddaja povpraševanja</h2>
                <h3><!--opis odseka--></h3>
            </header>
            
            <form action="form_submit.php" method="post" name="iWideoForm" id='iWideoForm'>
                <fieldset id='KontaktFieldset'>
                <center style="float:left;">iwideo.info@gmail.com<br />
                +386(0)40 69 12 12</center>
                    <!--<legend>Kontakt</legend>
                        <label for='KontaktIme'>Ime in priimek</label><br>
                        <input type="text" name='KontaktIme' id='KontaktIme' placeholder="Chuck Norrise" required><br>
                    
                        <label for='KontaktTel'>Telefonska številka</label><br>
                        <input type="text" name='KontaktTel' id='KontaktTel' placeholder="040-999-999" required><br>
                        
                        <label for='KontaktEmail'>E-naslov</label><br>
                        <input type="email" name='KontaktEmail' id='KontaktEmail' placeholder="example@email.com" required>
                        
                        <input type="submit" value='pošlji povpraševanje'> -->
                </fieldset>
            </form>
        </div>
    </section>
    <hr>
    
    <!-- KONČNI IZDELEK -->
    <section>
        <header>
            <h2>KONČNI IZDELEK</h2>
        </header>   
        
        <p>
            <strong>DOLŽINA:</strong><br>
            Ker je vsaka poroka zgodba zase je tudi dolžina vsakega filma drugačna. Dolžina poročnega filma je odvisna predvsem od števila vsebinskih sklopov, ki jih izberete (eden ali dva poročna obreda, poročni dan, svatba).  Ob tem velja izhodišče, da znaša dolžina najkrajšega poročnega filma približno 5 minut, dolžina najdaljšega pa ne presega 20 minut. Poleg filma prejmete tudi vse posnetke iz poroke, katerih dolžina ponavadi preseže 2 uri. 
        </p>
        <p> 
            <strong>KDAJ in KAKO PREJEMETE IZDELEK:</strong><br>
            V roku 7 delovnih dni od poročnega dne oddamo na pošto priporočen paket s katerim prejmete: - poročni film / DVD - poročni film v HD obliki + vsi posnetki iz poroke / USB ključek
        </p>
        <p>
            Ob tem vam preko elektronske pošte pošljemo povezavo do poročnega filma, ki ga lahko naložite na splet. 
            Poročni 
        </p>
    </section>

    <script type="text/javascript">
        Izracun();
        
        $(function() { $( "#Termin" ).datepicker({ dateFormat: "d-m-yy" }); });

        /* Stevilo porocnih obredov */
        $("input[name=SteviloPorocnihObredov]").on("change",function() {
            $("#PostavkaSteviloPorocnihObredov").text($(this).val());
                
            Izracun();
        });
        
        /* Izračun porocni dan */
        $("input[name=PorocniDan]").on("change",function() {
            PorocniDan = $('input[name=PorocniDan]:checked').val();
            if(PorocniDan == "on")
                PorocniDan = 160;
            else PorocniDan = 0;

            $("#PostavkaPorocniDan").text(PorocniDan);

            Izracun();
        });
        
        /* Izračun svatbe */
        $("input[name=Svatba]").on("change",function() {
            Svatba = $('input[name=Svatba]:checked').val();
            if(Svatba == "on")
                Svatba = 140;
            else Svatba = 0;
            $("#PostavkaSvatba").text(Svatba);
                
            Izracun();
        });

        /* Izračun informativnega računa */
        function Izracun() {
            var Izracun = "";
            var PostavkaSteviloPorocnihObredov = parseInt($("#PostavkaSteviloPorocnihObredov").text());
            var PostavkaPorocniDan = parseInt($("#PostavkaPorocniDan").text());
            var PostavkaSvatba = parseInt($("#PostavkaSvatba").text());

            Izracun = (PostavkaSteviloPorocnihObredov + PostavkaPorocniDan + PostavkaSvatba);           
                
            $("#Izracun").text(Izracun.toString());
        }
        
        /* Funkcija s katero oddamo naročilo */
        $("#iWideoForm").on("submit",function(e) {
            e.preventDefault();
    
            var Ideja = $("input[name=Ideja]:checked").val();
            var Priloga = "";
            var Predstavitev = "";
            
            if(Ideja == 0) {
                var Priloga = $("input[name=Priponka]").val();
                var Predstavitev = $("input[name=OpisIdeje]").text();
            }
            
            var Dolzina = $("input[name=Dolzina]:checked").val();
            var Prostori = $("input[name=Prostori]:checked").val();
            var StLokacij = $("input[name=StLokacij]:checked").val();
            var Igralci = $("input[name=Igralci]:checked").val();
            var StIgralcev = 0;
            
            if(Igralci == 150) {
                Igralci = $("input[name=StIgralcev]").val() * Igralci;
                StIgralcev = $("input[name=StIgralcev]").val();
            }
            
            var VIP = $("input[name=ZnanaOsebnost]:checked").val();
            if(VIP != "VIP")
                VIP = 0;
            else VIP = 1;
            
            var Izracun = $("#Izracun").text();
            
            var Email = $("input[name=KontaktEmail]").val();
            var Tel = $("input[name=KontaktTel]").val();
            var Ime = $("input[name=KontaktIme]").val();
            
            $.ajax({
                type: "POST",
                url: "form_submit.php",
                data: { Ideja: Ideja, Priloga:Priloga, Predstavitev: Predstavitev, Dolzina:Dolzina, Prostori: Prostori, StLokacij:StLokacij, Igralci:Igralci, StIgralcev:StIgralcev, VIP:VIP, Izracun: Izracun, Email:Email, Tel:Tel, Ime:Ime}
            });
        });
        
    </script>