/**
 * Custom jQuery "key-map" functions
 * ( ...feel free to add your own :-D )
 */
$( document ).ready(function() {
	
	document.onkeyup = function(key) {
		
		//alert(key.which);
		
		const basePath = window.location.origin;

		/**
		 * key : Alt + G
		 *
		 * Set focus on the "Go to function" field
		 * in the navbar next to menu items and avatar
		 */
		if (key.altKey && key.which === 71) {

			const goToCase = $("#goToCase")
			const inputGrp = $("#goToSearchInputGroup")

			if (goToCase.is(":focus")) {

				goToCase.blur()
				inputGrp.removeClass('focused')

			} else {

				goToCase.focus()
				inputGrp.addClass('focused')
			}
		}
		
		/**
		 * key : Alt + L
		 *
		 * Locks the system
		 */
		if (key.altKey && key.which === 76) {
			
			window.location.href = basePath + "/auth/lock-system";
		}
		
		/**
		 * key : Alt + P
		 *
		 * Navigates to the authenticated user's profile-page
		 */
		if (key.altKey && key.which === 80) {
			
			window.location.href = basePath + "/user/profile";
		}
		
		/**
		 * key : Alt + Q
		 *
		 * Signs the user out
		 */
		if (key.altKey && key.which === 81) {

			window.location.href = basePath + "/auth/sign-out";
		}
		
		/**
		 * key : Alt + R
		 *
		 * TODO : function available
		 */
		if (key.altKey && key.which === 82) {
			
			//alert("R key pressed")
		}
		
		/**
		 * key : Alt + S
		 *
		 * Navigates to settings-page
		 */
		if (key.altKey && key.which === 83) {
			
			window.location.href = basePath + "/settings";
		}
		
		/**
		 * key : F9
		 *
		 * TODO : function available
		 */
		if (key.which === 120) {
			
			alert("Do something")
		}
		
	};
	
});
