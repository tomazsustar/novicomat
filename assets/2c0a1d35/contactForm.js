jQuery(document).ready(function ($) {
	//appendAjaxToContactForm();
});

function appendAjaxToContactForm(){
	/* Contact Form */
	var $contactform  = $('#yii-contact-form'),
		$placeholder  = $('#contact-form-placeholder');
	    //$success    = '<strong>Successfully!</strong> Your message has been sent. Thank you for using our contact form! We will contact you soon.';
		//$error      = '<strong>Error!</strong> Required fields are not filled or filled incorrectly, please send a check and try again.';
	   
	    $contactform.submit(function(){
	    	alert("jajaja");
	        $.ajax({
	            type: "POST",
	            url: $contactform.attr('action'),
	            data: $(this).serialize(),
	            success: function(msg) {
	        		$placeholder.replaceWith(msg);
	        		appendAjaxToContactForm();
//	                if (msg == 'SEND') {
//	                    response = '<div class="successfully">'+ $success +'</div>';
//	                }
//	                else {
//	                    response = '<div class="error">'+ $error +'</div>';
//	                }
//	                $(".error,.successfully").remove();
//	                $contactform.prepend(response);
	            }
	        });
	        return false;
	    });
}

function mySubmitFormFunction(form, data, hasError){
    if (!hasError){
        // No errors! Do your post and stuff
        // FYI, this will NOT set $_POST['ajax']... 
        $.post(form.attr('action'), form.serialize(), function(res){
            // Do stuff with your response data!
//            if (res.result)
//                console.log(res.data);
        	$('#contact-form-placeholder').replaceWith(res);
        });
    }
    // Always return false so that Yii will never do a traditional form submit
    return false;
}