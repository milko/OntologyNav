<?php
	
/**
 * Site functions.
 *
 * This file contains a series of functions used in the site.
 *
 *	@package	MyWrapper
 *	@subpackage	Run-time
 *
 *	@author		Milko A. Škofič <m.skofic@cgiar.org>
 *	@version	1.00 07/08/2012
 */

/*=======================================================================================
 *																						*
 *										function.php									*
 *																						*
 *======================================================================================*/

//
// Includes.
//
require_once( 'site.inc.php' );



/*=======================================================================================
 *																						*
 *							SESSION INITIALISATION FUNCTIONS							*
 *																						*
 *======================================================================================*/


	 
	/*===================================================================================
	 *	Init_Session																	*
	 *==================================================================================*/

	/**
	 * Initialise session.
	 *
	 * This function should be called when you want to initialise the session, besides
	 * calling the <i>session_start()</i> function, it will ensure that the session holds
	 * a {@link CSessionObject CSessionObject} instance.
	 *
	 * This is the first function that should be called.
	 *
	 * The function returns no result, any error should be handled by raising an exception.
	 */
	function Init_Session()
	{
		//
		// Start session.
		//
		session_start();
		
		//
		// Instantiate session handler.
		//
		if( ! array_key_exists( kDEFAULT_SESSION, $_SESSION ) )
			$_SESSION[ kDEFAULT_SESSION ] = new CSessionMongoNeo4j();
	
	} // Init_Session.



/*=======================================================================================
 *																						*
 *								USER MANAGEMENT FUNCTIONS								*
 *																						*
 *======================================================================================*/


	 
	/*===================================================================================
	 *	Init_Guest																		*
	 *==================================================================================*/

	/**
	 * Initialise guest user.
	 *
	 * This function can be used to create a guest user.
	 *
	 * @see kDEFAULT_SESSION
	 * @see kDEFAULT_GUEST_NAME kDEFAULT_GUEST_CODE
	 * @see kDEFAULT_GUEST_PASS kDEFAULT_GUEST_EMAIL
	 */
	function Init_Guest()
	{
		//
		// Init local storage.
		//
		$container = $_SESSION[ kDEFAULT_SESSION ]->UsersContainer();
		
		//
		// Check for test user.
		//
		$user = new CUser( $container, CUser::HashIndex( kDEFAULT_GUEST_CODE ) );
		if( ! $user->Persistent() )
		{
			//
			// Load user.
			//
			$user->Name( kDEFAULT_GUEST_NAME );
			$user->Code( kDEFAULT_GUEST_CODE );
			$user->Password( kDEFAULT_GUEST_PASS );
			$user->Email( kDEFAULT_GUEST_EMAIL );
			
			//
			// Store user.
			//
			$user->Commit( $_SESSION[ kDEFAULT_SESSION ]->UsersContainer() );
		
		} // User not there.
	
	} // Init_Guest.

	 
	/*===================================================================================
	 *	Handle_Login																	*
	 *==================================================================================*/

	/**
	 * Handle login request.
	 *
	 * This function can be used to handle a login request, the function will check if the
	 * {@link kSESSION_PARAM_USER_CODE kSESSION_PARAM_USER_CODE} or the
	 * {@link kSESSION_PARAM_USER_PASS kSESSION_PARAM_USER_PASS} parameters were provided
	 * and either attempt a login or a logout.
	 *
	 * <ul>
	 *	<li><i>Login</i>: both the {@link kSESSION_PARAM_USER_CODE code} and
	 *		{@link kSESSION_PARAM_USER_PASS password} must have been provided: if both
	 *		match a user, this {@link CUser user} will be set in the
	 *		{@link kDEFAULT_SESSION session}. If the combination doesn't match a user,
	 *		nothing will happen.
	 *	<li><i>Logout</i>: the {@link kSESSION_PARAM_USER_LOGOUT kSESSION_PARAM_USER_LOGOUT}
	 *		parameter is received, the  {@link kDEFAULT_SESSION session} {@link CUser user}
	 *		will be cleared.
	 * </ul>
	 *
	 * @see kDEFAULT_SESSION
	 * @see kSESSION_PARAM_USER_CODE kSESSION_PARAM_USER_PASS kSESSION_PARAM_USER_LOGOUT
	 */
	function Handle_Login()
	{
		//
		// Provided user code.
		//
		if( array_key_exists( kSESSION_PARAM_USER_CODE, $_REQUEST ) )
		{
			//
			// Provided user password.
			//
			if( array_key_exists( kSESSION_PARAM_USER_PASS, $_REQUEST ) )
			{
				//
				// Look for user.
				//
				$found = $_SESSION[ kDEFAULT_SESSION ]
						->Login( $_REQUEST[ kSESSION_PARAM_USER_CODE ],
								 $_REQUEST[ kSESSION_PARAM_USER_PASS ] );
				if( $found )
					$_SESSION[ kDEFAULT_SESSION ]->User( $found );
			
			} // Provided user password.
		
		} // Provided user code.
		
		//
		// Reset.
		//
		elseif( array_key_exists( kSESSION_PARAM_USER_LOGOUT, $_REQUEST ) )
			$_SESSION[ kDEFAULT_SESSION ]->User( FALSE );
	
	} // Handle_Login.

	 

?>
