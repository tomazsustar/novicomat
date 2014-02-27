<?php
// protected/components/views/subscriberFormWidget.php
?>

<style type="text/css" scoped>
	input { padding:5px; font-size:1.1em; }
	
	#createLokacija { display:none; }
	#addDetails { display:none; }
	#FormButtons { display:none; }
	
	label { font-size:1.3em; color:#333; }
	.TextInput { padding:9px 7px 9px 7px; font-size:1.2em; margin:10px 10px 0px 10px; border:1px solid #222;  }
	
	#LocationInput { 
		background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/slike/mglass.png); 
		background-position:left; 
		background-repeat:no-repeat; 
		background-size:auto 20px;
		width:100%;
		padding-left:12%;
	}
	
	#LocationNewButton { 
		width:115%;
		margin:0px;
		border:1px dashed #999; 
		background-color:transparent;
		font-size:1.3em; 
		text-transform:lowercase;
		cursor:pointer;
		display:none;
		
		transition:color 0.4s, border-color 0.4s;
		-webkit-transition:color 0.4, border-color 0.4ss;
		-moz-transition:color 0.4s, border-color 0.4s;
		color:#777;
	}
	
	#LocationNewButton:hover { 
		transition:color 0.4s, border-color 0.4s;
		-webkit-transition:color 0.4, border-color 0.4ss;
		-moz-transition:color 0.4s, border-color 0.4s;
		color:#222;
		border-color:#222;
	}
	
	.LocationFound {
		width:115%;
		margin:0px 10px 0px 10px;
		padding-left:8.3%;
		cursor:pointer;
		transition:background-color 0.5s;
		-webkit-transition:background-color 0.5s;
		-moz-transition:background-color 0.5s;
	}
	.LocationFound:hover {
		transition:background-color 0.3s;
		-webkit-transition:background-color 0.3s;
		-moz-transition:background-color 0.3s;
		background-color:#88cdef;
	}

	fieldset { width:45%; margin:0px; }
	.Invisible { display:none; opacity:0; }
	
	#LocationsList { list-style:none; width:40%; }
	.NewlyAddedLocation { border:thin solid #555;; padding:1%; font-size:1.2em; }
	
	.NewLocation input { margin-bottom:20px; }
	
</style>

<section class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'lokacije-form',
        'enableAjaxValidation'=>true,
    )); ?>

	<fieldset id='Location'>
    	<legend>Lokacija</legend>
    	<header id='searchLokacija'>
            <input type="text" name='LocationSearch' class='TextInput' id='LocationInput' placeholder="ulica, mesto, država ali naziv">				 			<br>
            <input type="button" value='Dodaj novo lokacijo' id='LocationAdd' class="Invisible TextInput" onClick="LocationAdd();">
            <input type="hidden" value='' name='LocationId'>
            
            <input id='LocationNewButton' value='Ustvari novo' type="button" onClick="ShowCreate();">
        </header>
        
        <hr>
        
        <section id='createLokacija'>
			<?php echo $form->labelEx($model,'drzava'); ?>
            <?php echo $form->textField($model,'drzava',array( "required" => "required", "value" => "Slovenija" )); ?>
            <?php echo $form->error($model,'drzava'); ?>
    
            <?php echo $form->labelEx($model,'ulica_vas'); ?>
            <?php echo $form->textField($model,'ulica_vas',array( "size" => 50)); ?>
            <?php echo $form->error($model,'ulica_vas'); ?>
            
            <?php echo $form->labelEx($model,'h_st'); ?>
            <?php echo $form->textField($model,'h_st',array("size" => 5 )); ?>
            <?php echo $form->error($model,'h_st'); ?>
            
            <?php echo $form->labelEx($model,'postna_st'); ?>
            <?php echo $form->textField($model,'postna_st',array( "size" => 5 )); ?>
            <?php echo $form->error($model,'postna_st'); ?>
            
            <?php echo $form->labelEx($model,'kraj'); ?>
            <?php echo $form->textField($model,'kraj'); ?>
            <?php echo $form->error($model,'kraj'); ?>
        </section>
        
        <section id="addDetails">        
			<?php echo $form->labelEx($model,'obcina'); ?>
            <?php echo $form->textField($model,'obcina',array()); ?>
            <?php echo $form->error($model,'obcina'); ?>
            
            <?php echo $form->labelEx($model,'ime_lokacije'); ?>
            <?php echo $form->textField($model,'ime_lokacije',array()); ?>
            <?php echo $form->error($model,'ime_lokacije'); ?>
            
            <?php echo $form->labelEx($model,'ime_prostora'); ?>
            <?php echo $form->textField($model,'ime_prostora',array()); ?>
            <?php echo $form->error($model,'ime_prostora'); ?>
            
            <?php echo $form->labelEx($model,'ime_stavbe'); ?>
            <?php echo $form->textField($model,'ime_stavbe',array()); ?>
            <?php echo $form->error($model,'ime_stavbe'); ?>
            
            <label for='OpisLokacije'>Opis</label>
            <textarea id='OpisLokacije' name='OpisLokacije'></textarea>
        </section>

        <footer class="row buttons" id='FormButtons'>
        	<input type="button" value='Dodaj podrobnosti' onClick="AddDetails();" id='AddDetailsButton'>
            <input type="button" value='Prekliči' onClick="CencelNew();" id='CencelNewButton'>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Shrani' : 'Save'); ?>
        </footer>
    
    </fieldset>
<?php $this->endWidget(); ?>

</section>

<script type="text/javascript">
	$("#LocationInput").on("focus",function() {
		FindLocations();
		if($("#createLokacija").css("display") == "none")
		$("#LocationNewButton").fadeIn("fast");
	});
	
	$("#LocationInput").on("blur",function() {
		$("#LocationNewButton").fadeOut("fast");
		ClearFound();
	});
	
	$("#LocationInput").on("keyup",function() { FindLocations(); });
	
	function CencelNew() {
		$("#createLokacija").fadeOut("fast");
		$("#addDetails").fadeOut("fast");
		$("#FormButtons").fadeOut("fast");
	}
	
	function ShowCreate() {
		$("#createLokacija").fadeIn("fast");
		$("#FormButtons").fadeIn("fast");
		$("#LocationNewButton").hide();
		ClearFound();
	}
	
	function AddDetails() {
		$("#addDetails").fadeIn("fast");
		$("#AddDetailsButton").attr("onclick","HideDetails();");
		$("#AddDetailsButton").val("Skrij podrobnosti");
	}
	
	function HideDetails() {
		$("#addDetails").fadeOut("fast");
		$("#AddDetailsButton").attr("onclick","AddDetails();");
		$("#AddDetailsButton").val("Dodaj podrobnosti");
	}

	function FindLocations() {
		var Input = $("#LocationInput").val();
		
		if(Input.length == 0)
			Input = '0';
		
		$("#LocationId").val("0");

		$.ajax({
			dataType: "json",
			type: "GET",
			url: "http://127.0.0.1/php/novicomat/index.php/lokacije/search",
			data: { Lokacija: Input }
		}).done(function(data) {	
			if(data.length == 0)
				ClearFound();
			else  {
				$("input").removeClass("Potential");
				$(data).each(function(index, Lokacija) { 
					$("#LocationFound"+Lokacija.id).addClass("Potential"); 
				});
				ClearIncorrect();
			}
				
			$(data).each(function(index, Location) {
				if($("#LocationFound"+Location.id).length == 0) {
                	$("#LocationNewButton").before("<input type='button' value='("+Location.ime_lokacije+") "+Location.kraj+" "+Location.ulica_vas+" "+Location.h_st+", "+Location.drzava+"' id='LocationFound"+Location.id+"' class='TextInput LocationFound'>");
				}
            });
		});
	}
	
	function ClearFound() {
		$(".LocationFound").remove();
	}
	
	function ClearIncorrect() {
		var FoundLocations = document.querySelectorAll(".LocationFound");
		$(FoundLocations).each(function() {
			if(!$(this).hasClass("Potential"))
				$(this).remove();
		});
	}
	
	/*function OfferNew() {
		var Input = $("#LocationInput").val();
		
		if($("#OfferToCreateNew").length == 0)
			$("#LocationInput").after("<input type='text' value='Dodaj novo lokacijo: "+Input+"' id='OfferToCreateNew' class='TextInput' style='width:97.5%; margin-top:0px;' >");
		else
			$("#OfferToCreateNew").val("Dodaj novo lokacijo: "+Input);
	}*/

	
	/*
	$(document).on("click",".LocationFound",function() {
		var Found = $(this).val();
		var FoundId = $(this).attr("id").substr(13);
		
		$("#LocationInput").val(""); 
		$("#LocationId").val(FoundId);
		
		$("#LocationsList").prepend(AppendNewLocation(Found,FoundId));
	});
	
	function AppendNewLocation(Found,FoundId) {
		LocationAdd();
		AddDetails();
		
		$.ajax({
			dataType: "json",
			url: "be.php",
			type: "POST",
			data: { Location: FoundId }
		}).done(function(data) {
			$.each(data,function(key, value) {
				console.log(value);
				$("#LocationKraj").val(value);
			});
		});
		
		return "<li id='Location"+FoundId+"' class='NewlyAddedLocation'>"+Found+"</li>";
	}
	
	

	function LocationAdd() {
		if($("#NewLocation1").length == 0) {
			$.post( "front_p1.html", function( data ) {
			  $( "#Location" ).after( data+AddSettings() );
			});	
		}
	}
	
	function AddDetails() {
		$("#AddDetails").val("Skrij podrobnosti"); $("#AddDetails").attr("onclick","HideDetails();");
		if($("#NewLocation2").length == 0) {
			$.post( "front_p2.html", function( data ) {
				$("#LocationsSettings").before( data );
			});
		}
	}
	
	function HideDetails() {
		$("#AddDetails").val("Dodaj podrobnosti"); $("#AddDetails").attr("onclick","AddDetails();");
		$("#NewLocation2").remove();
	}
	
	$(document).on("click","#CencelNew",function() {
		$("#NewLocation1").remove();
		$("#NewLocation2").remove();
		$("#LocationsSettings").remove();
	});
	
	function AddSettings() {
		return "<fieldset id='LocationsSettings'><input type='button' id='AddDetails' value='Dodaj podrobnosti' class='TextInput' style='margin-top:20px;' onclick='AddDetails();'><input type='button' id='CencelNew' value='Zapri' class='TextInput' style='margin-top:20px; margin-left:20px;'></fieldset>";
	}
	*/
</script>