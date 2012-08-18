function uvoz(){
		
	var step = 0;
	$('#progress').show();
	$('#import-report').show();
	$('#progress').progressbar("value", 0);
	if(importSiteIds.length>0){
		step = 100/importSiteIds.length;
		//alert(step);
		jQuery.ajaxSetup({async:false});
		$('#import-report').html($('#import-report').html()+'Uvoz iz strani: '+importSiteNames[0]+' ... ');
		setTimeout('poll(0, '+step+')', 0);
	}
		
}

function poll(i, step){
	 //alert(importSiteIds[i]);
    $.get(
    	    "",
    	    {r: "strani/uvozi", id:importSiteIds[i]},
    	    function(data) { 
    	    		//alert(data);     	    		
    	    		$('#progress').progressbar("value", $('#progress').progressbar("value")+step);
    	    		$('#import-report').html($('#import-report').html()+data+'<br/>');
    	    		
    	    		if(i<importSiteIds.length-1){
    	    			$('#import-report').html($('#import-report').html()+'Uvoz iz strani: '+importSiteNames[i+1]+' ... ');
    	    		}
    	    		if(i<importSiteIds.length){
    	    			
    	    			setTimeout('poll('+(i+1)+', '+step+')', 0);
    	    		}
    	    		else{
    	    			$('#import-report').html($('#import-report').html()+'Končano. <a href="" onclick="pocisti();return false;">Počisti.</a><br/>');
    	    			jQuery.ajaxSetup({async:true});
    	    			$.fn.yiiListView.update('vsebine-list-view') //posodobi list view
    	    			
    	    		}
	    		}
    	);
}

function pocisti(){
	$('#import-report').hide(200);
	$('#progress').hide(200);
}

function zavrzi(element){
	var index = $(element).parent().find('input[name=Vsebine_id]').val();
	
	$.get(
    	    "",
    	    {r: "vsebine/zavrzi", id:index},
    	    function(data) {    	    		
    	    		 // handle return data
                   // alert(data);
                   // alert(index);
                    if (data>0 ){
	                   //  if (zavrziKlikov > 2){
	                    // 	zavrziKlikov = 0;
	                    // 	$.fn.yiiListView.update('vsebine-list-view');
	                   //  }else{
	                    // 	zavrziKlikov+=1;
	                      	$('#povzetek_'+index).hide('fast');
	                   //   }
                    }
    	    			
    	    		
	    		}
    	);
	
};

function osvezi(){
	$.fn.yiiListView.update('vsebine-list-view') //posodobi list view
}