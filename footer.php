	<!-- Start Footer -->
	<footer class="footer-sec">
		<div class="kt-container">
			<p>&copy;2019 kTube, All Rights Reserved | <a href="terms-conditions.php">Terms & Conditions</a> | <a href="privacy-policy.php">Privacy Policy</a> | <a href="cookies-policy.php">Cookies Policy</a> | <a href="faqs.php">FAQ's</a></p>
		</div>
	</footer>
	<!-- End Footer -->
	<section class="cookies-box"> 
		<div class="container text-center"><p>This website uses cookies to improve your experience. <button id="cookie-btn" type="submit" class="btn btn-danger white btn-round btn-sm">I Accept</button> <a href="cookies-policy.php">Read More</a></p></div> 
	</section>
	<script src="js/jquery.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/jquery.wavify.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script>
	<!-- Wave js -->
	$('#kt-waveanimation-black').wavify({
	  height:30,
	  bones:2,
	  amplitude:100,
	  color: '#000',
	  speed: .35
	});
	$('#kt-waveanimation-white').wavify({
	  height:30,
	  bones:2,
	  amplitude:80,
	  color: '#fff',
	  speed: .25
	});
	<!-- Wave js -->
	<!-- sticky header -->
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
		if(scroll >= 100) {
			$("body").addClass("sticky");
		} else {
			$("body").removeClass("sticky");
		}
	});
	<!-- sticky header -->
	<!-- contact form script -->
	var is_form_valid=false;
	$('form').submit(function(event) {
		if(!is_form_valid){
			event.preventDefault();
			var validation;
			var is_validation=1;
			var validation_key;
			var current_value;
			var value_input = $(this).find("input[data-validation]");
			value_input.each(function(){
				current_element = $(this);
				validation = $(this).attr('data-validation');
				validation_key = validation.split(' ');
			    current_value = $(this).val();
			    current_element.parent().find('.error').text('');
		     	$(validation_key).each(function(index,value){
		     		if(value=='required'){
				     	if(current_value  == '')  {
					   		current_element.parent().find('.error').text("This is required field");
					   		is_validation=0;
				    	}
		   			}
		   			if(value=='email'){
						if(!IsEmail(current_value) && current_element.parent().find('.error').text()=='')  {
							current_element.parent().find('.error').text("Please enter a valid e-mail");
							is_validation=0;
						}
		   			}
		   			if(value=='number'){
				     	if(!phone_validate(current_value) && current_element.parent().find('.error').text()=='')  {
					   		current_element.parent().find('.error').text("Please enter a valid number");
					   		is_validation=0;
				    	}else if(current_value.length < 10  && current_element.parent().find('.error').text()=='')  {
							current_element.parent().find('.error').text("Please enter minimum 10 numbers");
							is_validation=0;
							}	
		   			}
		     	});
		    });
		     if(    is_validation==1) {
                is_form_valid = true;
                $('form').find("button[type='submit']").prop('disabled',true);
                $('#submit-data').html('Sending <img class="ccf-item-loader loader" src="images/contact-loader.svg" alt="contact-loader">');
                $('#submit-data').addClass('active');
                $('form').submit();
            }else{
                return false;
            }
		}
	});
	function IsEmail(email) {
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(email)) {
		    return false;
		}else{
		    return true;
		}
	}
	function phone_validate(textphone) { 
 		var regexPattern=new RegExp(/^[0-9-+]+$/);  
  		return regexPattern.test(textphone); 
	} 
	<!-- contact form script -->
	<!-- cookies script -->
		$('.cookies-box #cookie-btn').click(function(){
			$.cookie("cookie_accept", "yes", { expires: 365 });
			$('.cookies-box').hide();
			$('body').removeClass('takespacebottom');
		});
		if($.cookie("cookie_accept")=='yes'){
			$('.cookies-box').hide();
			$('body').removeClass('takespacebottom');
		}
	<!-- cookies script -->
	</script>
</body>
</html>