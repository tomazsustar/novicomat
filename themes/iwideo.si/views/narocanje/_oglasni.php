
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/narocanje.css" />
 <!-- 1. IDEJA IN DOLŽINA -->
    <section>
    	<header>
 			<h2>1. IDEJA in DOLŽINA</h2>
			<h3><!--opis odseka--></h3>
        </header>
        
        <section class='Table'>   
        	<div class='Cell Default' id='NjihovaIdejaCell'>
                <input type="radio" id="VasaIdeja" name='Ideja' value="0" checked>
                <strong>Vaša ideja
                    <label for='VasaIdeja' id='VasaIdejaIzracun' class='Izracuni'>+ 0 EUR</label></strong>
                <br>  
				        	<label for="OpisIdeje">Na kratko lahko opišete idejo</label><br>
       		<textarea name='OpisIdeje' id='OpisIdeje' style="resize:vertical; width:95%; min-height:40px;"></textarea><br>
            
				<aside style="margin:0px 0px 10px 0px;" id='NasvetZaCeno'>
                <small>NAŠ NASVET ZA UGODNO CENO:<br />Pri zasnovi ideje upoštevajte omejitve glede lokacij, najema igralcev, uporabe rekvizitov, posebnih efektov in računalniških animacij.</small>
                </aside>
            </div>        
               
            <div class='Cell Option' id='NasaIdejaCell'>
                <input type="radio" id="NasaIdeja" name='Ideja' value="150">
                <strong>Naša ideja
                    <label for='NasaIdeja' id='NasaIdejaIzracun' class='Izracuni'>+ 150 EUR</label><br /><br />
                 </strong>
                <ul>
                	<li>pripravimo različne ideje
                    <li>skupaj izberemo najprimernejšo idejo
                </ul>   
                
                
                <small>Naše ideje so zasnovane na filmskem pristopu ter na minimizaciji drugih stroškov (najemi lokacij, igralcev, rekvizitov, posebnih efektov, računalniških anamacij)</small>
                
            </div>
        </section>
        
        
        
        <section>
    
        	<fieldset class="sivina">
            	<strong>Dolžina oglasa - osnovna cena do 1 minute je 640 eur</strong>
                <br>
                    <input type="radio" value='0' name='Dolzina' id='Do1Min' class='IndentInput' checked>
                    	<label for='Do1Min'>Do 1 minute</label>
                    		<label for='Do1Min'>+ 0 EUR</label><br>
                            
                    <input type="radio" value='300' name='Dolzina' id='Do2Min' class='IndentInput'>
                    	<label for='Do2Min'>Od 1 - 2 minut</label>
                    		<label for='Do2Min'>+ 300 EUR</label><br>
                            
                    <input type="radio" value='600' name='Dolzina' id='Do3Min' class='IndentInput'>
                    	<label for='Do3Min'>Od 2 - 3 minut</label>
                    		<label for='Do3Min'>+ 600 EUR</label><br>
   
                    <input type="radio" value='-1' name='Dolzina' id='Nad3Min' class='IndentInput'>
                    	<label for='Nad3Min'>Nad 3 minute</label>
                    		<label for='Nad3Min'> - obrnite se na nas, da vam pripravimo individualno rešitev in ponudbo</label>
            </fieldset>
        </section>        
	</section>
    <hr>
    
    <!-- 2.  LOKACIJE SNEMANJA  -->
    <section>
    	<header>
 			<h2>2. LOKACIJE SNEMANJA</h2>
			<h3><!--opis odseka--></h3>
        </header>
        
        <section class='Table'>   
        	<div class='Cell Default' id='NjihoviProstoriCell'>
            	<input type="radio" id="VasiProstori" name='Prostori' value="0" required checked>
                <strong>Vaši prostori
                    <label for='VasiProstori' id='VasaoProstoriIzracun' class='Izracuni'>+ 0 EUR</label><br>
                </strong>
                <small>
                	Ob ustrezni ideji prostor vašega poslovanja postane prizorišče snemanja. 
                </small>
            </div>
            
            <div class='Cell Option' id='NajemProstoraCell'>
            	<input type="radio" id="NajemProstora" name='Prostori' value="1" >
                <strong>Najem prostora - Po dogovoru</strong><br>
                    
                <small>
                	Glede na scenarij Izvedemo ogled ustreznih lokacij in uredimo najem. Ceno najema postavi lastnik prostorov.
                </small>
            </div>
        </section>
        
         <section>
        	<fieldset class="sivina">
            	<strong>Število lokacij snemanja</strong><br />
                
                    <input type="radio" value='0' name='StLokacij' id='1Lok' class='IndentInput' checked>
                    	<label for='1Lok'>1 lokacija</label>
                    		<label for='1Lok'>+ 0 EUR</label><br>
                            
                    <input type="radio" value='95' name='StLokacij' id='2Lok' class='IndentInput'>
                    	<label for='2Lok'>2 lokacije</label>
                    		<label for='2Lok'>+ 95 EUR</label><br>
                            
                    <input type="radio" value='190' name='StLokacij' id='3Lok' class='IndentInput'>
                    	<label for='3Lok'>3 lokacije</label>
                    		<label for='3Lok'>+ 190 EUR</label><br>
                            
                    <input type="radio" value='3' name='StLokacij' id='Nad3Lok' class='IndentInput'>
                    	<label for='Nad3Lok'>Nad 3 lokacije</label>
                    		<label for='Nad3Lok'> - Po dogovoru.</label>
            </fieldset>
        </section>
    </section>
    <hr>
    
    <!-- 3.  IGRALCI  -->
    <section>
    	<header>
 			<h2>3. IGRALCI</h2>
			<h3><!--opis odseka--></h3>
        </header>
        
        <section class='Table'>   
        	<div class='Cell Default' id='NjihovaIgralskaZasedbaCell'>
            	<input type="radio" id="VasiIgralci" name='Igralci' value="0" checked>
                <strong>Vaša igralska zasedba
                    <label for='VasiIgralci' id='VasiIgralciIzracun' class='Izracuni'>+ 0 EUR</label><br>
                </strong>
                <small>
                	Uporabite zaposlene, udeležence, sorodnike, prijatelje, znance. 
                </small>
            </div>
            
            <div class='Cell Option' id='NajemIgralcevCell'>
            	<input type="radio" id="NajemIgralcev" name='Igralci' value="150">
                <strong>Najem igralcev
                    <label for='NajemIgralcev' id='NajemIgralcevIzracun' class='Izracuni'>+ 150 EUR / Osebo</label><br>
                </strong>
                <small >
                	Poskrbimo za izbor in najem igralske zasedbe.
                </small>
                <br><br>
                
			<div id="StIgralcevForm" style="display:none;">	
			<!-- število najetih igralcev -->	
                <label for='StIgralcev'>Izberite število igralcev</label><br>
                <input type="range" min="1" max="10" value="1" name='StIgralcev' id='StIgralcev' >
					<label for='StIgralcev' id='PrikazStIgralcev' style="margin-left:20px;" >Število: 1</label>
                    <script type="text/javascript"> 
						$("input[name=StIgralcev]").on("change",function() {
							$("#PrikazStIgralcev").text("Število: "+$("input[name=StIgralcev]").val());
							$("#PostavkaIgralci").text()
						});
                    </script>
            <!-- število najetih igralcev -->
			</div>
            
           <br />
        	<input type="checkbox" id="ZnanaOsebnost" name='ZnanaOsebnost' value="VIP" style='margin-top:20px;'>
            <strong>Najem znane osebe</strong><br>
                            
            <small>
                Honorar po dogovoru.
            </small>
			</div>
        </section>
    </section>
    <hr>
     <!-- 4.  POSEBNI EFEKTI  -->
    <section>
    	<header>
 			<h2>4. POSEBNI EFEKTI</h2>
			<h3><!--opis odseka--></h3>
        </header>
        
        <section class='Table'>   
        	<div class='Cell Default' id='BrezEfektovCell'>
            	<input type="radio" id="BrezEfektov" name='Efekti' value="0" checked>
                <strong>Brez uporabe posebnih efektov
                    <label for='BrezEfektov' id='BrezEfektovIzracun' class='Izracuni'>+ 0 EUR</label><br>
                </strong>
                <small>
                	<!--opis-->
                </small>
            </div>
            
            <div class='Cell Option' id='UporabaEfektovCell'>
            	<input type="radio" id="UporabaEfektov" name='Efekti' value="Po dogovoru">
                <strong>Uporaba posebnih efektov
                    <label for='UporabaEfektov' id='UporabaEfektovIzracun' class='Izracuni'>- Po dogovoru</label><br>
                </strong>
				<ul>
                	<li>posebni efekti (npr. super slow motion, dugi vizualni efekti)
                    <li>računalniške animacije (elementi, ki jih ni mogoče posneti in so računalniško ustvarjeni)
                </ul> 
                <small >V primeru uporabe posebnih efektov se izdelane rešitve obračunajo glede na izvedbo in obseg.
                </small>
                          
			</div>
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
                    	<th>Postavka
                        <th width="90" >Cena
                        <th>Valuta
                    </tr>
                </thead>
                <tbody>
                	<tr>
                    	<td style="text-align:left; border-bottom:thin solid #999;">Osnovna cena
                        <td id='PostavkaOsnovna'>640
                        <td>EUR
                    </tr>
                	<tr>
                    	<td style="text-align:left; border-bottom:thin solid #999;">Ideja
                        <td id='PostavkaIdeja'>0
                        <td>EUR
                    </tr>
                    <tr>
                    	<td style="text-align:left; border-bottom:thin solid #999;">Dodatna minutaža
                        <td id='PostavkaMinute'>0
                        <td>EUR
                    </tr>
                    <tr>
                    	<td style="text-align:left; border-bottom:thin solid #999;">Najem prostora
                        <td id='PostavkaLastnistvo'>0
                        <td>EUR
                    </tr>
                    <tr>
                    	<td style="text-align:left; border-bottom:thin solid #999;">Lokacije snemanja
                        <td id='PostavkaLokacija'>0
                        <td>EUR
                    </tr>
                    <tr>
                    	<td style="text-align:left; border-bottom:thin solid #999;">Igralci
                        <td id='PostavkaIgralci'>0
                        <td>EUR
                    </tr>
					<tr>
                    	<td style="text-align:left; border-bottom:thin solid #999;">Posebni efekti
                        <td id='PostavkaEfekti'>0
                        <td>EUR
                    </tr>
                </tbody>
                <tfoot>
                	<tr>
                    	<td>SKUPAJ
                        <td id='Izracun'>
                        <td>EUR
                    </tr>
                </tfoot>
            </table>
    
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
        
        <ol>
            <li>V roku 5 delovnih dni od zadnjega snemalnega dne oz. od prejetja posebnih elementov, naročnik dobi v pregled delovno verzijo na katero izda pripombe. 
            <li>V roku 3 delovnih dni po izdanih pripombah naročnik prejme v pregled delovno verzijo z upoštevanimi pripombami. 
            <li>V roku 3 delovnih dni po potrditvi delovne verzije, naročnik prejme končni izdelek.
        </ol>
    </section>

    <script type="text/javascript">
		Izracun();

		/* Izbira med našo idejo ali njihovo */
		$("input[name=Ideja]").on("click",function() {
			Ideja = $('input[name=Ideja]:checked').val();
			$("#PostavkaIdeja").text($('input[name=Ideja]:checked').val())
			
			if(Ideja == 150) {
				$("#NjihovaIdejaCell").removeClass("Default").addClass("Option");
				$("#NasaIdejaCell").removeClass("Option").addClass("Default");
			}
			else {
				$("#NasaIdejaCell").removeClass("Default").addClass("Option");
				$("#NjihovaIdejaCell").removeClass("Option").addClass("Default");
			}
			
			$("#NjihoviProstoriCell").removeClass("Default").addClass("Option");
			$("#NajemProstoraCell").removeClass("Option").addClass("Default");
				
			Izracun();
		});
		
		/* Izračun število minut */
		$("input[name=Dolzina]").on("click",function() {
			Dolzina = $("input[name=Dolzina]:checked").val();
			if(Dolzina == -1)
				$("#PostavkaMinute").text("Po dogovoru");
			else
				$("#PostavkaMinute").text($('input[name=Dolzina]:checked').val())

			Izracun();
		});
		
		/* Izračun števila prostorov */
		$("input[name=Prostori]").on("click",function() {
			Prostori = $('input[name=Prostori]:checked').val();
			if(Prostori == 1) {
				$("#PostavkaLastnistvo").text("Po dogovoru")
				$("#NjihoviProstoriCell").removeClass("Default").addClass("Option");
				$("#NajemProstoraCell").removeClass("Option").addClass("Default");
			}
			else {
				$("#PostavkaLastnistvo").text(0);
				$("#NajemProstoraCell").removeClass("Default").addClass("Option");
				$("#NjihoviProstoriCell").removeClass("Option").addClass("Default");
			}
				
			Izracun();
		});
		
		/* Izračun števila lokacij snemanj */
		$("input[name=StLokacij]").on("click",function() {
			Lokacije = $('input[name=StLokacij]:checked').val();
			if(Lokacije == 4)
				$("#PostavkaLokacija").text("Po dogovoru")
			else	
				$("#PostavkaLokacija").text($('input[name=StLokacij]:checked').val())
			
			Izracun();
		});
		
		/* Izbira med njihovimi igralci (0 EUR) ali najem naših 150 EUR / osebo */
		$("input[name=Igralci]").on("click",function() {
			Igralci = $('input[name=Igralci]:checked').val();
			
			if(Igralci != 0) {
				Igralci = Igralci * $("input[name=StIgralcev]").val();
				$("#NjihovaIgralskaZasedbaCell").removeClass("Default").addClass("Option");
				$("#NajemIgralcevCell").removeClass("Option").addClass("Default");
			}
			else {
				$("#NajemIgralcevCell").removeClass("Default").addClass("Option");
				$("#NjihovaIgralskaZasedbaCell").removeClass("Option").addClass("Default");
			}

			$("#PostavkaIgralci").text(Igralci)
			Izracun();
		});
		
		/* Izračun število igralcev x 150 EUR */
		$("input[name=Igralci]").on("click",function() {
		NajemIgralcev = $('input[name=Igralci]:checked').val();
			
			if(Igralci != 0)
			$("#StIgralcevForm").show();
			else
			$("#StIgralcevForm").hide();
		});
		$("input[name=StIgralcev]").on("change",function() {
			Igralci = $('input[name=Igralci]:checked').val();
			
			if(Igralci != 0)
				Igralci = Igralci * $("input[name=StIgralcev]").val();
				
			$("#PostavkaIgralci").text(Igralci)
			Izracun();
		});
		
		/* Dodatna postavka za VIP */
		$("input[name=ZnanaOsebnost]").on("change",function() {
			if($("input[name=ZnanaOsebnost]:checked").val() == "VIP")
			$("#InformativniIzracunTable tbody").append("<tr id='VIPRow'><td style='text-align:left; border-bottom:thin solid #999;'>Znana osebnost<td id='PostavkaVIP'>Po dogovoru<td>EUR</tr>");
			else if($("#VIPRow"))
				$("#VIPRow").remove();
		});
		/* Uporaba posebnih efektov */
		$("input[name=Efekti]").on("click",function() {
			Efekti = $('input[name=Efekti]:checked').val();
			
				$("#UporabaEfektovCell").removeClass("Default").addClass("Option");
				$("#BrezEfektovCell").removeClass("Option").addClass("Default");
		
			$("#PostavkaEfekti").text(Efekti)
			Izracun();
		});

		/* Izračun informativnega računa */
		function Izracun() {
			var Izracun = "";
			var PostavkaOsnovna = parseInt($("#PostavkaOsnovna").text());
			var PostavkaIdeja = parseInt($("#PostavkaIdeja").text());
			var PostavkaLokacija = parseInt($("#PostavkaLokacija").text());
			var PostavkaMinute = parseInt($("#PostavkaMinute").text());
			var PostavkaIgralci = parseInt($("#PostavkaIgralci").text());
			
			if(($("#PostavkaLastnistvo").text() == "Po dogovoru")||($("#PostavkaLokacija").text() == "Po dogovoru")||
				($("#PostavkaMinute").text() == "Po dogovoru")||($("#PostavkaEfekti").text() == "Po dogovoru"))
				{
				//PostavkaLastnistvo = 0;
				Izracun = "Pošljemo predračun";
				}
			else {
			Izracun = (PostavkaOsnovna + PostavkaLokacija + PostavkaIdeja + PostavkaMinute + PostavkaIgralci);
			}
			
				
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
