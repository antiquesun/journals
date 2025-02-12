$(document).ready(function() {


    function initRollovers( cssSelector ) {
		var aPreLoad = new Array();

		$( cssSelector ).each(function(i){
			var src = this.getAttribute('src');
			this.src_default = src;

			var ext = src.substring(src.lastIndexOf('.'), src.length);
			this.src_hover = src.replace(ext, '_on'+ext);
			
			aPreLoad[i] = new Image();
			aPreLoad[i].src = this.src_hover;
			
		}).hover(function(){
				if ( this.src.indexOf('_disabled') < 0 ) {
					this.src = this.src_hover;
				}
			},function(){
				if ( this.src.indexOf('_disabled') < 0 ) {
					this.src = this.src_default;
				}
		});
	}
	initRollovers( "img.roll" );

	// REQUEST MODAL CONTENT
	// extension of jQuery.modalContent plugin that dynamically grabs content to display in modalContent box
	
	jQuery.fn.extend({
		requestModalContent: function() {
			return this.each(function() { $(this).click(function(){
				// XmlHttpRequest from the URL in the HREF of an anchor tag
				$.get(this.href, function(data){
					$("#modalContentContainer").html(data);
					$("#modalContentContainer").modalContent({background: '#000', opacity: '.65'});
					// onHide function checks the radio button of the selected tab
					$('#modalContent  .tabs_container_dialog').tabs({fxFade: true, fxSpeed: 'fast', onHide: function(oTab){$(oTab).prev().attr("checked","checked")}});
					// onClick handler set on radio button, sends click event on the anchor tag (next) that then selects the tab
					$('#modalContent .tabs_container_dialog ul input[@type=radio]').click(function(){$(this).next().click()})
					// enable modal -> modal content
					$('#modalContent a.modalContent').requestModalContent();
					// label-click input-focus is not established with dynamically requested data, this corrects that
					$('#modalContent label[@for]').click(function(){
						var oInput = document.getElementById( $(this).attr("for") );
						if ( oInput.type == "checkbox" ) {
							oInput.click();
						} else {
							oInput.focus();
						}
					});
					initSelectAll("#modalContent input:checkbox.check_all");
					initCcvPanel('#modalContent a.whats_this','modal_');
					initRollovers('#modalContent img.roll');
				});
				return false; // prevent page from refreshing (this function is activated onclick of an anchor tag)
			}) });
		}
	});
	
	 jQuery.fn.extend({
		requestModalContent2: function() {
			return this.each(function() { $(this).click(function(){
				// XmlHttpRequest from the URL in the HREF of an anchor tag
				parenthref = this.title;
				$.get(this.href, function(data){
				    $("#modalContentContainer").html(data);
					$("#modalContentContainer").modalContent({background: '#000', opacity: '.65'});
					
					initRollovers('#modalContent img.roll');
					$("#modalContent a.continue").click(function(){
                        window.location.href = parenthref;
                   }); 
				});
				return false; // prevent page from refreshing (this function is activated onclick of an anchor tag)
			}) });
		}
	});
	
	
	

	// SET-UP MODAL DIALOGS
	//if($('a.modalContent').length > 0)	{
		//$(document).append('<div id="modalContentContainer"></div>');
		//$('a.modalContent').requestModalContent();
	//}
	
	if($('a.modalContentConfirm').length > 0)	{
		//$(document).append('<div id="modalContentContainer"></div>');
		$('a.modalContentConfirm').requestModalContent2();
	}
	

});