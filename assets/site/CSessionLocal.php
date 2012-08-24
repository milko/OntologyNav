<?php

/**
 * <i>CSessionLocal</i> class definition.
 *
 * This file contains the class definition of <b>CSessionLocal</b> which extends its
 * ancestor to handle the specific site.
 *
 *	@package	MyWrapper
 *	@subpackage	Session
 *
 *	@author		Milko A. Škofič <m.skofic@cgiar.org>
 *	@version	1.00 08/08/2012
*/

/*=======================================================================================
 *																						*
 *									CSessionLocal.php									*
 *																						*
 *======================================================================================*/

/**
 * Ancestor.
 *
 * This include file contains the parent class definitions.
 */
require_once( kPATH_LIBRARY_SOURCE."CSessionMongoNeo4j.php" );

/**
 * Local definitions.
 *
 * This include file contains all local definitions to this class.
 */
require_once( "CSessionLocal.inc.php" );

/**
 *	Local session object.
 *
 * This class extends the concrete session object to handle specific site elements.
 *
 *	@package	MyWrapper
 *	@subpackage	Session
 */
class CSessionLocal extends CSessionMongoNeo4j
{
	/**
	 * Default directory.
	 *
	 * This data member holds the default site path.
	 *
	 * @var string
	 */
	 protected $mDefaultSitePath = kDEFAULT_PATH;

	/**
	 * Default home.
	 *
	 * This data member holds the default site url.
	 *
	 * @var string
	 */
	 protected $mDefaultSiteHome = kDEFAULT_HOME;

	/**
	 * Default wrapper.
	 *
	 * This data member holds the default wrapper path.
	 *
	 * @var string
	 */
	 protected $mDefaultWrapper = kDEFAULT_WRAPPER;

	/**
	 * Default database.
	 *
	 * This data member holds the default database name.
	 *
	 * @var string
	 */
	 protected $mDefaultDatabase = kDEFAULT_DATABASE;

	/**
	 * Element flags.
	 *
	 * This data member holds the element flags.
	 *
	 * @var array
	 */
	 protected $mElementFlags = Array();

		

/*=======================================================================================
 *																						*
 *								PUBLIC RESOURCES INTERFACE								*
 *																						*
 *======================================================================================*/


	 
	/*===================================================================================
	 *	DefaultSitePath																	*
	 *==================================================================================*/

	/**
	 * Manage the default site path.
	 *
	 * This method can be used to manage the default site path, this value represents the
	 * absolute path to the site root.
	 *
	 * The method accepts two parameters:
	 *
	 * <ul>
	 *	<li><b>$theValue</b>: The value to set or the operation to perform:
	 *	 <ul>
	 *		<li><i>NULL</i>: Retrieve the current value.
	 *		<li><i>FALSE</i>: Delete the current value, it will be set to <i>NULL</i>.
	 *		<li><i>other</i>: Any other value will be interpreted as the new value to set.
	 *	 </ul>
	 *	<li><b>$getOld</b>: A boolean flag determining which value the method will return:
	 *	 <ul>
	 *		<li><i>TRUE</i>: Return the value <i>before</i> it has eventually been modified,
	 *			this option is only relevant when deleting or relacing a value.
	 *		<li><i>FALSE</i>: Return the value <i>after</i> it has eventually been modified.
	 *	 </ul>
	 * </ul>
	 *
	 * @param mixed					$theValue			Value or operation.
	 * @param boolean				$getOld				TRUE get old value.
	 *
	 * @access public
	 * @return mixed
	 *
	 * @uses CObject::ManageMember()
	 */
	public function DefaultSitePath( $theValue = NULL, $getOld = FALSE )
	{
		return CObject::ManageMember
					( $this->mDefaultSitePath, $theValue, $getOld );				// ==>

	} // DefaultSitePath.

	 
	/*===================================================================================
	 *	DefaultSiteHome																	*
	 *==================================================================================*/

	/**
	 * Manage the default home URL.
	 *
	 * This method can be used to manage the default home URL, this value represents the
	 * base URL to the site.
	 *
	 * The method accepts two parameters:
	 *
	 * <ul>
	 *	<li><b>$theValue</b>: The value to set or the operation to perform:
	 *	 <ul>
	 *		<li><i>NULL</i>: Retrieve the current value.
	 *		<li><i>FALSE</i>: Delete the current value, it will be set to <i>NULL</i>.
	 *		<li><i>other</i>: Any other value will be interpreted as the new value to set.
	 *	 </ul>
	 *	<li><b>$getOld</b>: A boolean flag determining which value the method will return:
	 *	 <ul>
	 *		<li><i>TRUE</i>: Return the value <i>before</i> it has eventually been modified,
	 *			this option is only relevant when deleting or relacing a value.
	 *		<li><i>FALSE</i>: Return the value <i>after</i> it has eventually been modified.
	 *	 </ul>
	 * </ul>
	 *
	 * @param mixed					$theValue			Value or operation.
	 * @param boolean				$getOld				TRUE get old value.
	 *
	 * @access public
	 * @return mixed
	 *
	 * @uses CObject::ManageMember()
	 */
	public function DefaultSiteHome( $theValue = NULL, $getOld = FALSE )
	{
		return CObject::ManageMember
					( $this->mDefaultSiteHome, $theValue, $getOld );				// ==>

	} // DefaultSiteHome.

	 
	/*===================================================================================
	 *	DefaultSiteWrapper																*
	 *==================================================================================*/

	/**
	 * Manage the default wrapper.
	 *
	 * This method can be used to manage the default wrapper name, this value represents the
	 * name of the site's web-services wrapper.
	 *
	 * The method accepts two parameters:
	 *
	 * <ul>
	 *	<li><b>$theValue</b>: The value to set or the operation to perform:
	 *	 <ul>
	 *		<li><i>NULL</i>: Retrieve the current value.
	 *		<li><i>FALSE</i>: Delete the current value, it will be set to <i>NULL</i>.
	 *		<li><i>other</i>: Any other value will be interpreted as the new value to set.
	 *	 </ul>
	 *	<li><b>$getOld</b>: A boolean flag determining which value the method will return:
	 *	 <ul>
	 *		<li><i>TRUE</i>: Return the value <i>before</i> it has eventually been modified,
	 *			this option is only relevant when deleting or relacing a value.
	 *		<li><i>FALSE</i>: Return the value <i>after</i> it has eventually been modified.
	 *	 </ul>
	 * </ul>
	 *
	 * @param mixed					$theValue			Value or operation.
	 * @param boolean				$getOld				TRUE get old value.
	 *
	 * @access public
	 * @return mixed
	 *
	 * @uses CObject::ManageMember()
	 */
	public function DefaultSiteWrapper( $theValue = NULL, $getOld = FALSE )
	{
		return CObject::ManageMember
					( $this->mDefaultWrapper, $theValue, $getOld );					// ==>

	} // DefaultSiteWrapper.

		

/*=======================================================================================
 *																						*
 *						PUBLIC VIEW MODEL PROPERTIES INTERFACE							*
 *																						*
 *======================================================================================*/


	 
	/*===================================================================================
	 *	ShowNavBrand																	*
	 *==================================================================================*/

	/**
	 * Manage the navigation brand flag.
	 *
	 * This method can be used to show or hide the brand element by managing the
	 * {@link kSESSION_NAV_FLAG_BRAND kSESSION_NAV_FLAG_BRAND} offset, the method accepts
	 * two parameters:
	 *
	 * <ul>
	 *	<li><b>$theValue</b>: The value to set or the operation to perform:
	 *	 <ul>
	 *		<li><i>NULL</i>: Retrieve the current value.
	 *		<li><i>FALSE</i>: Hide the element.
	 *		<li><i>TRUE</i>: Show the element.
	 *	 </ul>
	 *	<li><b>$getOld</b>: A boolean flag determining which value the method will return:
	 *	 <ul>
	 *		<li><i>TRUE</i>: Return the value <i>before</i> it has eventually been modified,
	 *			this option is only relevant when deleting or replacing a value.
	 *		<li><i>FALSE</i>: Return the value <i>after</i> it has eventually been modified.
	 *	 </ul>
	 * </ul>
	 *
	 * If the element exists the method will return its value, if not, it will return
	 * <i>NULL</i>.
	 *
	 * @param mixed					$theValue			Value or operation.
	 * @param boolean				$getOld				TRUE get old value.
	 *
	 * @access public
	 * @return mixed
	 *
	 * @uses _ManageFlag()
	 *
	 * @see kSESSION_NAV_FLAG_BRAND
	 */
	public function ShowNavBrand( $theValue = NULL, $getOld = FALSE )
	{
		return $this->_ManageFlag( kSESSION_NAV_FLAG_BRAND, $theValue, $getOld );	// ==>

	} // ShowNavBrand.

	 
	/*===================================================================================
	 *	ShowNavSearch																	*
	 *==================================================================================*/

	/**
	 * Manage the navigation search flag.
	 *
	 * This method can be used to show or hide the search element by managing the
	 * {@link kSESSION_NAV_FLAG_SEARCH kSESSION_NAV_FLAG_SEARCH} offset, the method accepts
	 * two parameters:
	 *
	 * <ul>
	 *	<li><b>$theValue</b>: The value to set or the operation to perform:
	 *	 <ul>
	 *		<li><i>NULL</i>: Retrieve the current value.
	 *		<li><i>FALSE</i>: Hide the element.
	 *		<li><i>TRUE</i>: Show the element.
	 *	 </ul>
	 *	<li><b>$getOld</b>: A boolean flag determining which value the method will return:
	 *	 <ul>
	 *		<li><i>TRUE</i>: Return the value <i>before</i> it has eventually been modified,
	 *			this option is only relevant when deleting or replacing a value.
	 *		<li><i>FALSE</i>: Return the value <i>after</i> it has eventually been modified.
	 *	 </ul>
	 * </ul>
	 *
	 * If the element exists the method will return its value, if not, it will return
	 * <i>NULL</i>.
	 *
	 * @param mixed					$theValue			Value or operation.
	 * @param boolean				$getOld				TRUE get old value.
	 *
	 * @access public
	 * @return mixed
	 *
	 * @uses _ManageFlag()
	 *
	 * @see kSESSION_NAV_FLAG_SEARCH
	 */
	public function ShowNavSearch( $theValue = NULL, $getOld = FALSE )
	{
		return $this->_ManageFlag( kSESSION_NAV_FLAG_SEARCH, $theValue, $getOld );	// ==>

	} // ShowNavSearch.

	 
	/*===================================================================================
	 *	ShowNavDataset																	*
	 *==================================================================================*/

	/**
	 * Manage the brand flag.
	 *
	 * This method can be used to show or hide the brand element by managing the
	 * {@link kSESSION_NAV_FLAG_DATASET kSESSION_NAV_FLAG_DATASET} offset, the method
	 * accepts two parameters:
	 *
	 * <ul>
	 *	<li><b>$theValue</b>: The value to set or the operation to perform:
	 *	 <ul>
	 *		<li><i>NULL</i>: Retrieve the current value.
	 *		<li><i>FALSE</i>: Hide the element.
	 *		<li><i>TRUE</i>: Show the element.
	 *	 </ul>
	 *	<li><b>$getOld</b>: A boolean flag determining which value the method will return:
	 *	 <ul>
	 *		<li><i>TRUE</i>: Return the value <i>before</i> it has eventually been modified,
	 *			this option is only relevant when deleting or replacing a value.
	 *		<li><i>FALSE</i>: Return the value <i>after</i> it has eventually been modified.
	 *	 </ul>
	 * </ul>
	 *
	 * If the element exists the method will return its value, if not, it will return
	 * <i>NULL</i>.
	 *
	 * @param mixed					$theValue			Value or operation.
	 * @param boolean				$getOld				TRUE get old value.
	 *
	 * @access public
	 * @return mixed
	 *
	 * @uses _ManageFlag()
	 *
	 * @see kSESSION_NAV_FLAG_DATASET
	 */
	public function ShowNavDataset( $theValue = NULL, $getOld = FALSE )
	{
		return $this->_ManageFlag( kSESSION_NAV_FLAG_DATASET, $theValue, $getOld );	// ==>

	} // ShowNavDataset.

	 
	/*===================================================================================
	 *	ShowNavOntology																	*
	 *==================================================================================*/

	/**
	 * Manage the ontology flag.
	 *
	 * This method can be used to show or hide the ontology menu element by managing the
	 * {@link kSESSION_NAV_FLAG_ONTOLOGY kSESSION_NAV_FLAG_ONTOLOGY} offset, the method
	 * accepts two parameters:
	 *
	 * <ul>
	 *	<li><b>$theValue</b>: The value to set or the operation to perform:
	 *	 <ul>
	 *		<li><i>NULL</i>: Retrieve the current value.
	 *		<li><i>FALSE</i>: Hide the element.
	 *		<li><i>TRUE</i>: Show the element.
	 *	 </ul>
	 *	<li><b>$getOld</b>: A boolean flag determining which value the method will return:
	 *	 <ul>
	 *		<li><i>TRUE</i>: Return the value <i>before</i> it has eventually been modified,
	 *			this option is only relevant when deleting or replacing a value.
	 *		<li><i>FALSE</i>: Return the value <i>after</i> it has eventually been modified.
	 *	 </ul>
	 * </ul>
	 *
	 * If the element exists the method will return its value, if not, it will return
	 * <i>NULL</i>.
	 *
	 * @param mixed					$theValue			Value or operation.
	 * @param boolean				$getOld				TRUE get old value.
	 *
	 * @access public
	 * @return mixed
	 *
	 * @uses _ManageFlag()
	 *
	 * @see kSESSION_NAV_FLAG_ONTOLOGY
	 */
	public function ShowNavOntology( $theValue = NULL, $getOld = FALSE )
	{
		return $this->_ManageFlag
					( kSESSION_NAV_FLAG_ONTOLOGY, $theValue, $getOld );				// ==>

	} // ShowNavOntology.

		

/*=======================================================================================
 *																						*
 *								PUBLIC OPERATIONS INTERFACE								*
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
	 * @access public
	 *
	 * @see kDEFAULT_SESSION
	 * @see kDEFAULT_GUEST_NAME kDEFAULT_GUEST_CODE
	 * @see kDEFAULT_GUEST_PASS kDEFAULT_GUEST_EMAIL
	 */
	public function Init_Guest()
	{
		//
		// Init local storage.
		//
		$container = $this->UsersContainer();
		if( $container === NULL )
		{
			$this->_Init();
			$container = $this->UsersContainer();
		}
		
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
			$user->Commit( $container );
		
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
	 * @access public
	 *
	 * @see kDEFAULT_SESSION
	 * @see kSESSION_PARAM_USER_CODE kSESSION_PARAM_USER_PASS kSESSION_PARAM_USER_LOGOUT
	 */
	public function Handle_Login()
	{
		//
		// Handle login.
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
				$found = $this->Login( $_REQUEST[ kSESSION_PARAM_USER_CODE ],
									   $_REQUEST[ kSESSION_PARAM_USER_PASS ] );
				if( $found )
					$this->User( $found );
			
			} // Provided user password.
		
		} // Provided user code.
		
		//
		// Reset.
		//
		elseif( array_key_exists( kSESSION_PARAM_USER_LOGOUT, $_REQUEST ) )
			$this->User( FALSE );
		
		//
		// Handle update.
		//
		else
		{
			//
			// Only if logged.
			//
			$user = $this->User();
			if( $user !== NULL )
			{
				//
				// Set name.
				//
				if( array_key_exists( kSESSION_PARAM_USER_NAME, $_REQUEST )
				 && strlen( $_REQUEST[ kSESSION_PARAM_USER_NAME ] ) )
					$user->Name( $_REQUEST[ kSESSION_PARAM_USER_NAME ] );
			
				//
				// Set e-mail.
				//
				if( array_key_exists( kSESSION_PARAM_USER_EMAIL, $_REQUEST )
				 && strlen( $_REQUEST[ kSESSION_PARAM_USER_EMAIL ] ) )
					$user->Email( $_REQUEST[ kSESSION_PARAM_USER_EMAIL ] );
			
				//
				// Set password.
				//
				if( array_key_exists( kSESSION_PARAM_USER_PASS, $_REQUEST )
				 && strlen( $_REQUEST[ kSESSION_PARAM_USER_PASS ] ) )
					$user->Password( $_REQUEST[ kSESSION_PARAM_USER_PASS ] );
				
				//
				// Commit.
				//
				$container = $this->UsersContainer();
				if( $container !== NULL )
					$user->Commit( $container );
				
				//
				// Register user with view model.
				//
				$this->_RegisterUser();
			
			} // Logged.
			
		} // No login or logout.
		
		//
		// Adjust view elements.
		//
		$this->_RegisterElementFlags();
	
	} // Handle_Login.



/*=======================================================================================
 *																						*
 *							STATIC SESSION INITIALISATION METHODS						*
 *																						*
 *======================================================================================*/


	 
	/*===================================================================================
	 *	Init_Session																	*
	 *==================================================================================*/

	/**
	 * Initialise session.
	 *
	 * This method should be called when you want to initialise the session, it will ensure
	 * that the session holds a session object instance.
	 *
	 * @static
	 */
	static function Init_Session()
	{
		//
		// Reset session.
		//
		if( array_key_exists( 'reset', $_SESSION ) )
		{
			if( array_key_exists( kDEFAULT_SESSION, $_SESSION ) )
				unset( $_SESSION[ kDEFAULT_SESSION ] );
		}
			
		//
		// Instantiate session handler.
		//
		if( ! array_key_exists( kDEFAULT_SESSION, $_SESSION ) )
			$_SESSION[ kDEFAULT_SESSION ] = new self();
	
	} // Init_Session.

		

/*=======================================================================================
 *																						*
 *							PROTECTED INITIALISATION INTERFACE							*
 *																						*
 *======================================================================================*/


	 
	/*===================================================================================
	 *	_Init																			*
	 *==================================================================================*/

	/**
	 * Initialise resources.
	 *
	 * This method is called when {@link __construct() instantiating} the object, its duty
	 * is to initialise the required resources.
	 *
	 * In this class we handle the {@link _InitSitePath() site}
	 * {@link DefaultSitePath() path}, the {@link _InitSiteHome() site}
	 * {@link DefaultSiteHome() home}, the {@link _InitSiteWrapper() site}
	 * {@link DefaultSiteWrapper() wrapper}, the {@link _InitNavBrandFlag() navigation}
	 * {@link ShowNavBrand() brand}, the {@link _InitNavSearchFlag() navigation}
	 * {@link ShowNavSearch() search}, the {@link _InitNavDatasetFlag() navigation}
	 * {@link ShowNavDataset() dataset} and the {@link _InitNavOntologyFlag() navigation}
	 * {@link ShowNavOntology() ontology}.
	 *
	 * @param reference			   &$theOperation		Operation or serialised data.
	 *
	 * @access protected
	 *
	 * @uses _InitSitePath()
	 * @uses _InitSiteHome()
	 * @uses _InitSiteWrapper()
	 * @uses _InitNavBrandFlag()
	 * @uses _InitNavSearchFlag()
	 * @uses _InitNavDatasetFlag()
	 * @uses _InitNavOntologyFlag()
	 */
	protected function _Init()
	{
		//
		// Call parent method.
		//
		parent::_Init();
		
		//
		// Initialise local properties.
		//
		$this->_InitSitePath();
		$this->_InitSiteHome();
		$this->_InitSiteWrapper();
		$this->_InitNavBrandFlag();
		$this->_InitNavSearchFlag();
		$this->_InitNavDatasetFlag();
		$this->_InitNavOntologyFlag();
		
	} // _Init.

	 
	/*===================================================================================
	 *	_InitSitePath																	*
	 *==================================================================================*/

	/**
	 * Initialise site path.
	 *
	 * The duty of this method is to initialise the default site path.
	 *
	 * In this class we use the {@link kDEFAULT_PATH kDEFAULT_PATH} constant.
	 *
	 * @param mixed					$theData			Eventual custom value.
	 *
	 * @access protected
	 *
	 * @throws {@link CException CException}
	 *
	 * @uses DefaultSitePath()
	 *
	 * @see kDEFAULT_PATH
	 */
	protected function _InitSitePath( $theData = NULL )
	{
		//
		// Set default name.
		//
		if( $theData === NULL )
		{
			//
			// Check symbol.
			//
			if( ! defined( 'kDEFAULT_PATH' ) )
				throw new CException
					( "Default site path is undefined",
					  kERROR_OPTION_MISSING,
					  kMESSAGE_TYPE_ERROR,
					  array( 'Symbol' => 'kDEFAULT_PATH' ) );					// !@! ==>
			
			//
			// Initialise.
			//
			$theData = kDEFAULT_PATH;
		
		} // Missing host.
		
		//
		// Initialise.
		//
		$this->DefaultSitePath( $theData );
	
	} // _InitSitePath.

	 
	/*===================================================================================
	 *	_InitSiteHome																	*
	 *==================================================================================*/

	/**
	 * Initialise site home.
	 *
	 * The duty of this method is to initialise the default site home.
	 *
	 * In this class we use the {@link kDEFAULT_HOME kDEFAULT_HOME} constant.
	 *
	 * @param mixed					$theData			Eventual custom value.
	 *
	 * @access protected
	 *
	 * @throws {@link CException CException}
	 *
	 * @uses DefaultSiteHome()
	 *
	 * @see kDEFAULT_HOME
	 */
	protected function _InitSiteHome( $theData = NULL )
	{
		//
		// Set default name.
		//
		if( $theData === NULL )
		{
			//
			// Check symbol.
			//
			if( ! defined( 'kDEFAULT_HOME' ) )
				throw new CException
					( "Default site home is undefined",
					  kERROR_OPTION_MISSING,
					  kMESSAGE_TYPE_ERROR,
					  array( 'Symbol' => 'kDEFAULT_HOME' ) );					// !@! ==>
			
			//
			// Initialise.
			//
			$theData = kDEFAULT_HOME;
		
		} // Missing host.
		
		//
		// Initialise.
		//
		$this->DefaultSiteHome( $theData );
	
	} // _InitSiteHome.

	 
	/*===================================================================================
	 *	_InitSiteWrapper																*
	 *==================================================================================*/

	/**
	 * Initialise site wrapper.
	 *
	 * The duty of this method is to initialise the default site wrapper.
	 *
	 * In this class we use the {@link kDEFAULT_WRAPPER kDEFAULT_WRAPPER} constant.
	 *
	 * @param mixed					$theData			Eventual custom value.
	 *
	 * @access protected
	 *
	 * @throws {@link CException CException}
	 *
	 * @uses DefaultSiteWrapper()
	 *
	 * @see kDEFAULT_WRAPPER
	 */
	protected function _InitSiteWrapper( $theData = NULL )
	{
		//
		// Set default name.
		//
		if( $theData === NULL )
		{
			//
			// Check symbol.
			//
			if( ! defined( 'kDEFAULT_WRAPPER' ) )
				throw new CException
					( "Default site wrapper is undefined",
					  kERROR_OPTION_MISSING,
					  kMESSAGE_TYPE_ERROR,
					  array( 'Symbol' => 'kDEFAULT_WRAPPER' ) );				// !@! ==>
			
			//
			// Initialise.
			//
			$theData = kDEFAULT_WRAPPER;
		
		} // Missing host.
		
		//
		// Initialise.
		//
		$this->DefaultSiteWrapper( $theData );
	
	} // _InitSiteWrapper.

	 
	/*===================================================================================
	 *	_InitNavBrandFlag																*
	 *==================================================================================*/

	/**
	 * Initialise brand flag.
	 *
	 * The duty of this method is to initialise the navigation brand flag.
	 *
	 * In this class we {@link __construct() initialise} the value to <i>TRUE</i>.
	 *
	 * @param mixed					$theData			Eventual custom path.
	 *
	 * @access protected
	 *
	 * @uses ShowNavBrand()
	 *
	 * @see kSESSION_NAV_FLAG_BRAND
	 */
	protected function _InitNavBrandFlag( $theData = NULL )
	{
		//
		// Default value.
		//
		if( $theData === NULL )
			$this->ShowNavBrand( TRUE );
			
		//
		// Custom value.
		//
		else
			$this->ShowNavBrand( (boolean) $theData );
	
	} // _InitNavBrandFlag.

	 
	/*===================================================================================
	 *	_InitNavSearchFlag																*
	 *==================================================================================*/

	/**
	 * Initialise search flag.
	 *
	 * The duty of this method is to initialise the navigation search flag.
	 *
	 * In this class we {@link __construct() initialise} the value to <i>FALSE</i>.
	 *
	 * @param mixed					$theData			Eventual custom path.
	 *
	 * @access protected
	 *
	 * @uses ShowNavSearch()
	 *
	 * @see kSESSION_NAV_FLAG_SEARCH
	 */
	protected function _InitNavSearchFlag( $theData = NULL )
	{
		//
		// Default value.
		//
		if( $theData === NULL )
			$this->ShowNavSearch( FALSE );
			
		//
		// Custom value.
		//
		else
			$this->ShowNavSearch( (boolean) $theData );
	
	} // _InitNavSearchFlag.

	 
	/*===================================================================================
	 *	_InitNavDatasetFlag																*
	 *==================================================================================*/

	/**
	 * Initialise dataset flag.
	 *
	 * The duty of this method is to initialise the navigation dataset flag.
	 *
	 * In this class we {@link __construct() initialise} the value to <i>FALSE</i>.
	 *
	 * @param mixed					$theData			Eventual custom value.
	 *
	 * @access protected
	 *
	 * @uses ShowNavDataset()
	 *
	 * @see kSESSION_NAV_FLAG_DATASET
	 */
	protected function _InitNavDatasetFlag( $theData = NULL )
	{
		//
		// Default value.
		//
		if( $theData === NULL )
			$this->ShowNavDataset( FALSE );
			
		//
		// Custom value.
		//
		else
			$this->ShowNavDataset( (boolean) $theData );
	
	} // _InitNavDatasetFlag.

	 
	/*===================================================================================
	 *	_InitNavOntologyFlag																*
	 *==================================================================================*/

	/**
	 * Initialise ontology flag.
	 *
	 * The duty of this method is to initialise the navigation ontology flag.
	 *
	 * In this class we {@link __construct() initialise} the value to <i>FALSE</i>.
	 *
	 * @param mixed					$theData			Eventual custom value.
	 *
	 * @access protected
	 *
	 * @uses ShowNavOntology()
	 *
	 * @see kSESSION_NAV_FLAG_ONTOLOGY
	 */
	protected function _InitNavOntologyFlag( $theData = NULL )
	{
		//
		// Default value.
		//
		if( $theData === NULL )
			$this->ShowNavOntology( FALSE );
			
		//
		// Custom value.
		//
		else
			$this->ShowNavOntology( (boolean) $theData );
	
	} // _InitNavOntologyFlag.

		

/*=======================================================================================
 *																						*
 *								PROTECTED VIEW MODEL INTERFACE							*
 *																						*
 *======================================================================================*/


	 
	/*===================================================================================
	 *	_Register																		*
	 *==================================================================================*/

	/**
	 * Initialise view model.
	 *
	 * This method will initialise the view model.
	 *
	 * @access protected
	 */
	protected function _Register()
	{
		//
		// Call parent method.
		//
		parent::_Register();
		
		//
		// Register element flags.
		//
		$this->_RegisterElementFlags();
		
	} // _Register.

	 
	/*===================================================================================
	 *	_RegisterElementFlags															*
	 *==================================================================================*/

	/**
	 * Update element flags in view model.
	 *
	 * This method will update element flags in the view model.
	 *
	 * @access protected
	 */
	protected function _RegisterElementFlags()
	{
		//
		// Get current user.
		//
		$has_user = ( $this->User() !== NULL );
		
		//
		// Show/hide local elements.
		//
		$this->ShowNavSearch( $has_user );
		$this->ShowNavDataset( $has_user );
		$this->ShowNavOntology( $has_user );
		
	} // _RegisterElementFlags.

	 

} // class CSessionLocal.


?>
