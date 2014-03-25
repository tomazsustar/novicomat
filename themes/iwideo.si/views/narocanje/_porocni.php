
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/narocanje.css" />
 <!-- 1. IDEJA IN DOLŽINA -->
    <section>
    	<header>
 			<h2>IDEJA in DOLŽINA</h2>
			<h3><!--opis odseka--></h3>
        </header>
        
        <section class='Table'>   
        	<div class='Cell Default' id='NjihovaIdejaCell'>
                <input type="radio" id="VasaIdeja" name='Ideja' value="0" checked>
                <label for='VasaIdeja'>Vaša ideja</label>
                    <label for='VasaIdeja' id='VasaIdejaIzracun' class='Izracuni'>+ 0 EUR</label><br>
                <br>  
                <label for='Priponka'>Tukaj lahko priložite opis vaše ideje v dokumentu (.doc, .docx, .pdf)</label><br>
                <input type="file" name='Priponka' id='Priponka' accept="text/plain,text/html,application/pdf,application/msword,application/rtf">
                <br>

                <aside style="margin:10px 0px 10px 0px;" id='NasvetZaCeno'>
                	<small>Nasvet za ugodno ceno - pri  zasnovi  ideje upoštevajte omejitve glede na:</small><br>
                    	<ul>
                        	<li><small>najem lokacije</small>
                            <li><small>najema igralcev</small>
                            <li><small>uporabe rekvizitov</small>
                            <li><small>posebne efekte</small>
                            <li><small>računalniške animacije</small>
                        </ul>
                    
                </aside>
            </div>        
               
            <div class='Cell Option' id='NasaIdejaCell'>
                <input type="radio" id="NasaIdeja" name='Ideja' value="150">
                <label for='NasaIdeja'>Naša ideja</label>
                    <label for='NasaIdeja' id='NasaIdejaIzracun' class='Izracuni'>+ 150 EUR</label><br>
                 
                <ol>
                	<li>Preučimo vaše področje in pripravimo ideje 
                    <li>Skupaj izberemo najprimernejšo idejo
                </ol>   
                
                
                <small>Naše ideje so zasnovane na filmskem pristopu ter na minimizaciji drugih stroškov kot so:</small><br>
                
                <ul>
                    <li><small>najem lokacije</small>
                    <li><small>najem igralcev</small>
                    <li><small>uporaba rekvizitov</small>
                    <li><small>posebni efekti</small>
                    <li><small>računalniške animacije</small>
                </ul>
                
            </div>
        </section>
        
        
        
        <section style="margin-top:30px;">
        	<label for="OpisIdeje">Na kratko lahko opišete idejo tukaj</label><br>
       		<textarea name='OpisIdeje' id='OpisIdeje' style="resize:vertical; width:100%; min-height:70px;"></textarea><br>
            
        	<fieldset>
            	<legend>Dolžina videa - osnovna cena videa do 1 minute je <span style="text-decoration:underline;">410 eur</span></span></legend>
                
                    <input type="radio" value='0' name='Dolzina' id='Do1Min' class='IndentInput' checked>
                    	<label for='Do1Min'>Do 1 minute</label>
                    		<label for='Do1Min'>+ 0 EUR</label><br>
                            
                    <input type="radio" value='175' name='Dolzina' id='Do2Min' class='IndentInput'>
                    	<label for='Do2Min'>Od 1 - 2 minut</label>
                    		<label for='Do2Min'>+ 175 EUR</label><br>
                            
                    <input type="radio" value='325' name='Dolzina' id='Do3Min' class='IndentInput'>
                    	<label for='Do3Min'>Od 2 - 3 minut</label>
                    		<label for='Do3Min'>+ 325 EUR</label><br>
                            
                    <input type="radio" value='475' name='Dolzina' id='Do4Min' class='IndentInput'>
                    	<label for='Do4Min'>Od 3 - 4 minut</label>
                    		<label for='Do4Min'>+ 475 EUR</label><br>
                            
                    <input type="radio" value='625' name='Dolzina' id='Do5Min' class='IndentInput'>
                    	<label for='Do5Min'>Od 4 - 5 minut</label>
                    		<label for='Do5Min'>+ 625 EUR</label><br>
                            
                    <input type="radio" value='-1' name='Dolzina' id='Nad5Min' class='IndentInput'>
                    	<label for='Nad5Min'>Nad 5 minut</label>
                    		<label for='Nad5Min'> - Opišite nam Vašo idejo in želje, mi pa Vam pripravimo posebno ponudbo.</label>
            </fieldset>
        </section>        
	</section>
    <hr>
    
    <!-- 2.  LOKACIJE SNEMANJA  -->
    <section>
    	<header>
 			<h2>LOKACIJE SNEMANJA</h2>
			<h3><!--opis odseka--></h3>
        </header>
        
        <section class='Table'>   
        	<div class='Cell Default' id='NjihoviProstoriCell'>
            	<input type="radio" id="VasiProstori" name='Prostori' value="0" required checked>
                <label for='VasiProstori'>Vaši prostori</label>
                    <label for='VasiProstori' id='VasaoProstoriIzracun' class='Izracuni'>+ 0 EUR</label><br>
                
                <small>
                	Ob ustrezni ideji prostor vašega poslovanja postane prizorišče snemanja. 
                </small>
            </div>
            
            <div class='Cell Option' id='NajemProstoraCell'>
            	<input type="radio" id="NajemProstora" name='Prostori' value="1" >
                <label for='NajemProstora'>Najem prostora</label><br>
                    
                <small>
                	Glede na scenarij Izvedemo ogled ustreznih lokacij in uredimo najem. Ceno najema postavi lastnik prostorov.
                </small>
            </div>
        </section>
        
         <section>
        	<fieldset>
            	<legend>Število lokacij snemanja</legend>
                
                    <input type="radio" value='0' name='StLokacij' id='1Lok' class='IndentInput' checked>
                    	<label for='1Lok'>1 lokacija</label>
                    		<label for='1Lok'>+ 0 EUR</label><br>
                            
                    <input type="radio" value='95' name='StLokacij' id='2Lok' class='IndentInput'>
                    	<label for='2Lok'>2 lokacije</label>
                    		<label for='2Lok'>+ 95 EUR</label><br>
                            
                    <input type="radio" value='190' name='StLokacij' id='3Lok' class='IndentInput'>
                    	<label for='3Lok'>3 lokacije</label>
                    		<label for='3Lok'>+ 190 EUR</label><br>
                            
                    <input type="radio" value='285' name='StLokacij' id='4Lok' class='IndentInput'>
                    	<label for='4Lok'>4 lokacije</label>
                    		<label for='4Lok'>+ 285 EUR</label><br>
                            
                    <input type="radio" value='4' name='StLokacij' id='Nad4Lok' class='IndentInput'>
                    	<label for='Nad4Lok'>Nad 4 lokacije</label>
                    		<label for='Nad4Lok'> - Po dogovoru.</label>
            </fieldset>
        </section>
    </section>
    <hr>
    
    <!-- 3.  IGRALCI  -->
    <section>
    	<header>
 			<h2>IGRALCI</h2>
			<h3><!--opis odseka--></h3>
        </header>
        
        <section class='Table'>   
        	<div class='Cell Default' id='NjihovaIgralskaZasedbaCell'>
            	<input type="radio" id="VasiIgralci" name='Igralci' value="0" checked>
                <label for='VasiIgralci'>Vaša igralska zasedba</label>
                    <label for='VasiIgralci' id='VasiIgralciIzracun' class='Izracuni'>+ 0 EUR</label><br>
                
                <small>
                	Uporabite zaposlene, udeležence, sorodnike, prijatelje, znance. 
                </small>
            </div>
            
            <div class='Cell Option' id='NajemIgralcevCell'>
            	<input type="radio" id="NajemIgralcev" name='Igralci' value="150">
                <label for='NajemIgralcev'>Najem igralcev</label>
                    <label for='NajemIgralcev' id='NajemIgralcevIzracun' class='Izracuni'>+ 150 EUR / Osebo</label><br>
                
                <small >
                	Poskrbimo za izbor in najem igralske zasedbe.
                </small>
                <br><br>
                
                <label for='StIgralcev'>Izberite število igralcev</label><br>
                <input type="range" min="1" max="10" value="1" name='StIgralcev' id='StIgralcev' >
					<label for='StIgralcev' id='PrikazStIgralcev' style="margin-left:20px;" >Število: 1</label>
                    <script type="text/javascript"> 
						$("input[name=StIgralcev]").on("change",function() {
							$("#PrikazStIgralcev").text("Število: "+$("input[name=StIgralcev]").val());
							$("#PostavkaIgralci").text()
						});
                    </script>
            </div>
        </section>
        
        <section>
           
        	<input type="checkbox" id="ZnanaOsebnost" name='ZnanaOsebnost' value="VIP" style='margin-top:20px;'>
            <label for='ZnanaOsebnost'>Želim najeti tudi znano osebo </label><br>
                            
            <small>
                Honorar po dogovoru.
            </small>
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
        	<table id='InformativniIzracunTable' style="text-align:center; margin:10px auto 50px auto;">
            	<thead>
                	<tr style="height:30px;">
                    	<th>Postavka
                        <th>Cena
                        <th>Valuta
                    </tr>
                </thead>
                <tbody>
                	<tr>
                    	<td style="text-align:left; border-bottom:thin solid #999;">Osnovna cena
                        <td id='PostavkaOsnovna'>410
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
                </tbody>
                <tfoot>
                	<tr>
                    	<td>SKUPAJ
                        <td id='Izracun'>
                        <td>EUR
                    </tr>
                </tfoot>
            </table>
        </section>
    </section>
    <hr>
    
    <!-- NAROČITEV IN KONTAKT -->
    <section>
    	<header>
 			<h2>Oddaja povpraševanja</h2>
			<h3><!--opis odseka--></h3>
        </header>
        
        <form action="form_submit.php" method="post" name="iWideoForm" id='iWideoForm'>
            <fieldset id='KontaktFieldset'>
                <legend>Kontakt</legend>
                	<label for='KontaktIme'>Ime in priimek</label><br>
                    <input type="text" name='KontaktIme' id='KontaktIme' placeholder="Chuck Norrise" required><br>
                
                    <label for='KontaktTel'>Telefonska številka</label><br>
                    <input type="text" name='KontaktTel' id='KontaktTel' placeholder="040-999-999" required><br>
                    
                    <label for='KontaktEmail'>E-naslov</label><br>
                    <input type="email" name='KontaktEmail' id='KontaktEmail' size="50" placeholder="example@email.com" required>
                    
                    <input type="submit" value='pošlji povpraševanje'> 
            </fieldset>
        </form>
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

		/* Izračun informativnega računa */
		function Izracun() {
			var Izracun = "";
			var PostavkaOsnovna = parseInt($("#PostavkaOsnovna").text());
			var PostavkaIdeja = parseInt($("#PostavkaIdeja").text());
			var PostavkaMinute = parseInt($("#PostavkaMinute").text());
			var PostavkaIgralci = parseInt($("#PostavkaIgralci").text());
			
			if($("#PostavkaLastnistvo").text() == "Po dogovoru") {
				PostavkaLastnistvo = 0;
			}
			
			if($("#PostavkaLokacija").text() == "Po dogovoru") {
				Izracun = "> ";
				PostavkaLokacija = 285;
			}
			else
				PostavkaLokacija = parseInt($("#PostavkaLokacija").text());
				
			if($("#PostavkaMinute").text() == "Po dogovoru") {
				Izracun = "> ";
				PostavkaMinute = 625;
			}
			else
				PostavkaMinute = parseInt($("#PostavkaMinute").text());


			Izracun = Izracun + (PostavkaOsnovna + PostavkaIdeja + PostavkaMinute + PostavkaLokacija + PostavkaIgralci);
			
				
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
