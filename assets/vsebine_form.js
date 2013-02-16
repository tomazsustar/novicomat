/*function beforeValidate(form) {
	alert('je');
   if ( form.data('zavrzi') ) {
	   alert('je');
        this.validateOnSubmit = false;
        this.beforeValidate = '';
        form.submit();
        return false;
    }
    return true;
}*/
$(document).ready(function() {
  //checkKoledar();
});

// Simulates PHP's date function
Date.prototype.format=function(format){var returnStr='';var replace=Date.replaceChars;for(var i=0;i<format.length;i++){var curChar=format.charAt(i);if(i-1>=0&&format.charAt(i-1)=="\\"){returnStr+=curChar}else if(replace[curChar]){returnStr+=replace[curChar].call(this)}else if(curChar!="\\"){returnStr+=curChar}}return returnStr};Date.replaceChars={shortMonths:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],longMonths:['January','February','March','April','May','June','July','August','September','October','November','December'],shortDays:['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],longDays:['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],d:function(){return(this.getDate()<10?'0':'')+this.getDate()},D:function(){return Date.replaceChars.shortDays[this.getDay()]},j:function(){return this.getDate()},l:function(){return Date.replaceChars.longDays[this.getDay()]},N:function(){return this.getDay()+1},S:function(){return(this.getDate()%10==1&&this.getDate()!=11?'st':(this.getDate()%10==2&&this.getDate()!=12?'nd':(this.getDate()%10==3&&this.getDate()!=13?'rd':'th')))},w:function(){return this.getDay()},z:function(){var d=new Date(this.getFullYear(),0,1);return Math.ceil((this-d)/86400000)}, W:function(){var d=new Date(this.getFullYear(),0,1);return Math.ceil((((this-d)/86400000)+d.getDay()+1)/7)},F:function(){return Date.replaceChars.longMonths[this.getMonth()]},m:function(){return(this.getMonth()<9?'0':'')+(this.getMonth()+1)},M:function(){return Date.replaceChars.shortMonths[this.getMonth()]},n:function(){return this.getMonth()+1},t:function(){var d=new Date();return new Date(d.getFullYear(),d.getMonth(),0).getDate()},L:function(){var year=this.getFullYear();return(year%400==0||(year%100!=0&&year%4==0))},o:function(){var d=new Date(this.valueOf());d.setDate(d.getDate()-((this.getDay()+6)%7)+3);return d.getFullYear()},Y:function(){return this.getFullYear()},y:function(){return(''+this.getFullYear()).substr(2)},a:function(){return this.getHours()<12?'am':'pm'},A:function(){return this.getHours()<12?'AM':'PM'},B:function(){return Math.floor((((this.getUTCHours()+1)%24)+this.getUTCMinutes()/60+this.getUTCSeconds()/ 3600) * 1000/24)}, g:function(){return this.getHours()%12||12},G:function(){return this.getHours()},h:function(){return((this.getHours()%12||12)<10?'0':'')+(this.getHours()%12||12)},H:function(){return(this.getHours()<10?'0':'')+this.getHours()},i:function(){return(this.getMinutes()<10?'0':'')+this.getMinutes()},s:function(){return(this.getSeconds()<10?'0':'')+this.getSeconds()},u:function(){var m=this.getMilliseconds();return(m<10?'00':(m<100?'0':''))+m},e:function(){return"Not Yet Supported"},I:function(){return"Not Yet Supported"},O:function(){return(-this.getTimezoneOffset()<0?'-':'+')+(Math.abs(this.getTimezoneOffset()/60)<10?'0':'')+(Math.abs(this.getTimezoneOffset()/60))+'00'},P:function(){return(-this.getTimezoneOffset()<0?'-':'+')+(Math.abs(this.getTimezoneOffset()/60)<10?'0':'')+(Math.abs(this.getTimezoneOffset()/60))+':00'},T:function(){var m=this.getMonth();this.setMonth(0);var result=this.toTimeString().replace(/^.+ \(?([^\)]+)\)?$/,'$1');this.setMonth(m);return result},Z:function(){return-this.getTimezoneOffset()*60},c:function(){return this.format("Y-m-d\\TH:i:sP")},r:function(){return this.toString()},U:function(){return this.getTime()/1000}};
Date.prototype.setDateFromForm=function(dateText){
	if(dateText.length >= 10){
		var datum = dateText.substr(0,10);
		var datumArray = datum.split(".");
		this.setDate(datumArray[0]);//dan
		this.setMonth(datumArray[1]-1);//mesec
		this.setFullYear(datumArray[2]);//leto
	}	
	/*if(dateText.length >= 16){
		var cas = dateText.substr(11);
		var casArray=cas.split(".");
	
	}*/
}

function startDateChanged(dateText, inst){
	
	if(dateText.length >= 10){
		var date = new Date();
		var start_date = new Date();
		var today = new Date();
		//spremeni datum objave na pet dni pred dogodkom
		start_date.setDateFromForm(dateText);
		start_date.setDate(start_date.getDate()-5);
		if (start_date>today){			
			var target = $('#Vsebine_publish_up');
			target.val(start_date.format('d.m.Y')+target.val().substr(10));
		}
		//spremeni datum konca objave na dan po dogodku
		date.setDateFromForm(dateText);
		date.setDate(date.getDate()+1);
		$('#Vsebine_publish_down').val(date.format('d.m.Y'));
		
		//nastavi začetno vrednost koledarja na datumu konca dogodka
		$('#Vsebine_end_date').datepicker("option", "defaultDate", dateText);
	}	
}

function endDateChanged(dateText, inst){
	//spremeni datum konca objave na dan po dogodku
	if(dateText.length >= 10){
		var date = new Date();
		date.setDateFromForm(dateText);
		date.setDate(date.getDate()+1);		
		$('#Vsebine_publish_down').val(date.format('d.m.Y'));
	}	
}

function split(val) {
	return val.split(/,\s*/);
}
function extractLast(term) {
	return split(term).pop();
}

function addTag(element, tag) {
	 var terms = split(element.value);
     // remove the current input
     terms.pop();
     // add the selected item
     //if not exists in array already
     if(terms.indexOf(tag) == -1 ){
    	 terms.push( tag );
     }
     // add placeholder to get the comma-and-space at the end
     terms.push('');
     element.value = terms.join(', ');
     
}

function addTagFromSelect(element, selectList){
	tag = selectList.options[selectList.selectedIndex].text; //preberi vrednost
	trimmed = $.trim(element.value); //počisti space
	if(trimmed.length > 0 && trimmed.substr(trimmed.length - 1) != ','){ //če ni vejice, jo dodaj
		element.value=element.value+',';
	}
	addTag(element, tag);
}

function checkKoledar(chbox){
	if($("#Vsebine_koledar").is(':checked')){
		$("#Vsebine_koledar_naslov").removeAttr("disabled");
		$("#Vsebine_start_date").removeAttr("disabled");
		$("#Vsebine_end_date").removeAttr("disabled");
		$("#Vsebine_event_cat").removeAttr("disabled");
		if(!$.trim($("#Vsebine_koledar_naslov").val()).length){
			$("#Vsebine_koledar_naslov").val($("#Vsebine_title").val());
		}
	}else{
		$("#Vsebine_koledar_naslov").attr("disabled", "disabled");
		$("#Vsebine_start_date").attr("disabled", "disabled");
		$("#Vsebine_end_date").attr("disabled", "disabled");
		$("#Vsebine_event_cat").attr("disabled", "disabled");
	}
}

function kopirajNaslov(){
	input = $("#id_jajca_copytemplate td:first input");
	if(!$.trim(input.val()).length)
		input.val($("#Vsebine_title").val());
}

function nalozi_sliko(file_id, success){ //id od input file brez #, success funkcija
	extension = $('#'+file_id).val().split('.').pop().toLowerCase(); //preberi extension
	if($.inArray(extension, ['gif','png','jpg','jpeg']) == -1) {         //preveri, če gre za sliko
	    alert('To pa že ni slika!');
	    return false;
	}
	
	var input = document.getElementById(file_id),  
    formdata = false;  
	 if (window.FormData) {  
	     formdata = new FormData();  
	     formdata.append("images[]", input.files[0]);
	     //document.getElementById("btn").style.display = "none";  
	 } 
	 //alert(formdata);
	//var data={activeFile: encodeURIComponent($('#Vsebine_activeFile').val())};
	//$.post(ajax_url, data, function(data){alert(data);})
	 if (formdata) {
			$.ajax({
				url: ajax_url, //se zgenerira v php-ju
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: success,
			});
		}
	  
}

function slika_za_clanek(src){
	return '<img src=\"'+src+'\" style="float:right;width:265px;" />';
}

$(document).ready(function () {
	var input = document.getElementById("Vsebine_activeFile");
	var textUrl = document.getElementById("Vsebine_slika");
		//formdata = false;
	//alert(input);
	function showUploadedItem (source) {
  		var img  = document.getElementById("slika");
  		img.src = source;
	}   

//	if (window.FormData) {
//  		formdata = new FormData();
//  		document.getElementById("btn").style.display = "none";
//	}
	
 	input.addEventListener("change", function (evt) {
 		//document.getElementById("response").innerHTML = "Uploading . . ."
 		var i = 0, len = this.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = this.files[i];
	
			if (!!file.type.match(/image.*/)) {
				success = function (res) {
					var img  = document.getElementById("slika");
			  		img.src = res; 
			  		$("#Vsebine_slika").val(res);
			  		jInsertEditorText(slika_za_clanek(res), 'Vsebine_fulltext');
			  		$("#loading-img1").css('display','none');
				}
				$("#loading-img1").css('display','inline');				
				nalozi_sliko('Vsebine_activeFile', success);
				
//				if ( window.FileReader ) {
//					reader = new FileReader();
//					reader.onloadend = function (e) { 
//						showUploadedItem(e.target.result);
//					};
//					reader.readAsDataURL(file);
//				}
//				if (formdata) {
//					formdata.append("images[]", file);
//				}
			}	
		}
		
		
	}, false);
 	
 	$("#Vsebine_slika").change(function(){ //input za url onchange
 		if($("#Vsebine_slika").val()!=""){
	 		$("#slika").attr('src', $("#Vsebine_slika").val()); //nastavsi src, da prikaže sliko
	 		$("#Vsebine_activeFile").val("");
	 		jInsertEditorText(slika_za_clanek($("#Vsebine_slika").val()), 'Vsebine_fulltext');
 		}
 	});
 	$("#nalozi_sliko").change(function(){ //input za url onchange
 		if($("#nalozi_sliko").val()!=""){
	 		success = function (res) {
		  		jInsertEditorText(slika_za_clanek(res), 'Vsebine_fulltext');
		  		$("#loading-img2").css('display','none');
			}
			$("#loading-img2").css('display','inline');				
			nalozi_sliko('nalozi_sliko', success);
 		}
 	});
 	$("#vstavi_sliko").change(function(){ //input za url onchange
 		if($("#vstavi_sliko").val()!=""){
 			jInsertEditorText(slika_za_clanek($("#vstavi_sliko").val()), 'Vsebine_fulltext');
 		}
 	});
 	$("#vstavi_video").change(function(){ //input za url onchange
 		if($("#vstavi_video").val()!=""){
	 		split=$("#vstavi_video").val().split('=');
	 		embed='<iframe style="display: block; margin: auto;" width="420" height="315" src="http://www.youtube.com/embed/'+split[1]+'" frameborder="0" allowfullscreen></iframe>';
	 		jInsertEditorText(embed, 'Vsebine_fulltext');
 		}
 	});
 	$("#nalozi_galerijo").change(function(){ //input za url onchange
 		if($("#nalozi_galerijo").val()!=""){
	 		success = function (res) {
		  		jInsertEditorText(slika_za_clanek(res), 'Vsebine_fulltext');
		  		$("#loading-img3").css('display','none');
			}
			$("#loading-img3").css('display','inline');				
			nalozi_sliko('nalozi_galerijo', success);
 		}
 	});
});
