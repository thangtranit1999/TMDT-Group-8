jQuery(document).ready(function($){

	//Return if form is not available in the DOM
	var popup_container = $('.xoo-el-container');
	if(popup_container.length  === 0){
		return false;
	}


	var spinner = '<i class="fas fa-circle-notch spinner fa-spin" aria-hidden="true"></i>',
		el_notice = $('.xoo-el-notice');


	//Opens popup
	var open_popup = function(){
		$('html, body , .xoo-el-container').addClass('xoo-el-popup-active');
	}

	//Close popup
	var close_popup = function(e){
		$.each(e.target.classList,function(key,value){
			if(value == 'xoo-el-modal' || value == 'xoo-el-close'){
				$('html, body , .xoo-el-container').removeClass('xoo-el-popup-active');
				clear_notice();
				$('body').trigger( 'xoo_el_popup_closed' );
				return false;
			}
		})
	}

	$('.xoo-el-modal').on('click',close_popup);

	//Show notice
	function show_notice( notice, notice_type, $context  ){

		$context = !$context ? $('body') : $context;
		notice_type = !notice_type ? 'success' : notice_type;

		var notice_string = typeof notice == 'object' ? '<span>'+notice.join('<br>')+'</span>' : '<span>'+notice+'</span>';
		var notice_class  = notice_type == 'error' ? 'xoo-el-notice-error' : 'xoo-el-notice-success';
		$context.find('.xoo-el-notice').html(notice_string)
			.addClass(notice_class).show();
		
		setScrollbarPosition( $context.closest('.xoo-el-srcont') );
		
	}

	

	var clear_notice = function(){
		if( el_notice.hasClass('xoo-el-lla-notice') ){
			return;
		}
		el_notice.attr('class','xoo-el-notice').html('').hide();
		$('.xoo-el-lostpw-success').remove();
	}


	/* 
		Handles form interaction
	*/

	var formHandler = {

		init: function(){

			this.switch_form_to = this.switch_form_to.bind(this);
			this.submit_form 	= this.submit_form.bind(this);

			//Switch form
			$(document).on('click','.xoo-el-login-tgr , .xoo-el-reg-tgr , .xoo-el-lostpw-tgr',this.switch_form_to);
			//Submit form
			$(document).on('submit','.xoo-el-action-form',this.submit_form);

			//On phone otp form submit
			$('.xoo-el-action-form').on( 'xoo_uv_phone_register_form_submit', function(){
				$('.xoo-el-notice').hide();
			} )

		},


		$formCont: function($target){
			if( $target.parents('.xoo-el-form-inline').length > 0 ){
				return $target.parents('.xoo-el-form-inline');
			}
			else{
				return $('.xoo-el-form-popup');
			}
		},

		//Navigate to different parts of form Login/Register/Lost Password
		switch_form_to: function(eventObj){

			eventObj.stopImmediatePropagation();
			eventObj.preventDefault();

			var $target = $(eventObj.currentTarget),
				$formCont 	= formHandler.$formCont( $target ),
				activeForm;

			if(!$target || $target.is('.xoo-el-login-tgr')){
				activeForm = 'xoo-el-login-ph';
			}

			else if($target.is('.xoo-el-reg-tgr')){
				activeForm = 'xoo-el-register-ph';
			}

			else if($target.is('.xoo-el-lostpw-tgr')){
				activeForm = 'xoo-el-lostpw-ph';
			}

			$.each( ['xoo-el-login-ph','xoo-el-register-ph','xoo-el-lostpw-ph'], function(index,class_name){
				$formCont.find('.'+class_name).removeClass('xoo-el-active');
			} )
			$formCont.find('.'+activeForm).addClass('xoo-el-active').find('form.xoo-el-action-form').show();

			if( $formCont.hasClass('xoo-el-form-popup') ){
				open_popup();
			}

			clear_notice();

			$formCont.trigger( 'xoo_el_form_tab_switched' );
			
		},


		submit_form: function(eventObj){

			eventObj.preventDefault();
			clear_notice();

			var $target 	= $(eventObj.currentTarget),
				$formCont 	= formHandler.$formCont( $target ),
				$form 		= $target,
				form_type 	= $form.find('input[name=_xoo_el_form]').val();


			if( !form_type ) return;

			this.perform_action($form)

		},

		perform_action: function($form){

			var $button 	= $form.find('button[type="submit"]'),
				old_btn_txt = $button.text(),
				$section 	= $form.parents('.xoo-el-section'),
				$notice_el	= $form.parents('.xoo-el-fields').find('.xoo-el-notice');

			$button.html(spinner).addClass('xoo-el-processing');

			var form_data = $form.serialize()+'&action=xoo_el_form_action';

			$.ajax({
				url: xoo_el_localize.adminurl,
				type: 'POST',
				data: form_data,
				success: function(response){

					$button.removeClass('xoo-el-processing').html(old_btn_txt);
					if(response.notice){
						$notice_el.html(response.notice).show();
					}else{
						console.log(response);
					}

					if(response.error == 1){ //has errors


					}else if ( response.error == 0 ){

						var redirect = true;

						if($button.hasClass('xoo-el-lostpw-btn')){
							redirect = false;
						}
						
						if(response.redirect && redirect){
							//Redirect
							setTimeout(function(){
								window.location = response.redirect;
							},300);
						}
						else{
							$form.hide();
						}

						$form.trigger('reset');

					}
					else{
						show_notice( 'Please contact support team or check your console. Some other plugin is controlling the login/signup request and causing conflict. You can debug by deactivating other plugins.','error' );
					}

					
					setScrollbarPosition( $form.closest('.xoo-el-srcont') );
					
				}
			})
		},
	}



	//Initialize form handler
	formHandler.init();

	$('.xoo-el-action-btn').on( 'click', function(){
		var invalid_els = $(this).closest('form').find('input:invalid');
		if( invalid_els.length === 0 ) return;
		setScrollbarPosition( $(this).closest('.xoo-el-srcont'), invalid_els.filter(":first").closest('.xoo-aff-group').position().top );
	} );


	function setScrollbarPosition( $scrollBar, value ){
		if( !$scrollBar.length ) return;
		Scrollbar.get( $scrollBar.get(0) ).scrollTop = value || 0;
	}

	//Initialize scrollbar
	var Scrollbar = window.Scrollbar;
  	Scrollbar.init(document.querySelector('.xoo-el-srcont'));


});
