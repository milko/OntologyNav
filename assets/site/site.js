/**
 * This file contains the local javascript files.
 *
 *	@package	MyWrapper
 *	@subpackage	Sites
 *
 *	@author		Milko A. Škofič <m.skofic@cgiar.org>
 *	@version	1.00 20/07/2012
 */
		

/*=======================================================================================
 *																						*
 *										site.js											*
 *																						*
 *======================================================================================*/


/*=======================================================================================
 *	login-prompt																		*
 *																						*
 * ???																					*
 *======================================================================================*/
$(function(){
	$('#login-prompt').popover({
		placement: 'bottom'
	})
});


/*=======================================================================================
 *	addFunctionsToViewModel																*
 *																						*
 * Add functions to view model.															*
 *======================================================================================*/
function addFunctionsToViewModel( vm )
{
	//
	// User profile validation.
	//
	vm.userProfileSubmit = function( form )
	{
		//
		// Init local storage.
		//
		var ok = true;
		var field = null;
		
		//
		// Check name.
		//
		field = $("#userName");
		if( field.val() == '' )
		{
			$(form).find( "#userProfile_MissingName" ).show();
			ok = false;
		}
		else
			$(form).find( "#userProfile_MissingName" ).hide();
		
		//
		// Check e-mail.
		//
		field = $("#userEmail");
		if( field.val() == '' )
		{
			$(form).find( "#userProfile_MissingEmail" ).show();
			ok = false;
		}
		else
			$(form).find( "#userProfile_MissingEmail" ).hide();
		
		return ok;																	// ==>
	}
}

